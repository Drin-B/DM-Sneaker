var numri = 0;

var butonat = document.querySelectorAll('.btn');
for(var i = 0; i < butonat.length; i++) {
    butonat[i].onclick = function() {
        numri++;
        alert('U shtua! Total: ' + numri);
    }
}