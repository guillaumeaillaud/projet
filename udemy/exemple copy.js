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



// BOUCLE DO WHILE

do {

  var prenom = prompt('bonjour, quel est votre prenom?');

} while (prenom == "" || prenom == null)

alert('bonjour ' + prenom);


BOUCLE FOR


for (let i = 0; i < 5; i++) {
    console.log('ligne ' + i);
}

BREAK


let i = 0;

while (i < 5) {

    if (i == 3) {
        break;
    }

    console.log('ligne : ' + i);
    i++;
}


// LES EXEPTIONS

try {
    //erreur?
    let recompense = prompt('choisissez une recompense : épée, arc, haches');
    let degats;
    switch (recompense) {
        case 'épée':
            degats = 40;
            break;

            case 'arc':
                degats = 30;
                break;

            case 'haches':
                degats = 20;
                break;

            default:
                throw new Error('vous ne pouvez pas tricher');
    }

    alert('vous avez choisi ' + recompense + ' avec ' + degats + ' de degats')

} 
catch(error){
    //erreur!
    alert(error);
}
finally {
    alert('fin du programme');
}
*/

var choix = "";
do {
  
  if (isNaN(choix) && choix > 4 && choix < 1 ) {
    prompt("Que souhaitez vous faire ?\n\n 1 - Addition\n 2 - Multiplication\n 3 - Soustraction\n 4 - Division");
   
  }
  else{
    choix =  prompt("Que souhaitez vous faire ?\n\n 1 - Addition\n 2 - Multiplication\n 3 - Soustraction\n 4 - Division");
    switch (choix) {
        case "1":
            choix = "Addition";
            break;
        case "2":    
            choix = "Multiplication";
            break;
        case "3":
            choix = "Soustraction";
            break;
        case "4":
            choix = "Division";
            break;
        
        default:
            prompt("Que souhaitez vous faire ?\n\n 1 - Addition\n 2 - Multiplication\n 3 - Soustraction\n 4 - Division");
            break;
    }
  }
} while (choix == "" && choix == null && isNaN(choix) && choix > 4 && choix < 1  );



