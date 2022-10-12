<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
            <img
                src="/storage/{{$post->thumbnail}}"
                class="card-img-top"
                alt="..."
            />
            <h3 class="my-3">{{$post->title}}</h3>
                <div>
                    <div>Author - <a href="/users/{{$post->user->username}}">{{$post->user->name}}</a></div>
                    <div><a href="/categories/{{$post->category->slug}}"><span class="badge bg-primary">{{$post->category->name}}</span></a></div>
                    <div class="text-secondary">{{$post->created_at->diffForHumans()}}</div>
                    <div class="text-secondary">
                        <form action="/posts/{{$post->slug}}/sub" method="POST">
                            @csrf
                            @auth
                                @if (auth()->user()->isSubscribed($post))
                                    <button class="btn btn-danger">Unsubscribe</button>
                                @else
                                    <button class="btn btn-warning">Subscribe</button>
                                @endif
                            @endauth
                        </form>
                    </div>
                    <p  class="lh-md mt-3">
                        {!!$post->body!!}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <section class="container">
        <div class="col-md-8 mx-auto">
            @auth
            <x-comment-form :post="$post"></x-comment-form>
            @else
                <p class="text-center">Please <a href="/login">Login</a> First.</p>
            @endauth
        </div>
    </section>
   @if ($post->comments->count())
   <x-comments :comments="$post->comments()->latest()->paginate(3)"></x-comments>
   @endif

</x-layout>

