@component('mail::message')
# Email Verification

Thank you for signing up. 
Your six-digit code is {{$pin}}

<a href="http://127.0.0.1:8000/pin-verification">Click Hear</a>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
