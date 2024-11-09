<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <!-- Bootstrap core CSS -->
    <link href="/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sistema de notas - login</title>
    <style>

    </style>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="col-12 col-md-6 col-lg-4 p-4 bg-dark text-white rounded">
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input type="text" name="email" class="form-control" id="email" value="test@example.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="password" value="password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
            </form>
        </div>
    </div>
    <script src="/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="/bootstrap-5.0.2-dist/js/sidebars.js"></script>
</body>
</html>
