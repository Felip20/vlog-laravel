<x-admin-layout>
    <h1 class="text-center">Posts</h1>
    <x-card-warpper>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Intro</th>
                <th scope="col" colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($posts as $post)
             <tr>
                <td><a href="/posts/{{$post->slug}}" target="_blank">{{$post->title}}</a></td>
                <td>{{$post->intro}}</td>
                <td><a href="/admin/posts/{{$post->slug}}/edit" class="btn btn-warning">Edit</a></td>
                <td>
                <form action="/admin/posts/{{$post->slug}}/delete" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
            </tr>
             @endforeach
            </tbody>
          </table>
          {{$posts->links()}}
    </x-card-warpper>
</x-admin-layout>