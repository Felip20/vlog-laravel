<x-admin-layout>

    <h3 class="my-3 text-center">Post Create-form</h3> 
        <x-card-warpper>
            <form enctype="multipart/form-data" action="/admin/posts/store" method="POST">
                @csrf
                <x-forms.input name="title"></x-forms.input>
                <x-forms.input name="slug"></x-forms.input>
                <x-forms.input name="intro"></x-forms.input>
                <x-forms.textarea name="body"></x-forms.textarea>
                <x-forms.input name="thumbnail" type="file"></x-forms.input>
                  <x-forms.input-wrapper>
                    <x-forms.label name="category"></x-forms.label>
                    <select name="category_id" id="category" class="form-control">
                      @foreach ($categories as $category)
                        <option {{$category->id==old('category_id') ?'selected':''}} value="{{$category->id}}">{{$category->name}}</option> 
                      @endforeach
                    </select>
                    <x-error name="category_id"></x-error>
                  </x-forms.input-wrapper>
                  <div class="d-flex justify-content-start mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
            </form>
        </x-card-warpper>
</x-admin-layout>