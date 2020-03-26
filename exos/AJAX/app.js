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
    // 1. Choper l'adresse IP du PC qui ouvre la page:
    //https://api.ipify.org?format=json
    fetch('https://api.ipify.org?format=json')
        .then(function(response){
            return response.json();
        })

        .then(function(data){
            const ip = data.ip

            // 2. Choper la ville grace a l'adrsse IP:
    //http://freegeoip.net/json/adresseIPDuMec
    //utilisation des backsticks string litterals
    //fetch(`http://api.ipstack.com/${ip}?access_key=30c029b1d2a8dcdcdf26ac5a0e07b914`)

    //methode classique avec concatenation de chaines de caractere
    fetch("http://api.ipstack.com/" + ip + "?access_key=30c029b1d2a8dcdcdf26ac5a0e07b914")

            .then(function(response){
                return response.json();
            })
            .then(function(data){
                let city = data.city; // ici on va recup Marseille 01 qu'on doit transformer en Marseille
                // on ne doit conserver que le nom de la ville
                // on doit passer la chaine de caractere en minuscules
                console.log(city);
            });
        });
    // 2. Choper la ville grace a l'adrsse IP:
    //http://freegeoip.net/json/adresseIPDuMec


    // 3. Choper les infos météo grace à la ville:
    //https://api.openweathermap.org/data/2.5/weather?q=VilleDuMec&appid=8e602b9ea28ed4f9f8fc97a5f6d1105c&lang=fr&units=metric


    // 4. Afficher les informations sur la page
}

main();