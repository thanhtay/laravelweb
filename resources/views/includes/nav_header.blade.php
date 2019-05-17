<nav class="navbar navbar-expand-lg navbar-light bg-light h5">
    <a class="navbar-brand" href="{{ route('home')}}">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active px-2">
                <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown px-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Courses
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Primary</a>
                    <a class="dropdown-item" href="#">Secondary</a>
                    <a class="dropdown-item" href="#">High school</a>
                </div>
            </li>
            <li class="nav-item px-2">
                <a class="nav-link" href="#">News</a>
            </li>
            <li class="nav-item px-2">
                <a class="nav-link" href="#">Contact</a>
            </li>
            @guest
            <li class="nav-item px-2">
                <a class="nav-link" href="{{url("/login")}}">Login</a>
            </li>
            <li class="nav-item px-2">
                <a class="nav-link" href="{{url("/register")}}">Register</a>
            </li>
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="{{url("/admin")}}">Admin</a>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</nav>
