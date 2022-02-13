<!doctype html>
<html lang="en">
  @include('includes.styles')
  <body>
    @include('includes.navbar')
    

      <div class="container  mt-4">
          <div class="row justify-content-center">
              
              <div class="col-md-8">
                <h5>{{ __('navbar.tittle') }}</h5>
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    
                    <strong>{{ $message }}</strong>
                </div>
              @endif
              </div>
              <div class="col-md-8">
                <table class="table table-bordered border-primary">
                  <thead>
                  
                  @forelse ($cart as $item)
                  <tr>
                    <th scope="col">{{ $item->ebook->title }}</th>
                    
                    <th scope="col" style="width: 15%">
                      <form action="{{ route('cart.destroy',$item->cart_id) }}" 
                        method="post" 
                        class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data?')">DELETE</button>
                  </form>  
                    </th>
                  </tr>
                  @empty
                      <tr>Tidak ada Cart</tr>
                  @endforelse
                  </thead>
                </table>
                <div style="float: right; margin-top:50px">
                  <form action="{{ route('order') }}" method="POST">
                  @csrf
                  <input type="hidden"  name="account_id" value="{{ Auth::guard('account')->user()->account_id }}" id="">
                  <button type="submit" class="btn btn-warning">Submit</button>
                  </form>
                </div>
              </div>
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