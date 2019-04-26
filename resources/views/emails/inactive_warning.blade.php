@component('mail::message')
# Hello Again {{$user->name}}

We didn't see you for almost 6 months. Please note that due to large number of users which is growing every day, we have to delete inactive users. To avoid deletion of your account just log in with your account, if you don't do this in 4 weeks we will delete your account. Thank you for your attention.

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
