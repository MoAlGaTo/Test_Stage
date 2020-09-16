<?php

require_once($_SERVER['DOCUMENT_ROOT']."/Test_Stage/Model/board_requests.php");

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="../Public/CSS/dashboard.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
    <select class="form-control" onchange="get_pro_quantity(this)">
        <optgroup label="Afficher les statistiques suivants:">
            <option id="type">Quantité par type de produits</option>
            <option id="sav">Quantité des produits en S.A.V</option>
        </optgroup>
    </select>
        <canvas id="graph1"></canvas>
    </div>
</body>
<script>

function get_pro_quantity(element) {

let productsArray = ['armoire', 'chaise', 'Matiere premiere', 'table'];
let savArray = ['oui', 'non', ''];
let reqInfo = element.options[element.selectedIndex].id;

let ctx = document.getElementById('graph1').getContext('2d');
let data = {
    labels: [],
    datasets: [{
        data: []
    }]
};
let config = {
    type: 'bar',
    data: data
};
let graph1 = new Chart(ctx, config);

if (reqInfo === 'type'){
    let length = productsArray.length;
    for (i = 0; i < length; i++){
        let product = productsArray[i];
        axios.post('http://localhost:8080/Test_Stage/Controller/get_request_graphic.php', {
            req_info: reqInfo,
            product: product
        })
        .then(function (response) {
            // console.log(response.data.response);
            data.labels.push(product);
            data.datasets[0].data.push(response.data.response);
        })
        .catch(function (error) {
        console.log(error);
        });
    }
} else {
    let length = savArray.length;
    for (i = 0; i < length; i++){
        axios.post('http://localhost:8080/Test_Stage/Controller/get_request_graphic.php', {
            req_info: reqInfo,
            product: savArray[i]
        })
        .then(function (response) {
            console.log(response.data.response);
            data.labels.push(savArray[i]);
            data.datasets[0].data.push(response.data.response);
        })
        .catch(function (error) {
        console.log(error);
        });
    }
}
}
</script>
</html>