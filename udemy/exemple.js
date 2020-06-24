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


// Fonction pour additionner
function addition(nombreA, nombreB) {
    return nombreA + nombreB;
}

// Fonction pour multiplier
function multiplication(nombreA, nombreB) {
    return nombreA * nombreB;
}

// Fonction pour soustraire
function soustraction(nombreA, nombreB) {
    return nombreA - nombreB;
}

// Fonction pour diviser
function division(nombreA, nombreB) {
    if(nombreB == 0) {
        throw new Error("Impossible de diviser par 0.");
    }
    return nombreA / nombreB;
}

// Demande un choix
do {
    var choix = Number(prompt("Que souhaitez-vous faire ?\n\n 1 - Addition\n 2 - Multiplication\n 3 - Soustraction\n 4 - Division\n"));
} while(choix != 1 && choix != 2 && choix != 3 && choix != 4)

// Demande deux nombres
do {
    var premierNombre = Number(prompt("Entrez un premier nombre :"));
    var deuxiemeNombre = Number(prompt("Entrez un deuxième nombre : "));
} while(isNaN(premierNombre) || isNaN(deuxiemeNombre))

// Appelle la fonction choisie
try{
    switch (choix) {
        case 1:
            var resultat = addition(premierNombre, deuxiemeNombre);
            break;
        
        case 2:
            var resultat = multiplication(premierNombre, deuxiemeNombre);
            break;
        
        case 3:
            var resultat = soustraction(premierNombre, deuxiemeNombre);
            break;

        case 4:
            var resultat = division(premierNombre, deuxiemeNombre);
            break;

        default:
            throw new Error("Une erreur est survenue.");
    }

    // Affiche le résultat
    alert("Voici le résultat : " + resultat);
}
catch(error) {
    alert(error); // Si une erreur est survenue, on affiche l'erreur
}
*/

function addition(nombreA, nombreB) { 
    return nombreA + nombreB;
};

function multiplication(nombreA, nombreB) { 
    return nombreA * nombreB;
};

function soustraction(nombreA, nombreB) { 
    return nombreA - nombreB;
};

function division(nombreA, nombreB) { 
    if (nombreB == 0) {
         throw new Error('on ne peu pas diviser par 0');
    }
    return nombreA / nombreB;
};


var choix;
do {
   choix = Number(prompt('Que souhaitez vous faire ?\n\n 1-Addistion\n 2-Multiplication\n 3-Soustraction\n 4-Division'));
} while (choix != 1 && choix != 2 && choix != 3 && choix != 4);

do {
    var premierNombre = Number(prompt('quel est votre nombre ?'));
    var deuxiemeNombre = Number(prompt('quel est votre deuxieme nombre ?'));
} while (isNaN(premierNombre) || isNaN(deuxiemeNombre));



try {
    switch (choix) {
        case 1:
            var resultat = addition(premierNombre, deuxiemeNombre);
            break;

        case 2:
            var resultat = multiplication(premierNombre, deuxiemeNombre);
            break;

        case 3:
            var resultat = soustraction(premierNombre, deuxiemeNombre);
            break;

        case 4:
            var resultat = division(premierNombre, deuxiemeNombre);
            break;
            
        default:
            throw new Error('une erreur est survenue.')
            
    }
    alert("voici le resultat : " + resultat);

} catch (error) {

    alert(error);
}