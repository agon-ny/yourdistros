<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('resources/images/logo.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('resources/css/main.css') }}">
    <title>YourDistros - LogIn</title>    
</head>
<body>       

    <header>
        <div class="logo">
            <img src="{{ asset('resources/images/logo.ico') }}" alt="YourDistros">
            <h1><a href="/" style="color: white">Your<span style="color: rgb(74, 233, 74);">Distros</span></a></h1>
        </div>
    </header>

    <main>
        <section class="registerPage">
            <div class="formBox loginFormBox">
                <h1>LogIn</h1>
                <form action="/login/authenticate" method="POST">
                    @csrf
                    @error('email')
                    <p style="color: red; font-size: 13px;">{{ $message }}</p>
                    @enderror
                    <input type="email" name="email" placeholder="Your email">
                    <input type="password" name="password" placeholder="Password">
                    <div class="rememberMeField">
                        <input type="checkbox" name="remember" value="1"><span>Remember Me</span>
                    </div>
                    <button>LogIn</button>
                </form>
                <p>Don't have an account? <a href="/register">CLick Here</a></p>
            </div>
        </section>
    </main>


    <footer style="background-color: rgba(20,18,19,255);" >
        <div class="footerContent">
            <img src="{{ asset('resources/images/logo.ico') }}" alt="Linux" style="width: 50px; height: 50px;">
            <p style="color: white;">Powered By <a style="color: white;" target="_blank" href="https://github.com/SoloDv">Solo</a></p>
        </div>
    </footer>


    
</body>
</html>