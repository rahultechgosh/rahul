<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Queries Hub - Modern Blog Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #3498db;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
    }

    .navbar {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .hero-section {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        padding: 4rem 0;
        margin-bottom: 2rem;
        color: white;
    }

    .carousel-item img {
        height: 60vh;
        object-fit: cover;
        filter: brightness(0.8);
    }

    .card {
        transition: transform 0.3s ease;
        border: none;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card img {
        height: 200px !important;
        object-fit: cover;
    }

    .card-title a {
        text-decoration: none;
        color: var(--primary-color);
    }

    .btn-primary {
        background-color: var(--secondary-color);
        border: none;
        padding: 0.5rem 1.5rem;
    }

    .section-title {
        position: relative;
        padding-bottom: 1rem;
        margin-bottom: 2rem;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background-color: var(--secondary-color);
    }

    .search-bar {
        margin: 2rem 0;
    }

    .color-white {
        color: white !important;
    }

    .publish-section {
        display: flex;
        flex-wrap: wrap;
        background: white;
        border-radius: 16px;
        padding: 30px;

        gap: 30px;
        align-items: center;
        width: 100%;
    }

    .publish-image {
        flex: 1;
        min-width: 280px;
        box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.25);
    }

    .publish-image img {
        width: 100%;
        max-width: 400px;
    }

    .publish-content {
        flex: 1;
        min-width: 280px;
    }

    .publish-content h2 {
        font-size: 35px;
        margin-bottom: 20px;
    }

    .publish-content ul {
        list-style: none;
        margin-bottom: 20px;
    }

    .publish-content li {
        margin-bottom: 12px;
        font-size: 15px;
        color: #374151;
    }

    .publish-content li::before {
        content: "✔️";
        margin-right: 8px;
        color: #10b981;
    }

    .publish-buttons button {
        padding: 10px 18px;
        margin-right: 10px;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
    }

    .publish-buttons a {
        border-bottom: none;
        text-decoration: none;
    }

    .btn-blue {
        background-color: #2563eb;
        color: white;
    }

    .for-scroll {
        overflow-y: auto;
    }

    .btn-outline {
        background: white;
        font-size: 18px;
        color: #2563eb;
    }

    @media (max-width: 768px) {
        .article-list {
            flex-direction: column;
            align-items: center;
        }

        .publish-section {
            flex-direction: column;
        }
    }
    </style>
</head>

<body>
    <?php include 'partials/_header.php'; ?>


    <div class="hero-section text-center">
        <div class="container">
            <h1>Welcome to Queries Hub</h1>
            <p class="lead">Discover Amazing Content & Share Your Knowledge</p>
            <div class="search-bar">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <input type="search" class="form-control" placeholder="Search blogs...">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <h2 class="section-title">Trending Blogs</h2>

        <div class="row for-scroll g-4">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "test");
            $sql = "SELECT * FROM `trial blogs` ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 col-lg-3">
                        <div class="card h-100">
                            <img src="'. $row["image"] .'" class="card-img-top" alt="Blog Image">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="partials/_threadlist.php?id='. $row["id"] .'">'. $row["title"] .'</a>
                                </h5>
                                <p class="card-text">'. substr($row["description"], 0, 100) .'...</p>
                                <a href="partials/_threadlist.php?id='. $row["id"] .'" class="btn btn-warning">
                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                            <div class="card-footer text-muted">
                                <small><i class="fas fa-clock me-1"></i> Posted on: '. date('M d, Y') .'</small>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<div class="col-12 text-center">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> No blog posts found.
                    </div>
                </div>';
            }
            $conn->close();
            ?>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="section-title">New Blogs</h2>

        <div class="row for-scroll g-4">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "test");
            $sql = "SELECT * FROM `trial blogs` ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 col-lg-3">
                        <div class="card h-100">
                            <img src="'. $row["image"] .'" class="card-img-top" alt="Blog Image">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="partials/_threadlist.php?id='. $row["id"] .'">'. $row["title"] .'</a>
                                </h5>
                                <p class="card-text">'. substr($row["description"], 0, 100) .'...</p>
                                <a href="partials/_threadlist.php?id='. $row["id"] .'" class="btn btn-warning">
                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                            <div class="card-footer text-muted">
                                <small><i class="fas fa-clock me-1"></i> Posted on: '. date('M d, Y') .'</small>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<div class="col-12 text-center">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> No blog posts found.
                    </div>
                </div>';
            }
            $conn->close();
            ?>
        </div>
    </div>

    <div class="publish-section container mt-5">
        <div class="publish-image">
            <img src="Untitled (604 x 427 px) 1.png" alt="">
        </div>
        <div class="publish-content">
            <h2>Write and Publish Your Blogs</h2>
            <ul>
                <li>No cost to join</li>
                <li>Post a job and hire top talent</li>
                <li>Work with the best—without breaking the bank</li>
            </ul>
            <div class="publish-buttons">
                <button class="btn-blue" data-bs-toggle="modal" data-bs-target="#sighinModal">Sign up for free</button>
                <a class="btn-outline" href="/trial/partials/_about.php">Learn how to write</a>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="section-title">Tech Blogs</h2>

        <div class="row for-scroll g-4">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "test");
            $sql = "SELECT * FROM `trial blogs` ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 col-lg-3">
                        <div class="card h-100">
                            <img src="'. $row["image"] .'" class="card-img-top" alt="Blog Image">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="partials/_threadlist.php?id='. $row["id"] .'">'. $row["title"] .'</a>
                                </h5>
                                <p class="card-text">'. substr($row["description"], 0, 100) .'...</p>
                                <a href="partials/_threadlist.php?id='. $row["id"] .'" class="btn btn-warning">
                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                            <div class="card-footer text-muted">
                                <small><i class="fas fa-clock me-1"></i> Posted on: '. date('M d, Y') .'</small>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<div class="col-12 text-center">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> No blog posts found.
                    </div>
                </div>';
            }
            $conn->close();
            ?>
        </div>
    </div>

    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>