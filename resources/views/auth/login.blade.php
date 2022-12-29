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

<body>
    <div class="login-form">
        @if (session('error'))
            <div class="alert-box">
                <span class="alert-message">{{ session('error') }}<i
                        class="fa-solid fa-xmark icon-btn js-close"></i></span>
            </div>
        @endif
        @if (session('info'))
            <div class="alert-green">
                <span class="message-green">{{ session('info') }}<i
                        class="fa-solid fa-xmark icon-btn js-close"></i></span>
            </div>
        @endif
        @if (session('registerSuccess'))
            <div class="alert-green">
                <h3 class="message-green">{{ session('registerSuccess') }}<i
                        class="fa-solid fa-xmark icon-btn re-btn js-close"></i></h3>
            </div>
        @endif
        <div class="form-blk">
            <h2 class="title">Login Form</h2>
            <form action="{{ route('auth.create') }}" method="POST">
                @csrf
                <div class="input-gp">
                    <label for="email">Name or Email:</label><br>
                    <input type="text" name="email" id="email" placeholder="Enter name or email.."
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
                <div class="input-gp login-blk">
                    <input type="submit" value="Login" class="login-btn">
                    <div class="forgot-pw">
                        <p><a href="{{ route('forgot.index') }}">Forgot Password?</a></p>
                        <p>Don't have an account? <a href="{{ route('auth.register') }}">Sign Up Here!</a></p>
                    </div>
                </div>
            </form>
            <div class="item-container">
                <a href="/auth/google">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    aria-hidden="true" role="img" width="24" height="24"
                    preserveAspectRatio="xMidYMid meet"
                    viewBox="0 0 24 24"><path fill="#1e293b" d="M21.456 10.154c.123.659.19 1.348.19 2.067c0 5.624-3.764 9.623-9.449 9.623A9.841 9.841 0 0 1 2.353 12a9.841 9.841 0 0 1 9.844-9.844c2.658 0 4.879.978 6.583 2.566l-2.775 2.775V7.49c-1.033-.984-2.344-1.489-3.808-1.489c-3.248 0-5.888 2.744-5.888 5.993c0 3.248 2.64 5.998 5.888 5.998c2.947 0 4.953-1.685 5.365-3.999h-5.365v-3.839h9.26Z"/></svg>
                </a>
                <a href="/auth/redirect">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                </a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/library/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>

</html>
