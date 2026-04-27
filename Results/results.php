<?php 
$title = "Search Results - My Document";
$css = "results.css";
require '../includes/header.php'; 
?>

    <section class="section bg-light page-header">
        <div class="container text-center">
            <h1>Search Results</h1>
            <p id="resultsCount">Searching...</p>
        </div>
    </section>

    <section class="section results-section">
        <div class="container">
            
            <div class="results-actions">
                <a href="../Search/search.php" class="btn btn-outline-dark"><i class="fa-solid fa-arrow-left"></i> Back to Search</a>
            </div>

            <div class="latest-docs-grid" id="resultsContainer">
                <!-- Data will be loaded here -->
            </div>

        </div>
    </section>

<?php require '../includes/footer.php'; ?>