<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un marché</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/custom/style.css">
</head>
<body>

    <section class="container py-4">

        <header class="h3">
            Ajouter un nouveau marché
        </header>

        <form action="insert.php" method="post" enctype="multipart/form-data" class="my-4">

            <div class="form-group">
                <label for="form-label">Nom du marché <span class="text-danger">*</span></label>
                <input type="text" name="nomMarche" placeholder="Nom du marché" class="form-control" required id="">
            </div>

            <div class="form-group">
                <label for="form-label">Description <span class="text-danger">*</span></label>
                <textarea name="description" placeholder="Description du marché" class="form-control" id=""></textarea>
            </div>

            <div class="form-group">
                <label for="form-label">Capacité du marché <span class="text-danger">*</span></label>
                <input type="number" name="capacite" placeholder="Capacité du marché" class="form-control" required id="">
            </div>

            <div class="form-group">
                <label for="form-label">Adresse <span class="text-danger">*</span></label>
                <input type="text" name="adresse" placeholder="Adresse" class="form-control" required id="">
            </div>

            <div class="form-group">
                <label for="form-label">Téléphone <span class="text-danger">*</span></label>
                <input type="text" name="telephone" placeholder="Téléphone" class="form-control" required id="">
            </div>

            <div class="form-group">
                <label for="form-label">Imgae <span class="text-danger">*</span></label>
                <input type="file" name="image" class="form-control" required id="">
            </div>

            <div class="form-group d-flex justify-content-between">
                <input type="reset" value="Annuler" class="btn btn-secondary">
                <input type="submit" value="Enregistrer" class="btn btn-primary">
            </div>

            <input type="hidden" name="idVille" value="1">

        </form>

    </section>

    <script type="text/javascript" src="./assets/bootstrap/js/bootstrap.js"></script>
    
</body>
</html>