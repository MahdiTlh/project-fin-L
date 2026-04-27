<?php
session_start();
?>

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
</head>

<body>

    <header id="header">
        <div class="container header-container">
            <a href="../Home/index.php" class="logo">
                <i class="fa-solid fa-id-card"></i> My Document
            </a>
            <nav class="nav-menu" id="nav-menu">
                <ul>
                    <li><a href="../Home/index.php" class=" <?php echo ($active == 'home')? 'active' : ''; ?> ">Home</a></li>
                    <li><a href="../Search/search.php" class=" <?php echo ($active == 'search')? 'active' : ''; ?> ">Search</a></li>
                    <li><a href="../Lost/lost.php" class=" <?php echo ($active == 'lost')? 'active' : ''; ?> ">Report Lost</a></li>
                    <li><a href="../Found/found.php" class=" <?php echo ($active == 'found')? 'active' : ''; ?> ">Report Found</a></li>
                    <li class="user-menu-item">
                        <a href="<?php echo isset($_SESSION['user_id']) ? '../Profile/profile.php' : '../Login/login.php'; ?>" 
                        class="user-profile-btn">
                            <div class="profile-circle">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <span class="user-label">
                                <?php
                                if(isset($_SESSION['user_name'])){
                                    echo $_SESSION['user_name'];
                                }
                                else{
                                    echo "User";
                                }
                                ?>
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="menu-toggle" id="mobile-menu">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </header>