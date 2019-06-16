<!doctype html>
<html lang="en">

<head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">

    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.controlMenu').on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#contentControlMenu').toggleClass('hidden');
        });
    });
    </script>

    <script src="{{ asset('/js/common/AjaxCommon.js') }}"></script>
    <script src="{{ asset('/js/common/AjaxCustom.js') }}"></script>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('backend::includes.nav_header_admin')
        <!-- Page Content  -->
        <div id="content" class="ml-3">
            <nav class="navbar navbar-expand-lg navbar-light bg-light h5" style="height: 55px;">
                <button id="contentControlMenu" type="button" class="btn btn-info controlMenu hidden">
                    <i class="fa fa-align-left" aria-hidden="false"></i>
                </button>
            </nav>
            @yield('content')
        </div>
    </div>
</body>

</html>