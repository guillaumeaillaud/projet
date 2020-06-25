// c'est dans le fichier index.js que je vais creer mon serveur node
// on importe le framework express
const express = require('express');

// require body parser fait parti des fonctionalites de note 
const { json } = require('body-parser');

// on importe sql
const mysql = require('mysql');
const { request, response } = require('express');

// on initialise la connection a la db
const connection = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "user_db",
});

// on etablit la connection a la db
connection.connect((error) => {
    if(error) return console.log(error.message);
    console.log('connection ok à la bdd');
});

// on va creer une instance du serveur
const app = express();

// on va definir sur quel port le serveur va ecouter les requetes http
const port = "5000";

// on va creer une premiere route en GET sur l'URL racine: /
app.get('/', function (request, response) {
    // on va renvoyer un status http pour la reponse
    response.status(200);
    response.send('<h1>Page d\'accueil</h1>');
  });

// on va creer une route qui va nous permettre de recuperer les users de notre database et de les afficher en console
app.get("/users", (request, response) =>{
    // c'est ici qu'on va ecrire le code qui va nous permettre de faire la requete a la bdd
    const sql = "SELECT * from user";

    // ensuite je vais executer ma requete
    connection.query(sql, (error, result) => {
        if(error) return console.error(error);
        console.log(result);
        return;
    });
});

// on va crée une route qui nous permet de recuperer un user par son id
// l'id sera recuperer a partir de l'url
// je dois recuperer dans l'url le parametre id de maniere dynamique
// http://localhost:5000/user?id=1
app.get("/users/:id", (request, response) => {
    //je cree ma requete sql
    const sql = "SELECT * FROM user WHERE id = ?";
    const id = request.params.id;

    // je vais executer ma requete
    connection.query(sql, [id], (error, result) => {
        if(error) return console.error(error.message);
        // ici j'efface ma console pour que se soit plus lisible
        console.clear();
        console.log(result);

        // pour afficher dans le navigateur
        // .status et .send n'ont rien a voir avec le language de programmation utilisé 
        response.status(200);
        response.send(`affichage de l'utilisateur avec l'id ${id}`)
    });
});

// on va faire une route pour delete qui va permettre d'effacer un user en fonction de son id
app.delete("/users/:id", (request, response) => {
    //je cree ma requete sql
    const sql = "DELETE FROM user WHERE id = ?";
    const id = request.params.id;

    connection.query(sql, [id], (error, result) => {
        if(error) {
            response.status(500);
            console.log(result);
            response.send('erreur serveur')
        }
        response.status(200);
        response.send(`utilisateur ${id} effacé`)
    });
});

// on va creer une route permettant d'inserer un nouvel utilisateur dans la bdd
app.post("/users", json(), (request, response) => {
    /*
    const user = {
        name: "albert",
        email: "al@pga.com",
    };
    */
   //console.log(request.body);
    const user = request.body;

    const sql = "INSERT INTO user SET ?";
    
    connection.query(sql,[user] , (error, rows) => {
        if(error){
            response.status(500)
            response.send('Erreur enregistrement utilisateur')
        }
        response.status(200)
        response.send(`Utilisateur crée ${rows.affectedRows} modifiés`)
    });
});

// on va dire au serveur d'ecouter les requetes entrantes
app.listen(port, () => {
    console.log(`serveur demarré sur le port ${port}`);
});
