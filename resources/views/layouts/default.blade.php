<!doctype html>

<html>

<head>

   @include('includes.head')

</head>

<body>

<div class="container-fluid">

   <header class="row">

       @include('includes.header')

   </header>

   <div id="main" class="row mb-5">

           @yield('content')

   </div>

   <footer class="row">

       @include('includes.footer')

   </footer>

</div>

</body>

</html>