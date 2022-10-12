@props(['post'])
<div class="card">
    <img
      src='{{asset("/storage/$post->thumbnail")}}'
      class="card-img-top"
      alt="..."
    />
    <div class="card-body">
      <h3 class="card-title">{{$post->title}}</h3>
      <p class="fs-6 text-secondary">
        <a href="/?username={{$post->user->username}}">{{$post->user->name}}</a>
        <span> - {{$post->created_at->diffForHumans()}}</span>
      </p>
      <div class="tags my-3">
        <a href="/?category={{$post->category->slug}}"><span class="badge bg-primary">{{$post->category->name}}</span></a>
        {{-- <span class="badge bg-secondary">Css</span>
        <span class="badge bg-success">Php</span>
        <span class="badge bg-danger">Javascript</span>
        <span class="badge bg-warning text-dark">Frontend</span> --}}
      </div>
      <p class="card-text">
        {{$post->intro}}
      </p>
      <a href="/posts/{{$post->slug}}" class="btn btn-primary">Read More</a>
    </div>
</div>