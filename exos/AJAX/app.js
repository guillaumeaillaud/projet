const weatherIcons = {
    "Rain": "wi wi-day-rain",
    "Clouds": "wi wi-day-cloudy",
    "Clear": "wi wi-day-sunny",
    "Snow": "wi wi-day-snow",
    "mist": "wi wi-day-fog",
    "Drizzle": "wi wi-day-sleet",
}

function capitalize(str){
    return str[0].toUpperCase() + str.slice(1);
}

 // step 1 : obtenir son adresse ip
 fetch("https://api.ipify.org?format=json")
 // version javascript classique
 .then(function(response) {
   return response.json();
 })
 // version ES6 (fonctions fléchées)
 // si on a qu'un seul paramètre à passer à la fonction on peut se passer des parenthèses. Elles seront obligatoires s'il y en a plusieurs
 // si la fonction n'exécute qu'une seule instruction, on peut aussi se passer des {}. Sinon elles seront obligatoires
 // dans le code à la ligne suivante le return est implicite, on n'a pas besoinde le spécifier
 // .then(response => response.json())

 .then(function(data) {
   const ip = data.ip;

   // step 2 :  récupérer un nom de ville en fonction de l'adresse ip obtenue
   // utilisation des backticks string litterals
   // fetch(
   //   `http://api.ipstack.com/${ip}?access_key=30c029b1d2a8dcdcdf26ac5a0e07b914`
   // );

   // méthode classique avec concaténation de chaînes de caractères
   fetch(
     "http://api.ipstack.com/" +
       ip +
       "?access_key=30c029b1d2a8dcdcdf26ac5a0e07b914"
   )
     .then(function(response) {
       return response.json();
     })
     .then(function(data) {
       let city = data.city; // cici on va récupérer Marseille 01 qu'on doit transformer en marseille

       console.log(city);
       // on ne doit conserver que le nom de la ville
       // on doit passer la chaîne de caractères en minuscules
       city = city.split(" ")[0].toLowerCase();

       // step 3 : récupérer les conditions météo de la ville
       fetch(
         `http://api.openweathermap.org/data/2.5/weather?q=${city}&appid=8e602b9ea28ed4f9f8fc97a5f6d1105c&lang=fr&units=metric`
       )
         .then(function(response) {
           return response.json();
         })
         .then(function(data) {
           console.log(data);
         });
    });
 });

// step 3 : récupérer les conditions météo de la ville