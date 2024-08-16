<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPThemeE
 */

?>

<footer id="colophon" class="footer">
    
	
	<div class="footer__content container">
    <div class="footer-left">
        
    <div class="footer__content--logo">
         	<?php
// Check if the footer logo has been uploaded, if yes, display it
if ( get_theme_mod('footer_logo') ) {
    echo '<div class="footer-logo">';
    echo '<a href="' . esc_url(home_url('/')) . '"><img src="' . esc_url(get_theme_mod('footer_logo')) . '" alt="' . get_bloginfo('name') . '"></a>';
    echo '</div>';
}
?>
    </div>
    <div class="footer-contact-info">
        <div>
        <small class="font-secondary">Baton Rouge, LA | Hammond, LA</small>
        <small class="font-secondary"><a href="tel:+12253845549" style="color: inherit; text-decoration: none;">225 384 5549</a></small>
        </div>
    
      </div>
    </div>
    
       <div class="footer-right" style="
    display: flex;
 
    flex-direction: column;
">
           
           <?php
		wp_nav_menu(array(
			'theme_location' => 'menu-2', // Replace 'footer' with your menu location slug
			'container'      => false,
			'menu_class'     => 'footer__content--nav',
			'walker'         => new Custom_Footer_Nav_Walker(),
		));
		?>
        
            <div class="footer-desc-right " >
                <small class="font-secondary">©2024 WPThemeE | All rights reserved. | <a href="/privacy/">Privacy Policy</a></small>
                <small class="font-secondary">By accessing this site, you consent to the use of cookies and collection of personal information.</small>
              </div>
                   <div class="custom_logo" >
             <?php
             if(get_theme_mod('service_provider_badge')){
             $badge_url = esc_url(get_theme_mod('service_provider_badge'));
             $site_name = get_bloginfo('name');
             $height = 100; // Set the desired height
             $width = 100;  // Set the desired width

            echo '<img src="' . $badge_url . '" alt="' . $site_name  . '" width="' . $width . '">';
            
             
             }
              if(get_theme_mod('hippa_compliance_seal')){
                  $badge_url = esc_url(get_theme_mod('hippa_compliance_seal'));
                  $site_name = get_bloginfo('name');
                  $height = 100; // Set the desired height
                 $width = 100;  // Set the desired width
             
          echo '<img src="' . $badge_url . '" alt="' . $site_name  . '" width="' . $width . '">';
             
             }
              if(get_theme_mod('louisiana')){
                  $badge_url = esc_url(get_theme_mod('louisiana'));
                  $site_name = get_bloginfo('name');
                  $height = 100; // Set the desired height
                 $width = 100;  // Set the desired width
             
          echo '<img src="' . $badge_url . '" alt="' . $site_name  . '" width="' . $width . '">';
             
             }
               if(get_theme_mod('inc')){
                  $badge_url = esc_url(get_theme_mod('inc'));
                  $site_name = get_bloginfo('name');
                  $height = 100; // Set the desired height
                 $width = 100;  // Set the desired width
             
           echo '<img src="' . $badge_url . '" alt="' . $site_name  . '" width="' . $width . '">';
             
             }
             ?>
         
         
    </div>
       </div>
      
    
    </div>
	
	
	
	
	
	
	
	
	
	
	
	
	<div id='scroll-up'>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
    </div>
</footer> 

</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Start of HubSpot Embed Code 
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/1800068.js"></script>
 End of HubSpot Embed Code -->

<!-- Begin Twilio WebChat Embed Code -->
<script>
// brand colors
const cWPThemeEGreen = "#B0D135";
const cWPThemeENavy = "#284358";
const cWPThemeEGrey = "#9A9A9A";
const cWPThemeECharcoal = "#323232";

const cWPThemeEPurple = "#563373";
const cWPThemeELightBlue = "#048CD6";
const cWPThemeEEmeraldGreen = "#009776";
const cWPThemeEOrange = "#EA4724";


var brandColor1 = cWPThemeEGreen; //"#1976d2";
var brandColor2 = cWPThemeENavy; //"#233659";
var brandTextColor = "#ffffff";

var personalizedColors = {
   darkBlueBackground: "#3C425C",
   whiteText: "#FFFFFF",
   entryPointBackground: "#3C425C",
   lighterBackground: "#ecedf1",
   primaryButtonBackground: "#1976d2",
   primaryButtonColor: "#FFFFFF",
   secondaryButtonBackground: "#6e7180",
   secondaryButtonColor: "#FFFFFF"
};

