<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ForgotPassword Page</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="forgot-form">
        @if (session('message'))
            <div class="alert-green">
                <span class="message-green">{{ session('message') }}<i
                        class="fa-solid fa-xmark icon-btn js-close"></i></span>
            </div>
        @endif
        <a href="{{ route('auth.login') }}"><i class="fa-solid fa-xmark icon-forgot"></i></a>
        <div class="form-blk">
            <h2 class="title">ForgotPassword Form</h2>
            <form action="{{ route('forgot.store') }}" method="POST">
                @csrf
                <div class="input-gp">
                    <label for="email">Email:</label><br>
                    <input type="email" name="email" id="email" placeholder="Enter email..." value="">
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-gp forgot-blk">
                    <input type="submit" value="Send Reset Password-link" class="forgot-btn">
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
