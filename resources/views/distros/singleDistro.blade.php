<x-layout>
    <section class="singleDistroPage">
        <div class="singleDistroBox">
            @if($distro[0]->image == null)
            <img src="{{ asset('/resources/images/logo.ico')}}" alt="Ubuntu">
            @else
            <img src="{{ asset('/storage/'.$distro[0]->image) }}" alt="Ubuntu">
            @endif
            <h1>{{ $distro[0]->name }}</h1>
            <h4>{{ $distro[0]->company }}</h4>
            <p>{{ $distro[0]->description }}</p>
            <a target="_blank" href="{{ $distro[0]->website }}">Download</a>
        </div>
    </section>
</x-layout>