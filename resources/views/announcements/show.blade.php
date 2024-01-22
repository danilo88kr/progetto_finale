<x-layout>
    <x-navbar></x-navbar>
    <x-masthead
    title="{{__('ui.detail')}}"
    
    ></x-masthead>
    
    @if($announcement)
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6">
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
              @if (count($announcement->images))
                  @foreach($announcement->images as $image)
                      <div class="carousel-item @if($loop->first) active @endif">
                        <img src="{{ Storage::url($image->path) }}" class="d-block w-100 img-carousel" alt="...">
                         
                      </div>
                  @endforeach
              @else
                  <div class="carousel-item active">
                      <img class="d-block w-100 img-carousel" src="https://picsum.photos/400/200" alt="Placeholder Image">
                  </div>
              @endif
          </div>
      
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>
      
          
      </div>
      </div>
      <div class="col-12 col-md-6 d-flex  flex-column justify-content-center align-items-center">
    
          {{-- <h5 class="card-title display-4 mb-2 fw-bold">{{ $announcement->title }}</h5>
          <p class="card-text fw-bold">Descrizione: {{ $announcement->body }}</p>
          <p class="card-text">Prezzo: {{ $announcement->price }} €</p>

                    </a>
                  </div> --}}
                  <h5 class="card-title">{{__('ui.title')}}: {{$announcement->title}}</h5>
                  <p class="card-text">{{__('ui.description')}}: {{$announcement->body}}</p>
                  <p class="card-text">{{__('ui.price')}}: {{$announcement->price}} €</p>
                  <a href="{{route('categoryShow',['category'=>$announcement->category])}}" class="my-2 border-top
                    pt-2 border-dark card-link shadow btn btn-success">{{__('ui.category')}}: {{$announcement->category->name}}</a>
                    <p class="card-footer">{{__('ui.published')}}: {{$announcement->created_at->format('d/m/Y')}} - {{__('ui.author')}}: {{ $announcement->user->name ?? ''}}</p>
                  
            </div>
        </div>
    </div>
  </div>
 
  @endif

  <x-footer></x-footer>
    


</x-layout>