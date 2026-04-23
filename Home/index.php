<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Document - Report & Search Lost/Found Documents</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <header id="header">
        <div class="container header-container">
            <a href="#" class="logo">
                <i class="fa-solid fa-id-card"></i> My Document
            </a>
            <nav class="nav-menu" id="nav-menu">
                <ul>
                    <li><a href="#home" class="active">Home</a></li>
                    <li><a href="../Search/search.html">Search</a></li>
                    <li><a href="../Lost/lost.html">Report Lost</a></li>
                    <li><a href="../Found/found.html">Report Found</a></li>
                    <li class="user-menu-item">
                        <a href="../Login/login.html" class="user-profile-btn">
                            <div class="profile-circle">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <span class="user-label"><?php echo $_SESSION['user_name']; ?></span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="menu-toggle" id="mobile-menu">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </header>

    <section id="home" class="hero">
        <div class="container">
            <div class="hero-container">
                <div class="hero-content">
                    <h1>Lost or found a document?</h1>
                    <p>Easily report or search for lost personal cards and documents in just a few clicks.
                        Help items find their way back to their owners.</p>
                    
                    <div class="hero-search-wrapper">
                        <form class="hero-search-form" action="../Search/search.html" method="get" id="searchForm">
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
                                <input type="text" name="q" placeholder="Enter name, ID, or keywords..." required>
                            </div>
                            <button type="submit" class="hero-search-submit">Search</button>
                        </form>
                    </div>

                    <div class="hero-buttons">
                        <a href="../Lost/lost.html" class="btn btn-primary">Report Lost Document</a>
                        <a href="../Found/found.html" class="btn btn-secondary">Report Found Document</a>
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
            <div class="latest-docs-grid" id="latestDocsContainer">
                <!-- Data will be loaded here -->
            </div>
            <div class="text-center mt-4">
                <a href="../Results/results.html" class="btn btn-outline-dark">View All Documents</a>
            </div>
        </div>
    </section>

    <footer>
        <div class="container footer-container">
            <div class="footer-about">
                <a href="#" class="logo footer-logo">
                    <i class="fa-solid fa-id-card"></i> My Document
                </a>
                <p>The easiest way to report and search for lost or found personal cards and documents.</p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="../Search/search.html">Search</a></li>
                    <li><a href="../Lost/lost.html">Report Lost</a></li>
                    <li><a href="../Found/found.html">Report Found</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <ul>
                    <li><i class="fa-solid fa-envelope"></i> mahditalhi10@gmail.com</li>
                    <li><i class="fa-solid fa-phone"></i>0699497706</li>
                    <li><i class="fa-solid fa-location-dot"></i>sidi amar || annaba</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 My Document. All rights reserved.</p>
        </div>
    </footer>

    <script src="../JS/script.js"></script>
    <script src="../JS/documents.js"></script>
</body>

</html>