
    <!doctype html>
    <html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Queries Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .thread-card {
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .thread-card:hover {
        transform: translateY(-5px);
    }

    .main-title {
        color: #2c3e50;
        font-weight: 700;
        margin-bottom: 2rem;
    }

    .question-form {
        background: white;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-custom {
        background: #2c3e50;
        color: white;
        padding: 10px 25px;
        border-radius: 25px;
        border: none;
    }

    .btn-custom:hover {
        background: #34495e;
        color: white;
    }

    .thread-link {
        text-decoration: none;
        color: #2c3e50;
    }

    .thread-link:hover {
        color: #3498db;
    }

    .user-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 2px solid #fff;
    }
    .width {
        width: 100% !important;
    }
    </style>
</head>

<body>

<?php 

// error_reporting(E_ALL);
//     ini_set('display_errors', 1);
    
include '_header.php'; 

if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'. $_SESSION['success'] .'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['success']); // Ek baar dikhane ke baad hata do
}
    
    ?>

<?php
 
    $conn = mysqli_connect("localhost", "root", "", "test");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_SESSION['user_email'])) {
        $user_email = $_SESSION['user_email'];
        $sql2 = "SELECT * FROM `sighup` WHERE user_email = '$user_email'";
        $result2 = mysqli_query($conn, $sql2);
        if($result2) {
            $row2 = $result2->fetch_assoc();
            $signup_user_id = $row2['sighup_id'];
        }
    }
    
    $method = $_SERVER['REQUEST_METHOD'];
    $showalert = false;
    if ($method == 'POST' && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") {
        $desc = $_POST['desc'];
        $id = $_GET['id'];
        $sql = "INSERT INTO `threadlist` (`thread_description`, `thread_blog_id`, `thread_user_id`, `time`) 
                VALUES ('$desc', '$id', '$signup_user_id', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        
        if($result) { 
            $showalert = true;

            $_SESSION['success'] = "<strong>Success!</strong> Your question has been posted.";
            header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $id);
            
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Failed to post your question. Please try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }

    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM `trial blogs` WHERE id = '$id'";
        $result = $conn->query($sql);
        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $cattile = htmlspecialchars($row['title']);
            $catdesc = htmlspecialchars($row['description']);
        } else {
            echo '<div class="alert alert-danger" role="alert">
                <strong>Error!</strong> Blog not found.
            </div>';
            exit();
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
            <strong>Error!</strong> Invalid blog ID.
        </div>';
        exit();
    }
    ?>

<div class="container py-5">
        <!-- Main Topic Card -->
        <div class="card thread-card mb-5">
            <div class="card-body p-4">
                <h2 class="card-title fw-bold"><?php echo htmlspecialchars($cattile); ?></h2>
                <p class="card-text text-muted"><?php echo htmlspecialchars($catdesc); ?></p>
            </div>
        </div>

        <!-- Question Form Section -->
        <div class="row mb-5">
            <div class="col-lg-8 width">
                <h3 class="main-title text-center"><i class="fas fa-question-circle me-2"></i>Ask a Question</h3>
                <div class="question-form">
                    <?php
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") {
        
                  echo '<form action="'. htmlspecialchars($_SERVER['REQUEST_URI']) .'" method="POST">
                        <div class="mb-4">
                            <label for="desc" class="form-label">Your Question</label>
                            <textarea class="form-control" name="desc" id="desc" rows="3" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-custom"><i class="fas fa-paper-plane me-2"></i>Submit
                                Question</button>
                        </div>
                    </form>';
                    } else {
                        echo '<div class="alert alert-warning" role="alert">
                            <strong>Please log in to ask a question.</strong>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Questions List Section -->
        <h3 class="main-title text-center mb-4"><i class="fas fa-comments me-2"></i>Browse Questions</h3>
        <div class="row">
            <div class="col-lg-8 width">
                <?php
    $id = $_GET['id']; 
    $id = mysqli_real_escape_string($conn, $id);
    $sql = "SELECT t.*, s.user_name 
            FROM `threadlist` t 
            LEFT JOIN `sighup` s ON t.thread_user_id = s.sighup_id 
            WHERE t.thread_blog_id = '$id' 
            ORDER BY t.time DESC";
    $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $username = htmlspecialchars($row['user_name'] ?? 'Unknown User');   
            echo '<div class="card thread-card mb-4">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center mb-3">
                    <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg" 
                       alt="User Avatar" class="user-avatar me-3">
                    <h4 class="mb-0">
                      <a href="/trial/thread.php?thread_id=' . htmlspecialchars($row['thread_id']) . '" 
                         class="thread-link">' . $username . '</a>
                    </h4>
                    <small class="text-muted ms-auto">' . date('F j, Y, g:i a', strtotime($row['time'])) . '</small>
                  </div>
                  <p class="card-text text-muted">' . htmlspecialchars($row['thread_description']) . '</p>
                </div>
              </div>';
          }
        } else {
          echo '<div class="card thread-card">
              <div class="card-body p-4 text-center">
                <i class="fas fa-inbox fa-3x mb-3 text-muted"></i>
                <h4>No questions yet</h4>
                <p class="text-muted">Be the first one to ask a question!</p>
              </div>
              </div>';
        }
        
        ?>
            </div>
        </div>
    </div>

    


<?php include '_footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>