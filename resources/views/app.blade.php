<!DOCTYPE html>
<html lang="es-ES"  prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="UTF-8">
        <!--nuestro título podrá ser modificado-->
        <title>Maestro 105  - Profesionales de Calidad</title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="<?php echo csrf_token() ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/style.css">

        <meta name="title" content="Maestro 105 - Profesionales de Calidad" />
        <meta property="og:url" content="http://200.60.88.245:81/" />
        <meta property="og:title" content="Maestro 105" />
        <meta property="og:site_name" content="Maestro 105 - Profesionales de Calidad" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="http://200.60.88.245:81/images/imagen.png">
        <meta property="og:image:url" content="http://200.60.88.245:81/images/imagen.png" />
        <meta property="og:description" content="Encuentra y Contacta al Profesional que necesitas; de manera segura rapida y efectiva" />

        <meta name="MobileOptimized" content="width" />
        <meta name="HandheldFriendly" content="true" />

        <link rel="shortcut icon" href="/images/favicon.ico" type="image/vnd.microsoft.icon" />
        @yield('css')
        @yield('javascript')
    </head>
    <body  style="margin-bottom: 0px;">
  
        <!--nuestra navegación-->
        @include('partials.layout.navbar')
        @include('partials.layout.errors')
        @if (Auth::guest())
            @yield('content')
        @else
              @if (Auth::user()->users_tipos_id == 1)
                @yield('content-miembros')
              @else
                @yield('content-proveedores')
                @yield('acceso-no-proveedores')
              @endif
        @endif
        

        @include('partials.layout.footer')     
        
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/aplicacion.js"></script>

        @yield('scripts')
    </body>
</html>
