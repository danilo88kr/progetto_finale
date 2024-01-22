<x-layout>


    <x-navbar></x-navbar>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="email" class="form-label">E-mail </label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp">
                      @error('email')
                      <p class="text-small text-danger">campo obbligatorio</p>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">{{__('ui.password')}}</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="email" id="password">
                      @error('email')
                      <p class="text-small text-danger">campo obbligatorio</p>
                      @enderror
                    </div>
                    <div class="mb-3">
                        <label for="remember" class="form-check-label">{{__('ui.remember')}}</label>
                        <input type="checkbox" name="remember" class="form-check-label" id="password">
                      </div>
                    <button type="submit" class="btn btn-primary">{{__('ui.login')}}</button>
                  </form>
            </div>
        </div>
    </div>
    

    
    <x-footer class="fixed-bottom"></x-footer>

</x-layout>    