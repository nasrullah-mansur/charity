@include('email.template.header')
<style>
    p{
        line-height: 1.5;
    }
</style>
<h3>{{__('Dear User,')}} </h3>
<p>
    {{__('Since May 28th, the European General Data Protection Regulation (GDPR) comes into force and, without your consent, we will no longer be permitted to send you communications like this.')}}
</p>
<p>
    {{ __('Please') }} <a style="background: #2bb3c8;padding: 5px 8px;text-decoration: none;border-radius: 3px;color: #363131;" href="{{ $url }}">{{ __('click here') }}</a> {{ __('to confirm that you are happy for us to continue communicating with you, it only takes two clicks and ten seconds of your time.') }}
</p>
<p>
    {{ __('If you do not, from now on we will no longer be able to send you these emails.') }}
</p>
<p>
    {{ __('We value your privacy and are happy with the recent changes to the law (GDPR) to ensure you have full control of your online experience.') }}
</p>

<strong>{{ __('PLEASE VERIFY THAT THE SENDER OF THIS EMAIL IS :email AND THAT THE LINK IS BRINGING YOU TO :url WEBSITE',['email'=>allsetting('primaryemail'),'url'=>strtoupper(url('/'))]) }}</strong>

<p>
    {{__('Thanks a lot for being with us.')}} <br/>
    {{__('TCN TCoin Wallet')}}
</p>

@include('email.template.footer')