<x-layout>


    <x-navbar></x-navbar>
    
    <x-masthead
    
    title="{{__('ui.create')}}"
    
    ></x-masthead>
<div class="container">
    <div class="row">
        <div class="col-12">
            <livewire:create-announcement-form></livewire:create-announcement-form>
        </div>
    </div>
</div>

    
    <x-footer></x-footer>
    
    
    </x-layout>