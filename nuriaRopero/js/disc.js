const disc = document.getElementById("disc");
const disc2 = document.getElementById("disc2");
const disc3 = document.getElementById("disc3");
const disc4 = document.getElementById("disc4");
const disc5 = document.getElementById("disc5");
const disc6 = document.getElementById("disc6");
const disc7 = document.getElementById("disc7");
const disc8 = document.getElementById("disc8");
const disc9 = document.getElementById("disc9");
const disc10 = document.getElementById("disc10");
const disc11 = document.getElementById("disc11");
const disc12 = document.getElementById("disc12");


const s1 = document.getElementById("select1");
const s2 = document.getElementById("select2");
const s3 = document.getElementById("select3");
const s4 = document.getElementById("select4");
const s5 = document.getElementById("select5");
const s6 = document.getElementById("select6");
const s7 = document.getElementById("select7");
const s8 = document.getElementById("select8");
const s9 = document.getElementById("select9");
const s10 = document.getElementById("select10");
const s11 = document.getElementById("select11");
const s12 = document.getElementById("select12");


if(!disc) {
    console.log("");
} else {
    if(disc2) {disc2.style.display = "none";} else {console.log("");}}
if(disc3) {disc3.style.display = "none";}
if(disc4) {disc4.style.display = "none";}
if(disc6) {disc6.style.display = "none";}
if(disc7) {disc7.style.display = "none";}
if(disc8) {disc8.style.display = "none";}
if(disc10) {disc10.style.display = "none";}
if(disc11) {disc11.style.display = "none";}
if(disc12) {disc12.style.display = "none";}








s1.addEventListener("click", aplicar);
if(disc3) {if(disc2) {
    s2.addEventListener("click", aplicar2);}}
if(disc4) {s3.addEventListener("click", aplicar3);}
if(disc5) {s5.addEventListener("click", aplicar4);
           s6.addEventListener("click", aplicar5);
           s7.addEventListener("click", aplicar6);}
if(disc9) {s9.addEventListener("click", aplicar7);
           s10.addEventListener("click", aplicar8);
           s11.addEventListener("click", aplicar9);

}





function aplicar() {
    if(s1.value != "") {
        disc2.style.display = "inline-table";
    }
}

function aplicar2() {
    if(s2.value != "") {
        disc3.style.display = "inline-table";
    }
}

function aplicar3() {
    if(s3.value != "") {
        disc4.style.display = "inline-table";
    }
}
function aplicar4() {
    if(s5.value != "") {
        disc6.style.display = "inline-table";
    }
}function aplicar5() {
    if(s6.value != "") {
        disc7.style.display = "inline-table";
    }
}function aplicar6() {
    if(s7.value != "") {
        disc8.style.display = "inline-table";
    }
}function aplicar7() {
    if(s9.value != "") {
        disc10.style.display = "inline-table";
    }
}function aplicar8() {
    if(s10.value != "") {
        disc11.style.display = "inline-table";
    }
}function aplicar9() {
    if(s11.value != "") {
        disc12.style.display = "inline-table";
    }
}