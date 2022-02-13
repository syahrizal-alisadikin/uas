<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Amazing Book</title>
  </head>
  <body>
    <div class="p-2 bg-success">
        <b>   <h3 class="text-white text-center">Amazing E-Book </h3></b>

    </div>
      <div class="container p-5">
         <form action="{{ route('sign-in.post') }}" method="POST">
             @csrf
             <div class="row ">
              @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                  
                  <strong>{{ $message }}</strong>
              </div>
            @endif
            @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-block">
  
        <strong>{{ $message }}</strong>
      </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                 <h3>{{ __('navbar.signin') }} </h3>
                <div class="col-md-6">
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">{{ __('navbar.email') }} :</label>
                        <div class="col-sm-9">
                          <input type="email" name="email" class="form-control">
                        </div>
                      </div>
                    
                  
                      <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Password :</label>
                        <div class="col-sm-9">
                          <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-warning mt-3" style="padding: 3px 40px;">Submit</button> <br>
                        <a href="{{ route('sign-up') }}">Dont have an account? click here to sign up</a>
                    </div>
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