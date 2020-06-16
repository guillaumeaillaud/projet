/*function calculerImc(poid, taille) {
    
    //calculer la taille en metre
    let tailleEnMetre = taille / 100;
    let tailleCalculee = Math.pow(tailleEnMetre, 2);
    let resultat = poid / tailleCalculee;
    return resultat;

}

let poid = prompt("quel est votre poid en kg?");
let taille = prompt("quel est votre taille en cm?");

alert(calculerImc(poid, taille));



let consommable = "ananas";

switch(consommable){

    case "carotte":
    case "courgette":    
        console.log("ceci est un legume");
        break;
    case "banane":
    case "mangue":
        console.log("ceci est un fruit");
        break;        
    default:
        console.log("ceci n'est pas un fruit ni un legume");
}




let gareDeDepart = "Paris";
let gareDarrivee = prompt("ou souhaitez vous aller") || "gare du nord";
let chauffeur = "Guillaume";

if (gareDarrivee != "" || gareDeDepart != "" && chauffeur != "") 
{
    alert("le train peut demarrer il va a " + gareDarrivee + " .");
}
else
{
    alert('tu restes a ' + gareDeDepart + " lol");
}


//if (x > 3) {
 //   console.log('x est superieur à 3');
//}
//else{
 //   console.log('x est inferieur à 3');
//}



//let x = 5;

//x > 3 ? console.log('x est superieur à 3') : console.log('x est inferieur à 3');



//BOUCLE WHILE JS

let i = 1;

while (i <= 5) {
    console.log('ligne' + i);
    i++;
}

*/

// BOUCLE DO WHILE

do {
    
} while (condition);