<div class="row">
      <nav class="navbar navbar-expand-lg fixed-top">
        <!-- Brand -->
        <div class="title"> 
          <a class="" href="/#">
            <h5>Restaurant <span></span></h5>
          </a>
        </div>
      
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <div></div>
          <div></div>
          <div></div>
        </button>
      
        <!-- Navbar links -->
        @php
          $lk = '';
          if(Route::getCurrentRoute()->uri() != '/')
          $lk = '/';
        @endphp
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav myNavUl ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{$lk}}#header">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{$lk}}#food">Food</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{$lk}}#about">about us</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="{{$lk}}#menu">Menu</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="{{$lk}}#book">Book</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="{{$lk}}#contact">contact</a>
            </li>
            @if (Route::has('login'))
                    @auth
                    @else
                    	<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    	<li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endauth
            @endif	
          </ul>

        </div> 
        @if (Route::has('login'))
        @auth
			<div class="dropdown login-drop">
			  <a class="btn  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  	<img src="/storage/images/{{Auth::user()->avatar}}">
			     {{ Auth::user()->name }} <span class="caret"></span>
			  </a>

			  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          @if(Auth::user()->is_admin)
            <div class="dropdown-item">
              <a class="btn fa fa-btn" href="/dashboard">Dashboard</a>
            </div>
          @endif
            <div class="dropdown-item">
              <a class="btn fa fa-btn" href="/profile">Profile</a>
            </div>
			    <a name="forms">
				<a name="csrf-field">
			    <form class="dropdown-item" action="{{ url('/logout') }}" method="POST">
			    	@csrf
						<!-- @method('POST') -->
			    	<input type="submit" class=" btn fa fa-btn fa-sign-out" value="Logout">
			    </form>
			</a>
		</a>
			  </div>
			</div>
        @endauth
	@endif	
      </nav>
    </div>