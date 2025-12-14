<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple LMS - Modern Learning Platform</title>
    <link href="https://fonts.bunny.net/css?family=Inter:400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }
        
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: moveGrid 20s linear infinite;
        }
        
        @keyframes moveGrid {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            color: white;
            padding: 100px 0;
        }
        
        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        
        .hero-subtitle {
            font-size: 1.5rem;
            opacity: 0.95;
            margin-bottom: 2rem;
        }
        
        .feature-card {
            background: white;
            border-radius: 24px;
            padding: 2.5rem;
            height: 100%;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: none;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }
        
        .icon-instructor {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }
        
        .icon-student {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
        }
        
        .icon-courses {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: white;
        }
        
        .icon-learning {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            color: white;
        }
        
        .btn-hero {
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            border: none;
            transition: all 0.3s ease;
        }
        
        .btn-primary-hero {
            background: white;
            color: #667eea;
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.3);
        }
        
        .btn-primary-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 255, 255, 0.4);
        }
        
        .btn-outline-hero {
            background: transparent;
            color: white;
            border: 2px solid white;
        }
        
        .btn-outline-hero:hover {
            background: white;
            color: #667eea;
            transform: translateY(-3px);
        }
        
        
        .features-section {
            padding: 80px 0;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        .floating {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body>
    <section class="hero-section d-flex align-items-center">
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="animate__animated animate__fadeInLeft">
                        <h1 class="hero-title">Learn Without Limits</h1>
                        <p class="hero-subtitle">Transform your future with our innovative learning management system. Create, teach, and master new skills.</p>
                        
                        @auth
                            <div class="d-flex gap-3 flex-wrap">
                                <a href="{{ route('dashboard') }}" class="btn btn-hero btn-primary-hero">
                                    <i class="bi bi-speedometer2 me-2"></i> Go to Dashboard
                                </a>
                            </div>
                        @else
                            <div class="d-flex gap-3 flex-wrap">
                                <a href="{{ route('register') }}" class="btn btn-hero btn-primary-hero">
                                    <i class="bi bi-rocket-takeoff me-2"></i> Get Started Free
                                </a>
                                <a href="{{ route('login') }}" class="btn btn-hero btn-outline-hero">
                                    <i class="bi bi-box-arrow-in-right me-2"></i> Login
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="floating">
                        <img src="https://cdn-icons-png.flaticon.com/512/3976/3976625.png" alt="Learning" class="img-fluid" style="filter: drop-shadow(0 20px 40px rgba(0,0,0,0.2));">
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Everything You Need to Succeed</h2>
                <p class="lead text-muted">Powerful features designed for modern learning</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon icon-instructor">
                            <i class="bi bi-person-workspace"></i>
                        </div>
                        <h4 class="fw-bold mb-3">For Instructors</h4>
                        <p class="text-muted">Create engaging courses with our intuitive platform. Share your expertise with learners worldwide.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon icon-student">
                            <i class="bi bi-mortarboard"></i>
                        </div>
                        <h4 class="fw-bold mb-3">For Students</h4>
                        <p class="text-muted">Access quality courses, track progress, and achieve your learning goals at your own pace.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon icon-courses">
                            <i class="bi bi-collection"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Rich Content</h4>
                        <p class="text-muted">Comprehensive course materials with detailed lessons and learning resources.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon icon-learning">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Track Progress</h4>
                        <p class="text-muted">Monitor your learning journey with bookmarks and completion tracking.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>