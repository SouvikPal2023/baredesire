    <!-- section-quote-end -->
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script type="text/javascript" src="{{ asset('assets/js/jquery-migrate-1.2.1.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.2.4/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/custom.js')}}"></script>
    <script src="{{ asset('assets/js/iziToast.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script type="text/javascript">
    (function($){

        @if (Session::has('success'))
          iziToast.success({
              message: '{{ Session::get('success') }}',
              position: "topRight"
          });

        @elseif(Session::has('error'))
          iziToast.error({
              message: '{{ Session::get('error') }}',
              position: "topRight"
          });

        @elseif(Session::has('warning'))
          iziToast.warning({
              message: '{{ Session::get('warning') }}',
              position: "topRight"
          });
        @endif
    })(jQuery);

    @if ($errors->any())
        @php
            $collection = collect($errors->all());
            $errors = $collection->unique();
        @endphp

        @foreach ($errors as $error)
        iziToast.error({
            message: '{{ __($error) }}',
            position: "topRight"
        });
        @endforeach
    @endif
  </script>
  <script>
      const imgs = document.querySelectorAll(".img-select a");
      const imgBtns = [...imgs];
      let imgId = 1;

      imgBtns.forEach((imgItem) => {
        imgItem.addEventListener("click", (event) => {
          event.preventDefault();
          imgId = imgItem.dataset.id;
          slideImage();
        });
      });

      function slideImage() {
        const displayWidth = document.querySelector(
          ".img-showcase img:first-child"
        ).clientWidth;

        document.querySelector(".img-showcase").style.transform = `translateX(${
          -(imgId - 1) * displayWidth
        }px)`;
      }

      window.addEventListener("resize", slideImage);
    </script>
    <script>
    
    var prevButton = null;

function changeColor(button) {
  
  if (prevButton !== null) {
    prevButton.style.backgroundColor = "#fff";
    prevButton.style.color="black";
  }
  
  button.style.backgroundColor = "black";
  button.style.color ="white"
  prevButton = button;
}


   </script>
  
 <script>
//     $(function () {
//         $("#search").autocomplete({
//             source: function (request, response) {
//                 $.ajax({
//                     url: "{{ route('autocomplete.search') }}",
//                     dataType: 'json',
//                     data: {
//                         query: request.term
//                     },
//                     success: function (data) {
//                         response($.map(data, function (item) {
//                             return {
//                                 label: item.name,
//                                 value: item.id 
//                               // id:item.id// You can use a unique identifier here
//                             };
//                         }));
//                     }
//                 });
//             },
//             minLength: 5, // Minimum characters before triggering autocomplete
//             select: function (event, ui) {
//                 // Redirect to the selected product or category page
//                 window.location.href = "/category-product/" + ui.item.value;
//             }
//         });
//     });




// </script>

   <script>
    $(function () {
        $("#search").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "{{ route('autocomplete.search') }}",
                    dataType: 'json',
                    data: {
                        query: request.term
                    },
                    success: function (data) {
                        response($.map(data, function (item) {
                            return {
                                label: item.name,
                                value: item.id
                            };
                        }));
                    }
                });
            },
            minLength: 2, // Minimum characters before triggering autocomplete
            select: function (event, ui) {
                // Redirect to the selected product or category page
                window.location.href = "/category-product/" + ui.item.value;
                $("#search").val('');
                
                return false;
            },
            open: function () {
                // Show the autocomplete dropdown when results are available
                $(".ui-autocomplete").css('display', 'block');
            },
            close: function () {
                // Hide the autocomplete dropdown when no results are available
                $(".ui-autocomplete").css('display', 'none');
            }
        }).data("ui-autocomplete")._renderItem = function (ul, item) {
            return $("<li>")
                .append("<div>" + item.label + "</div>")
                .appendTo(ul);
        };
    });
</script>
  </body>
  </html>