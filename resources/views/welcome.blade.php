<x-layout>


<x-navbar></x-navbar>

@if (session('access.denied'))
    <div class="alert alert-danger text-center">
      {{ session('access.denied') }}<button type="button" class="btn-close mx-2" data-bs-dismiss="alert"
      aria-label="Close"></button>
    </div>
    @endif

    @if (session('message'))
    <div class="alert alert-success text-center">
      {{ session('message') }}<button type="button" class="btn-close mx-2" data-bs-dismiss="alert"
      aria-label="Close"></button>
    </div>
    @endif

{{-- HEADER  --}}

   <header class="vh-100 position-relative">
    <div class="container-fluid bg-video position-absolute top-0 left-0 h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 d-flex flex-column align-items-center">
          <h1 class="display-1 text-white " data-aos="zoom-in">{{__('ui.welcome')}}</h1>
          <h2 class="text-white h2-custom text-center">{{__('ui.subtitle')}}</h2>
          <button class="btn-custom " type="button">
            <a class="nav-link" href="{{route('announcements.create')}}">{{__('ui.create')}}</a>
          </button>

        </div>
      </div>


    </div>
    <video autoplay muted loop id="myVideo">
      <source src="{{Storage::url('video/video.mp4')}}" type="video/mp4">
    </video>


   </header>

<x-card 

:$announcements

></x-card>

<x-footer></x-footer>


</x-layout>