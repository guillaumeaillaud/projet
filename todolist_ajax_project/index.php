<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist project</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <h1>Todolist Ajax</h1>
    <form action="" method="post">
        <div>
            <label for="title">Titre de la tache</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="description">Description de la tache</label>
            <input type="text" name="description" id="description">
        </div>
        <button>Save</button>
    </form>
    <div class="todos"></div>
    <script src="assets/js/main.js"></script>
</body>

</html>