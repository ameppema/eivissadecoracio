<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacto Web Eivissa Decoracio</title>
    <style>
        h1 {
            font-size: 20px;
            line-height: 14px
        }
        
        p {
            font-size: 14px;
            margin-bottom: 5px
        }
    </style>
</head>
<body>
    <h1>Información del Mensaje</h1>
    <p>Nombre: {{$contactInfo['name']}}</p>
    <p>Correo: {{$contactInfo['email']}}</p>
    <p>Télefono: {{$contactInfo['phone']}}</p>
    <p>Mensaje: {{$contactInfo['message']}}</p>
</body>
</html>
