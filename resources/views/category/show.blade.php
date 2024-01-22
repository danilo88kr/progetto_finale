<x-layout>
    <x-navbar></x-navbar>

    <x-masthead title="{{__('ui.explore')}}"> {{$category->name}}
    </x-masthead>

    <div class="container">
        <div class="row justify-content-center">
          @forelse ($category->announcements as $announcement)
            <div class="col-12 col-md-6 my-4 d-flex justify-content-center">
                <div class="card card-custom p-2 " data-bs-theme="dark" style="width: 18rem;">
                    <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path):'/images/default.jpg'}} "card-img-top  alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$announcement->title}}</h5>
                      <p class="card-text text-truncate">{{$announcement->body}}</p>
                      
                      <p class="card-text"></p>
                      <a href="{{route('announcements.show', compact('announcement'))}}" class="btn btn-primary">{{__('ui.view')}}</a> 
                      <a href="" class="btn my-2 border-top pt-2 border-dark card-link shadow btn btn-light">{{__('ui.category')}}: {{$announcement->category->name}}</a>
                      <p class="acrd-footer">{{__('ui.published')}}: {{$announcement->created_at->format('d/m/Y')}}
                     - {{__('ui.author')}}: {{$announcement->user->name ?? ''}}
                    </p>
                    </div>
                  </div>
            </div>
            @empty
            <div class="col-12">
                <p class=""> {{__('ui.noAnnouncements')}}</p>
                <p class="">{{__('ui.create')}}: <a href="{{route('announcements.create')}}" class="btn btn-success shadow">{{__('ui.new')}}</a></p>
            </div>
        

            @endforelse
        </div>
    </div>
    
 <x-footer></x-footer>

</x-layout>