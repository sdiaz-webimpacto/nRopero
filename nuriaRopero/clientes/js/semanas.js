const actual = document.getElementById('actual');
const siguiente = document.getElementById('siguiente');
const b1 = document.getElementById('b1');
const b2 = document.getElementById('b2');

siguiente.style.display = 'none';

b1.addEventListener('click', function(){
    actual.style.display = 'inherit';
    siguiente.style.display = 'none';
})

b2.addEventListener('click', function() {
    actual.style.display = 'none';
    siguiente.style.display = 'inherit';
})

