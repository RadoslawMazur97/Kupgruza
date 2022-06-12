<!DOCTYPE html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "public/css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "public/css/project.css">
    <script src="https://kit.fontawesome.com/251a1d7ebb.js" crossorigin="anonymous"></script>
    <title>Advertisements</title>

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
                    <i class="fa-solid fa-plus"></i>
                    add Car
                </div>

            </header>
            <section class = "projects">
                <?php foreach($projects as $project): ?>
                <div id = "project-1"> 
                    <img src ="public/img/uploads/<?= $project->getImage() ?>">
                    <div>
                        <h2><?= $project->getTitle(); ?></h2>
                        <p><?= $project->getDescription(); ?></p>
                    </div>

                </div>
                <?php endforeach; ?>
            </section>
        </main>
    </div>
</body>