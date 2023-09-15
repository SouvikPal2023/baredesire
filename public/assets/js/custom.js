  $(document).ready(function () {

      // Helper function for add element box list in WOW
      WOW.prototype.addBox = function (element) {
        this.boxes.push(element);
      };

      // Init WOW.js and get instance
      var wow = new WOW();
      wow.init();

      // Attach scrollSpy to .wow elements for detect view exit events,
      // then reset elements and add again for animation
    //   $('.wow').on('scrollSpy:exit', function () {
    //     $(this).css({
    //       'visibility': 'hidden',
    //       'animation-name': 'none'
    //     }).removeClass('animated');
    //     wow.addBox(this);
    //   }).scrollSpy();

    });



      $('#banner-image').owlCarousel({
        loop:true,
        center: false,
        margin:50,
        nav:true,
        navText: ["<i class='fa fa-long-arrow-left' aria-hidden='true'></i>","<i class='fa fa-long-arrow-right' aria-hidden='true'></i>"],
        dots:false,
        autoplay:true,
        autoplayTimeout:6000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })

      $('#banner-imageM').owlCarousel({
        loop:true,
        center: false,
        margin:50,
        nav:true,
        navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
        dots:false,
        autoplay:true,
        autoplayTimeout:6000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })
$('#testimonial-slider').owlCarousel({
  loop: true,
  nav: false,
  margin: 10,
  dots:false,
  autoplay: false,
  navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
  autoplayTimeout: 2500,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

$('#similar-products').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})