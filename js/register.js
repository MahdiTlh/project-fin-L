document.addEventListener('DOMContentLoaded', function() {

    const params = new URLSearchParams(window.location.search);
    const error = params.get("error");

    const msg = document.getElementById("error-message");
    const btn = document.querySelector("button");

    if (msg && btn) {
        if(!error){
            msg.textContent = "";
        }
        else{
            if (error === "pass") {
                msg.textContent = "Passwords do not match!";
                showError(msg, btn);
            }

            if (error === "empty") {
                msg.textContent = "All fields are required!";
                showError(msg, btn);
            }
        }
    }

    function showError(msgEl, btnEl) {
        msgEl.style.color = "red";
        btnEl.style.backgroundColor = "red";
        btnEl.style.transform = "scale(0.95)";

        setTimeout(() => {
            btnEl.style.backgroundColor = "";
            btnEl.style.transform = "";
        }, 300);
    }

    const mobileMenu = document.getElementById('mobile-menu');
    const navMenu = document.getElementById('nav-menu');
    
    if (mobileMenu && navMenu) {
        mobileMenu.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }

    const deleteModal = document.getElementById('deleteModal');
    if (deleteModal) {
        deleteModal.addEventListener('click', function(e) {
            if (e.target === this) closeDeleteModal();
        });
    }
});

window.toggleSettings = function(e) {
    if(e) e.preventDefault();
    const panel = document.getElementById('settingsPanel');
    const chevron = document.getElementById('settingsChevron');
    
    if (panel && chevron) {
        if (panel.style.display === 'none' || panel.style.display === '') {
            panel.style.display = 'block';
            chevron.style.transform = 'rotate(180deg)';
        } else {
            panel.style.display = 'none';
            chevron.style.transform = 'rotate(0deg)';
        }
    }
}

window.openDeleteModal = function(e) {
    if(e) e.preventDefault();
    const modal = document.getElementById('deleteModal');
    if (modal) {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

window.closeDeleteModal = function() {
    const modal = document.getElementById('deleteModal');
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
}