<link rel="stylesheet" href="{{ asset('vendor/iziToast/iziToast.min.css') }}">
<script src="{{ asset('vendor/iziToast/iziToast.min.js') }}"></script>

@if(session()->has('notify'))
    @foreach(session('notify') as $msg)
        <script> 
            "use strict";
            iziToast.{{ $msg[0] }}({message:"{{ __($msg[1]) }}", position: "topCenter"}); 
        </script>
    @endforeach
@endif



@if (session('status'))
    <script>
        "use strict";
       
        iziToast.success({
            message: '{{ session('status') }}',
            position: "topRight"
        });
     
    </script>
@endif



@if ($errors->any())
    @php
        $collection = collect($errors->all());
        $errors = $collection->unique();
    @endphp

    <script>
        "use strict";
        @foreach ($errors as $error)
        iziToast.error({
            message: '{{ __($error) }}',
            position: "topRight"
        });
        @endforeach
    </script>

@endif
<script>
    "use strict";
    function notify(status,message) {
        iziToast[status]({
            message: message,
            position: "topRight"
        });
    }
</script>