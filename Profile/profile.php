<?php 
$title = "User Profile - My Document";
$css = "profile.css";
require '../includes/header.php'; 
require '../php/profile.php';

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
                        <?php
                            if ($report_result && $report_result->num_rows > 0) {

                            while ($row = $report_result->fetch_assoc()) {
                                ?>

                                <div class="doc-card">
                                    <h3><?php echo $row['document_type']; ?></h3>

                                    <p><strong>Name:</strong> <?php echo $row['name']; ?></p>

                                    <p><strong>Location:</strong> <?php echo $row['location']; ?></p>

                                    <p><strong>Date:</strong> <?php echo $row['date_event']; ?></p>

                                    <p><strong>Type:</strong> 
                                        <?php echo ($row['type'] == 'lost') ? 'Lost' : 'Found'; ?>
                                    </p>

                                    <p><strong>Contact:</strong> <?php echo $row['contact']; ?></p>

                                    <form action="../php/delete_doc.php" method="POST" onsubmit="return confirm('Are you sure?');">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>

                                </div>

                                <?php
                            }

                            } else {
                                echo "<p>No reports yet.</p>";
                            }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php require '../includes/footer.php'; ?>