const clases = document.getElementsByClassName("clases");
const c1 = document.getElementById("c1");
const s1 = document.getElementById("s1");


if(clases.length == 2) {
    c1.style.width = '50%';
    c1.style.height = '10vh%';
    c1.style.backgroundColor = 'yellow';
    c1.style.margin = '1% 25%';
    c1.style.textAlign = 'center';
    s1.style.width = '50%';
    s1.style.height = '10vh%';
    s1.style.backgroundColor = 'yellow';
    s1.style.margin = '1% 25%';
    s1.style.textAlign = 'center';
} else if(clases.length == 4) {
    c1.style.width = '48%';
    c1.style.height = '10vh%';
    c1.style.backgroundColor = 'yellow';
    c1.style.margin = '1%';
    c1.style.textAlign = 'center';
    c1.style.float = 'left';
    c2.style.width = '48%';
    c2.style.height = '10vh%';
    c2.style.backgroundColor = 'yellow';
    c2.style.margin = '1%';
    c2.style.textAlign = 'center';
    c2.style.float = 'left';

    s1.style.width = '48%';
    s1.style.height = '10vh%';
    s1.style.backgroundColor = 'yellow';
    s1.style.margin = '1%';
    s1.style.textAlign = 'center';
    s1.style.float = 'left';
    s2.style.width = '48%';
    s2.style.height = '10vh%';
    s2.style.backgroundColor = 'yellow';
    s2.style.margin = '1%';
    s2.style.textAlign = 'center';
    s2.style.float = 'left';

} else {
    c1.style.width = '31%';
    c1.style.height = '10vh%';
    c1.style.backgroundColor = 'yellow';
    c1.style.margin = '1%';
    c1.style.textAlign = 'center';
    c1.style.float = 'left';
    c2.style.width = '31%';
    c2.style.height = '10vh%';
    c2.style.backgroundColor = 'yellow';
    c2.style.margin = '1%';
    c2.style.textAlign = 'center';
    c2.style.float = 'left';
    c3.style.width = '31%';
    c3.style.height = '10vh%';
    c3.style.backgroundColor = 'yellow';
    c3.style.margin = '1%';
    c3.style.textAlign = 'center';
    c3.style.float = 'left';

    s1.style.width = '31%';
    s1.style.height = '10vh%';
    s1.style.backgroundColor = 'yellow';
    s1.style.margin = '1%';
    s1.style.textAlign = 'center';
    s1.style.float = 'left';
    s2.style.width = '31%';
    s2.style.height = '10vh%';
    s2.style.backgroundColor = 'yellow';
    s2.style.margin = '1%';
    s2.style.textAlign = 'center';
    s2.style.float = 'left';
    s3.style.width = '31%';
    s3.style.height = '10vh%';
    s3.style.backgroundColor = 'yellow';
    s3.style.margin = '1%';
    s3.style.textAlign = 'center';
    s3.style.float = 'left';

}
console.log(clases);