<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'test');

// Initialize database connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Handle comment submission
$showAlert = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $threadId = $_GET['thread_id'];
    
    $commentDesc = filter_input(INPUT_POST, 'textarea', FILTER_SANITIZE_STRING);
    




    $stmt = $conn->prepare("INSERT INTO comments (comment_desc, thread_id) VALUES (?, ?)");
    $stmt->bind_param("si", $commentDesc, $threadId);
    $stmt->execute();

    if($stmt) { 
        $showalert = true;
      

        $_SESSION['success'] = "<strong>Success!</strong> Your question has been posted.";
        header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $threadId);
        
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Failed to post your comment. Please try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

// Get thread details
$threadId = filter_input(INPUT_GET, 'thread_id', FILTER_SANITIZE_NUMBER_INT);
$stmt = $conn->prepare("SELECT * FROM threadlist WHERE thread_id = ?");
$stmt->bind_param("i", $threadId);
$stmt->execute();
$thread = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Discussion Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .discussion-card { background: #2c3e50; color: white; border-radius: 10px; }
        .comment-form { background: #f8f9fa; padding: 20px; border-radius: 10px; }
        .comment-card { transition: transform 0.2s; }
        .comment-card:hover { transform: translateY(-5px); }
        .user-avatar { width: 50px; height: 50px; object-fit: cover; }
        .timestamp { font-size: 0.8rem; color: #adb5bd; }
    </style>
</head>
<body class="bg-light">
    <?php include 'partials/_header.php'; ?>

    <?php if ($showAlert): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> Comment added successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="container py-4">
        <!-- Thread Details -->
        <div class="discussion-card p-4 mb-4">
            <h2><i class="fas fa-user-circle"></i> <?= htmlspecialchars($thread['thread_title']) ?></h2>
            <p class="lead"><?= htmlspecialchars($thread['thread_description']) ?></p>
        </div>

        <!-- Comment Form -->
        <div class="comment-form mb-4">
            <h3><i class="fas fa-comment"></i> Add Your Comment</h3>
            <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") {
        
                  echo '
            <form action="'. htmlspecialchars($_SERVER['REQUEST_URI']) .'" method="POST">
                <div class="mb-3">
                    <label class="form-label">Your Comment</label>
                    <textarea class="form-control" name="textarea" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Submit</button>
            </form>';
            header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $id);
            } else {
                echo '<div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i> Please login to add a comment.
                      </div>';
            }
            ?>
        </div>

        <!-- Comments Section -->
        <h3 class="mb-4"><i class="fas fa-comments"></i> Discussions</h3>
        <div class="comments-container">
             <?php
            $stmt = $conn->prepare("SELECT * FROM comments WHERE thread_id = ?");
            $stmt->bind_param("i", $threadId);
            $stmt->execute();
            $comments = $stmt->get_result();

            if ($comments->num_rows > 0){
                while ($comment = $comments->fetch_assoc()){
                    $user_email = $_SESSION['user_email'];
                $sql2 = "SELECT * FROM `sighup` WHERE user_email = '$user_email'";
                $result = mysqli_query($conn, $sql2);
                $row = mysqli_fetch_assoc($result);
                echo    '<div class="card comment-card mb-3 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-icon-vector-social-media-user-image-182145777.jpg" 
                                     class="user-avatar rounded-circle me-2">
                                <div>
                                    <h5 class="mb-0">' .$row["user_name"] . '</h5>
                                    <span class="timestamp">' . date('F j, Y, g:i a', strtotime($comment['date'])) .'</span>
                                </div>
                            </div>
                            <p class="card-text">'. htmlspecialchars($comment['comment_desc']) . '</p>
                        </div>
                    </div>
                    ';
                }}
                
            else {
                echo '<div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> No comments yet. Be the first to comment!
                </div>';
            }
            ?> 
            </div>
            </div>
        

    <?php include 'partials/_footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
