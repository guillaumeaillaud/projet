
// le fichier main.js nous sert a ecouter les evenements qui se passent dans le fichier index.html et services.html

const btnUsers = document.querySelector('#btn-users');
const userContainer = document.querySelector('.user-container');

btnUsers.addEventListener("click", () =>{
    fetch("http://localhost:5000/users", {
        method: 'GET',
    })
        .then((response) => response.json())
        .then((rows) => {
            rows.forEach(row => {
                const htmlOutput =`
                <div>
                    <h2>${row.name}</h2>
                    <p>${row.email}</p>
                </div>
                `
                userContainer.innerHTML += htmlOutput;
        });
    });
});