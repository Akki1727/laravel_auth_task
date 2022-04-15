@component('mail::message')
# Email Verification

Thank you for signing up.
Your six-digit code is {{$pin}}

<a href="http://127.0.0.1:8000/pin-verification">Click Here</a>



Thanks,<br>
{{ config('app.name') }}
@endcomponent
