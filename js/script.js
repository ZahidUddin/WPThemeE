   jQuery(document).ready(function () {
  jQuery(".slick-slider").slick({
    // Slick.js options and configurationshttps://github.com/ajaxorg/ace/wiki/Default-Keyboard-Shortcuts
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,

    // More options can be added as needed
    responsive: [
        {
         breakpoint: 1024,
            settings: {
                slidesToShow: 3
            },
            breakpoint: 768,
            settings: {
                slidesToShow: 1
            }
        }
    ]
  });

//   jQuery(".accordion-item").click(function () {
//     jQuery(this).toggleClass("active");
//   });
  
  jQuery('.carousel').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    autoplay: true,
    autoplaySpeed:5000,
    dots: true,
    prevArrow: '<button type="button" class="slick-prev">Previous</button>',
    nextArrow: '<button type="button" class="slick-next">Next</button>',
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});
  jQuery('.about-carousel2').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true, 
    autoplay: true,
    autoplaySpeed:5000,
    pauseOnHover:false,
    pauseOnFocus: false,
    dots: true,
    prevArrow: '<button type="button" class="slick-prev">Previous</button>',
    nextArrow: '<button type="button" class="slick-next">Next</button>',

});
  jQuery('.about-carousel').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    infinite: true,
    dots: false,
    prevArrow: '<button type="button" class="slick-prev">Previous</button>',
    nextArrow: '<button type="button" class="slick-next">Next</button>',
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});


//   jQuery(".accordion-item").click(function () {
//   jQuery(this).toggleClass("active");
// });

  jQuery("#header-navbar-hamburger").click(function () {
  jQuery(".header__navbar--nav").toggleClass("active");
});

  // homepage slider 
  jQuery(".project-spot-carousel").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    infinite: true,
    autoplaySpeed:5000,
    dots: true,
    arrows: false,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                 autoplay: false,
    			infinite: false,
    			dots: false,
    			arrows: false,
            }
        }
    ]
    
    })

});

// expertise-items show hide
let items = document.querySelectorAll('.expertise-items');
let contnetItems = document.querySelectorAll('.professional-expertise__content--cards');


items.forEach(ele => {
    ele.addEventListener('click', function (e){
        items.forEach(item => {
            item.classList.remove('active');
        })
        contnetItems.forEach(item => {
            item.classList.remove('active');
        })
        
        ele.classList.add('active');
        let addClassName = e.target.getAttribute('id')
        document.querySelector('.' + e.target.getAttribute('id')).classList.add('active');
    });
})



// MOBILE MENU
let menuBar = document.querySelector('.header__navbar--menu-bar');
let navBar = document.querySelector('.header__navbar--nav');

menuBar.addEventListener('click',()=>{
    navBar.classList.toggle('active')
})


//MODAL

const stopVideo = function (count) {
    let iframe = document.querySelector( '#videoFrame'+count);
    let video = iframe.querySelector( 'video' );
    if ( iframe !== null ) {
        let iframeSrc = iframe.src;
        iframe.src = iframeSrc;
    }
    if ( video !== null ) {
        video.pause();
    }
};

function handlePlay(count){
    let video = document.querySelector('#video'+count);
    video.classList.add('active');
}

function handleClose(count) {
    let video = document.querySelector('#video'+count);
    video.classList.remove('active');
    stopVideo(count)
}

// Scrollup
window.onscroll = function () {
    if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
        document.getElementById('scroll-up').style.bottom = "70px";
    } else {
        document.getElementById('scroll-up').style.bottom = "-40px";
    }
}
// scroll to top
document.getElementById('scroll-up').onclick = function () {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

let a1 = document.querySelector(".about__core__values--slider__dot p:nth-child(1)");
let a2 = document.querySelector(".about__core__values--slider__dot p:nth-child(2)");
let a3 = document.querySelector(".about__core__values--slider__dot p:nth-child(3)");
let a4 = document.querySelector(".about__core__values--slider__dot p:nth-child(4)");
let a5 = document.querySelector(".about__core__values--slider__dot p:nth-child(5)");
	console.log(1)
a1.addEventListener('click',()=>{
	console.log(1)
    document.getElementById('slick-slide-control00').click()
})
a2.addEventListener('click',()=>{
    document.getElementById('slick-slide-control01').click()
})
a3.addEventListener('click',()=>{
    document.getElementById('slick-slide-control02').click()
})
a4.addEventListener('click',()=>{
    document.getElementById('slick-slide-control03').click()
})
a5.addEventListener('click',()=>{
    document.getElementById('slick-slide-control04').click()
})