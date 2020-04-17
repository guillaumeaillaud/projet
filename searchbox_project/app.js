console.log("connected!");

// on selectionne les elements du DOM

const searchBox = document.querySelector("#searchbox");
const resultContainer = document.querySelector(".result");

//j'ajoute un event keyup sur mon input

searchBox.addEventListener("keyup",function(e){
    //debug only
    //console.log(e.target.value);

    //je recup se qui est entré dans l'input
    var searchTerm = e.target.value;

    //je crée un tableau vide qui va contenir la liste des mangas qui correspondent a la recherche
    var matches = [];

    // il faut parcourir le tableau des mangas et à chaque tour de boucle vérifier si ce qu'on a tapé correspond à un élément du tableau
    mangas.forEach(function(manga){
         // si la recherche correspond au manga en cours, je l'ajoute au tableau
        // je vais utiliser pour ça la méthode native js includes() : https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/String/includes
        if(mangas.includes(searchTerm)){
            matches.push(manga);
        }
    });

    //debug only
    //je check le resultat

    console.log(matches);



});