
//CREATE

// je vais selectionner les bouton  supprimer dans la liste grace a la classe supprimer
let btnSuppr = document.querySelectorAll('.supprimer');
// je selectionne l'input qui est dans le formulaire de delete pour mettre dedans l'id du bouton clické
let input = document.querySelector(".delete input[name=id]");


// on fait une boucle sur tout les boutons supprimer
btnSuppr.forEach(function(button){
    // on ecoute sur quel bouton l'utilisateur va clicker
    button.addEventListener('click', function(event) {
        // on recupere le bouton sur lequel l'utilisateur a clique
        let btnId = event.target.getAttribute('id');
        // on met dans l'input du formulaire de delete la valeur de l'id du bouton clické
        input.value = btnId;
        //je cree une variable pour la confirmation de la suppression qui contient une fenetre de confirmation
        let confirmation = window.confirm("etes vous sur de vouloir supprimer ?");
        // on fait une conditions pour confirmer la suppresion
        if (confirmation) {
             //on selectionne le bouton du formulaire delete et on associe l'evenement du click utilisateur a ce bouton
            document.querySelector(".delete button[type=submit]").click();
        }

    })
})


// je vais selectionner les bouton  supprimer dans la liste grace a la classe supprimer
let btnModif = document.querySelectorAll('.modifier');
// je selectionne l'input qui est dans le formulaire de delete pour mettre dedans l'id du bouton clické



// on fait une boucle sur tout les boutons supprimer
btnModif.forEach(function(button){
    // on ecoute sur quel bouton l'utilisateur va clicker
    button.addEventListener('click', function(event) {
        // on recupere l'id du bouton sur lequel l'utilisateur a clique
        let btnId = event.target.getAttribute('id');
        let btnTitre = event.target.getAttribute('titre');
        let btnDesc = event.target.getAttribute('desc');
        let btnStatut = event.target.getAttribute('statut');
        // on met dans l'input du formulaire de update la valeur de l'id du bouton clické
         document.querySelector(".update input[name=id]").value = btnId;
         document.querySelector(".update input[name=titre]").value = btnTitre;
         document.querySelector(".update input[name=description]").value = btnDesc;
         document.querySelector(".update input[value="+btnStatut+"]").checked = true;

    })
})



