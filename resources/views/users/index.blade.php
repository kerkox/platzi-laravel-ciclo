<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-8 mx-auto">
            <div class="card border-o shadow">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        <div class="form-row">
                            <div class="col-sm-3">
                                <input type="text" name="name" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="col-sm-4">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-sm-3">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña">
                            </div>
                            <div class="col-auto">
                                @csrf
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>&nbsp</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @method('delete')
                                @csrf
                                <input
                                    type="submit"
                                    value="Eliminar"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Desea elminiar...?')">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
