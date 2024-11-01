<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador - Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            background: url('https://static.vecteezy.com/system/resources/previews/014/950/851/non_2x/hi-tech-digital-circuit-board-ai-pad-and-electrical-lines-connected-on-blue-lighting-background-futuristic-technology-design-element-concept-vector.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }
        .login-box .form-group input {
            font-size: 16px;
            height: 45px;
        }
        .login-box h4 {
            margin-bottom: 20px;
            text-align: center;
        }
        .login-box .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
            font-size: 18px;
            padding: 10px;
        }
        .login-box .btn-primary:hover {
            background-color: #0056b3;
        }



    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="text-center mb-4">
               <!-- <img src="https://bibliotecadigital.telmex.com/bibliotecaDigital/resources/img/LOGO_BDT_Flag.png" alt="Telmex Logo" height="50">-->
               
            </div>
            <h4>Bienvenido</h4>

            <!-- Formulario de inicio de sesión -->
            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf <!-- Token CSRF de seguridad -->
                
                <!-- Username -->
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" name="email" required>
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                </div>

                <!-- Recordarme -->
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>

                <!-- Botón de login -->
                <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Sign in</button>
            </form>

            <!-- Mostrar errores si los hay -->
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
