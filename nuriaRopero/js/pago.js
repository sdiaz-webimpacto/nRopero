const boton = document.getElementById('submit');
const mensaje = document.getElementById('mensaje');
const importe = document.getElementById('importe');
const total = document.getElementById('total');

mensaje.style.display = 'none';
importe.addEventListener('change', comparacion);

function comparacion() {
    if(importe.value == total.value) {
        boton.style.display = 'block';
        boton.className = 'submit';
        boton.style.marginLeft = '48%';
        mensaje.style.display = 'none';
        
    } else {
        boton.style.display = 'none';
        mensaje.style.display = 'block';
    }
}