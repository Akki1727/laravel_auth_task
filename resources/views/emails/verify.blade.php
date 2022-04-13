@component('mail::message')
# Email Verification

Thank you for signing up. 
Your six-digit code is {{$pin}}

<a href="{{route('login.index')}}">Click Hear</a>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
