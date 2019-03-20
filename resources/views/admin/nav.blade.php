<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{auth()->user()->avatar}}"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{auth()->user()->name}}</span>
                        <span class="text-muted text-xs block">{{auth()->user()->getRole()->name}}<b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item logout" onclick="event.preventDefault(); getElementById('logout').submit();" href="#">Logout</a></li>
                        <form id="logout" hidden="true" method="post" action="{{route('logout')}}">
                            @csrf
                        </form>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="/plan"><i class="fa fa-bars"></i> <span class="nav-label">PLAN</span></a>
            </li>

            <li>
              <a href="{{route('admin.articles.index')}}"><i class="fa fa-bars"></i> <span class="nav-label">Articles</span>  <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('admin.articles.index')}}">Index page</a></li>
                    <li><a href="{{route('articles.create')}}">Create new article</a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('categories')}}"><i class="fa fa-bars"></i> <span class="nav-label">Categories</span></a>
            </li>
        </ul>
    </div>
</nav>