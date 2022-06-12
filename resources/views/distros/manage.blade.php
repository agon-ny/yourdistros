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
    <title>YourDistros -</title>    
</head>
<body>       

    <header>
        <div class="logo">
            <img src="{{ asset('resources/images/logo.ico') }}" alt="YourDistros">
            <h1><a href="/" style="color: white">Your<span style="color: rgb(74, 233, 74);">Distros</span></a></h1>
        </div>

        <x-flashMessages/>

        <div class="nav">
            @auth
            <!-- Nav for authenticated users -->
            <nav>
                <ul>
                    <li style="background-color: greenyellow; border-bottom: 5px solid rgb(142, 211, 39);"><a href="/newdistro">New Distro</a></li>
                    <li style=" ">
                        <form class="logoutForm" action="/logout" method="post">
                            @csrf
                            <button>LogOut</button>
                        </form>
                    </li>
                </ul>
            </nav>
            @else
            <!-- Nav for nonauthenticated users -->
            <nav>
                <ul>
                    <li style="background-color: greenyellow;"><a href="/register">Register</a></li>
                    <li style="background-color: rgb(255, 236, 64); border-bottom: 5px solid rgb(212, 200, 93);"><a href="/login">Login</a></li>
                </ul>
            </nav>
            @endauth
        </div>
    </header>

    <main>
            
        <section>
            <div class="distroCards">
    
                @if(count($distros) == 0)
                <h3 style="color: white; margin: 2rem 0 5rem 0;">We could not find any distro :\</h3>
                @endif
    
                <!--Getting Distros from database-->
                @foreach($distros as $key => $distro)
                <div class="distroCard">
                    @php
                        $linkGenerated = strtolower(str_replace(' ', '-', $distro->name));
                    @endphp
                    <a class="distroCardLink" href="/{{ $linkGenerated }}">
                        @if($distro->image == null)
                        <div class="distroCardImg">
                            <img style="width: 130px; height:130px;" src="{{ asset('resources/images/logo.ico') }}" alt="Ubuntu">
                        </div>
                        @else
                        <div class="distroCardImg">
                            <img src="{{ asset('/storage/'.$distro->image) }}" alt="Ubuntu">
                        </div>
                        @endif
                        
                        
                        <div class="distroCardInfo">
                            <h3>{{ $distro->name }}</h3>
                            <p style="color: black;">{{ $distro->company }}</p>
                            <p>{{ $distro->short_description }}</p>
                        </div>  
    
                        <div class="distroCardDownload">
                            <a href="{{ $linkGenerated }}/edit" style="color: black;"><h3>Edit</h3></a>
                        </div>

                        <div class="distroCardDelete">
                            <form action="{{ $distro->id }}/delete" method="POST">
                                @csrf
                                @method('delete')
                                <button style="background-color: transparent; cursor: pointer;"><h3>Delete</h3></button>
                            </form>
                        </div>
    
                    </a>
                </div>
                @endforeach
                
            </div>
        </section>

    </main>

    <footer>
        <div class="footerContent">
            <img src="{{ asset('resources/images/logo.ico') }}" alt="Linux" style="width: 50px; height: 50px;">
            <p>期待に応えないで、それを超える</p>
            <p>Powered By <a target="_blank" href="https://github.com/SoloDv">Solo</a></p>
        </div>
    </footer>
    
    
</body>
</html>