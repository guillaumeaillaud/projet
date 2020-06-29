// c'est dans le fichier index.js que je vais creer mon serveur node
// on importe le framework express
const express = require('express');

// on recupere le fichier db.js qui fait la connection a la bdd
const connection = require('./db');

// require body parser fait parti des fonctionalites de note 
//const { json } = require('body-parser');

// on va creer une instance du serveur
const app = express();

// ici on va utiliser le middleware body-parser de maniere global pour toutes les routes
app.use(express.json());

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

      
    });
    // pour afficher dans le navigateur
    // .status et .send n'ont rien a voir avec le language de programmation utilisé 
    response.status(200);
    response.send(`affichage de l'utilisateur avec l'id ${id}`)
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
app.post("/users", (request, response) => {
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

// on va creer la route qui va ns permettre de faire un update dans la, bdd
app.put('/users/:id', (request, response) =>{
    const id = request.params.id;
    console.log(id)
    const user = request.body;

    const sql = "UPDATE user SET ? WHERE id = ?";

    connection.query(sql, [user, id], (error, rows) =>{
        if(error){
            response.status(500);
            response.send(`Impossible de mettre à jour l'utilisateur ${id}, ${error.message}`);
        }
        response.status(200);
        response.send(`Utilisateur ${id} mis à jour`);
    });
});

// on va dire au serveur d'ecouter les requetes entrantes
app.listen(port, () => {
    console.log(`serveur demarré sur le port ${port}`);
});
