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
                <a href ="#" class = "button">Advertisements</a>
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
                <a href ="#" class = "button">Advance Search</a>
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
                <form class = "addcar">
                    <h1 style = "text-align: center; color:white">Find Your Perfect Drift-Car</h1>
                    <label for="cars" class= "makeAndModel">Choose Make and Model</label>
                    <select name="cars" id="cars">
                        <optgroup label="Mercedes-Benz">
                            <option value="C-Class">C-Class</option>
                            <option value="E-Class">E-Class</option>
                        </optgroup>
                        <optgroup label="BMW">
                            <option value="3 Series">3 Series</option>
                            <option value="5 Series">5 Series</option>
                        </optgroup>
                        <optgroup label="Mazda">
                            <option value="MX-3">MX-3</option>
                            <option value="MX-5">MX-5</option>
                            <option value="RX-8">RX-8</option>
                        </optgroup>
                        <optgroup label="Other">
                            <option value="Other Make and Model">Other Make and Model</option>
                        </optgroup>
                    </select>
                    <input name = "Min Year" type = "number" min ="1970" max ="2022" placeholder = "Min Year">
                    <input name = "Max Year" type = "number" min ="1970" max ="2022" placeholder = "Max Year">
                    <input name = "Min Price" type = "number" min ="1" placeholder = "Min Price">
                    <input name = "Max Price" type = "number" min ="1" placeholder = "Max Price">
                    <select name="Fuel" id="Fuel">
                        <option value="Gasoline">Gasoline</option>
                        <option value="Diesel">Diesel</option>
                        <option value="LPG">LPG</option>
                    </select>
                    <button>More Options</button>
                    <button>SEARCH</button>
                </form>
            </div>
        </section>
    </main>
</div>
</body>