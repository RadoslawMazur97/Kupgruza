<!DOCTYPE html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "public/css/home.css">
    <title>HOME PAGE</title>

</head>

<body>

    <div class = "container">


        <div class = "login-container">
            <h1 style = "text-align: center; color:white">Find Your Perfect Drift-Car</h1>
            <form class = "login">
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
        <div class = "logo">
            <img src="public/img/logo.svg">          
        </div>
    </div>
</body>