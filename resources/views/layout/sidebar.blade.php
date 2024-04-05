<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile not-navigation-link">
        <div class="nav-link">
          <div class="user-wrapper">
            <div class="profile-image">
              <img src="{{ url('assets/images/SET.jpeg') }}" alt="profile image" height="65px">
            </div>
            <div class="text-wrapper">
              <p class="profile-name"><center>UFR <br> Sciences Et Technologies</center></p>
              <div class="dropdown" data-display="static">
                {{-- <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <small class="designation text-muted">Budget</small>
                  <span class="status-indicator online"></span>
                </a> --}}
                {{-- <div class="dropdown-menu" aria-labelledby="UsersettingsDropdown">
                  <a class="dropdown-item p-0">
                    <div class="d-flex border-bottom">
                      <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                        <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                      </div>
                      <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                        <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                      </div>
                      <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                        <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                      </div>
                    </div>
                  </a>
                  <a class="dropdown-item mt-2"> Manage Accounts </a>
                  <a class="dropdown-item"> Change Password </a>
                  <a class="dropdown-item"> Check Inbox </a>
                  <a class="dropdown-item"> Sign Out </a>
                </div> --}}
              </div>
            </div>
          </div>
          {{-- <button class="btn btn-success btn-block">New Project <i class="mdi mdi-plus"></i>
          </button> --}}
          <a href="{{ route('transaction.index') }}"><button class="btn btn-success btn-block">Liste Depenses</button></a>
        </div>
      </li>
      <li class="nav-item {{ active_class(['/']) }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="menu-icon mdi mdi-television"></i>
          <span class="menu-title">Tableau de bord</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['basic-ui/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#basic-ui" aria-expanded="{{ is_active_route(['basic-ui/*']) }}" aria-controls="basic-ui">
          <i class="menu-icon mdi mdi-dna"></i>
          <span class="menu-title">Categorie de depenses</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ show_class(['basic-ui/*']) }}" id="basic-ui">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item {{ active_class(['basic-ui/buttons']) }}">
              <a class="nav-link" href="{{ route('depense.create') }}">Nouvelle categorie de depenses</a>
            </li>
            {{-- <li class="nav-item {{ active_class(['basic-ui/typography']) }}">
              <a class="nav-link" href="#">Typography</a>
            </li> --}}
            <li class="nav-item {{ active_class(['basic-ui/dropdowns']) }}">
              <a class="nav-link" href="{{ route('depense.index') }}">Liste</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item {{ active_class(['user-pages/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#user-pages" aria-expanded="{{ is_active_route(['user-pages/*']) }}" aria-controls="user-pages">
          <i class="menu-icon mdi mdi-lock-outline"></i>
          <span class="menu-title">Depenses</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ show_class(['user-pages/*']) }}" id="user-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item {{ active_class(['user-pages/login']) }}">
              <a class="nav-link" href="{{ route('transaction.create') }}">Ajouter</a>
            </li>
            
            {{-- <li class="nav-item {{ active_class(['user-pages/register']) }}">
              <a class="nav-link" href="{{ route('transaction.edit') }}">Modifier</a>
            </li> --}}
            <li class="nav-item {{ active_class(['user-pages/lock-screen']) }}">
              <a class="nav-link" href="{{ route('transaction.index') }}">Liste des depenses</a>
            </li>
          </ul>
        </div>
      </li>
  
      {{-- <li class="nav-item {{ active_class(['charts/chartjs']) }}">
        <a class="nav-link" href="{{ url('/charts/chartjs') }}">
          <i class="menu-icon mdi mdi-chart-line"></i>
          <span class="menu-title">Charts</span>
        </a>
      </li> --}}
      <li class="nav-item {{ active_class(['tables/basic-table']) }}">
        <a class="nav-link" href="{{ url('/tables/basic-table') }}">
          <i class="menu-icon mdi mdi-file-outline"></i>
          <span class="menu-title">Mandat</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.bootstrapdash.com/demo/star-laravel-free/documentation/documentation.html" target="_blank">
          <i class="menu-icon mdi mdi-file-outline"></i>
          <span class="menu-title">Bon d'engagement</span>
        </a>
      </li>
    </ul>
  </nav>