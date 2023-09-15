<x-mail::message>



<h1>Forget Password Email</h1>

You can reset password from bellow link:
<a target="_blank" href="{{ route('reset.password.get', $data['token']) }}">Reset Password</a>

Thanks,<br>
{{ $setting['site_title'] ?? env('APP_NAME') }} Team

</x-mail::message>
