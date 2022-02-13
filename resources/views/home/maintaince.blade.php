<!doctype html>
<html lang="en">
  @include('includes.styles')
  <body>
    @include('includes.navbar')
    

    <div class="row mt-5 justify-content-center">
      @if ($message = Session::get('success'))
              <div class="alert alert-success text-center alert-block">
                  
                  <strong>{{ $message }}</strong>
              </div>
            @endif
      <div class="col-md-4 text-center">
        <h5>Author</h5>
      </div>
      <div class="col-md-4 text-center">
        <h5>Title</h5>
        
      </div>
      <div class="col-md-8">
        <table class="table table-bordered border-primary">
          <thead>
          @foreach ($accounts as $item)
          <tr class="text-center">
            <th scope="col">{{ $item->first_name }} - {{ $item->roles->role_desc }}</th>
            <th scope="col" style="width: 30%">
              <a href="{{ route('role.edit',$item->account_id) }}" class="btn btn-warning btn-sm">Update Role </a>
              <form action="{{ route('user.destroy',$item->account_id) }}" 
                method="post" 
                class="d-inline">
              @csrf
              @method('delete')
              <button class="btn btn-danger btn-sm ms-2" onclick="return confirm('Yakin Hapus Data?')">DELETE</button>
          </form> 
            </th>
            
          </tr>
          @endforeach
          </thead>
        </table>
      </div>
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