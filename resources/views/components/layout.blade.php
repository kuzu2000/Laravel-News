<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
      charset="utf-8"
    ></script>
    @vite('resources/css/admin-style.css')
    <title>@yield('title')</title>
  </head>
  <body>
    <!-- NavBar -->
    @include('Admin.components.nav')
    <!--Content-->
    <div class="content-container">
      @include('Admin.components.sidebar')
      {{$slot}}
    </div>
    <script>
     

      const btn = document.querySelector('.dropdown-btn');
      const content = document.querySelector('.dropdown-content');
      btn.onclick = () => {
        content.classList.toggle('show');
      };

      const contentmenubtn = document.querySelector('.content-menu-button');
      const menu = document.querySelector('.menu-content');

      $(document).ready(function () {
        $('.content-menu-button').click(function () {
          $(this).next('.menu-content').slideToggle();
          $(this).find('.dropdown-btn').toggleClass('rotate');
        });
      });
    </script>
      @stack('scripts')
  </body>
</html>
