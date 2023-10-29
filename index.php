<?php 
session_start();
require_once('connexion.php');

use App\Connexion;

    $access = null;

    $credentials = array('host' => 'localhost','user' => 'morel','password' => 'root','db' => 'marchesBenin');

    $link = new Connexion($credentials);

    $link->connect($access);

    $request = "SELECT * FROM Marche";

    $get_data = $access->query($request);

    $bag = [];

    if($access->error)
    {
        die('Error ' . $access->error);
    }

    if($get_data->num_rows > 0)
    {
        
        while($row = $get_data->fetch_assoc())
        {
            $bag [] = $row;
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/custom/style.css">
</head>
<body>

    <section class="container py-4" id="market-layer">

        <?php if(isset($_SESSION['success'])) { ?>

            <div class="alert alert-success">Nouveau marché ajouté avec succès</div>

        <?php } unset($_SESSION['success']) ?>

        <?php if(count($bag) > 0){  ?>

            <section class="row">

                <?php foreach($bag as $line){ ?>

                    <article class="col-lg-4 my-4">

                        <div class="">
                            <img src="<?php echo $line['image'] ?>" alt="" class="img-responsive" style="width: 100%;">
                        </div>

                        <div class="my-3">
                            <b class="">
                                <?php echo $line['nomMarche']; ?>
                            </b>
                        </div>

                        <div class="">
                            <b class="">Capacité:</b> <span class=""><?php echo $line['capacite'] ?> place<?php echo (int)$line['capacite'] > 1 ? 's' : '' ?></span>
                        </div>

                    </article>

                <?php } ?>

            </section>

        <?php }else { ?>

            <div class="">

                Aucune donnée trouvée

            </div>

        <?php } ?>

        <article class="my-4">

                <a href="create.php" target="_blank" class="btn btn-primary">Ajouter un marché</a>

        </article>

    </section>

    <script type="text/javascript" src="./assets/bootstrap/js/bootstrap.js"></script>
    
</body>
</html>