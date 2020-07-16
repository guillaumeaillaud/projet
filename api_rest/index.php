<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <div class="afficher">

        </div>
    </main>
    <script>
        const afficher = document.querySelector('.afficher');

        fetch('http://localhost/simplon/projet/api_rest/produits/lire.php')
            .then(function(res) {
                return res.json()
                    .then(function(data) {
                      //  console.log(data.produit);

                        const prods = data.produit;

                        prods.forEach(element => {
                            let nom = element.nom;
                            let desc = element.description;
                            let prix = element.prix;

                            afficher.innerHTML +=
                            `
                                <div id="${nom}">
                                    <p>Nom du produit : ${nom}</p>
                                    <p>Description : ${desc}</p>
                                    <p>Prix : ${prix}</p>
                                </div>    
                            `

                        })
                    })
            })
    </script>
</body>

</html>