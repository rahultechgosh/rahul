<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - Queries Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
        }
        .contact-form {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 20px;
            max-width: 800px;
        }

        .contact-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .contact-info i {
            color: #0d6efd;
            font-size: 24px;
            margin-right: 10px;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 20px;
        }

        .btn-submit {
            background: #0d6efd;
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            border: none;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background: #0b5ed7;
            transform: translateY(-2px);
        }
         .hero-section {
             background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            background-size: cover;
            height: 48vh;
            display: flex;
            align-items: center;
            color: white;
        }
    </style>
</head>

<body>
    <?php include '_header.php'; ?>
 <!-- Hero Section -->
    <div class="hero-section">
        <div class="container text-center">
            <h1 class="display-3 fw-bold">Make your Future</h1>
            <p class="lead">Knowledge Through Community</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- Content Section (50%) -->
            <div class="col-md-6">
                <div class="content-section p-4">
                    <div class="about-content">
                        <h4>Why Choose Us?</h4>
                        <p>We are dedicated to providing the best support and solutions for all your queries. Our team of experts is available 24/7 to assist you.</p>
                        
                        <h4 class="mt-4">Our Services</h4>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-primary me-2"></i> 24/7 Technical Support</li>
                            <li><i class="fas fa-check text-primary me-2"></i> Expert Consultation</li>
                            <li><i class="fas fa-check text-primary me-2"></i> Quick Response Time</li>
                            <li><i class="fas fa-check text-primary me-2"></i> Comprehensive Solutions</li>
                        </ul>

                        <h4 class="mt-4">Our Process</h4>
                        <p>1. Submit your query through the form</p>
                        <p>2. Our team reviews your request</p>
                        <p>3. Get expert solution within 24 hours</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form Section (50%) -->
            <div class="col-md-6">
                    
                    <div class="container">
        <div class="contact-form">
            <h2 class="text-center mb-4">Contact Us</h2>
            
            <div class="contact-info">
                <div class="row">
                    <div class="col-md-4">
                        <p><i class="fas fa-map-marker-alt"></i> Location</p>
                        <p class="text-muted">Your Address Here</p>
                    </div>
                    <div class="col-md-4">
                        <p><i class="fas fa-phone"></i> Phone</p>
                        <p class="text-muted">+1 234 567 890</p>
                    </div>
                    <div class="col-md-4">
                        <p><i class="fas fa-envelope"></i> Email</p>
                        <p class="text-muted">contact@example.com</p>
                    </div>
                </div>
            </div>

            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" placeholder="Enter your full name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" placeholder="Enter subject">
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" rows="4" placeholder="Enter your message"></textarea>
                </div>

                <div class="mb-3">
                    <label for="attachment" class="form-label">Attachment (if any)</label>
                    <input class="form-control" type="file" id="attachment">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-submit">Send Message</button>
                </div>
            </form>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>