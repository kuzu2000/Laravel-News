<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/style.css')
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>World News</title>
  </head>
  <body>
    <header id="header">
      <div class="header-bar">
        <div class="header">
          <i id="menu-btn" class="fas fa-bars"></i>
          <a class="logo" href="/">World News</a>
        </div>
        <div class="header-links">
          <div class="header-item">
            <form action="{{ route('search') }}" method="GET">
              <input type="text" name="query" id=""  />
              <i class="fas fa-search"></i>
            </form>
          </div>
          @auth
          <div class="header-item">
            <a href="/myaccount" class="subscribe-btn">My Account</a>
          </div>
          <div class="header-item logout">
            <form method="POST" action="/logout">
              @csrf
            <button type="submit" class="subscribe-btn logout">Sign out</button>
            </form>
          </div>
          @else
          <div class="header-item">
            <a href="/login" class="login-btn">Login</a>
          </div>
          <div class="header-item">
            <a href="/plans" class="subscribe-btn">Subscribe</a>
          </div>
          @endauth
          
        </div>
      </div>
    </header>
    <nav>
      <div class="navbar">
        <header id="header-nav">
          <a>World News</a>
          <i class="fas fa-times" id="close-btn"></i>
        </header>
        <ul class="nav-links">
          @foreach ($categories as $category)
          <li class="nav-item">
            <a class="dropdown-btn" onclick="openMenu('{{$category->id}}')"
              >{{$category->name}} <i id="{{$category->id}}rotate" class="fas fa-chevron-down"></i
            ></a>
            @if(count($category->subcategory) > 0)
            <div class="open-menu dropdown-menu" id="{{$category->id}}">
              @foreach($category->subcategory as $subCategory)
              <a href="/news/category/{{$subCategory->name}}">{{$subCategory->name}}</a> 
              @endforeach
            </div>
            @endif
          </li>
          @endforeach
        </ul>
        @auth
        <a href="/myaccount" class="nav-login">My Account</a>
        @else
        <a class="nav-login" href="/login">Log in</a> 
        @endauth
      </div>
    </nav>
    {{$slot}}
    <section class="news-letter">
      <div class="news-letter-container">
        <h1>Subscribe to the newsletter</h1>
        <p>Get a weekly digest of our most important stories direct to your inbox.</p>
        <form>
          <input type="email" name="email" href="mailto:" placeholder="Enter your email...">
          <button>Subscribe</button>
        </form>
      </div>
    </section>
    <script>
       const menuBtn = document.querySelector('#menu-btn');
const navbar = document.querySelector('nav');
menuBtn.onclick = () => {
  navbar.style.left = '0%';
};

const closeBtn = document.querySelector('#close-btn');
closeBtn.onclick = () => {
  navbar.style.left = '-100%';
};

function openMenu(id) {
  document.getElementById(id).classList.toggle("dropdown-menu");
  document.getElementById(id + "rotate").classList.toggle('fa-chevron-up');
}
    </script>
    @stack('scripts')
  </body>
</html>
{{-- href="/news/category/{{$category->id}}" --}}