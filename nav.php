<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid">
        <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop"
                type="button"><i class="fas fa-bars">

            </i></button>
        <div class="col">
            <a href="index.php">
                <img src="assets/img/Webshop.png" style="width: 118px;height: 63.238px;">
            </a>
        </div>

        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search"
              action="bonne_affaire.php" method="post">
            <!--<div class="input-group">
                                <input class="bg-light form-control border-0 small" type="text" name="search" placeholder="Rechercher un produit">
                                <button class="btn btn-primary py-0" type="submit" name="rechercher" style="color: rgb(254,254,254);background: #e0656a;"><i class="fas fa-search"></i></button>
                            </div>-->
        </form>
        <a href="index.php" style="margin: 10px;">
            <button type="button" class="btn btn-secondary">Accueil</button>
        </a>
        <a href="panier.php" style="margin: 10px;">
            Panier<span><?=array_sum($_SESSION['panier'])?></span>
        </a>
        <div class="nav-item dropdown no-arrow">
            <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="produit.php">
                <button type="button" class="btn btn-secondary">Produit</button>
            </a>
            <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                <a class="dropdown-item" href="produit1.php"><i class=""></i>&nbsp;T-Shirt</a>
                <a class="dropdown-item" href="produit2.php"><i class=""></i>&nbsp;Pantalon</a>
                <a class="dropdown-item" href="produit.php"><i class=""></i>&nbsp;All Produit</a>
            </div>
        </div>
        <a href="bonne_affaire.php" style="margin: 10px;">
            <button type="button" class="btn btn-secondary">Bonnes affaires</button>
        </a>
        <a href="contact.php" style="margin: 10px;">
            <button type="button" class="btn btn-secondary">Contact</button>
        </a>

        <ul class="navbar-nav flex-nowrap ms-auto">
            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false"
                                                                data-bs-toggle="dropdown" href="#"><i
                            class="fas fa-search"></i></a>
                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="me-auto navbar-search w-100">
                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                                        placeholder="Search for ...">
                            <div class="input-group-append">
                                <button class="btn btn-primary py-0" type="button"><i
                                            class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <li class="nav-item dropdown no-arrow mx-1">
                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown">
                </div>
            </li>
            <div class="d-none d-sm-block topbar-divider"></div>


                <?php if (empty($_SESSION['idmembre'])): ?>
                    <div class="nav-item dropdown no-arrow">
                                                                <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">
                                <!--programme de mise en session --> </span></a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                <a class="dropdown-item" href="ajout_menbre/register.html"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;inscription</a>
                                <a class="dropdown-item" href="connexion/login.html"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Connexion</a>
                                </div>
                                </div>

                 <?php  else :  ?>


                    <div class="nav-item dropdown no-arrow">
                                                                <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">
                                <!--programme de mise en session --> <?php echo $_SESSION['prenom']; ?></span></a>
                                <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                <a class="dropdown-item" href="profile.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="deconnexion.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                </div>
                                </div>

                <?php endif; ?>

            </li>
        </ul>
        <i class="fa fa-user"></i>
    </div>
</nav>