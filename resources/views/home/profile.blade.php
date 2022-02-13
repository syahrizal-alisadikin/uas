<!doctype html>
<html lang="en">
  @include('includes.styles')
  <body>
    @include('includes.navbar')
    

      <div class="container  mt-4">
          <form action="{{ route('profile.update') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method("PUT")
            <div class="row justify-content-center">
              @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                  
                  <strong>{{ $message }}</strong>
              </div>
            @endif

              <div class="col-md-2">
                <img src="{{ Storage::url($account->display_picture) }}" class="w-100" style="border-radius: 10px" alt="">
              </div>
              <div class="col-md-5">
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">{{ __('navbar.firstname') }} :</label>
                    <div class="col-sm-9">
                      <input type="text" name="first_name" value="{{ old('first_name',$account->first_name) }}" class="form-control">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">{{ __('navbar.lastname') }} :</label>
                    <div class="col-sm-9">
                      <input type="text" name="last_name" value="{{ old('last_name',$account->last_name) }}" class="form-control">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">{{ __('navbar.gender') }} :</label>
                 <div class="col-sm-9 d-flex">
                   @foreach ($gender as $item)
                  
                  <div class="form-check ">
                    <input   type="radio" name="gender_id" {{ $account->gender_id == $item->gender_id ? "checked" :"" }} value="{{ $item->gender_id }}" >
                    <label class="form-check-label">
                      {{ $item->role_desc }}
                    </label>
                  </div>
                   @endforeach
                 </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Password :</label>
                    <div class="col-sm-9">
                      <input type="password" name="password" class="form-control" id="inputPassword">
                    </div>
                  </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">{{ __('navbar.middlename') }} :</label>
                    <div class="col-sm-8">
                      <input type="text" name="middle_name" value="{{ old('middle_name',$account->middle_name) }}"  class="form-control">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">{{ __('navbar.email') }} :</label>
                    <div class="col-sm-8">
                      <input type="email" name="email" value="{{ old('email',$account->email) }}" class="form-control">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">{{ __('navbar.role') }} :</label>
                 <div class="col-sm-8 ">
                  <input type="text" readonly class="form-control" value="{{ $account->roles->role_desc }}" id="">
                 </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">{{ __('navbar.display') }}:</label>
                    <div class="col-sm-8">
                      <input type="file" name="display_picture" class="form-control" id="inputPassword">
                    </div>
                  </div>
            </div>
            
            <div class="text-center">
              <button type="submit" class="btn btn-warning mt-3" style="padding: 3px 40px;">Save</button> <br>
          </div>
        </div>
          </form>
      </div>
  @include('includes.footer')

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>