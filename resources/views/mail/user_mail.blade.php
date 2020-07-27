@component('mail::message')
<p>
    Olá Sr(a) <strong>Fulano</strong>, seja bem vindo!
</p>
<p>
    Agora você faz parte do nosso time.
</p>
<p>
    Para completar seu cadastro clique no botão abaixo
</p>

@component('mail::button', ['url' => '#'])
    Confirmar cadastro
@endcomponent

@endcomponent