<?php
$userCookie = "userCookie";
if(!isset($_COOKIE[$userCookie])) {
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
}

?>
<!DOCTYPE html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "public/css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/project.css">
    <script src="https://kit.fontawesome.com/251a1d7ebb.js" crossorigin="anonymous"></script>
    <script type ="text/javascript" src="./public/js/search.js" defer></script>
    <script type ="text/javascript" src="./public/js/delproject.js" defer></script>
    <title>Advertisements</title>

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
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <a href ="login" class = "button">Logout</a>
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
                    <input placeholder ="search car">
            </div>
                <div class ="add-car-button">
                    <i href = "addcar" class="fa-solid fa-plus"></i>
                    <a href ="addcar" class ="addbuton">ADD CAR</a>
                </div>

            </header>
            <section class = "projects">
                <?php if(!empty($projects))
                    foreach($projects as $project): ?>
                <div id = "<?= $project->getId() ?>">
                    <img src ="public/img/uploads/<?= $project->getImage() ?>">
                    <div>
                        <h3><?= $project->getTitle(); ?></h3>
                        <h4><?= $project->getDescription(); ?></h4>
                        <p> <?=$project->getModel();?><?=" ".$project->getProductionYear() ?> <?=$project->getFuel(); ?></p>
                        <?php
                        if(isset($_COOKIE['isAdminCookie'])){
                            $isAdmin=$_COOKIE['isAdminCookie'];
                            if($isAdmin>=2){
                                ?>
                                <div class="social-section">
                                    <i class="fa-solid fa-trash"></i>
                                </div>
                            <?php         }
                        }

                        ?>


                    </div>

                </div>
                <?php endforeach; ?>
            </section>
        </main>
    </div>
</body>



<template id="project-template">
    <div id = "project-1">
        <img src ="">
        <div>
            <h3>title</h3>
            <h4>description</h4>
            <p>model</p>


        </div>

    </div>

</template>