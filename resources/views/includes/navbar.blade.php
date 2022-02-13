<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Pilih Bahasa
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}" href="{{ route('localization.switch', 'en') }}">English</a></li>
              <li> <a class="dropdown-item {{ app()->getLocale() == 'id' ? 'active' : '' }}" href="{{ route('localization.switch', 'id') }}">Bahasa Indonesia</a></li>
            </ul>
          </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <b>   <h3 class="text-white" style="margin-right:350px">Amazing E-Book </h3></b>
          
         @auth('account')
         <li class="nav-item">
          <a class="nav-link btn btn-sm btn-warning text-white me-2" href="{{ route('logout') }}">{{ __('navbar.logout') }}</a>
        </li>
         @endauth
          
          
        </ul>
      </div>
    </div>
  </nav>
  <div class="row justify-content-center bg-warning p-2">
    <div class="col-md-2 text-center">
      <a href="{{ route('home') }}" class="btn {{  Request::is('home' . '*') ? ' active' : '' }}" ><b>{{ __('navbar.home') }}</b></a>
    </div>
    <div class="col-md-2 text-center"><a href="{{ route('cart') }}" class="btn  {{  Request::is('ebook*') ? ' active' : '' }}  {{  Request::is('cart' . '*') ? ' active' : '' }}"><b>{{ __('navbar.cart') }}</b></a></div>
    <div class="col-md-2 text-center">
      <a href="{{ route('profile') }}" class="btn  {{  Request::is('profile'. '*') ? ' active' : '' }}"><b>{{ __('navbar.profile') }} </b></a>
     
    </div>
    @if (Auth::guard('account')->user()->roles->role_desc == 'Admin')
    <div class="col-md-2 text-center">
      <a href="{{ route('maintaince') }}" class="btn {{  Request::is('maintaince'. '*') ? ' active' : '' }}"><b>{{ __('navbar.maintaince') }}</b></a>
    </div>
    @endif
  </div>
