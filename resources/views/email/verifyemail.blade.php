@include('email.template.header')
<h3>{{__('Hello')}} {{ $userData->first_name }} {{$userData->last_name}}</h3>
<p>
    {{__('We need to verify your email address. In order to verfiy your account please click on the following link or paste the link on address bar of your browser and hit -')}}
</p>

<p>
	<a href="{{route('verify',['email_verification'=>$userData->email_verification])}}">{{route('verify',['email_verification'=>$userData->email_verification])}}</a>
</p>

<p>
    {{__('Thanks a lot for being with us.')}} <br />
    {{__('Food Factory')}}
</p>
@include('email.template.footer')