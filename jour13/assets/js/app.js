const boite = document.querySelectorAll("div.z");
const bouton = document.querySelector("#btnHide");




bouton.addEventListener("click", function(){
    boite.forEach(function(elem){
        elem.classList.toggle("hide");
    });
});


const popup = document.querySelector("#popup");
popup.addEventListener('click', openPopup)
function openPopup()
{
    window.open('mapage.php')
}
