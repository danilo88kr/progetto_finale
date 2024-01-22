<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Livewire\CreateAnnouncementForm;





class CreateAnnouncementForm extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;
    public $temporary_images;
    public $images =[];
    public $form_id;
    public $announcement;
    
    





protected $rules =[
    'title'=> 'required|min:4',
    'category'=> 'required',
    'body'=> 'required|max:2000',
    'price'=> 'required|decimal:0,2',
    'images.*'=>'image|max:1024',
    'temporary_images.*'=>'image|max:1024',
    



];

protected $messages=[
    'title.required'=>'Il titolo è obbligatorio!',
    'title.min'=>'Il titolo deve essere minimo di 4 caratteri',
    'body.max'=>'Il testo deve essere massimo di 2000 caratteri',
    'body.required'=>'Il testo è obbligatorio!',
    'price.decimal'=>'Il prezzo deve contenere un numero',
    'price.decimal'=>'Il prezzo deve contenere un numero con al massimo 2 numeri decimali',
    'price.required'=>'Il prezzo è obbligatorio!',
    'temporary_images.required' => 'L\'immagine è richiesta',
    'temporary_images.*.image' => 'I file devono essere immagini',
    'temporary_images.*.max' => 'L\'immagine dev\'essere massimo di 1mb',
    'images.image' => 'L\'immagine dev\'essere un\'immagine',
    'images.max' => 'L\'immagine dev\'essere massimo di 1mb',
    'category.required'=>'Seleziona una categoria!'


];

public function UpdatedTemporaryImages()
{
    if ($this->validate([
        'temporary_images.*'=>'image|max:1024',

    ])) {
        foreach ($this->temporary_images as $image) {
             $this->images[] = $image;
        }
    }
}

public function removeImage($key)
{
    if(in_array($key, array_keys($this->images))) {
        unset($this->images[$key]);
    }
}





public function store()

{
    $this->validate();
    $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
    if(count($this->images)){
        foreach($this->images as $image) {
            // $this->announcement->images()->create(['path'=>$image->store('images', 'public')]);
            $newFileName = "announcements/{$this->announcement->id}";
            $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);
            
           
            
        }
          
        File::deleteDirectory(storage_path('/app/livewire-tmp'));
    }

     // questo metodo associa l'annuncio all'utente autenticato !
     $this->announcement->user()->associate(Auth::user());
    //  dd($this->announcement);
     // il metodo save invece salva lo stato di questo annuncio nel database 
     $this->announcement->save();

    session()->flash('message', 'Ariticolo inserito con successo, sarà pubblicato dopo la revisione');
    $this->reset();
}

public function updated($propertyName){

    $this->validateOnly($propertyName);
    }

// public function update($propertyName)
// {
//     $this->validateOnly($propertyName);
// }






    public function render()
    {
        
        return view('livewire.create-announcement-form');
    }
}
