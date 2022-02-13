<!doctype html>
<html lang="en">
  @include('includes.styles')
  <body>
    @include('includes.navbar')
    

      <div class="container  mt-4">
          <form action="{{ route('role.update') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method("PUT")
            <div class="row justify-content-center ">
             

              
              <div class="col-md-4">
              <h4>{{ $account->first_name }}</h4>
            
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Role :</label>
                 <div class="col-sm-8 ">
                   <input type="hidden" name="account_id" value="{{ $account->account_id }}" id="">
                  <select name="roles_id" class="form-select" id="">
                    @foreach ($roles as $item)
                        <option value="{{ $item->role_id }}" {{ $account->role_id == $item->role_id ? "selected" : "" }}>{{ $item->role_desc }}</option>
                    @endforeach
                </select>
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