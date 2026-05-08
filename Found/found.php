<?php 
$title = "Report Found Document - My Document";
$css = "found.css";
$active = 'found';
require '../includes/header.php'; 
?>


    <section class="section bg-light page-header">
        <div class="container text-center">
            <h1>Report a Found Document</h1>
            <p>Help someone recover their lost belongings</p>
        </div>
    </section>

    <section class="section form-section">
        <div class="container">
            <div class="form-card">
                <form action="../php/add_document.php" method="POST" id="reportFoundForm">
                    <input type="hidden" name="type" value="found">
                    <div class="form-row">
                        <div class="form-group flex-1">
                            <label>Document Name (Person's Name)</label>
                            <input type="text" name="doc_name" required placeholder="Name on the document">
                        </div>
                        <div class="form-group flex-1">
                            <label>Document Type</label>
                            <select name="doc_type" required>
                                <option value="" disabled selected>Select type...</option>
                                <option value="id_card">National ID Card</option>
                                <option value="passport">Passport</option>
                                <option value="driver_license">Driver's License</option>
                                <option value="student_card">Student Card</option>
                                <option value="bank_card">Bank Card / Edahabia</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group flex-1">
                            <label>Location Found</label>
                            <i class="fa-solid fa-location-dot"></i>
                            <input type="text" name="location" required placeholder="City or specific place">
                        </div>
                        <div class="form-group flex-1">
                            <label>Date Found</label>
                            <input type="date" name="date_event" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Additional Description</label>
                        <textarea name="description" rows="4" placeholder="Mention where you dropped it off (e.g. police station) or how to retrieve it"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Your Contact Number (Optional)</label>
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" name="contact_phone" required placeholder="Your contact number">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit Report</button>
                </form>
            </div>
        </div>
    </section>

<?php require '../includes/footer.php'; ?>