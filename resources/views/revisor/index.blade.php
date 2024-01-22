<x-layout>


    <x-navbar></x-navbar>

    <x-masthead title="{{ $announcement_to_check ? __('ui.toReview') : __('ui.noNew') }}"></x-masthead>

    @if ($announcement_to_check)
        <div class="container">
            <div class="row ">
                <div class="col-12 col-md-6">
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @if (count($announcement_to_check->images))
                                @foreach ($announcement_to_check->images as $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src="{{ Storage::url($image->path) }}" class="d-block w-100 img-carousel"
                                            alt="...">

                                    </div>
                                @endforeach
                            @else
                                <div class="carousel-item active">
                                    <img class="d-block w-100 img-carousel"
                                        src="{{ Storage::url('images/default.jpg') }}" alt="Placeholder Image">
                                </div>
                            @endif
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>




                    </div>
                </div>
                
          <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-center text-center ">
            <div class="p-2 ">
              <h5 class="tc-accent mt-3 fw-bold p-3 ">TAGS</h5>
              @if ($image->labels)
               @foreach ($image->labels as $label)
               <p class="d-inline">{{$label}},</p>
               @endforeach
              @endif
            </div>
          </div>

          <div class="col-12 col-md-3 d-flex justify-content-center align-items-center text-center">
            <div class="card-body header-custom">
              <h5 class="tc-accent fw-bold ">REVISIONE IMMAGINI</h5>
              <p>Adulti: <span class="{{$image->adult}}"></span></p>
              <p>Satira: <span class="{{$image->spoof}}"></span></p>
              <p>Medicina: <span class="{{$image->medical}}"></span></p>
              <p>Violenza: <span class="{{$image->violence}}"></span></p>
              <p>Volgare: <span class="{{$image->racy}}"></span></p>
            </div>
          </div>
                <div class="col-12  d-flex flex-column  align-items-center my-5">

                  
                    <h5 class="card-title display-4 mb-2 fw-bold">{{ $announcement_to_check->title }}</h5>
                    <p class="card-text fw-bold">Descrizione: {{ $announcement_to_check->body }}</p>
                    <p class="card-text">Prezzo: {{ $announcement_to_check->price }} €</p>
                    <form
                    action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success btn-lg shadow my-5">Accetta</button>
                    
                  </form>
                  
                  
                  <form
                  action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
                  method="POST">
                  @csrf
                  @method('PATCH')
                  <button type="submit" class="btn btn-danger  btn-lg shadow">Rifiuta</button>
                </form>
                 </div>
                </div>
            </div>
        </div>

    @endif





    <x-footer></x-footer>


</x-layout>
