<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        table th, table td {
            border: 1px solid #aaa;
            border-collapse: collapse;
        }
        table th, table td {
            font-family: sans-serif;
            font-size: 10px;
            border: 1px solid #ccc;
            padding: 4px;
        }
        table tr:nth-child(odd) {
            background-color: #eee;
        }
        table th {
            background-color: #666;
            color: #fff;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE COMPLETO</th>
                <th>CORREO ELECTRONICO</th>
                <th>TELEFONO</th>
                <th>DIRECCION</th>
                <th>FECHA NACIMIENTO</th>
                <th>FOTO</th>
            </tr>
        </thead>
        <Tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->birthdate }}</td>
                    <td><img src="{{ public_path().'/'.$user->photo }}" width="50px"></td>
                </tr>
            @endforeach
        </Tbody>
    </table>
</body>
</html>
