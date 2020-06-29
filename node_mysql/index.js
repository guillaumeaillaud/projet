// c'est dans le fichier index.js que je vais creer mon serveur node
// on importe le framework express
const express = require('express');

// on va creer une instance du serveur
const app = express();

// on va definir sur quel port le serveur va ecouter les requetes http
const port = "5000";

// ici je vais importer mon fichier users.js qui contient les routes
const usersRoutes = require("./users");


// PARTIE MIDDLEWARE
// ici on va utiliser le middleware body-parser de maniere global pour toutes les routes
app.use(express.json());
// on va definir l'endroit ou sont stocké nos fichhiers static
app.use(express.static("public"));
// on crée un middleware qui va gerer toutes les requetes sur les routes commencant par /users
app.use("/users", usersRoutes);


// sur la route de base 
app.get("/", (request, response) =>{
    response.status(200);
    response.render('index');
})

// on va dire au serveur d'ecouter les requetes entrantes
app.listen(port, () => {
    console.log(`serveur demarré sur le port ${port}`);
});
