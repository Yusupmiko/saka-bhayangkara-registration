<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Premium Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #5f2c82;
            --secondary-color: #49a09d;
            --dark-color: #2c3e50;
            --light-color: #f8f9fa;
            --error-color: #e74c3c;
            --success-color: #2ecc71;
            --text-color: #34495e;
            --border-radius: 12px;
            --box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--text-color);
            background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
            background-blend-mode: overlay;
            background-color: rgba(95, 44, 130, 0.85);
        }
        
        .login-container {
            background-color: white;
            width: 420px;
            padding: 50px 40px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }
        
        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .login-header h2 {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
            font-size: 28px;
            letter-spacing: 0.5px;
        }
        
        .login-header p {
            font-size: 15px;
            color: #7f8c8d;
            font-weight: 400;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-group input {
            width: 100%;
            padding: 15px 20px 15px 45px;
            border: 1px solid #e0e3e9;
            border-radius: var(--border-radius);
            font-size: 15px;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
            color: var(--text-color);
        }
        
        .form-group input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(95, 44, 130, 0.1);
            background-color: white;
        }
        
        .form-group i {
            position: absolute;
            left: 18px;
            top: 16px;
            color: #95a5a6;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        
        .form-group input:focus + i {
            color: var(--primary-color);
        }
        
        .form-group label {
            position: absolute;
            left: 45px;
            top: 15px;
            color: #95a5a6;
            font-size: 15px;
            transition: all 0.3s ease;
            pointer-events: none;
            background: transparent;
            padding: 0 5px;
        }
        
        .form-group input:focus + i + label,
        .form-group input:not(:placeholder-shown) + i + label {
            top: -10px;
            left: 40px;
            font-size: 12px;
            color: var(--primary-color);
            background: white;
            padding: 0 8px;
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 14px;
            margin: -15px 0 20px;
            display: block;
            text-align: center;
            animation: fadeIn 0.4s ease;
            font-weight: 500;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .login-button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: var(--border-radius);
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }
        
        .login-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .login-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(95, 44, 130, 0.3);
        }
        
        .login-button:hover::before {
            left: 100%;
        }
        
        .forgot-password {
            text-align: center;
            margin-top: 25px;
        }
        
        .forgot-password a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
        }
        
        .forgot-password a:hover {
            color: var(--secondary-color);
        }
        
        .forgot-password a i {
            margin-left: 5px;
            font-size: 12px;
        }
        
        .decoration {
            position: absolute;
            z-index: -1;
        }
        
        .decoration-circle {
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .circle-1 {
            width: 120px;
            height: 120px;
            top: -50px;
            right: -50px;
        }
        
        .circle-2 {
            width: 80px;
            height: 80px;
            bottom: -30px;
            left: -30px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .remember-me input {
            margin-right: 10px;
        }
        
        .remember-me label {
            font-size: 14px;
            color: var(--text-color);
        }
        
        .footer-text {
            text-align: center;
            margin-top: 30px;
            font-size: 13px;
            color: #95a5a6;
        }
        
        @media (max-width: 480px) {
            .login-container {
                width: 90%;
                padding: 40px 25px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="decoration decoration-circle circle-1"></div>
        <div class="decoration decoration-circle circle-2"></div>
        
        <div class="login-header">
            <h2>Welcome Back</h2>
            <p>Sign in to access your dashboard</p>
        </div>
        
        <?php if ($this->session->flashdata('error')): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i> <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
        
        <form method="post" action="<?php echo base_url('auth/login'); ?>">
            <div class="form-group">
                <input type="text" name="username" id="username" placeholder=" " required>
                <i class="fas fa-user"></i>
                <label for="username">Username</label>
            </div>
            
            <div class="form-group">
                <input type="password" name="password" id="password" placeholder=" " required>
                <i class="fas fa-lock"></i>
                <label for="password">Password</label>
            </div>
            
            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>
            
            <button type="submit" class="login-button">
                Sign In <i class="fas fa-arrow-right"></i>
            </button>
        </form>
        
        <div class="forgot-password">
            <a href="#">
                Forgot password? <i class="fas fa-question-circle"></i>
            </a>
        </div>
        
        <div class="footer-text">
            &copy; 2023 Premium Portal. All rights reserved.
        </div>
    </div>
</body>
</html>