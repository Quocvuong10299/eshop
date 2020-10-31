<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'/>
    <style type="text/css">
        body {
            font-family: 'Roboto';
        }
        .app-drawer {
            position: fixed;
        }
        .main-content {
            padding: 20px;
        }
        label {
            cursor: pointer;
            /* Style as you please, it will become the visible UI component. */
        }
    </style>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
@include('layout.base.header')
<div class="app-drawer-layout mdc-top-app-bar--fixed-adjust">
    @include('layout.base.sidebar')
    <!-- Content -->
    <main class="mdc-drawer-app-content main-content">
        @yield('content')
    </main>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="/js/app.js"></script>
<script type="text/javascript" src="/js/jquery.validate.min.js"></script>
@yield('js')
</html>
