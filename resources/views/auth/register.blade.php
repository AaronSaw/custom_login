<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<style>
    #galeria {
        width: 121px;
        height: 120px;
        border: 4px solid #1200b5;
        border-radius: 50%;
        overflow: hidden;
    }
</style>

<body>
    <div class="register-form">
        <div class="form-blk">
            <h2 class="title">Register Form</h2>
            <div class="form-reg">
                <form action="{{ route('auth.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="galeria">
                    </div>
                    <div class="input-gp">
                        <label for="name">Name:</label><br>
                        <input type="file" name="profile" id="name" placeholder="Enter name..."
                            onchange="previewMultiple(event)" value="{{ old('profile') }}">
                        @error('profile')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-gp">
                        <label for="name">Name:</label><br>
                        <input type="text" name="name" id="name" placeholder="Enter name..."
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-gp">
                        <label for="email">Email:</label><br>
                        <input type="email" name="email" id="email" placeholder="Enter email..."
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-gp">
                        <label for="password">Password:</label><br>
                        <input type="password" name="password" id="password" placeholder="Enter password..."
                            value="{{ old('password') }}">
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-gp">
                        <label for="confirm_password">Comfirm Password:</label><br>
                        <input type="password" name="confirm_password" id="confirm_password"
                            placeholder="Enter confirm password..." value="{{ old('confirm_password') }}">
                        @error('confirm_password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-gp">
                        <label for="address">Address:</label><br>
                        <textarea name="address" id="address" rows="3" placeholder="Enter address...">{{ old('address') }}</textarea>
                        @error('address')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-gp register-blk">
                        <input type="submit" value="Register" class="register-btn">
                        <p class="form-txt">Already have an account?
                            <a href="{{ route('auth.login') }}">Login Here!</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function previewMultiple(event) {
            var saida = document.getElementById("adicionafoto");
            var urls = URL.createObjectURL(event.target.files[0]);
            document.getElementById("galeria").innerHTML += '<img src="' + urls + '" width="100%" height="100%">';
        }
    </script>
</body>

</html>
