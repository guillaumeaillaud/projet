<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        fetch('http://localhost/simplon/projet/api_rest/produits/lire.php')
        .then(function(res){
        return res.json()
        .then(function(data){
            console.log(data);
        })
    })
    
    </script>
</body>
</html>