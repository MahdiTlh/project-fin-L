const params = new URLSearchParams(window.location.search);
const error = params.get("error");

const msg = document.getElementById("error-message");
const btn = document.querySelector("button");

if(!error){
    msg.textContent = "";
}
else{
    if (error === "pass") {
        msg.textContent = "Passwords do not match!";
        showError();
    }

    if (error === "empty") {
        msg.textContent = "All fields are required!";
        showError();
    }
}

function showError() {
    msg.style.color = "red";

    btn.style.backgroundColor = "red";
    btn.style.transform = "scale(0.95)";

    setTimeout(() => {
        btn.style.backgroundColor = "";
        btn.style.transform = "";
    }, 300);
}