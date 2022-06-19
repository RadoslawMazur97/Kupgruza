<?php
$userCookie = "userCookie";
if(!isset($_COOKIE[$userCookie])) {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
}
?>

<!DOCTYPE html>
<head xmlns:color="http://www.w3.org/1999/xhtml">
    <link rel = "stylesheet" type = "text/css" href = "public/css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/project.css">
    <script src="https://kit.fontawesome.com/251a1d7ebb.js" crossorigin="anonymous"></script>
    <title>Addcar</title>

</head>

<body>

<div class = "base-container">
    <nav>
        <img src="public/img/logo.svg">
        <ul>
            <li>
                <i class="fa-solid fa-car"></i>
                <a href ="advertisements" class = "button">Advertisements</a>
            </li>
            <li>
                <i class="fa-solid fa-comment"></i>
                <a href ="#" class = "button">Messages</a>
            </li>
            <li>
                <i class="fa-solid fa-bell"></i>
                <a href ="#" class = "button">Notifications</a>
            </li>
            <li>
                <i class="fa-solid fa-magnifying-glass"></i>
                <a href ="search" class = "button">Advance Search</a>
            </li>
            <li>
                <i class="fa-solid fa-user"></i>
                <a href ="#" class = "button">User Management</a>
            </li>
            <li>
                <i class="fa-solid fa-gears"></i>
                <a href ="#" class = "button">Settings</a>
            </li>
        </ul>
    </nav>
    <main>
        <header>
            <div class ="search-bar">
                <form>
                    <input placeholder ="search car">
                </form>
            </div>
            <div class ="add-car-button">
                <i href = "addcar" class="fa-solid fa-plus"></i>
                <a href ="addcar" class ="addbuton">ADD CAR</a>
            </div>

        </header>
        <section class = "AddCarSection">

            <div class = "addcar-container">
                <form class = "addcar" action="addProject" method="POST" ENCTYPE="multipart/form-data">
                    <h1 style = "text-align: center; color:white">Sell Your Perfect Drift-Car</h1>
                    <?php if(isset($messages)) {
                        foreach ($messages as $message){
                            echo $message;
                        }

                    }
                    ?>
                    <label for="cars" class= "makeAndModel">Choose Make and Model</label>
                    <select name="cars" id="cars" style = "width:30%">
                        <optgroup label="Mercedes-Benz">
                            <option value="Mercedes-Benz C-Class">C-Class</option>
                            <option value="Mercedes-Benz E-Class">E-Class</option>
                        </optgroup>
                        <optgroup label="BMW">
                            <option value="BMW 3 Series">3 Series</option>
                            <option value="BMW 5 Series">5 Series</option>
                        </optgroup>
                        <optgroup label="Mazda">
                            <option value="Mazda MX-3">MX-3</option>
                            <option value="Mazda MX-5">MX-5</option>
                            <option value="Mazda RX-8">RX-8</option>
                        </optgroup>
                        <optgroup label="Other">
                            <option value="Other Make and Model">Other Make and Model</option>
                        </optgroup>
                    </select>
                    <input name = "ProductionYear" type = "number" value ="1991" min ="1970" max ="2022" placeholder = "Production Year">
                    <input name = "Price" type = "number" placeholder = "Price">
                    <input name = "Millage" type = "number" placeholder = "Millage">
                    <select name="Fuel" id="Fuel" style = "width:30%">
                        <option value="Gasoline">Gasoline</option>
                        <option value="Diesel">Diesel</option>
                        <option value="LPG">LPG</option>
                    </select>
                    <input name="title" type="text" placeholder="Title">
                    <input name="description" type="text" placeholder="Description">

                    <input type="file" name="file"/>
                    <button>ADD CAR</button>
                </form>
            </div>
        </section>
    </main>
</div>
</body>