
const btndiv=document.getElementById("btn-wrapper");
const leftdiv=document.getElementById("leftdiv");
const btnDiv=document.getElementById("btn-div");
const rightdiv=document.getElementById("rightdiv");
const footer=document.getElementById("footer");

btndiv.addEventListener('click' , () => {
    leftdiv.classList.toggle('show');
    rightdiv.classList.toggle('show');
    btnDiv.classList.toggle('show');
    footer.classList.toggle('show');
});


