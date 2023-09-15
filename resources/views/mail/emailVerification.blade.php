<x-mail::message>



<h1>Email Verification Link</h1>

You can verify your email from bellow link:
    <a href="{{ route('user.verify', $data['token']) }}">Verify Email</a>

Thanks,<br>
{{ $setting['site_title'] ?? env('APP_NAME') }} Team

</x-mail::message>
