/*
EXERCICE 1
Creer un fonction pour inverser les lettres d'u mot

function inverser(mot) {
    var motInverser = "";

    for (let i = 0; i < mot.length; i++) {
       
        console.log(motInverser)
        motInverser = mot[i] + motInverser;
        
    }
    return motInverser;
}

console.log(inverser("guillaume"));


EXERCICE 2
Creer une fonction pour checker si c'est un palindrome



function palindrome(str) {
    str = str.toLowerCase().replace(/[\W_]/g, "");
    for (var i = 0, len = str.length - 1; i < len / 2; i++) {
      if (str[i] !== str[len - i]) {
        return false;
      }
    }
    return true;
  }

  console.log(palindrome("guillaume"));

  
  Deuxieme exemple de fonction palindrome

 function palindrome(str) {
    return (
      str.replace(/[\W_]/g, "").toLowerCase() ===
      str
        .replace(/[\W_]/g, "")
        .toLowerCase()
        .split("")
        .reverse()
        .join("")
    );
  }
  console.log(palindrome("kayak"));


Troisieme solution de fonction palindrome
  
//this solution performs at minimum 7x better, at maximum infinitely better.
//read the explanation for the reason why.
function palindrome(str) {
    //assign a front and a back pointer
    let front = 0;
    let back = str.length - 1;
  
    //back and front pointers won't always meet in the middle, so use (back > front)
    while (back > front) {
      //increments front pointer if current character doesn't meet criteria
      if (str[front].match(/[\W_]/)) {
        front++;
        continue;
      }
      //decrements back pointer if current character doesn't meet criteria
      if (str[back].match(/[\W_]/)) {
        back--;
        continue;
      }
      //finally does the comparison on the current character
      if (str[front].toLowerCase() !== str[back].toLowerCase()) return false;
      front++;
      back--;
    }
  
    //if the whole string has been compared without returning false, it's a palindrome!
    return true;
  }

 
 
  quatrieme exemple
  

EXERCICE 3
 Write a function that will accept an **integer** as parameter and return a reversed integer
  (taking into account negative integers)

  
function inverser(int) {
    var intInverser = "";

    for (let i = 0; i < int.length; i++) {
       
       
        intInverser = int[i] + intInverser;
        
    }
    return intInverser;
}

console.log(inverser("123456"));

AUTRE EXEMPLE

function reverseInteger(params) {
   const reversedInt = params.toString().split("").reverse().join("")
   return parseInt(reversedInt) * Math.sign(params);
}

console.log(reverseInteger(1234));


EXERCICE 4
Write a function that will accept a **string** as parameter and return a string
with only the first letter of each word capitalized


function premiereLettreMaj(a){
    return (a+'').charAt(0).toUpperCase()+a.substr(1);
   
}

console.log(premiereLettreMaj('guillaume'));
// renvoie : "Test"

*/

