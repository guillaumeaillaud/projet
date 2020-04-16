
const glossaire = "http://localhost/simplon/projet/appli_glossaire/assets/datas/glossaire.php";
const practice = "http://localhost/simplon/projet/appli_glossaire/assets/datas/practice.php";
// je selectione les elements du dom et je les mets dans des variables



let btnGloss = document.getElementById("btnGloss");
let affichGloss = document.getElementById("affichage-gloss");


let btnBp = document.getElementById("btnBp");
let affichBp = document.getElementById("affichage-bp");




//pour le glossaire
btnGloss.addEventListener('click',function(){

// ici je recup les donnees du glossaire
fetch(`${glossaire}`)
.then(function(response){
    return response.json();
})
.then(function(data){
    //console.log(data);

    //je reinitialise l'affichage de glossaire
    affichGloss.innerHTML = "";
    
    //on compte la longueur du tableau
    const results = data.length

    // on genere un index aleatoire
    const randomIndex = Math.floor(Math.random() * results);
    const title = data[randomIndex].title
    const description = data[randomIndex].description

    console.log(`titre: ${title}`)
    console.log(`description: ${description}`)

    const dataGloss =
`
<article>
   <h3>${title}</h3>
   <p>${description}</p> 
</article>
`
    affichGloss.innerHTML += dataGloss;


});


});




// pour les bonnes pratiques
btnBp.addEventListener('click',function(){

    fetch(`${practice}`)
.then(function(response){
    return response.json();
})
.then(function(data){
    //console.log(data);

    //je reinitialise practice
    affichBp.innerHTML = "";

     //on compte la longueur du tableau
     const results = data.length

     // on genere un index aleatoire
     const randomIndex = Math.floor(Math.random() * results);
     const title = data[randomIndex].title
     const objectives = data[randomIndex].objectives
     const phases = data[randomIndex].phases
 
     console.log(`titre: ${title}`)
     console.log(`objectifs: ${objectives}`)
     console.log(`phases: ${phases}`)

     const dataPractice =
     `
     <article>
        <h3>${title}</h3>
        <p>${objectives}</p> 
        <small>${phases}</small>
     </article>
     `
         affichBp.innerHTML += dataPractice;
     
 
});

});