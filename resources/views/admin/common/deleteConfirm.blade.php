<script>
$('.Delete').on('click', function(e){
  
  e.preventDefault();
  var single = $(this);

  iziToast.question({
        overlay: true,
        toastOnce: true,
        id: 'question',
        title: 'Hey',
        message: 'Are you sure you want to delete?',
        position: 'center',
        buttons: [
            ['<button><b>YES</b></button>', function (instance, toast) {

              instance.hide({ transitionOut: 'fadeOut' }, toast);

              single.closest("form").submit();


            }, true],
            ['<button>NO</button>', function (instance, toast) {

                instance.hide({ transitionOut: 'fadeOut' }, toast);

            }]
        ]
    }); 
  
});
</script>