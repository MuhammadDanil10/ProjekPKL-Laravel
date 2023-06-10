<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a class="brand-link" style="text-decoration: none;" >
      <img src="{{asset('assets/img/logovote.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-Voting</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (Auth::user()->role != 2)
            <img src="{{asset('assets/img/danil.jpg')}}" class="img-circle elevation-2" alt="User Image">
          @else 
            <img src="{{asset('assets/img/zeta.jpg')}}" class="img-circle elevation-2" alt="User Image">
          @endif
          
        </div>
        <div class="info">
          <p style="color: white;">{{ Auth::user()->name }}</p>
        </div>
      </div>


      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="fa fa-home" aria-hidden="true"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="{{route('admin.voting')}}" class="nav-link">
              <i class="fa fa-user" aria-hidden="true"></i>
              <p>
                Data Vote
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.user')}}" class="nav-link">
              <i class="fa fa-users" aria-hidden="true"></i>
              <p>
                User
              </p>
            </a>
          </li>
          @if (Auth::user()->role != 0)
          <li class="nav-item">
            <a href="{{route('admin.create')}}" class="nav-link">
              <i class="fa fa-plus-square" aria-hidden="true"></i>
              <p>
                Form input voting
              </p>
            </a>
          </li>
          @else
              
          @endif

          <li class="nav-item">
            <a href="{{route('admin.memilih')}}" class="nav-link">
              <i class="fa fa-check" aria-hidden="true"></i>
              <p>
                Memilih
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.golput')}}" class="nav-link">
              <i class="fa fa-times" aria-hidden="true"></i>
              <p>
                Tidak Memilih
              </p>
            </a>
          </li>
      
         {{-- @if (Auth::user()->role != 0)
         <li class="nav-item">
          <a href="{{route('admin.users')}}" class="nav-link">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
            <p>
              Form input user
            </p>
          </a>
        </li>
         @else
             
         @endif --}}
          
        </ul>
      </nav>
    </div>
  </aside>