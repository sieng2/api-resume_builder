<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resume</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/resume.css">

</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-12 col-md-2 sidebar text-center d-flex flex-column align-items-center py-4">
        <img src="../image/profile.png" alt="Admin" class="mb-3" />
        <h5 class="mb-4 fw-semibold">Admin</h5>
        <div class="nav flex-column w-100 px-2">
          <a class="nav-link d-flex align-items-center gap-2" href="dashboard">
            <i class="bi bi-speedometer2 fs-5"></i> <span>Dashboard</span>
          </a>
          <a class="nav-link d-flex align-items-center gap-2" href="users">
            <i class="bi bi-people-fill fs-5"></i> <span>Users</span>
          </a>
          <a class="nav-link active d-flex align-items-center gap-2" href="template">
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
        <h4 class="mb-4">Resume’s User ID: 1</h4> {{--get id from user--}}
        <div class="table-container">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>No.</th>
                <th>Owner</th>
                <th>Template</th>
                <th>Created At</th>
                <th>Actions</th>
              </tr>
            </thead>
          {{-- example --}}
            <tbody>
              <tr>
                <td>1</td>
                <td>Alice</td>
                <td>Modern Layout</td>
                <td>2024-05-01</td>
                <td class="action-links">
                  <a href="#">Preview</a>
                  <a href="#">Delete</a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Bob</td>
                <td>Classic Format</td>
                <td>2024-06-15</td>
                <td class="action-links">
                  <a href="#">Preview</a>
                  <a href="#">Delete</a>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Charlie</td>
                <td>Creative Style</td>
                <td>2024-07-10</td>
                <td class="action-links">
                  <a href="#">Preview</a>
                  <a href="#">Delete</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
