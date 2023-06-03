<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/style.css')
    <title>Register</title>
  </head>
  <body>
    <div class="form">
      <div class="form-container">
        <form action="/users" method="POST">
            @csrf
          <h2>Register</h2>
          <div class="form-list">
            <label for="name">Username</label>
            <input
              type="text"
              name="name"
              id="name"
              value="{{old('name')}}"
              placeholder="Username"
            />
          </div>
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
              placeholder="Enter Password"
              value="{{old('password')}}"
            />
          </div>
          <div class="form-option">
            <p>Already have an account? <a href="/login">Login</a> here.</p>
            <button type="submit">Register</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
