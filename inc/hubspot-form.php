<?php

add_action('wp_ajax_submit_contact_form', 'submit_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'submit_contact_form');

function submit_contact_form() {
	hub_spot_submit($_POST);
    if (!isset($_POST['form_nonce']) || !wp_verify_nonce($_POST['form_nonce'], 'ajax_form_nonce')) {
        wp_send_json_error(['message' => 'Nonce verification failed']);
        wp_die();
    }

    $turnstile_token = $_POST['turnstile_token'];
    
    $response_turnstile = verify_turnstile_token($turnstile_token);

    if ($response_turnstile) {
        hub_spot_submit($_POST);
    } else {
    	//hub_spot_submit($_POST);
        wp_send_json_error(['message' => 'Turnstile validation failed']);
    }

    wp_die(); // This is required to terminate immediately and return a proper response
}



function verify_turnstile_token($token) {
    $secret_key = '0x4AAAAAAAegN8MRwKJ_g7O7IegJ0LB4Luc'; //  Turnstile secret key
    $response = wp_remote_post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
        'body' => [
            'secret' => $secret_key,
            'response' => $token,
        ],
    ]);

    if (is_wp_error($response)) {
        return false;
    }

    $body = wp_remote_retrieve_body($response);
    $result = json_decode($body, true);

    return isset($result['success']) && $result['success'] === true;
}

function hub_spot_submit($data){
	
	// Extract form field values and sanitize
    $firstName = sanitize_text_field($_POST['firstName']);
    $lastName = sanitize_text_field($_POST['lastName']);
    $email = sanitize_email($_POST['workemail']);
    $companyName = sanitize_text_field($_POST['companyName']);
    $phoneNumber = sanitize_text_field($_POST['phoneNumber']);
    $message = sanitize_textarea_field($_POST['message']);
	$hutk = isset($data['hutk']) ? sanitize_text_field($data['hutk']) : '';

	$endpoint = 'https://api.hsforms.com/submissions/v3/integration/submit/1800068/0bbdeec8-7195-4351-92cd-4556c9702783';
$endpointDebug = 'https://webhook.site/c33575fa-aec1-4667-9078-8d30a0d648da';

    $data = array(
        'fields' => array(
            array(
                'objectTypeId' => '0-1',
                'name' => 'firstName',
                'value' => $firstName
            ),
            array(
                'objectTypeId' => '0-1',
                'name' => 'lastName',
                'value' => $lastName
            ),
            array(
                'objectTypeId' => '0-1',
                'name' => 'email',
                'value' => $email
            ),
            array(
                'objectTypeId' => '0-1',
                'name' => 'phone',
                'value' => $phoneNumber
            ),
            array(
              
                'name' => 'message',
                'value' => $message
            ),
            array(
                'objectTypeId' => '0-1',
                'name' => 'companyName',
                'value' => $companyName
            )
        ),
        'context' => array(
            'pageUri' => $_SERVER['HTTP_REFERER'],
            'pageName' => 'WPThemeE',
            'hutk' => $hutk
        ),
        'legalConsentOptions' => array(
            'consent' => array(
                'consentToProcess' => true,
                'text' => 'I agree to allow Example Company to store and process my personal data.',
                'communications' => array(
                    array(
                        'value' => true,
                        'subscriptionTypeId' => 999,
                        'text' => 'I agree to receive marketing communications from Example Company.'
                    )
                )
            )
        )
    );

    $args = array(
        'headers' => array(
            'Content-Type' => 'application/json',
        ),
        'body' => wp_json_encode($data)
    );

    $response = wp_remote_post($endpoint, $args);
	
	$api_response_body = json_decode($response['body'], true);

	if (isset($api_response_body['status']) && $api_response_body['status'] === 'error') {
		$error_messages = array_map(function($error) {
			return $error['message'];
		}, $api_response_body['errors']);
		wp_send_json_error(['message' => 'Form submission failed', 'errors' => $error_messages]);
	} else {
		wp_send_json_success(['message' => 'Form submission successful', 'response' => $api_response_body]);
	}
}