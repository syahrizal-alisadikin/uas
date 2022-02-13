<!doctype html>
<html lang="en">
  @include('includes.styles')

  <body>
    @include('includes.navbar')
     
      <div class="container  mt-4">
          <div class="row justify-content-center">
              <div class="col-md-4">
                <h5 class="text-center">Ebook Detail</h5>
              </div>
              <div class="col-md-6">
                
                
              </div>
              <div class="col-md-8">
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-3 col-form-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" readonly id="staticEmail" value="{{ $book->title }}">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-3 col-form-label">Author</label>
                  <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" readonly value="{{ $book->author }}">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="staticEmail" class="col-sm-3 col-form-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control plaintext" readonly id="" cols="30" rows="10">{{ $book->description }}</textarea>
                    
                  </div>
                </div>
                <div style="float: right">
                  <form action="{{ route('cart') }}" method="POST" >
                    @csrf
                    <input type="hidden" name="ebook_id"  class="form-control-plaintext" readonly id="staticEmail" value="{{ $book->ebook_id }}">
                    <input type="hidden" name="account_id"  class="form-control-plaintext" readonly id="staticEmail" value="{{ Auth::guard('account')->user()->account_id }}">

                    <button class="btn btn-warning "><b>Rent</b></button>
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