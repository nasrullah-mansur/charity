@include('email.template.header')
<html>
<body>
<h3>{{__('Hello')}} {{ $data->name }}</h3>
<p>
    You are receiving this email because we received a password reset request for your account.
    please use {{$key}} code to Reset Password.
    If you did not request a password reset, no further action is required.
<p>
    {{__('Thanks a lot for being with us.')}} <br/>
    {{__(allSettings('company_name'))}}
</p>
@include('email.template.footer')
</body>
</html>

