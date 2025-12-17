
var numri = 0;

// kur klikon ne lista
var lista = document.querySelectorAll('.features li');
for(var i = 0; i < lista.length; i++) {
    lista[i].onclick = function() {
        numri = numri + 1;
        alert('Keni klikuar ' + numri + ' here');
    }
}

// shko lart
function scrollToTop() {
    window.scrollTo(0, 0);
}
