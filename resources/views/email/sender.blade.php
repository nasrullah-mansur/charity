@include('email.template.header')
<html>
<body>
<p>Hello {{$data->first_name}} {{$data->last_name}},
    You are receiving this email because you have just sent {{$amount}} TCN from your account to {{ $anotherUser->first_name }} {{ $anotherUser->last_name }} ({{ $anotherUser->email }}).
    <br> <br>
    Thank You.
</p>
@include('email.template.footer')
</body>
</html>