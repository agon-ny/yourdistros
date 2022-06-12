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
    <title>YourDistros - Register</title>    
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
            <div class="formBox">
                <h1>Register</h1>
                <form action="/register/store" method="POST">
                    @csrf
                    @error('name')
                    <p style="color: red; font-size: 13px;">{{ $message }}</p>
                    @enderror
                    <input type="text" name="name" placeholder="Your name">
                    @error('email')
                    <p style="color: red; font-size: 13px;">{{ $message }}</p>
                    @enderror
                    <input type="email" name="email" placeholder="Your email">
                    @error('password')
                    <p style="color: red; font-size: 13px;">{{ $message }}</p>
                    @enderror
                    <input type="password" name="password" placeholder="Password">
                    <input type="password" name="password_confirmation" placeholder="Confirm your password">
                    <button>Register</button>
                </form>
                <p>Already have an account? <a href="/login">CLick Here</a></p>
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