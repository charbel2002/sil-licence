<?php
session_start();
require_once('connexion.php');

use App\Connexion;

    $access = null;

    $credentials = array('host' => 'localhost','user' => 'morel','password' => 'root','db' => 'marchesBenin');

    $link = new Connexion($credentials);

    $link->connect($access);

    if(isset($_POST))
    {

        $nomMarche = strip_tags($_POST['nomMarche']);
        $description = strip_tags($_POST['description']);
        $capacite = strip_tags($_POST['capacite']);
        $adresse = strip_tags($_POST ['adresse']);
        $telephone = strip_tags($_POST['telephone']);
        $raw_image = $_FILES['image'];
        $idVille = $_POST['idVille'];

        $f_name = null;

        // Here we shall proceed to file upload and 

        $extension = pathinfo($raw_image['name'],PATHINFO_EXTENSION);

        $f_name = md5($raw_image['name']) . '.' . $extension;

        $location = 'assets/images/' . $f_name;

        try {
            
            if(move_uploaded_file($raw_image['tmp_name'],$location)){

                try {
                    
                    $request = "INSERT INTO Marche(nomMarche,description,capacite,adresse,telephone,image,idVille) 
                            values(?,?,?,?,?,?,?)
                    ";

                    $prepare = $access->prepare($request);

                    $prepare->bind_param("ssisssi",$nomMarche,$description,$capacite,$adresse,$telephone,$location,$idVille);

                    if($prepare->execute())
                    {
                        $_SESSION['success'] = true;
                        header('location:index.php');
                    }
                    else{
                        die($access->error);
                    }

                } catch (\Throwable $th) {
                    die($access->error);
                }

            }
            else{
                die('Upload failed');
            }

        } catch (\Throwable $th) {
            die($th->getMessage());
        }

    }
    else{

        die('Only post requests are allowed');

    }