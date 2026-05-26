<?php 
$title = "Document Details - My Document";
$css = "details.css";
require '../includes/header.php'; 

require '../php/config.php';

$id = $_GET['id'] ?? '';

if (empty($id)) {
    echo "Invalid request";
    exit();
}

$sql = "SELECT d.*, u.name as uploader_name FROM document d LEFT JOIN users u ON d.user_id = u.id WHERE d.id = $id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $doc = $result->fetch_assoc();
} else {
    echo "Document not found";
    exit();
}
?>



    <section class="section bg-light page-header">
        <div class="container text-center">
            <h1>Document Details</h1>
            <p>Information about the reported item</p>
        </div>
    </section>

    <section class="section details-section">
        <div class="container">
            <div class="details-actions">
                <a href="../Results/results.php" class="btn btn-outline-dark"><i class="fa-solid fa-arrow-left"></i> Back to Results</a>
            </div>

            <div class="details-card">

                <div class="details-badge badge-<?php echo $doc['type']; ?>">
                    <i class="fa-solid fa-<?php echo ($doc['type'] == 'lost') ? 'circle-xmark' : 'circle-check'; ?>"></i>
                    <?php echo ($doc['type'] == 'lost') ? 'Lost' : 'Found'; ?>
                </div>

                <div class="details-header">
                    <h2><?php echo $doc['document_type']; ?></h2>
                    <p class="reported-time"><i class="fa-regular fa-clock"></i> Reported on <?php echo date('F j, Y', strtotime($doc['date_event'])); ?></p>
                    <div style="margin-top: 20px;">
                        <span style="font-size: 0.9rem; color: #64748b; margin-right: 15px;"><i class="fa-solid fa-user-circle"></i> Posted by <strong><?php echo htmlspecialchars($doc['uploader_name'] ?? 'Unknown User'); ?></strong></span>
                        <a href="../Profile/public.php?id=<?php echo $doc['user_id']; ?>" class="btn btn-outline-dark btn-sm">View Profile</a>
                    </div>
                </div>

                <div class="details-body">

                    <div class="detail-group">
                        <h3><i class="fa-solid fa-user"></i> Owner Name</h3>
                        <p><?php echo $doc['name']; ?></p>
                    </div>

                    <div class="detail-group">
                        <h3><i class="fa-solid fa-location-dot"></i> Location</h3>
                        <p><?php echo $doc['location']; ?></p>
                    </div>

                    <div class="detail-group">
                        <h3><i class="fa-solid fa-calendar-days"></i> Date</h3>
                        <p><?php echo $doc['date_event']; ?></p>
                    </div>

                    <div class="detail-group">
                        <h3><i class="fa-solid fa-tag"></i> Status</h3>
                        <p><?php echo ($doc['type'] == 'lost') ? 'Lost' : 'Found'; ?></p>
                    </div>

                    <div class="detail-group full-width">
                        <h3><i class="fa-solid fa-align-left"></i> Description</h3>
                        <p><?php echo $doc['description']; ?></p>
                    </div>

                </div>

                <div class="details-footer">
                    <div class="contact-info">
                        <h3><i class="fa-solid fa-phone"></i> Contact</h3>
                        <p><?php echo htmlspecialchars($doc['contact']); ?></p>
                    </div>
                </div>

            </div>

        </div>
    </section>

<?php require '../includes/footer.php'; ?>