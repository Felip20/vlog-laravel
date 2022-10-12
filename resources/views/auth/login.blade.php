<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center my-2">Login</h3>
                <div class="card p-3 my-3 shadow-sm">
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
                            <x-error name="email"></x-error>
                          </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                          <x-error name="password"></x-error>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <ul>
                          {{-- @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                          @endforeach --}}
                        </ul>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>