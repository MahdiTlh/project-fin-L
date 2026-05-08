<?php
$title = "Register - My Document";
$css = "register.css";
require '../includes/headerSec.php';
?>




    <section class="section bg-light auth-section">
        <div class="container">
            <div class="auth-card">
                <h2>Create an Account</h2>
                <p>Join us to easily report and search documents</p>
                <form id="registerForm" action="../php/register.php" method="POST" novalidate>

                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="name" name="name" required placeholder="Enter your full name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" id="email" name="email" required placeholder="Enter your email">
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="password" name="password" required placeholder="Create a password">
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
                    </div>

                    <div id="error-message" class="error-message"></div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                    <div class="auth-links">
                        <p>Already have an account? <a href="../Login/login.php">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>




<?php require '../includes/footer.php'; ?>