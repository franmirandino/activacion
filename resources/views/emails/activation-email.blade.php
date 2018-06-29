@component('mail::message')
# Activación de cuenta

Sigue este link para activar tu cuenta

@component('mail::button', ['url' => route('activation', $user->token)])
Activa tu cuenta
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
