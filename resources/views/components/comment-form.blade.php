@props(['post'])
<x-card-warpper>
    <form action="/posts/{{$post->slug}}/comments"
    method="POST">
    @csrf
        <div class="mb-3">
            <textarea name="body" id="" cols="10" rows="5" placeholder="say somthing.." class="form-control border border-0"></textarea>
            <x-error name="body"></x-error>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</x-card-warpper>