<?php
$title = "Login - My Document";
$css = "login.css";
require '../includes/headerSec.php';
?>


<?php $active = 'login'; ?>

    <section class="section bg-light auth-section">
        <div class="container">
            <div class="auth-card">
                <h2>Welcome Back</h2>
                <p>Log in to manage your documents</p>

                <?php if (!empty($_GET['error'])): ?>
                    <div class="auth-alert error" style="display: block !important; margin: 30px 0 !important;">
                        <span style="color: #ff0000 !important; font-weight: 800 !important; text-align: center !important; display: block !important;">
                            <?php 
                                if ($_GET['error'] == 'email') echo "Account not found. Please register or check your email.";
                                elseif ($_GET['error'] == 'pass') echo "Incorrect password. Please try again.";
                                elseif ($_GET['error'] == 'system') echo "System error. Please contact administrator.";
                                else echo "An error occurred. Please try again.";
                            ?>
                        </span>
                    </div>
                <?php endif; ?>

                <form id="loginForm" action="../php/login.php" method="POST">

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" id="email" name="email" required placeholder="Enter your email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="password" name="password" required placeholder="Enter your password">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Login</button>

                    <div class="auth-links">
                        <p>Don't have an account? <a href="../Register/register.php">Register here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php require '../includes/footer.php'; ?>