<?php 
$title = "Document Details - My Document";
$css = "details.css";
require '../includes/header.php'; 
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

            <div id="detailsContainer">
                <p>Loading document details...</p>
            </div>
        </div>
    </section>

<?php require '../includes/footer.php'; ?>