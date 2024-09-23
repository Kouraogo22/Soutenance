<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="generator" content="Jekyll v3.8.5">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'App Directory')</title>
        <link href="https://cdn.jsdelivr.net/npm/boosted@5.3.3/dist/css/boosted.min.css" rel="stylesheet" integrity="sha384-laZ3JUZ5Ln2YqhfBvadDpNyBo7w5qmWaRnnXuRwNhJeTEFuSdGbzl4ZGHAEnTozR" crossorigin="anonymous">
        <link rel="canonical" href="https://boosted.orange.com/docs/4.3/examples/dashboard/">
        <!-- Inclure Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <link href="../../css/tarteaucitronboosted.css" rel="stylesheet">
        <link href="../../css/vendor/swiper.min.css" rel="stylesheet">
        <link href="../../css/orangeHelvetica.css" rel="stylesheet">
        <link href="../../css/orangeIcons.css" rel="stylesheet">
        <link href="../../css/boosted.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/orange-boosted-bootstrap@5.3.0/dist/css/orange-boosted.min.css" rel="stylesheet">
        <style> 
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }
            </style>
            <style type="text/css">/* Chart.js */
            @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
            .sidebar-sticky {
                position: -webkit-sticky;
                position: sticky;
                top: 0;
                height: 100vh; /* Remplir la hauteur de la page */
                padding-top: 100px;
                z-index: 1000;
            }
            
            .sidebar {
                width: 300px;
                position: fixed;
                background-color: #f8f9fa;
                border-right: 1px solid #dee2e6;
                overflow-y: auto;
                top: 0; /* S'assurer qu'elle colle bien en haut */
                left: 0; /* S'assurer qu'elle colle bien à gauche */
            }

            .sidebar .nav-link {
                margin: 5px 0;
            }
            
            /* Correction de l'alignement pour les icônes */
            .sidebar .nav-link svg {
                margin-right: 10px;
            }

            /* S'assurer que le contenu principal ne chevauche pas le sidebar */
            .main-content {
                margin-left: 270px;
                
                flex: 1;
                background-color: #f4f4f4;
                height: calc(100vh - 80px); /* Ajuste la hauteur en fonction de la navbar */
                overflow-y: auto;
                margin-top: 80px; /* Place le contenu sous la navbar */
            }
            .row {
                padding-left: 0;
                padding-top: 100px;
                padding-left: 0;
            }
               body {
                background-color: #f0f0f0; /* couleur grise claire */
            }
            
            .stepped-process-item.active .stepped-process-link {
                font-weight: bold;
                color: #ffffff; /* Couleur active */
            }

            .stepped-process-item.disabled .stepped-process-link {
                pointer-events: none; /* Désactive le clic */
                color: #aaa; /* Grise le texte */
            }

 
        </style>
        <link href="dashboard.css" rel="stylesheet">
    </head>
    <body id="kt_body"  class=" header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        @include('layouts.header')
        <div class="container-fluid">
            <div class="row">
            @include('layouts.sidebar')
                <main role="main" id="main-content" class="col-md-9 ms-auto col-lg-10 px-4">
                <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                        </div>
                    </div>
                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:200%;height:200%;left:0; top:0">
                        </div>
                    </div>
                </div>
                    @yield('content')
                    <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="856" height="361" style="display: block; width: 856px; height: 361px;"></canvas>
                </main>
            </div>
        </div>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/boosted.bundle.min.js" crossorigin="anonymous"></script>
            <script src="/docs/4.3/dist/js/boosted.bundle.min.js" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
            <script src="dashboard.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/orange-boosted-bootstrap@5.3.0/dist/js/orange-boosted.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/boosted@5.3.3/dist/js/boosted.bundle.min.js" integrity="sha384-3RoJImQ+Yz4jAyP6xW29kJhqJOE3rdjuu9wkNycjCuDnGAtC/crm79mLcwj1w2o/" crossorigin="anonymous"></script>

            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <!-- Boosted (Bootstrap) -->
            <script src="https://cdn.jsdelivr.net/npm/boosted@5.1.3/dist/js/boosted.bundle.min.js"></script>

        </body>
</html>