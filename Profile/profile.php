<?php 
$title = "User Profile - My Document";
$css = "profile.css";
require '../includes/header.php'; 
require '../php/config.php';

if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        $user = ['name' => 'Unknown', 'email' => 'Unknown'];
    }
} else {
    echo "<script>window.location.href='../Login/login.php';</script>";
    exit();
}
?>

    <section class="section bg-light page-header">
        <div class="container text-center">
            <h1>My Account</h1>
            <p>Manage your profile and reported documents</p>
        </div>
    </section>

    <section class="section profile-section">
        <div class="container">
            <div class="profile-layout">
                
                <div class="profile-sidebar">
                    <div class="user-info-card" id="userInfo">
                        <div class="avatar-large">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <h3><?php echo $user['name']; ?></h3>
                        <p class="user-email"><?php echo $user['email']; ?></p>
                    </div>

                    <div class="profile-menu">
                        <a href="#" class="active"><i class="fa-solid fa-box-archive"></i> My Reports</a>
                        <a href="#"><i class="fa-solid fa-gear"></i> Settings</a>
                    </div>
                </div>

                <div class="profile-content">
                    <div class="content-header">
                        <h2>My Reported Documents</h2>
                        <a href="../Lost/lost.php" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> New Report</a>
                    </div>
                    
                    <div class="latest-docs-grid" id="myReportsContainer">
                        <!-- Data will be loaded here -->
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php require '../includes/footer.php'; ?>