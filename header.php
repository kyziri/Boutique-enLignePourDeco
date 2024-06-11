
<header class="header">
    <div class="header_top">
        <div class="container">
            <!-- Bienvenue utilisateur -->
            <?php if (isset($user_id) && $user_id): ?>
                <p>Bienvenue, <?php echo htmlspecialchars($user_name); ?>!</p>
                <a href="logout.php">Se déconnecter</a>
            <?php else: ?>
                <a href="login.php">Guest</a>
            <?php endif; ?>
        </div>
    </div>

    <!--=====Bare de navigation dans le header=====-->
    <div class="nav container">
        <div class="nav_logo">
            <a href="index.php">
                <h1 class="nav_logonaka">Leamsi<span>Déco</span></h1>
                <p class="logo_slogan">La déco tout en un à portée de main</p>
            </a>
        </div>

        <div class="header_search">
            <form action="search.php" method="GET">
                <input type="text" name="query" class="form-input" placeholder="Rechercher des produits, des catégories, des prix...">
                <button type="submit" name="submit" class="search_btn">
                    <img src="asset/image/chercher.svg" class="search_btn-img">
                </button>
            </form>
        </div>

        <div class="header_users-actions">
            <?php if (isset($user_id) && $user_id): ?>
                <div class="header_action-btn user-menu">
                    <img src="asset/image/utilisateur (1).png" alt="icon pour utilisateur">
                    <div class="user-dropdown">
                        <p>Username: <?php echo htmlspecialchars($user_name); ?></p>
                        <p>Email: <?php echo htmlspecialchars($user_email); ?></p>
                        <a href="logout.php" class="btn_logout">Logout</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="Registration.php" class="header_action-btn">
                    <img src="asset/image/utilisateur (1).png" alt="icon pour utilisateur">
                </a>
            <?php endif; ?>

            <a href="wishlist.php" class="header_action-btn">
                <img src="asset/image/icon-heart.svg" alt="icon pour le fovori">
                <span class="count">0</span>
            </a>

            <?php if (isset($user_id) && $user_id): ?>
                <a href="cart.php" class="header_action-btn">
                    <img src="asset/image/icon-cart.svg" alt="icon pour l'achat">
                    <span class="count"><?php echo $total_quantity; ?></span>
                   
                </a>
            <?php else: ?>
                <a href="login.php" class="header_action-btn">
                    <img src="asset/image/icon-cart.svg" alt="icon pour l'achat">
                    <span class="count">0</span>
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!--La barre de navigation Pour un ordinateur-->
    <nav class="nav_menu">
        <div class="container">
            <ul class="menu_categories">
                <li class="menu_category"><a href="index.php" class="menu_title">Accueil</a></li>
                <li class="menu_category"><a href="tapis.php" class="menu_title">Tapis</a></li>
                <li class="menu_category"><a href="meuble-product.php" class="menu_title">Meubles</a></li>
                <li class="menu_category"><a href="luminaire-product.php" class="menu_title">Luminaire</a></li>
                <li class="menu_category"><a href="deco.php" class="menu_title">Déco</a></li>
                <li class="menu_category"><a href="contact.php" class="menu_title">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>



