@include('email.template.header')
<html>
<body>
<p>Hello, <?php echo $data->name; ?>
    <br>
    Your Food Factory email verification code is {{$key}}.
    <br><br>
    Thanks
</p>
@include('email.template.footer')
</body>
</html>
