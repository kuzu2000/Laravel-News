<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/style.css')
    <title>Login</title>
  </head>
  <body>
    <div class="form">
      <div class="form-container">
        <form action="/users/authenticate" method="POST">
            @csrf
          <h2>Login</h2>
          <div class="form-list">
            <label for="email">Email Address</label>
            <input
              type="email"
              name="email"
              id="email"
              value="{{old('email')}}"
              placeholder="Email Address"
            />
          </div>
          <div class="form-list">
            <label for="password">Password</label>
            <input
              type="password"
              name="password"
              id="password"
              value="{{old('password')}}"
              placeholder="Enter Password"
            />
          </div>
          <div class="form-option">
            <p>Don’t have an account? <a href="/register">Sign Up</a> here</p>
            <button type="submit">Login</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
