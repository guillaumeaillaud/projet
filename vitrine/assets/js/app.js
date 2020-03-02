let listeImg = document.querySelectorAll(".container img");

for(var i=0; i < listeImg.length; i++)
{
    let imageCourante = listeImg[i];

    imageCourante.addEventListener("click", function(event){

        let baliseCliquee = event.target;

        let urlImageCliquee = baliseCliquee.getAttribute("src");

        let balisePrincipal = document.querySelector(".imagePrincipal");

        balisePrincipal.setAttribute("src", urlImageCliquee);

    })


 
      



  

}

