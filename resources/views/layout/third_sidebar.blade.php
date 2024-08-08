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
          <a href="{{ route('logout') }}"><button class="btn btn-success btn-block">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
              <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
            </svg></button></a>
         
        </div>
      </li>
      <li class="nav-item {{ active_class(['/']) }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
          {{-- <i class="menu-icon mdi mdi-television"></i> --}}
          <i class="menu-icon fa-solid fa-gauge"></i>
          <span class="menu-title">Tableau de bord</span>
        </a>
      </li>
    </li>
    <li class="nav-item {{ active_class(['basic-ui/*']) }}">
      <a class="nav-link" href="{{ route('mandat.index2') }}">
        <i class="menu-icon fa-solid fa-landmark"></i>
        <span class="menu-title">Mandats</span>
      </a>
    </li>
      <li class="nav-item {{ active_class(['basic-ui/*']) }}">
        <a class="nav-link" href="{{ route('profil') }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
            <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z"/>
          </svg>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span class="menu-title">Profil</span>
        </a>
      </li>
      
    </ul>
  </nav>