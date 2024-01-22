<div>
    {{-- @if ($errors->any())
        <div class="alert bg-danger" data-bs-dismiss="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}<button type="button" class="btn-close mx-2" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form class="p-4  my-5 rounded-3 text-center  text-white form-custom" wire:submit="store">
                    <div class="mb-3">
                        <label for="title" class="form-label">{{__('ui.title')}}</label>
                        <input type="text" wire:model.blur='title'
                            class="form-control @error('title') is-invalid @enderror "id="title">
                            @error('title')
                            <p class="text-small text-danger bg-white rounded-2 my-1">{{ $message }}</p>
                            @enderror
                    </div>
            
                    <div class="mb-3">
                        <select class="form-select" wire:model.defer="category" aria-label="Default select example">
                            <option selected>{{__('ui.select')}}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            
                        </select>
                        @error('category')
                            <p class="text-small text-danger  bg-white rounded-2 my-1">{{ $message }}</p>
                            @enderror
                    </div>
            
                    <div class="mb-3">
                        <label for="body" class="form-label">{{__('ui.description')}}</label>
                        <textarea type="text" wire:model.blur='body' class="form-control @error('body') is-invalid @enderror" cols="30"
                            rows="10"id="body">
                            </textarea>
                            @error('body')
                            <p class="text-small text-danger  bg-white rounded-2 my-1">{{ $message }}</p>
                            @enderror
            
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">{{__('ui.price')}}</label>
                        <input type="decimal" wire:model.live='price' class="form-control @error('price') is-invalid @enderror"
                            id="price"  @error('price')
                            <p class="text-small text-danger  bg-white rounded-2 my-1">{{ $message }}</p>
                            @enderror
                    </div>
            
                    <div class="class mb-3">
                        <input wire:model.blur="temporary_images" type="file" name="images" multiple
                            class="form-control shadow @error('temporary_image')is-invalid @enderror" placeholder="Img" />
                        @error('temporary_images.*')
                            <p class="text-danger mt-2  bg-white rounded-2 my-1">{{ $message }}</p>
                        @enderror
                    </div>
                    @if (!empty($images))
                        <div class=" row">
                            <div class=" col-12">
            
                                <p>Photo preview:</p>
                                <div class="row border-4 border-info rounded py-4">
                                    @foreach ($images as $key => $image)
                                        <div class="col my-3">
                                            <div class="img-preview mx-auto shadow rounded"
                                                style="background-image: url({{ $image->temporaryUrl() }});">
                                          
                                            </div>
                                            <button type="button"
                                                    class="btn btn-danger mt-2"
                                                    wire:click="removeImage({{ $key }})">{{__('ui.delete')}}</button>
                                    @endforeach
            
                                </div>
            
                            </div>
            
            
                        </div>
                    @endif
            
                    <button type="submit" class="btn btn-primary">{{__('ui.create')}}</button>
                </form>
            </div>
        </div>
    </div>
   

</div>
