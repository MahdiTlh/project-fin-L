<?php 
$title = "My Document - Report & Search Lost/Found Documents";
$css = "index.css";
$active = 'home';
require '../includes/header.php'; 

require '../php/config.php';

$sql = "SELECT * FROM document ORDER BY created_at DESC LIMIT 6";
$result = $conn->query($sql);
?>

    <section id="home" class="hero">
        <div class="container">
            <div class="hero-container">
                <div class="hero-content">
                    <h1>Lost or found a document?</h1>
                    <p>Easily report or search for lost personal cards in just a few clicks.
                        Help items find their way back to their owners.</p>
                    
                    <div class="hero-search-wrapper">
                        <form class="hero-search-form" action="../Search/search.php" method="get" id="searchForm">
                            <div class="search-type-select">
                                <select name="type">
                                    <option value="all">All Documents</option>
                                    <option value="lost">Lost</option>
                                    <option value="found">Found</option>
                                </select>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                            <div class="search-input-wrapper">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input type="text" name="q" placeholder="Enter to search" required>
                            </div>
                            <button type="submit" class="hero-search-submit">Search</button>
                        </form>
                    </div>

                    <div class="hero-buttons">
                        <a href="../Lost/lost.php" class="btn btn-primary">Report Lost Document</a>
                        <a href="../Found/found.php" class="btn btn-secondary">Report Found Document</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="how-it-works" class="section bg-light">
        <div class="container">
            <div class="section-title">
                <h2>How It Works</h2>
                <p>Three simple steps to connect lost documents with their owners</p>
            </div>
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-icon"><i class="fa-solid fa-bullhorn"></i></div>
                    <h3>1. Report Document</h3>
                    <p>Enter details about the document you lost or found into our secure database.</p>
                </div>
                <div class="step-card">
                    <div class="step-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                    <h3>2. Search System</h3>
                    <p>Browse or search our database using specific document types or locations.</p>
                </div>
                <div class="step-card">
                    <div class="step-icon"><i class="fa-solid fa-handshake"></i></div>
                    <h3>3. Contact Person</h3>
                    <p>Connect securely with the finder or owner to arrange the return of the document.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="document-types" class="section">
        <div class="container">
            <div class="section-title">
                <h2>Supported Documents</h2>
                <p>We support a wide range of personal documents and cards</p>
            </div>
            <div class="doc-types-grid">
                <div class="doc-type-card"><i class="fa-solid fa-id-card"></i><span>ID Card</span></div>
                <div class="doc-type-card"><i class="fa-solid fa-graduation-cap"></i><span>Student Card</span></div>
                <div class="doc-type-card"><i class="fa-solid fa-passport"></i><span>Passport</span></div>
                <div class="doc-type-card"><i class="fa-solid fa-money-check-dollar"></i><span>Edahabia</span></div>
                <div class="doc-type-card"><i class="fa-regular fa-credit-card"></i><span>Bank Cards</span></div>
                <div class="doc-type-card"><i class="fa-solid fa-car"></i><span>Driving License</span></div>
                <div class="doc-type-card"><i class="fa-solid fa-truck-medical"></i><span>Insurance Card</span></div>
            </div>
        </div>
    </section>

    <section class="section bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Latest Documents</h2>
                <p>Recently reported lost and found items in your area</p>
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
                    echo "<p>No documents found.</p>";
                }
                ?>
            </div>
            
            <div class="text-center mt-4">
                <a href="../Results/results.php" class="btn btn-outline-dark">View All Documents</a>
            </div>
        </div>
    </section>

<?php require '../includes/footer.php'; ?>