const mensaje = document.getElementById('mensaje');
const d1 = document.getElementById('d1');
const d2 = document.getElementById('d2');
const d3 = document.getElementById('d3');
const d4 = document.getElementById('d4');
const d5 = document.getElementById('d5');
const d6 = document.getElementById('d6');
const d7 = document.getElementById('d7');
const d8 = document.getElementById('d8');
const d9 = document.getElementById('d9');
const d10 = document.getElementById('d10');
const d11 = document.getElementById('d11');
const d12 = document.getElementById('d12');
const boton = document.getElementById('boton');


d2.addEventListener('change', function() {
    if(d2.options !== '' && d2.options !== d1.options.selectedIndex) {
        console.log('se ve');
    } else {
        d2.options = 'Ya seleccionado';
    }
});
d3.addEventListener('change', function() {
    if(d3.options.selectedIndex !== '' && d3.options.selectedIndex !== d1.options.selectedIndex
    && d3.options.selectedIndex !== d2.options.selectedIndex) {
        boton.style.display = 'inherit';
        mensaje.style.display = 'none';
    } else {
        boton.style.display = 'none';
        mensaje.style.display = 'block';
    }
});
d4.addEventListener('change', function() {
    if(d4.options.selectedIndex !== '' && d4.options.selectedIndex !== d1.options.selectedIndex
    && d4.options.selectedIndex !== d2.options.selectedIndex && d4.options.selectedIndex !== d3.options.selectedIndex) {
        boton.style.display = 'inherit';
        mensaje.style.display = 'none';
    } else {
        boton.style.display = 'none';
        mensaje.style.display = 'block';
    }
});
d6.addEventListener('change', function() {
    if(d6.options.selectedIndex !== '' && d6.options.selectedIndex !== d5.options.selectedIndex) {
        boton.style.display = 'inherit';
        mensaje.style.display = 'none';
    } else {
        boton.style.display = 'none';
        mensaje.style.display = 'block';
    }
});
d7.addEventListener('change', function() {
    if(d7.options.selectedIndex !== '' && d7.options.selectedIndex !== d5.options.selectedIndex
    && d7.options.selectedIndex !== d6.options.selectedIndex) {
        boton.style.display = 'inherit';
        mensaje.style.display = 'none';
    } else {
        boton.style.display = 'none';
        mensaje.style.display = 'block';
    }
});
d8.addEventListener('change', function() {
    if(d8.options.selectedIndex !== '' && d8.options.selectedIndex !== d5.options.selectedIndex
    && d8.options.selectedIndex !== d6.options.selectedIndex && d8.options.selectedIndex !== d7.options.selectedIndex) {
        boton.style.display = 'inherit';
        mensaje.style.display = 'none';
    } else {
        boton.style.display = 'none';
        mensaje.style.display = 'block';
    }
});
d10.addEventListener('change', function() {
    if(d10.options.selectedIndex !== '' && d10.options.selectedIndex !== d9.options.selectedIndex) {
        boton.style.display = 'inherit';
        mensaje.style.display = 'none';
    } else {
        boton.style.display = 'none';
        mensaje.style.display = 'block';
    }
});
d11.addEventListener('change', function() {
    if(d11.options.selectedIndex !== '' && d11.options.selectedIndex !== d9.options.selectedIndex
    && d11.options.selectedIndex !== d10.options.selectedIndex) {
        boton.style.display = 'inherit';
        mensaje.style.display = 'none';
    } else {
        boton.style.display = 'none';
        mensaje.style.display = 'block';
    }
});
d12.addEventListener('change', function() {
    if(d12.options.selectedIndex !== '' && d12.options.selectedIndex !== d9.options.selectedIndex
    && d12.options.selectedIndex !== d10.options.selectedIndex && d12.options.selectedIndex !== d11.options.selectedIndex) {
        boton.style.display = 'inherit';
        mensaje.style.display = 'none';
    } else {
        boton.style.display = 'none';
        mensaje.style.display = 'block';
    }
});
