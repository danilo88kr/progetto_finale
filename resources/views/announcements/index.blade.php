<x-layout>


    <x-navbar></x-navbar>
    
    <x-masthead
    
    title="{{__('ui.announcements')}}"
    
    ></x-masthead>

   
    <div class="container">
        <div class="row justify-content-center">
          @forelse ($announcements as $announcement)
            <div class="col-12 col-md-6 my-5 p-4 d-flex justify-content-center">
                <div class="card p-2 card-custom text-white" data-bs-theme="dark" style="width: 18rem;">
                    <img src="{{!$announcement->images()->get()->isEmpty() ?  
                    $announcement->images()->first()->getUrl(400,300) : Storage::url('images/default.jpg')}} "card-img-top  alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$announcement->title}}</h5>
                      <p class="card-text text-truncate">{{$announcement->body}}</p>
                      <p class="card-text">{{$announcement->price}}</p>
                      <p class="card-text"></p>
                       <a href="{{route('announcements.show', compact('announcement'))}}" class="btn btn-primary">{{__('ui.view')}}</a> 
                       <a href="{{route('categoryShow',['category'=>$announcement->category])}}" class="my-2 border-top
                        pt-2 border-dark card-link shadow btn btn-success">{{__('ui.category')}}: {{$announcement->category->name}}</a>
                      
                      <p class="acrd-footer">{{__('ui.published')}}: {{$announcement->created_at->format('d/m/Y')}}</p>
                    </div>
                  </div>
            </div>
            @empty
            <div class="col-12">
              <div class="alert alert-warning py-3 shadow">
                <p class="lead">{{__('ui.noAnnouncements')}}</p>
              </div>
            </div>
                
            @endforelse
            {{$announcements->links()}}
        </div>
      </div>
   
    
    <x-footer></x-footer>
    
    
    </x-layout>