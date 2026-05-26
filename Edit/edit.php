<?php 
$title = "Edit Report - My Document";
$css = "edit.css";
require '../includes/header.php'; 

require '../php/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.php");
    exit();
}

$id = $_GET['id'] ?? '';

if (empty($id)) {
    header("Location: ../Profile/profile.php");
    exit();
}

$sql = "SELECT * FROM document WHERE id = $id AND user_id = " . $_SESSION['user_id'];
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $doc = $result->fetch_assoc();
} else {
    header("Location: ../Profile/profile.php");
    exit();
}
?>

    <section class="section bg-light page-header">
        <div class="container text-center">
            <h1>Edit Report</h1>
            <p>Update the details of your reported document</p>
        </div>
    </section>

    <section class="section edit-section">
        <div class="container">

            <div class="edit-actions">
                <a href="../Profile/profile.php" class="btn btn-outline-dark btn-sm">
                    <i class="fa-solid fa-arrow-left"></i> Back to Profile
                </a>
            </div>

            <div class="edit-card">

                <div class="edit-card-header">
                    <h2><i class="fa-solid fa-pen-to-square"></i> <?php echo htmlspecialchars($doc['document_type']); ?></h2>
                    <p>Fields marked are editable. Changes will be saved to your report immediately.</p>
                </div>

                <form action="../php/updat_document.php" method="POST" class="edit-form">

                    <input type="hidden" name="id" value="<?php echo $doc['id']; ?>">

                    <div class="form-group">
                        <label for="name"><i class="fa-solid fa-user"></i> Owner Name</label>
                        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($doc['name']); ?>" placeholder="Full name of the owner" required>
                    </div>

                    <div class="form-group">
                        <label for="location"><i class="fa-solid fa-location-dot"></i> Location</label>
                        <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($doc['location']); ?>" placeholder="Where it was lost or found" required>
                    </div>

                    <div class="form-group">
                        <label for="contact"><i class="fa-solid fa-phone"></i> Contact Number</label>
                        <input type="text" id="contact" name="contact" value="<?php echo htmlspecialchars($doc['contact']); ?>" placeholder="Phone or email to reach you">
                    </div>

                    <div class="form-group">
                        <label for="date_event"><i class="fa-solid fa-calendar-days"></i> Date</label>
                        <input type="date" id="date_event" name="date_event" value="<?php echo htmlspecialchars($doc['date_event']); ?>">
                    </div>

                    <div class="form-group full-width">
                        <label for="description"><i class="fa-solid fa-align-left"></i> Description</label>
                        <textarea id="description" name="description" placeholder="Add any extra details about the document..."><?php echo htmlspecialchars($doc['description']); ?></textarea>
                    </div>

                    <div class="form-footer">
                        <a href="../Profile/profile.php" class="btn btn-outline-dark">Cancel</a>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save Changes</button>
                    </div>

                </form>

            </div>
        </div>
    </section>

<?php require '../includes/footer.php'; ?>