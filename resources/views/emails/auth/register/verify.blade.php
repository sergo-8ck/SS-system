@component('mail::message')
# Email Confirmation

Пожалуйста нажмите кнопку ниже для активации вашего аккаунта:

@component('mail::button', ['url' => route('register.verify', ['token' => $user->verify_token])])
Подтвердить почту
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
