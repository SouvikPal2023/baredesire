<script>
function showSelectedImage(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#SelectedImg').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
  }
}


(function($){
    $(document).ready(function(){
        $('input[type="file"]').on('change', function(e){
            let objDom = $(this)
            if(objDom.length){
                let file = objDom.prop('files'),
                reader = new FileReader()
                reader.onload = function (e) {
                  $('#SelectedImg').attr('src', e.target.result);
                }
                reader.readAsDataURL(file[0]);
            } 
        })
        
        $(".remove__image").on('click', function(){
            $('#SelectedImg').attr('src', $(this).data('default'))
            $("input[name='uploaded_banner_image']").val('')
        })
    })
})(jQuery)
</script>