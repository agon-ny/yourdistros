@if(session()->has('message'))
    <div class="flashMessage"><h3>{{ session('message') }}</h3></div>
@endif