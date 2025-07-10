<?php   
session_start();
?>

<style>
  .color-black {
            color: black !important;
        }
        .color-blue {
            color: #3498db !important;
        }
        .text-center {
            text-align: center !important;
        }
        .for-background {
            background-color: rgba(var(--bs-warning-rgb),var(--bs-text-opacity)) !important;
        }
</style>
<?php   


echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-gradient py-3 shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold fs-3" href="/trial/index.php">
      <span class="text-warning">QUERIES HUB</span> 
    </a>
    <button class="navbar-toggler for-background border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link px-3 color-blue active" href="/trial/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link color-blue px-3" href="/trial/partials/_about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link color-blue px-3" href="/trial/partials/_contect.php">Contact</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link color-blue px-3 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Categories
          </a>
          <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/trial/partials/threadlist.php?catid=1">Technology</a></li>
        <li><a class="dropdown-item" href="/trial/partials/threadlist.php?catid=2">Programming</a></li>
        <li><a class="dropdown-item" href="/trial/partials/threadlist.php?catid=3">Database</a></li>
        <li><a class="dropdown-item" href="/trial/partials/threadlist.php?catid=3">Web Development</a></li>
          </ul>
        </li>
      </ul>';
      
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") {
        echo '<div class="d-flex align-items-center">
          <span class="text-light color-black me-3">Welcome, '. $_SESSION['user_name'] .'</span>
          <a href="/trial/partials/_logout.php" class="btn btn-warning px-4">Logout</a>
        </div>';
      } else {
        echo '<div class="d-flex gap-2">
          <button class="btn btn-warning px-4" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
          <button class="btn btn-outline-warning px-4" data-bs-toggle="modal" data-bs-target="#sighinModal">Sign Up</button>
        </div>';
      }
      
    echo '</div>
  </div>
</nav>



<!--login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-gradient p-4 border-0">
        <div class="text-center w-100">
            <h1 class="modal-title color-blue fs-4 fw-bold" id="loginModalLabel">Welcome Back!</h1>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <form action="/trial/partials/_handleLogin.php" method="POST">
          <div class="mb-4">
            <label for="loginEmail" class="form-label fw-semibold">Email Address</label>
            <div class="input-group">
              <input type="email" class="form-control bg-light border-0" name="loginEmail" id="loginEmail" 
                placeholder="Enter your email">
            </div>
          </div>
          <div class="mb-4">
            <label for="loginPassword" class="form-label fw-semibold">Password</label>
            <div class="input-group">
              <input type="password" class="form-control bg-light border-0" name="loginPassword" id="loginPassword"
                placeholder="Enter your password">
            </div>
            <div class="form-text mt-2">Password must be 8-20 characters long</div>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Login</button>
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Signup Modal -->
<div class="modal fade" id="sighinModal" tabindex="-1" aria-labelledby="sighinModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow">
      <div class="modal-header bg-gradient p-4 border-0">
        <div class="text-center w-100">
          <h1 class="modal-title color-blue fs-4 fw-bold" id="sighinModalLabel">Create Account</h1>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <form action="/trial/partials/_handleSignup.php" method="POST">
          <div class="mb-4">
            <label for="signupName" class="form-label fw-semibold">Full Name</label>
            <input type="text" class="form-control bg-light border-0" id="signupName" name="signupName" placeholder="Enter your full name">
          </div>
          <div class="mb-4">
            <label for="signupEmail1" class="form-label fw-semibold">Email Address</label>
            <input type="email" class="form-control bg-light border-0" id="signupEmail1" name="signupEmail" placeholder="Enter your email">
            <div class="form-text mt-2">We\'ll never share your email with anyone else.</div>
          </div>
          <div class="mb-4">
            <label for="signupPassword" class="form-label fw-semibold">Password</label>
            <input type="password" class="form-control bg-light border-0" id="signupPassword" name="signupPassword" placeholder="Create password">
            <div class="form-text mt-2">Password must be 8-20 characters long</div>
          </div>
          <div class="mb-4">
            <label for="signupcPassword" class="form-label fw-semibold">Confirm Password</label>
            <input type="password" class="form-control bg-light border-0" id="signupcPassword" name="signupcPassword" placeholder="Confirm password">
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Create Account</button>
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '<div class="alert my-0 alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account has been created successfully - You can login now.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false") {
    $showError = $_GET['error'];
    echo '<div class="alert my-0 alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '. $showError .'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
if(isset($_GET['logedin']) && $_GET['logedin'] == "false") {
    $showError = $_GET['error'];
    echo '<div class="alert my-0 alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '. $showError .'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
 ?>
