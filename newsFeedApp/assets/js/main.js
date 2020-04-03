

/* api key     a449c40ed4ac4eb9a17c90ef951a25c7*/

// je créer des variables pour savoir quels elements je vais selectionner
    var baliseForm = document.querySelector(".search");
    var baliseInput = document.querySelector("input[name=recherche]");
    var listeJson = document.querySelector(".listeJson");

// je met l'URL de l'API dans la variable url

    var url = 'http://newsapi.org/v2/everything?' +
          'q=Apple&' +
          'from=2020-04-03&' +
          'sortBy=popularity&' +
          'apiKey=a449c40ed4ac4eb9a17c90ef951a25c7';

// je créer un objet
    var req = new Request(url);

// je vais chercher les infos dans l'API 
// je met la recherche dans une variable
    var data = fetch(req)
        .then(function(response) {
            return response.json();
        })
        .then(function(data){

    var articles = data.articles;

// debug 
//console.log(articles);

// je fais une boucle pour recuperer tous les articles
        for (var index = 0; index < articles.length; index++) {
       
            // je fais une variable pour stocker les articles pour ensuite les aficher en html
            var titre = articles[index].title;

            //debug
            //console.log(titre);

            // j'utiltise inner.HTML pour afficher les articles dans la classe listJson dans l'index
            listeJson.innerHTML += `<article>${titre}</article>`;
        }
    })
   

