<?php 
$title = "Search Documents - My Document";
$css = "search.css";
$active = 'search';
require '../includes/header.php'; 
?>

    <section class="section bg-light page-header">
        <div class="container text-center">
            <h1>Search a Document</h1>
            <p>Find lost or found documents easily</p>
        </div>
    </section>

    <section class="section search-section">
        <div class="container">
            <div class="search-box-card">
                <form action="../Results/results.php" method="GET" class="advanced-search-form" id="searchForm">
                    <div class="form-row">
                        <div class="form-group flex-2">
                            <label>Search Query</label>
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" name="q" placeholder="Enter name, ID number, or description...">
                        </div>
                        <div class="form-group flex-1">
                            <label>Status</label>
                            <select name="type">
                                <option value="all">All</option>
                                <option value="lost">Lost</option>
                                <option value="found">Found</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group flex-1">
                            <label>Document Type</label>
                            <select name="doc_type">
                                <option value="all">All Types</option>
                                <option value="id_card">ID Card</option>
                                <option value="passport">Passport</option>
                                <option value="student_card">Student Card</option>
                                <option value="bank_card">Bank Card</option>
                            </select>
                        </div>
                        <div class="form-group flex-1">
                            <label>Location</label>
                            <i class="fa-solid fa-location-dot"></i>
                            <input type="text" name="location" placeholder="City or region...">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block search-btn">Search Documents</button>
                </form>
            </div>
        </div>
    </section>

<?php require '../includes/footer.php'; ?>