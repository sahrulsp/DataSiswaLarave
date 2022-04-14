
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="brand">
    <a href="/home">
      <img src="{{asset('admin/assets/img/logo-dark.png')}}"></a>
  </div>
  <div class="container-fluid">
    <div id="navbar-menu">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{auth()->user()->avatar}}" class="img-circle" alt="Avatar">
             <span>{{auth()->user()->images}} </span><i class="icon-submenu lnr lnr-chevron-down"></i></a>
              <ul class="dropdown-menu">
            <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>