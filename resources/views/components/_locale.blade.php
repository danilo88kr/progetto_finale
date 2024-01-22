<form action="{{route('setLocale',$lang)}}" method="POST">
    @csrf
    <button type="submit" class="nav-link" style="background-color: transparent;border:none">
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="32" height="32"></img>
    </button>
</form>