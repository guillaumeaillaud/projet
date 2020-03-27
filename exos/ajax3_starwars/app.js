const baseUrl = "https://swapi.co/api/"; // ceci est une chaine de caractere ni plus ni moins

const randBtn = document.querySelector("#randomButton");

const resultsDiv = document.querySelector("#results");

randBtn.addEventListener("click" , function() {
    // version JS classique
    // fetch(baseUrl + "species/")
    fetch(`${baseUrl}species/`)
    .then(function(res){
        return res.json()
    })
    .then(function(data){
        // propriétés : name, language, classification, average_lifespan
        console.log(data); 
        // format type = data.results[3].name
        // etape 1 on compte la longueur du tableau des resultats
        const resultslength = data.results.length

        //etape 2 on genere un index aleatoire
        const randomIndex = Math.floor(Math.random() * resultslength);

        const name = data.results[randomIndex].name
        const language = data.results[randomIndex].language
        const classification = data.results[randomIndex].classification
        const lifespan = data.results[randomIndex].lifespan
        
        console.log(`Nom de la race : ${name}`)
        console.log(`language de la race : ${language}`)
        console.log(`classification de la race : ${classification}`)
        console.log(`durée de vie moyenne de la race : ${lifespan}`)
        
    })
});
