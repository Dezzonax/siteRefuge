<?php
session_start();

require('appelEtPost/dbconnect.php');

$adopte = $bdd->query("SELECT adoptes.id, adoptes.description FROM adoptes WHERE adoptes.id = {$_GET['id']}");

$donneesAdopte = $adopte->fetchall(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la description d'un adopté - Refuge de Reims</title>

<?php require('commun/header.php'); ?>
    
    <main>

        <div class="container">

        <h1>Modifier la description d'un adopté</h1><hr><br>

        <?php if (isset($_SESSION["modifAdopteMsg"]) && !empty($_SESSION["modifAdopteMsg"])) { ?>

        <div class="alert alert-warning" role="alert">
            <?=$_SESSION["modifAdopteMsg"]?>
        </div>

        <?php }; ?>

            <form action="appelEtPost/postModif-adopte.php" method="post" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <textarea name="adopte_description" id="adopte_description" class="form-control" rows="5" required><?=$donneesAdopte[0]['description']?></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-primary" value="<?=$donneesAdopte[0]['id']?>">Modifier la description</button>

            </form>

        </div>

    </main>

<?php
if (isset($_SESSION["modifAdopteMsg"])) { unset($_SESSION["modifAdopteMsg"]); };
require('commun/footer.php');
?>