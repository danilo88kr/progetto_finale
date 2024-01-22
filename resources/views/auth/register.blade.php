<x-layout>


    <x-navbar></x-navbar>

    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="email" class="form-label">E-mail</label>
                      <input type="email" placeholder="es: mario@mail.it" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp">
                      @error('email')
                         <p class="text-small text-danger">campo obbligatorio</p>
                         @enderror
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">{{__('ui.name')}}</label>
                      <input type="text"  name="name" class="form-control  @error('name') is-invalid @enderror" id="name">
                      @error('name')
                         <p class="text-small text-danger">campo obbligatorio</p>
                         @enderror
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">{{__('ui.password')}}</label>
                      <input type="password" placeholder="La password deve contenere almeno 8 caratteri" name="password" class="form-control  @error('password') is-invalid @enderror" id="password">
                      @error('password')
                         <p class="text-small text-danger">campo obbligatorio</p>
                         @enderror
                    </div>
                    <div class="mb-3">
                      <label for="password_confirmation" class="form-label">{{__('ui.confirm')}}</label>
                      <input type="password" name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
                      @error('password_confirmation')
                         <p class="text-small text-danger">campo obbligatorio</p>
                         @enderror
                    </div>
                    <button type="submit" class=" btn btn-primary ">{{__('ui.sign')}}</button>
                  </form>
            </div>
        </div>
    </div>
    

    
    <x-footer></x-footer>
    
    
</x-layout>