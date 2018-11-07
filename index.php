<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <title>
        Shuyan's Website
    </title>
    <style>
        body {
            background-color: #ffffff;
        }
        div {
            float: left;
            padding: 20px 30px 20px 90px;
            margin: 20px 30px 20px 150px;
            text-align: center;
        }
        h1 {
            text-align: center;
            font-family: 'Pacifico', cursive;
            font-size: 3em;
            margin-bottom: 0px;
        }
        .list {
           font-size: 2em;
           color: #00640;
        }
        img {
            border-radius: 50px;
            float: right;
        }
        figure {
            clear:left;
        }
       
    </style>
</head>
<body>
    <?php
        echo "<h1>Shuyan Chi CST336 site</h1>";
    ?>
    <div class = "list">
        <h2>labs</h2>
        <ul>
            <li><a href = "/cst336/labs/portfolio">Portfolio</a></li>
            <li><a href ="/cst336/labs/lab2">lab2</a></li>
        </ul>
    </div>
    <div class = "list">
        <h2>hw</h2>
        <ul>
            <li><a href = "/cst336/hw/hw1">hw1</a></li>
        </ul>
    </div>
    <figure>
        <img src = "/img/Russan Blue.jpg"  alt = "cat"/>
    </figure>
</body>
