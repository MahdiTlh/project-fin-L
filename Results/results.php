<?php 
$title = "Search Results - My Document";
$css = "results.css";
require '../includes/header.php'; 

require '../php/config.php';

$q = $_GET['q'] ?? '';
$type = $_GET['type'] ?? 'all';
$doc_type = $_GET['doc_type'] ?? 'all';
$location = $_GET['location'] ?? '';

$sql = "SELECT * FROM document WHERE 1=1";

if (!empty($q)) {
    $sql .= " AND (name LIKE '%$q%' OR description LIKE '%$q%')";
}

if ($type != "all") {
    $sql .= " AND type = '$type'";
}

if ($doc_type != "all") {
    $sql .= " AND document_type = '$doc_type'";
}

if (!empty($location)) {
    $sql .= " AND location LIKE '%$location%'";
}

$result = $conn->query($sql);
?>

    <section class="section bg-light page-header">
        <div class="container text-center">
            <h1>Search Results</h1>
        </div>
    </section>

    <section class="section results-section">
        <div class="container">
            
            <div class="results-actions">
                <a href="../Search/search.php" class="btn btn-outline-dark"><i class="fa-solid fa-arrow-left"></i> Back to Search</a>
            </div>

            <div class="latest-docs-grid">

                <?php
                if ($result && $result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        ?>

                        <div class="doc-item">
                            <div class="doc-badge badge-<?php echo $row['type']; ?>">
                                <?php echo ucfirst($row['type']); ?>
                            </div>
                            
                            <div class="doc-details">
                                <h3><?php echo $row['document_type']; ?></h3>
                                <p><i class="fa-solid fa-user"></i> <strong>Name:</strong> <?php echo $row['name']; ?></p>
                                <p><i class="fa-solid fa-location-dot"></i> <strong>Location:</strong> <?php echo $row['location']; ?></p>
                                <p><i class="fa-solid fa-calendar-days"></i> <strong>Date:</strong> <?php echo $row['date_event']; ?></p>
                            </div>

                            <a href="../Details/details.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-dark btn-sm btn-block">View Details</a>
                        </div>

                        <?php
                    }

                } else {
                    echo "<p>No results found.</p>";
                }
                ?>

            </div>

        </div>
    </section>

<?php require '../includes/footer.php'; ?>