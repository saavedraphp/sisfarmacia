<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <thead>
    <tr>
    <td>Id</td>
    <td>Nombre</td>
    <td>Email</td>
    </tr>
    </thead>

    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{$user->usua_id}}</td>
            <td>{{$user->usua_nombre}}</td>
            <td>{{$user->usua_email}}</td>
        </tr>
    @endforeach    
    </tbody>

    </table>
</body>
</html>