<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - Queries Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
        }
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            background-size: cover;
            height: 48vh;
            display: flex;
            align-items: center;
            color: white;
        }

        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .stats-box {
            padding: 2rem;
            text-align: center;
            background: #f8f9fa;
            border-radius: 10px;
            margin: 1rem 0;
        }

        .stats-box i {
            font-size: 2.5rem;
            color: #0d6efd;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <?php include '_header.php';?>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container text-center">
            <h1 class="display-3 fw-bold">About Queries Hub</h1>
            <p class="lead">Empowering Knowledge Through Community Engagement</p>
        </div>
    </div>

    <!-- Our Mission -->
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-6 order-md-2">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpR3yO1qvp1tUhBWyXqBjuLXHbMC4eHMBMXA&s" class="img-fluid rounded shadow p-3" alt="Our Mission">
            </div>
            <div class="col-md-6 order-md-1">
            <h2 class="fw-bold mb-4">Our Mission</h2>
            <p class="lead">To create a collaborative platform where knowledge seekers and experts come together to share, learn, and grow.</p>
            <p>We believe in the power of community-driven learning and aim to make quality information accessible to everyone.</p>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <div class="stats-box">
                    <i class="fas fa-users"></i>
                    <h3>10,000+</h3>
                    <p>Active Users</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-box">
                    <i class="fas fa-question-circle"></i>
                    <h3>50,000+</h3>
                    <p>Questions Answered</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-box">
                    <i class="fas fa-globe"></i>
                    <h3>100+</h3>
                    <p>Countries Reached</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-box">
                    <i class="fas fa-certificate"></i>
                    <h3>95%</h3>
                    <p>Satisfaction Rate</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Team -->
    <div class="container my-5">
        <h2 class="text-center mb-5">Our Team</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="team-member">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkGb0KXZff72_aNYCOMxSo3wBXLUugcSQItw&s" alt="Team Member">
                    <h4 class="mt-3">John Doe</h4>
                    <p class="text-muted">Founder & CEO</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="team-member">
                    <img src="https://i.pinimg.com/736x/77/71/68/7771683223d86b237a3304d6f32828b9.jpg" alt="Team Member">
                    <h4 class="mt-3">Jane Smith</h4>
                    <p class="text-muted">Technical Lead</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="team-member">
                    <img src="https://www.shutterstock.com/image-photo/head-shot-portrait-close-smiling-600nw-1714666150.jpg" alt="Team Member">
                    <h4 class="mt-3">Mike Johnson</h4>
                    <p class="text-muted">Community Manager</p>
                </div>
            </div>
        </div>
    </div>

    <?php include '_footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>