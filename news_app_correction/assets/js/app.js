//console.log("JS Loaded");

// constantes qui vont me permettre de construire mon url de connexion à l'API
const API_KEY = "632ce075260f4c28b13cf1a161e2c5a5";
const ENDPOINT = "https://newsapi.org/v2/top-headlines?q=";

// element du DOM
const searchInput = document.querySelector("#search-input");
const searchBtn = document.querySelector("#search-btn");
const articlesContainer = document.querySelector("#affichage-articles");

// ajout d'un ecouteur sur le bouton du formulaire
searchBtn.addEventListener("click", function(event){
    event.preventDefault();
    //console.log("btn clicked");

    // je dois recuperer la valeur de l'input
    const searchValue = searchInput.value;

    // reinitialiser l'affichage des articles
    articlesContainer.innerHTML = "";

    // reinitialiser le contenu de non input
    searchInput.value = "";

    // je dois passer le contenu de l'input en parametre a ma fonction fetchData
    // et j'invoque la fonction
    fetchData(searchValue);
});

// fonction pour recuperer les datas au niveau de l'API
// ici on defini la fonction avec des parametre (mais qui sont vides)
function fetchData (inputValue){

    // requete AJAX
    fetch(`${ENDPOINT}${inputValue}&apikey=${API_KEY}`)
    .then(function(response){
        // ici je retourne un objet json
            return response.json();
    })
    .then(function(results){
        //je recup la valeur de la propriete articles
        const articles = results.articles;

        if(results.totalResults > 0){

        // articles contient un tableau d'objets
        // il va falloir que je boucle sur ce tableau

        //methode 1 avec for
        for(let i = 0; i < articles.length; i++){
            console.log(articles[i]);

            // afficher les articles dans le HTML


            const output = `
            <article>
            <h3>${articles[i].title}</h3>
            <p>${articles[i].description}</p>
            <small>${articles[i].author}</small>
            <a href=${articles[i].url}>Lien vers l'article</a>
            <img src=${articles[i].urlToImage} alt=${articles[i].title}/>
            </article>
            
            `;
            articlesContainer.innerHTML += output;

        }


        }else{
            articlesContainer.innerHTML += "Aucun articles trouvé pour la recherche";

        }

        /*
        // methode forEach()
        articles.forEach(function(articles) {
            // console.log(articles)

        });

        // methode while()
        let compteur = 0
        while(compteur < articles.length) {
            console.log(articles[compteur]);
            compteur++
        }

        // methode map()
        const newArticles = articles.map(function(article){
            return article;
        });
        */
    });
}