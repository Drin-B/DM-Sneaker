
var shporta = 0;

var butonat = document.querySelectorAll('.btn');
for(var i = 0; i < butonat.length; i++) {
    butonat[i].onclick = function() {
        shporta++;
        alert('Produkti u shtua! Total: ' + shporta);
    }
}

function scrollToTop() {
    window.scrollTo(0, 0);
}

// Mesazh
console.log('Faqja u ngarkua!');
