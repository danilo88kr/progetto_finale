<nav class="navbar nav-custom  navbar-dark bg-dark navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('welcome')}}">Infinity Code</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
          </li>
      <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('announcements.index')}}">{{__('ui.all')}}</a>
          </li>
         
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" data-bs-toggle="dropdown" aria-expanded="false" role="button">{{__('ui.categories')}}</a>
                        <ul  class="dropdown-menu" aria-lbavelledby="catagriesDropdown">
              @foreach ($categories as $category)
              <li><a class="dropdown-item" href="{{route('categoryShow', compact('category'))}}">
                {{__("ui.$category->name")}}</a></li> 
            {{-- <li> <hr class="dropdown-divider mt-0 mb-0"></li> --}}
               @endforeach
            </ul>
          </li>
            
        
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">{{__('ui.login')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">{{__('ui.sign')}}</a>
          </li>
          @endguest
          @auth
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('announcements.create')}}">{{__('ui.new')}}</a>
          </li>
@if(Auth::user()->is_revisor)
          <li class="nav-item">
            <a class="nav-link btn btn-outline-success btn-sm position-relative" aria-current="page" href="{{route('revisor.index')}}">{{__('ui.reviewer')}}
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{App\Models\Announcement::toBeRevisionedCount()}}
                <span class="visually-hidden">messaggi non letti</span>
              </span>
            </a>
          </li>
          @endif
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu">
              {{-- <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li> --}}
              <li><hr class="dropdown-divider"></li>
              <form action="{{route('logout')}}" method="POST">
                @csrf
                <button class="dropdown-item" type="submit">Logout</button>
            </form>
            </ul>
          </li>
          @endauth
        </ul>
          <div class=" me-3">
            <x-_locale lang="it"/>
          </div>
          <div class="me-3">
            <x-_locale  lang="en"/>
          </div>
          <div class="me-5">
            <x-_locale  lang="fr"/>
          </div>
        <form action="{{route('announcements.search')}}" method="GET" class="d-flex" role="search">
          <input name="searched" class="form-control mx-3" type="search" placeholder="{{__('ui.placeholder')}}" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">{{__('ui.search')}}</button>
        </form>
      </div>
    </div>
  </nav>