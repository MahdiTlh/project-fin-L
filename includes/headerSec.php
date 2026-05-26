<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $title ?? ""; ?>
    </title>
    <link rel="stylesheet" href="<?php echo $css ?? ''; ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        @media (max-width: 768px) {
            .nav-menu {
                display: block !important;
                position: absolute;
                top: 80px;
                left: 0;
                width: 100%;
                background: #ffffff;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                padding: 20px;
                clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
                transition: clip-path 0.3s ease-in-out;
            }
            .nav-menu.active {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            }
            .nav-menu ul {
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }
        }
    </style>
</head>

<body>

    <header id="header">
        <div class="container header-container">
            <a href="../Home/index.html" class="logo">
                <i class="fa-solid fa-id-card"></i> My Document
            </a>
            <nav class="nav-menu" id="nav-menu">
                <ul>
                    <li><a href="../Home/index.php">Home</a></li>
                    <li><a href="../Search/search.php">Search</a></li>
                    <li><a href="../Lost/lost.php">Report Lost</a></li>
                    <li><a href="../Found/found.php">Report Found</a></li>
                </ul>
            </nav>
            <div class="menu-toggle" id="mobile-menu">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </header>