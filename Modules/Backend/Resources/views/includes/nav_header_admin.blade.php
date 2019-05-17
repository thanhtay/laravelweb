<?php
    $controller = '1111';
?>
<nav id="sidebar" class="">
    <div class="sidebar-header">
        <button type="button" class="close controlMenu" aria-label="Close">
            <i class="fa fa-window-close" aria-hidden="true"></i>
        </button>
        <h3>Admin Page</h3>
    </div>
    <ul class="list-unstyled components">
            <li>
                    <a href="{{ route("home") }}">Home</a>
                </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">Admin
                Management</a>
            <ul class="list-unstyled collapse bg-info show" id="pageSubmenu" style="bg">
                <li class="active">
                    <a href="{{route("admin.createAdmin")}}">Create Admin</a>
                </li>
                <li>
                    <a href="{{route("admin.listAdmin")}}">List Admin</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route("userAdmin.listUser") }}">User Management</a>
        </li>
        <li>
            <a href="{{ route("adminCourse.listCourse") }}">Courses</a>
        </li>
        <li>
            <a href="#">News</a>
        </li>
        <li>
            <a href="#">Setting</a>
        </li>
        <li>
            <a href="#">Logout</a>
        </li>
    </ul>
</nav>
