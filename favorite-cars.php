<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Favorite Cars</title>
    <link rel="stylesheet" href="style-profile.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        .cars-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }
        .car-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            width: 230px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .car-card:hover {
            transform: scale(1.03);
        }
        .car-card img {
            max-width: 100%;
            height: 140px;
            object-fit: cover;
            border-radius: 8px;
        }
        .car-name {
            font-weight: bold;
            margin-top: 10px;
        }
        .car-price {
            color: green;
        }
        .back-button {
            display: block;
            margin: 30px auto 0;
            width: fit-content;
            background-color: #007bff;
            padding: 10px 20px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <h2>Available Cars</h2>

    <div class="cars-container">
        <?php
        $cars = [
            ["name" => "Toyota Supra", "price" => "$55,000", "img" => "images/cars/car1.jpg"],
            ["name" => "Ford Mustang", "price" => "$48,000", "img" => "images/cars/car2.jpg"],
            ["name" => "BMW M4", "price" => "$70,000", "img" => "images/cars/car3.jpg"],
            ["name" => "Audi R8", "price" => "$150,000", "img" => "images/cars/car4.jpg"],
            ["name" => "Nissan GT-R", "price" => "$115,000", "img" => "images/cars/car5.jpg"],
            ["name" => "Chevrolet Camaro", "price" => "$45,000", "img" => "images/cars/car6.jpg"],
            ["name" => "Porsche 911", "price" => "$120,000", "img" => "images/cars/car7.jpg"],
            ["name" => "Mercedes AMG GT", "price" => "$130,000", "img" => "images/cars/car8.jpg"],
            ["name" => "Lamborghini Huracan", "price" => "$200,000", "img" => "images/cars/car9.jpg"],
            ["name" => "Ferrari 488", "price" => "$250,000", "img" => "images/cars/car10.jpg"],
            ["name" => "Tesla Model S", "price" => "$90,000", "img" => "images/cars/car11.jpg"],
            ["name" => "Dodge Challenger", "price" => "$50,000", "img" => "images/cars/car12.jpg"]
        ];

        foreach ($cars as $car) {
            echo '<div class="car-card">';
            echo '<img src="' . $car['img'] . '" alt="' . $car['name'] . '">';
            echo '<div class="car-name">' . $car['name'] . '</div>';
            echo '<div class="car-price">' . $car['price'] . '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <a href="home.php" class="back-button">← Back to Dashboard</a>

</body>
</html>
