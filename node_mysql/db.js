
// on a crée un fichier db.js ou on stock la connection a la bdd

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

// pour exporter le fichier ds un autre fichier
module.exports = connection;