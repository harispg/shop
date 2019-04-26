@component('mail::message')
Wish you all the best {{$userName}}

We deleted your account if you want you can make new account

@component('mail::button', ['url' => route('register')])
Sign up
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