var brandMessageBubbleColors = function (bgColor) {
    return {
        Bubble: {
            background: bgColor,
            color: brandTextColor
        },
        Avatar: {
            background: bgColor,
            color: brandTextColor
        },
        Header: {
            color: brandTextColor
        }
    }
};

var brandedColors = {
    Chat: {
        MessageListItem: {
            FromOthers: brandMessageBubbleColors(brandColor2),
            FromMe: brandMessageBubbleColors(brandColor1),
        },
        MessageInput: {
            Button: {
                background: brandColor1,
                color: brandTextColor
            }
        },
        MessageCanvasTray: {
            Container: {
                background: personalizedColors.darkBlueBackground,
                color: personalizedColors.whiteText
            }
        },
    },

    MainHeader: {
        Container: {
            background: personalizedColors.darkBlueBackground,
            color: personalizedColors.whiteText
        },
        Logo: {
            fill: brandTextColor            
        }
    },

    EntryPoint: {
        Container: {
            background: personalizedColors.entryPointBackground,
            color: personalizedColors.whiteText
        }
    },
    PreEngagementCanvas: {
        Container: {
            background: personalizedColors.lighterBackground
        },

        Form: {
            SubmitButton: {
                background: personalizedColors.primaryButtonBackground,
                color: personalizedColors.whiteText
            }
        }
    }
};

			var urlParams = new URLSearchParams(window.location.search);
            const appConfig = {
                accountSid:"ACf2592050ec7a7271f1412a73f48b6fdc",
                flexFlowSid:"FOaf21bad02d0713b63e3dadad5fab3559",
                colorTheme: {
        			overrides: brandedColors
    			},
                context: {
        			friendlyName: "WPThemeE Visitor",
                    locationOrigin: window.location.origin,
                    callType: "Webchat"
    			},
    			startEngagementOnInit: false,
                
                preEngagementConfig: {
      				description: "I am sure we can help",
                    fields: [
                        {
                            label: "What is your name?",
                            type: "InputItem",
                            attributes: {
                                name: "friendlyName",
                                type: "text",
                                required: true
                            }
                        },
                        {
                          label: "What is your email?",
                          type: "InputItem",
                          attributes: {
                              name: "email",
                              type: "email",
                              placeholder: "Enter your email",
                              required: true,
                              readOnly: false
                        	}
                      	},
                            {
                            label: "Type of chat?",
                            type: "SelectItem",
                            attributes: {
                                name: "chatType",
                                required: true,
                                readOnly: false

                            },
                            options: [
                            {
                                value: "projectwork",
                                label: "Project Work",
                                selected: true
                            },
                            {
                                value: "age",
                                label: "Age Verification",
                                selected: false
                            },
                            {
                                value: "crypto",
                                label: "Accepting Cryptocurrency",
                                selected: false
                            },
                            {
                                value: "lawallet",
                                label: "LA Wallet",
                                selected: false
                            }
                            ]
                        },
                        {
                            label: "What is your question?",
                            type: "TextareaItem",
                            attributes: {
                                name: "question",
                                type: "text",
                                placeholder: "Type your question here",
                                required: false,
                                rows: 4
                            }
                        } 
    				],
    				submitLabel: "Ok Let's Go!"
    			}
            };
            Twilio.FlexWebChat.MainHeader.defaultProps.imageUrl = "https://support-center-code-9081.twil.io/WPThemeE_Icon.png";
            
            Twilio.FlexWebChat.MessagingCanvas.defaultProps.predefinedMessage = false;
			Twilio.FlexWebChat.createWebChat(appConfig).then(webchat => {
    		const {manager} = webchat; 
			//Posting question from preengagement form as users first chat message
    		Twilio.FlexWebChat.Actions.on("afterStartEngagement", (payload) => {
        		const {question} = payload.formData;
        		if (!question)
            		return;
        	const {channelSid} = manager.store.getState().flex.session;
        	manager
            .chatClient.getChannelBySid(channelSid)
            .then(channel => channel.sendMessage(question));
    });
	// Changing the Welcome message
    manager.strings.WelcomeMessage = "You have reached the WPThemeE corporate chat bot. Give it a try.";
    
    webchat.init();
  });
			
            //Twilio.FlexWebChat.renderWebChat(appConfig);
        </script>
<!-- End   Twilio WebChat Embed Code -->

</body>

</html>