<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'/> <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'/>

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto';
        }

        .app-drawer {
            position: fixed;
        }

        .main-content {
            padding: 20px;
        }
    </style>



    @yield('css')
    <link href='/css/style.css' rel='stylesheet' type='text/css'/>
</head>
<body>
<!-- Top App Bar -->
@include('admin.base.header')

<div class="app-drawer-layout mdc-top-app-bar--fixed-adjust">
    <!-- Drawer -->
@include('admin.base.nav')

<!-- Content -->
    <main class="mdc-drawer-app-content main-content">
        @yield('content')
    </main>
</div>
</body>
<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
<script type="text/javascript" src="/js/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // Instantiate MDC Drawer
        const drawerEl = document.querySelector(".mdc-drawer");
        const drawer = new mdc.drawer.MDCDrawer.attachTo(drawerEl);
        drawer.open = true;
        // Instantiate MDC Top App Bar (required)
        const topAppBarEl = document.querySelector(".mdc-top-app-bar");
        const topAppBar = new mdc.topAppBar.MDCTopAppBar.attachTo(topAppBarEl);

        topAppBar.setScrollTarget(document.querySelector(".main-content"));
        topAppBar.listen("MDCTopAppBar:nav", () => {
            drawer.open = !drawer.open;
        });
        // $('.mdc-list-item ').removeClass('mdc-list-item--activated');
    });
</script>
<script type="text/javascript" src="/js/app.js"></script>

@yield('js')
    <script>
        $(document).ready(function () {
            $('.mdc-list-item-dashboard').addClass('mdc-list-item--activated');
        })
    </script>
</html>
