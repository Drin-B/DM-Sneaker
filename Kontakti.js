
document.getElementById("contactForm").addEventListener("submit", function (e) {
    e.preventDefault(); 

    const name = document.getElementById("emri").value.trim();
    const email = document.getElementById("email").value.trim();
    const subject = document.getElementById("tema").value.trim();
    const message = document.getElementById("mesazhi").value.trim();
    const error = document.getElementById("error");



    error.style.color = "red";
    if (!name || !email || !subject || !message) {
        error.innerText = "Ju lutem plotësoni të gjitha fushat.";
        return;
    }


    const emailRegex = /^[^\s@]+@[^\s@]+.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        error.innerText = "Email-i nuk është valid.";
        return;
    }


    if (message.length < 10) {
        error.innerText = "Mesazhi duhet të ketë të paktën 10 karaktere.";
        return;
    }

 
    error.style.color = "green";
    error.innerText = "Forma u dërgua me sukses!";


 
});
