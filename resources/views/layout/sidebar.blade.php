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
            </div>
          </div>
          
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
        <a class="nav-link" data-toggle="collapse" href="#compte" aria-expanded="{{ is_active_route(['basic-ui/*']) }}" aria-controls="compte">
            <i class="menu-icon mdi mdi-file-outline"></i>
            <span class="menu-title">Nomenclature des comptes</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ show_class(['basic-ui/*']) }}" id="compte">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item {{ active_class(['basic-ui/buttons']) }}">
                    <a class="nav-link" href="{{ route('compte.create') }}">Ajouter une classe de compte</a>
                </li>
                <li class="nav-item {{ active_class(['basic-ui/dropdowns']) }}">
                    <a class="nav-link" href="{{ route('compte.index') }}">Liste des classes</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
      <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
      
      <a class="nav-link" href="{{ route('budget.index') }}">
          <i class="menu-icon mdi mdi-file-outline"></i>
          <span class="menu-title">Budget</span>
      </a>
      <!--//nav-link-->
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
      <li class="nav-item {{ active_class(['basic-ui/*']) }}">
        <a class="nav-link" data-toggle="collapse" href="#bon-engagement-menu" aria-expanded="{{ is_active_route(['basic-ui/*']) }}" aria-controls="bon-engagement-menu">
            <i class="menu-icon mdi mdi-file-outline"></i>
            <span class="menu-title">Bon d'engagement</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ show_class(['basic-ui/*']) }}" id="bon-engagement-menu">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item {{ active_class(['basic-ui/buttons']) }}">
                    <a class="nav-link" href="{{ route('bonEngagement.create') }}">Ajouter un bon d'engagement</a>
                </li>
                <li class="nav-item {{ active_class(['basic-ui/dropdowns']) }}">
                    <a class="nav-link" href="{{ route('bonEngagement.index') }}">Liste</a>
                </li>
            </ul>
        </div>
      </li>
    
    <li class="nav-item {{ active_class(['basic-ui/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#mandat-menu" aria-expanded="{{ is_active_route(['basic-ui/*']) }}" aria-controls="mandat-menu">
          <i class="menu-icon mdi mdi-file-outline"></i>
          <span class="menu-title">Mandat</span>
          <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['basic-ui/*']) }}" id="mandat-menu">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item {{ active_class(['basic-ui/buttons']) }}">
                  <a class="nav-link" href="{{ route('mandat.create') }}">Ajouter un mandat</a>
              </li>
              <li class="nav-item {{ active_class(['basic-ui/dropdowns']) }}">
                  <a class="nav-link" href="{{ route('mandat.index') }}">Liste</a>
              </li>
          </ul>
      </div>
  </li>
    </ul>
  </nav>