<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="Public/CSS/dashboard.css">
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
            <a href="localhost:8080/Test_Stage/index.php" class="link-dash"><li class="my-li my-li-selected"><img src="http://localhost:8080/Test_Stage/Public/Pictures/home_white.png">Accueil</li></a>
            <a href="#"  class="link-dash"><li class="my-li"><img src="http://localhost:8080/Test_Stage/Public/Pictures/settings.png">Réglages</li></a>
        </ul>
    </nav>
    <div class="my-content" style="display:flex;">
        <div class="dis-elem mr-5">
        <a class="link-board" href="http://localhost:8080/Test_Stage/View/board.php"><p style="font-size: 15px;">Tableau des produits</p>
        <hr style="margin-bottom:0">
        <img src="http://localhost:8080/Test_Stage/Public/Pictures/blackboard.png" style="width: 200px; height: 200px"></a>
        </div>
        <div class="dis-elem mr-5">
        <a class="link-board" href="http://localhost:8080/Test_Stage/View/graphic.php"><p style="font-size: 15px;">Statistiques</p>
        <hr style="margin-bottom:0">
        <img src="http://localhost:8080/Test_Stage/Public/Pictures/statistiques.png" style="width: 200px; height: 200px"></a>
        </div>
    </div>
</body>
</html>

