<?php

require_once($_SERVER['DOCUMENT_ROOT']."/Test_Stage/Model/board_requests.php");

$products = get_products();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../Public/CSS/dashboard.css">
    <title>Test Stage</title>
</head>
<body>
    <div class="nav-top">
        <div class="top-container">
            <p class="s-dash">Dashboard</p>
            <div class="profil">
                <img src="http://localhost:8080/Test_Stage/Public/Pictures/user.png">
                <p>Guest2145</p>
            </div>
        </div>
    </div>
    <nav class="nav-dash">
        <ul>
            <li class="my-li logo"><img src="http://localhost:8080/Test_Stage/Public/Pictures/dashboard.png"></li>
            <hr class="my-hr">
            <a href="http://localhost:8080/Test_Stage/index.php" class="link-dash"><li class="my-li my-li-selected"><img src="http://localhost:8080/Test_Stage/Public/Pictures/home_white.png">Accueil</li></a>
            <a href="#"  class="link-dash"><li class="my-li"><img src="http://localhost:8080/Test_Stage/Public/Pictures/settings.png">Réglages</li></a>
        </ul>
    </nav>
    <div class="my-content">
        <form class="mb-5">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Filtre</label>
                        <select class="form-control" id="filter" onchange="get_filter(this)">
                            <option id="base" value="base" selected>Filtrer par</option>
                            <optgroup label="Zone">
                                <option id="zone">ARRI1</option>
                                <option id="zone">DEPA1</option>
                                <option id="zone">DEPA2</option>
                                <option id="zone">EMBA1</option>
                                <option id="zone">PROD1</option>
                                <option id="zone">PROD2</option>
                                <option id="zone">PROD3</option>
                                <option id="zone">STOC1</option>
                                <option id="zone">STOC2</option>
                            </optgroup>
                            <optgroup label="Type">
                                <option id="type">Matiere premiere</option>
                                <option id="type">Armoire</option>
                                <option id="type">Chaise</option>
                                <option id="type">Table</option>
                            </optgroup>
                            <optgroup label="Quantité">
                                <option id="quantity" value="1">Entre 0 - 5</option>
                                <option id="quantity" value="2">Entre 5 - 10</option>
                                <option id="quantity" value="3">Entre 10 - 15</option>
                                <option id="quantity" value="4">Plus de 15</option>
                            </optgroup>
                            <optgroup label="S.A.V">
                                <option id="sav" value="oui">Oui</option>
                                <option id="sav" value="non">Non</option>
                                <option id="sav" value="">Sans information</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tri</label>
                        <select class="form-control" id="sort" onchange="get_filter(document.getElementById('filter'))">
                            <option value="base">Trier par</option>
                            <option id="cart" value="cart">Chariot</option>
                            <option id="zone" value="zone_product">Zone</option>
                            <option id="type" value="type_product">Type</option>
                            <option id="quantity" value="quantity">Quantité</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Chariot</th>
                <th scope="col">Zone</th>
                <th scope="col">Type</th>
                <th scope="col">Quantité</th>
                <th scope="col">S.A.V</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <?php
                foreach($products as $product) {?>
                    <tr id="<?= $product[0] ?>">
                        <th scope="row"><?= $product[0] ?></th>
                        <td><?= $product[1] ?></td>
                        <td><?= $product[2] ?></td>
                        <td><?= $product[3] ?></td>
                        <td><?= $product[4] ?></td>
                        <td><?= $product[5] ?></td>
                    </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
</body>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="http://localhost:8080/Test_Stage/Public/Javascript/board.js"></script>
<script>
    /*function deleteAppear(element) {
        element.childNodes[13].children[0].style.display = 'initial';
    }

    function deleteDisappear(element) {
        element.childNodes[13].children[0].style.display = 'none';
    }*/
</script>
</html>