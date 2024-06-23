<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="../assets/img/logo.jfif">
  @include('layout.style')

  <title>@yield('title')</title>
</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
  <div class="wrapper">

    <!-- Header Navbar -->
    <header class="main-header">
      @include('layout.header')
    </header>

    <!-- sidebar-->
    <aside class="main-sidebar">
      @include('layout.sidebar')
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="container-full">

        <!-- Main content -->
        <section class="content">
          @yield('content')
        </section>
        <!-- /.content -->
      </div>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      @include('layout.footer')
    </footer>
  </div>
  <!-- ./wrapper -->
  <script src="../assets/js/pegawai.js"></script>
  @include('layout.script')
</body>

</html>