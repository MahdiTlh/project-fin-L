<?php 
$title = "User Profile - My Document";
$css = "profile.css?v=" . time();
require '../includes/header.php'; 
require '../php/profile.php';

?>

    <section class="section bg-light page-header">
        <div class="container text-center">
            <h1>My Account</h1>
            <p>Manage your profile and reported documents</p>
        </div>
    </section>

    <section class="section profile-section">
        <div class="container">
            <div class="profile-layout">
                
                <div class="profile-sidebar">
                    <div class="user-info-card" id="userInfo">
                        <div class="avatar-large">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <h3><?php echo $user['name']; ?></h3>
                        <p class="user-email"><?php echo $user['email']; ?></p>
                    </div>

                    <div class="profile-menu">
                        <a href="#" class="active"><i class="fa-solid fa-box-archive"></i> My Reports</a>
                        <a href="#" onclick="toggleSettings(event)"><i class="fa-solid fa-gear"></i> Settings <i class="fa-solid fa-chevron-down" id="settingsChevron" style="float: right; margin-top: 5px; transition: transform 0.3s;"></i></a>
                        
                        <div id="settingsPanel" style="display: none; background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                            <a href="../php/logout.php" style="padding-left: 40px; border-bottom: 1px solid #e2e8f0;"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
                            <a href="#" onclick="openDeleteModal(event)" style="padding-left: 40px; color: #dc2626; border-bottom: none;"><i class="fa-solid fa-user-xmark"></i> Delete Account</a>
                        </div>
                    </div>
            </div>

                <div class="profile-content">
                    <div class="content-header">
                        <h2>My Reported Documents</h2>
                        <a href="../Lost/lost.php" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> New Report</a>
                    </div>
                    
                    <div class="reports-list" id="myReportsContainer">
                        <?php
                            if ($report_result && $report_result->num_rows > 0) {
                                while ($row = $report_result->fetch_assoc()) {
                                    ?>
                                    <div class="doc-item" onclick="window.location.href='../Details/details.php?id=<?php echo $row['id']; ?>'">
                                        <div class="doc-badge badge-<?php echo $row['type']; ?>">
                                            <?php echo ucfirst($row['type']); ?>
                                        </div>
                                        
                                        <div class="doc-details">
                                            <h3><a href="../Details/details.php?id=<?php echo $row['id']; ?>" class="doc-title-link" onclick="event.preventDefault();"><?php echo $row['document_type']; ?></a></h3>
                                            <div class="meta-grid">
                                                <p><i class="fa-solid fa-user"></i> <strong>Name:</strong> <?php echo $row['name']; ?></p>
                                                <p><i class="fa-solid fa-location-dot"></i> <strong>Location:</strong> <?php echo $row['location']; ?></p>
                                                <p><i class="fa-solid fa-calendar-days"></i> <strong>Date:</strong> <?php echo $row['date_event']; ?></p>
                                                <p><i class="fa-solid fa-phone"></i> <strong>Contact:</strong> <?php echo $row['contact']; ?></p>
                                            </div>
                                        </div>

                                        <div class="doc-actions">
                                            <form action="../php/delete_doc.php" method="POST" onsubmit="event.stopPropagation(); return confirm('Are you sure you want to delete this report?');">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="event.stopPropagation();"><i class="fa-solid fa-trash"></i> Delete Report</button>
                                            </form>

                                                <a href="../Edit/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-edit btn-sm" onclick="event.stopPropagation();"><i class="fa-solid fa-pen"></i> Edit</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "<p class='no-reports'>You haven't reported any documents yet.</p>";
                            }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>

<!-- Delete Account Confirmation Modal -->
<div class="modal-overlay" id="deleteModal">
    <div class="modal-box">
        <div class="modal-icon">
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
        <h3>Delete Account?</h3>
        <p>This action is <strong>permanent and irreversible</strong>. All your reports and account data will be deleted immediately.</p>
        <div class="modal-actions">
            <button class="btn btn-outline-dark btn-sm" onclick="closeDeleteModal()">Cancel</button>
            <a href="../php/delete_account.php" class="btn btn-delete btn-sm">
                <i class="fa-solid fa-trash"></i> Yes, Delete My Account
            </a>
        </div>
    </div>
</div>



<?php require '../includes/footer.php'; ?>