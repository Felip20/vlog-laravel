<x-layout>
    @if (session('help'))
    <div class="alert alert-success text-center">{{session('help')}}</div> 
    @endif
    
    <x-hero></x-hero>
    
    <x-posts-section :posts="$posts"></x-posts-section>



</x-layout>




 

