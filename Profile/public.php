<?php 
$title = "User Profile - My Document";
$css = "profile.css?v=" . time();
require '../includes/header.php'; 
require '../php/config.php';

$id = $_GET['id'] ?? '';

if (empty($id)) {
    echo "<div class='container section'><h2 class='text-center'>User not found.</h2></div>";
    require '../includes/footer.php';
    exit();
}

$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "<div class='container section'><h2 class='text-center'>User not found.</h2></div>";
    require '../includes/footer.php';
    exit();
}

$report_sql = "SELECT * FROM document WHERE user_id = $id ORDER BY created_at DESC";
$report_result = $conn->query($report_sql);

?>

    <section class="section bg-light page-header">
        <div class="container text-center">
            <h1>User Profile</h1>
            <p>Documents reported by this user</p>
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
                        <h3><?php echo htmlspecialchars($user['name']); ?></h3>
                        <p class="user-email"><?php echo htmlspecialchars($user['email']); ?></p>
                    </div>

                    <div class="profile-menu">
                        <a href="#" class="active"><i class="fa-solid fa-box-archive"></i> Reported Documents</a>
                    </div>
                </div>

                <div class="profile-content">
                    <div class="content-header">
                        <h2>Reported Documents</h2>
                    </div>
                    
                    <div class="reports-list" id="myReportsContainer">
                        <?php
                            if ($report_result && $report_result->num_rows > 0) {
                                while ($row = $report_result->fetch_assoc()) {
                                    ?>
                                    <div class="doc-item" onclick="window.location.href='../Details/details.php?id=<?php echo $row['id']; ?>'">
                                        <div class="doc-badge badge-<?php echo $row['type']; ?>">
                                            <?php echo ucfirst($row['type']); ?>
                                        </div>
                                        
                                        <div class="doc-details">
                                            <h3><a href="../Details/details.php?id=<?php echo $row['id']; ?>" class="doc-title-link" onclick="event.preventDefault();"><?php echo htmlspecialchars($row['document_type']); ?></a></h3>
                                            <div class="meta-grid">
                                                <p><i class="fa-solid fa-user"></i> <strong>Name:</strong> <?php echo htmlspecialchars($row['name']); ?></p>
                                                <p><i class="fa-solid fa-location-dot"></i> <strong>Location:</strong> <?php echo htmlspecialchars($row['location']); ?></p>
                                                <p><i class="fa-solid fa-calendar-days"></i> <strong>Date:</strong> <?php echo htmlspecialchars($row['date_event']); ?></p>
                                                <p><i class="fa-solid fa-phone"></i> <strong>Contact:</strong> <?php echo htmlspecialchars($row['contact']); ?></p>
                                            </div>
                                        </div>

                                        <div class="doc-actions">
                                            <a href="../Details/details.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i> View Details</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "<p class='no-reports'>This user hasn't reported any documents yet.</p>";
                            }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php require '../includes/footer.php'; ?>
