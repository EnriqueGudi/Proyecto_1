<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de registro</title>
</head>
<body>
    <h1>Confirmación de registro</h1>
    <p>Hola {{ $user->name }},</p>
    <p>Gracias por registrarte. Para completar el proceso de registro, por favor confirma tu correo electrónico haciendo clic en el siguiente enlace:</p>
    <a href="{{ url('/confirmacion/' . $user->id . '/' . $user->verification_token) }}">Confirmar correo electrónico</a>
    <p>Si no has solicitado este registro, puedes ignorar este correo.</p>
    <p>Si tienes alguna pregunta o necesitas ayuda, no dudes en contactarnos.</p>
    <p>¡Bienvenido a nuestra comunidad!</p>
</body>
</html>
