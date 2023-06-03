<nav>
    <div class="navbar">
      <a href="">Dashboard</a>
      <div class="right-nav">
        <div class="search-input">
          <form action="{{ route('search') }}" method="GET">
          <input type="text" name="query" placeholder="Search..." />
          <span><i class="fas fa-search"></i></span>
          </form>
        </div>
        <div class="dropdown">
          <div class="dropdown-btn">Admin</div>
          <div class="dropdown-content show">
            <ul>
              <li>Profile</li>
              <li>Logout</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>