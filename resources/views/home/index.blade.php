<!doctype html>
<html lang="en">
  @include('includes.styles')
  <body>
    @include('includes.navbar')
    

      <div class="container text-center mt-4">
          <div class="row justify-content-center">
              <div class="col-md-2">
                <h5>{{ __('navbar.author') }}</h5>
              </div>
              <div class="col-md-6">
                <h5>{{ __('navbar.tittle') }}</h5>
                
              </div>
              <div class="col-md-8">
                <table class="table table-bordered border-primary">
                  <thead>
                  @foreach ($books as $item)
                  <tr>
                    <th scope="col">{{ $item->author }}</th>
                    <th scope="col"><a href="{{ route('ebook',$item->ebook_id) }}">{{ $item->title }}</a></th>
                    
                  </tr>
                  @endforeach
                  </thead>
                </table>
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