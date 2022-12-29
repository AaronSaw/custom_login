<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ResetPassword Page</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="reset-form">
        @if (session('error'))
            <div class="alert-box">
                <span class="alert-message">{{ session('error') }}<i
                        class="fa-solid fa-xmark icon-btn js-close"></i></span>
            </div>
        @endif
        <a href="{{ route('forgot.index') }}"><i class="fa-solid fa-xmark icon-forgot"></i></a>
        <div class="form-blk">
            <h2 class="title">ResetPassword Form</h2>
            <form action="{{ route('forgot.create') }}" method="POST">
                @csrf
                <input type="hidden" name="token" id="" value={{ $token }}>
                <div class="input-gp">
                    <label for="email">Email:</label><br>
                    <input type="text" name="email" id="email" value="{{ $email ?? old('email') }}" readonly>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-gp">
                    <label for="password">New Password:</label><br>
                    <input type="password" name="password" id="password" placeholder="Enter password..."
                        value="">
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-gp">
                    <label for="confirm_password">Comfirm Password:</label><br>
                    <input type="password" name="confirm_password" id="confirm_password"
                        placeholder="Enter confirm password..." value="">
                    @error('confirm_password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-gp reset-blk">
                    <input type="submit" value="Reset Password" class="reset-btn">
                </div>
            </form>
        </div>
    </div>
    <div id="background-wrap">
        <div class="bubble x1"></div>
        <div class="bubble x2"></div>
        <div class="bubble x3"></div>
        <div class="bubble x4"></div>
        <div class="bubble x5"></div>
        <div class="bubble x6"></div>
    </div>

    <script src="{{ asset('js/library/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>
