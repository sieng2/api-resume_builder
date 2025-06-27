<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/dashboard.css" />
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-12 col-md-2 sidebar text-center d-flex flex-column align-items-center py-4">
        <img src="../image/profile.png" alt="Admin" class="mb-3" />
        <h5 class="mb-4 fw-semibold">Admin</h5>
        <div class="nav flex-column w-100 px-2">
          <a class="nav-link active d-flex align-items-center gap-2" href="dashboard">
            <i class="bi bi-speedometer2 fs-5"></i> <span>Dashboard</span>
          </a>
          <a class="nav-link d-flex align-items-center gap-2" href="users">
            <i class="bi bi-people-fill fs-5"></i> <span>Users</span>
          </a>
          <a class="nav-link d-flex align-items-center gap-2" href="template">
            <i class="bi bi-file-earmark-text fs-5"></i> <span>Templates</span>
          </a>
          <hr class="text-white my-3" />
          <a class="nav-link d-flex align-items-center gap-2" href="#">
            <i class="bi bi-gear-fill fs-5"></i> <span>Settings</span>
          </a>
          <a class="nav-link d-flex align-items-center gap-2 text-danger" href="login">
            <i class="bi bi-box-arrow-right fs-5"></i> <span>Logout</span>
          </a>
        </div>
      </nav>


      <!-- Main Content -->
      <main class="col-md-10 ms-sm-auto col-lg-10 main-content">
        <h4 class="mb-4">Admin Dashboard</h4>
        <div class="row g-3">
          <div class="col-md-4">
            <div class="card-box box-users">
              <h5>Total Users</h5>
              <h3>72</h3> {{--will connect to db and count exact number of user--}}
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box box-resumes">
              <h5>Total Resumes</h5>
              <h3>33</h3> {{--will connect to db and count exact number of Resume--}}
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box box-templates">
              <h5>Total Templates</h5>
              <h3>27</h3> {{--will connect to db and count exact number tamblate--}}
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
