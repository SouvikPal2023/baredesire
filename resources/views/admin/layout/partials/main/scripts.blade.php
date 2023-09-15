<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
{{-- <script src="{{ asset('adminAssets/vendor/libs/jquery/jquery.js') }}"></script> --}}
<script src="{{ asset('adminAssets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('adminAssets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('adminAssets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('adminAssets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="{{ asset('adminAssets/js/main.js') }}"></script>



<script src="{{ asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" ></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{-- LOAD NIC EDIT --}}
<script src="{{ asset('vendor/nicEdit/nicEdit.js') }}"></script>
<script>
    "use strict";
    bkLib.onDomLoaded(function() {
        $( ".nicEdit" ).each(function( index ) {
            $(this).attr("id","nicEditor"+index);
            new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
        });
    });
    // (function($){
    //     $( document ).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain',function(){
    //         $('.nicEdit-main').focus();
    //     });
    // })(jQuery);
</script>

<script>
$(document).ready(function() {
    $('.CustomDatatableAdmin').DataTable({
        "autoWidth": false,
         order:[5,'desc'],
    });
});

</script>
<!-- Jquery DataTable Plugin Js -->
<script src="{{ asset('assets/jquery-datatable/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>

  <script src="{{ asset('assets/js/jquery-datatable.js') }}"></script>
  <!-- Jquery DataTable Plugin Js -->
<script>
    $(document).ready(function () {
    $('.dataTable').DataTable();
});
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <script src="https://cdn.tiny.cloud/1/8gqonz8ltys79uf61hnulse7jjk5dsrp49ubpdtkghey79yc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: 'textarea.Editor',
    plugins: 'anchor autolink charmap emoticons link lists media searchreplace table visualblocks wordcount image code',
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image  | code | spellchecker',
    /* enable title field in the Image dialog*/
    image_title: true,
    
    relative_urls : false,
    remove_script_host : false,
    convert_urls : true,
    
    /* enable automatic uploads of images represented by blob or data URIs*/
    /* enable automatic uploads of images represented by blob or data URIs*/
    automatic_uploads: true,
    images_upload_url: "{{ route('admin.image-upload') }}",
    file_picker_types: 'image',
    /* and here's our custom image picker*/
    file_picker_callback: function(cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function() {

                var id = 'blobid' + (new Date()).getTime();
                var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                /* call the callback and populate the Title field with the file name */
                cb(blobInfo.blobUri(), {
                    title: file.name
                });
            };
            reader.readAsDataURL(file);
        };
        input.click();
    },
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
</script>
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js">
        </script>
        <link rel="stylesheet" 
              href=
"https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />
  
        <!--These jQuery libraries for select2 
            need to be included-->
        <script src=
"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js">
       </script>
        <link rel="stylesheet" 
              href=
"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" />
      
<script src="{{ asset('assets/js/iziToast.js') }}"></script>
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

