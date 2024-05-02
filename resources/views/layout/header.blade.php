<div class="app-header-inner">  
    <div class="container-fluid py-2">
        <div class="app-header-content"> 
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
                    </a>
                </div>
                <div class="search-mobile-trigger d-sm-none col">
                    <i class="search-mobile-trigger-icon fas fa-search"></i>
                </div><!--//col-->
                {{-- <div class="app-utilities col-auto">
                    <div class="app-utility-item app-user-dropdown dropdown">
                        <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt="user profile" style="border-radius: 50%">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                            <li><a class="dropdown-item" href="account.html">Profil</a></li>
                            <li><a class="dropdown-item" href="settings.html">Parametres</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('logout')}}">Se deconnecter</a></li>
                        </ul>
                    </div>
                </div> --}}
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                        <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt="user profile" style="border-radius: 50%">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
            </div><!--//row-->
        </div><!--//app-header-content-->
    </div><!--//container-fluid-->
</div>  
