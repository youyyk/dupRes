<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-brand m-lg-1">Header </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link
                          @if(\Request::routeIs('users.*')) bg-dark text-white rounded-3 @endif"
                   href="{{route("users.index")}}">Users</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link
                          @if(\Request::routeIs('menus.*')) bg-dark text-white rounded-3 @endif"
                          href="{{route("menus.index")}}">Menu</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link
                          @if(\Request::routeIs('resTables.*')) bg-dark text-white rounded-3 @endif"
                   href="{{route("resTables.index")}}">ResTables</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link
                          @if(\Request::routeIs('departments.*')) bg-dark text-white rounded-3 @endif"
                   href="{{route("departments.index")}}">Departments</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link
                          @if(\Request::routeIs('bills.*')) bg-dark text-white rounded-3 @endif"
                   href="{{route("bills.index")}}">Bills</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown link
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
