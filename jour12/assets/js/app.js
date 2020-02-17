// selectionner l'element button
const button = document.querySelector("#button")
  
// selectionner l'element menu

const menu = document.querySelector("#menu")

//qd on clique sur le bouton on modifie les style de display de l'element menu

button.addEventListener("click", function(){

  menu.classList.toggle("hide")
})


  