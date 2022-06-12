<x-layout>
    <section>
        <div class="mainBg"></div>
    </section>

    <section>
        <div class="distrosTitle">
            <h1>All <span style="color: rgb(176, 247, 36);">Distros</span> In One Place</h1>
        </div>  
    </section>

    <section>
        <x-searchBar/>
    </section>
        
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
                        <a href="{{ $distro->website }}" style="color: black;" target="_blank"><h3>Download</h3></a>
                    </div>

                </a>
            </div>
            @endforeach
            
        </div>
    </section>

</x-layout>