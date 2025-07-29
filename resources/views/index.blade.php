{{-- filepath: resources/views/index.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Listado de Usuarios</h1>

        @if(session('exito'))
            <div class="alert alert-success">
                {{ session('exito') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>CI Usuario</th>
                    <th>Primer Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Estado Registro</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->ci_usuario }}</td>
                        <td>{{ $usuario->primer_nombre }}</td>
                        <td>{{ $usuario->primer_apellido }}</td>
                        <td>{{ $usuario->estado_registro }}</td>
                        <td>
                            <form action="{{ route('usuarios.actualizar-estado', $usuario->ci_usuario) }}" method="POST">
                                @csrf
                                <select name="estado_registro" class="form-select" onchange="this.form.submit()">
                                    @foreach(\App\Models\ListarUsuarios::$estados as $estado)
                                        <option value="{{ $estado }}" {{ $usuario->estado_registro === $estado ? 'selected' : '' }}>
                                            {{ $estado }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>