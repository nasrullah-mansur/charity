@include('email.template.header')
<body>
<p>
    You are receiving this email because we received a password reset request for your account.
    Click <a href="<?php echo url('/password/reset/'.$key)?>">{{'/password/reset/'.$key}}</a> to Reset Password.
    If you did not request a password reset, no further action is required.
</p>
@include('email.template.footer')
</body>
</html>
