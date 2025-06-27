<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/css/login.css" />
</head>
<body class="d-flex justify-content-center align-items-center">

  <div class="login-box text-center">
    <h4 class="mb-4 fw-bold">Log In</h4>
    <form action="/dashboard">
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required />
        <label for="floatingEmail">Email</label>
      </div>

      <div class="form-floating mb-4">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required />
        <label for="floatingPassword">Password</label>
      </div>

      <button type="submit" class="btn btn-gradient w-100 p-3">Login</button>
    </form>
  </div>

</body>
</html>
