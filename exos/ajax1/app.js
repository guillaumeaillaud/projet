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


function main(){ 
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

       
       // on ne doit conserver que le nom de la ville
       // on doit passer la chaîne de caractères en minuscules
       city = city.split(" ")[0].toLowerCase();

       // step 3 : récupérer les conditions météo de la ville
       fetch(
        `http://api.openweathermap.org/data/2.5/weather?q=aix-en-provence&appid=8e602b9ea28ed4f9f8fc97a5f6d1105c&lang=fr&units=metric`
       )
         .then(function(response) {
           return response.json();
         })
         .then(function(data) {
           console.log(data);
         });
    });
 });



}


function displayWreatherInfos(data){
  const name = data.name;
  const temperature = data.main.temp;
  const conditions = data.weather[0].main;
  const description = data.weather[0].description;

  document.querySelector('#ville').textContent = name;
  document.querySelector('#temperature').textContent = Math.round(temperature);
  document.querySelector('#conditions').textContent = capitalize(description);

  document.querySelector('i.wi').className = weatherIcons[conditions];
  console.log("log icon", weatherIcons[conditions]);
}

main();
