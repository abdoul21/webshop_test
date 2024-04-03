<?php
include "bdd.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact</title>
    <?php include("icon_ongle.php") ?>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Article-List.css">
    <link rel="stylesheet" href="assets/css/untitled-1.css">
    <link rel="stylesheet" href="assets/css/untitled-2.css">
    <link rel="stylesheet" href="assets/css/untitled-3.css">
    <link rel="stylesheet" href="assets/css/untitled-4.css">
    <link rel="stylesheet" href="assets/css/untitled-5.css">
    <link rel="stylesheet" href="assets/css/untitled-6.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body id="page-top">
<div id="wrapper">
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <?php include "nav.php"; ?>
            <div class="container-fluid">
                <h3 class="text-dark mb-1">Contact</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-12 col-xl-10">
                    <section class="position-relative py-4 py-xl-5">
                        <div class="container position-relative">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <iframe allowfullscreen="" frameborder="0"
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59924.89775751899!2d57.4555766369273!3d-20.16297625703778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x217c504941d601ef%3A0xfdc5186c91bdbb3d!2sPort%20Louis!5e0!3m2!1sfr!2smu!4v1681493019195!5m2!1sfr!2smu"
                                                    width="600" height="450" style="border:0;" allowfullscreen=""
                                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                                    width="100%" height="100%"></iframe>
                                        </div>
                                        <div class="col-md-6 col-xl-4">
                                            <div>
                                                <?php if (isset($_SESSION['idmembre'])):?>
                                                <form class="p-3 p-xl-4" action="contactphp.php" method="post">
                                                    <h4 style="color: var(--bs-gray-900);">Adresse du Magasin</h4>
                                                    <p class="text-muted" style="color: var(--bs-secondary);">Magasin
                                                        WebShop<br>97117 Port-Louis 5805-7305<br>Maurice<br></p>
                                                    <div class="mb-3"><label class="form-label" for="name"
                                                                             style="color: var(--bs-gray-900);">Nom</label><br>
                                                        <label class="form-label"><?php echo $_SESSION['nom']; ?></label>
                                                        <input class="form-control" type="hidden" id="name" name="nom" value="<?php echo $_SESSION['nom']; ?>">
                                                    </div>
                                                    <div class="mb-3"><label class="form-label" for="objet"
                                                                             style="color: var(--bs-gray-900);">Prenom</label><br>
                                                        <label class="form-label"><?php echo $_SESSION['prenom']; ?></label>
                                                        <input class="form-control" type="hidden" id="prenom" name="prenom" value="<?php echo $_SESSION['prenom']; ?>">
                                                    </div>
                                                    <div class="mb-3"><label class="form-label" for="email"
                                                                             style="color: var(--bs-gray-900);">Email</label><br>
                                                        <label class="form-label"><?php echo $_SESSION['email']; ?></label>
                                                        <input class="form-control" type="hidden" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
                                                    </div>
                                                    <div class="mb-3"><label class="form-label" for="message"
                                                                             style="color: var(--bs-gray-900);">Message</label><textarea
                                                                class="form-control" id="message" name="message"
                                                                rows="6"></textarea></div>
                                                    <div class="mb-3">
                                                        <button class="btn btn-secondary" type="submit">Envoyer</button>
                                                    </div>
                                                </form>
                                                <?php else:?>
                                                <form class="p-3 p-xl-4" action="contactphp.php" method="post">
                                                    <h4 style="color: var(--bs-gray-900);">Adresse du Magasin</h4>
                                                    <p class="text-muted" style="color: var(--bs-secondary);">Magasin
                                                        WebShop<br>97117 Port-Louis 5805-7305<br>Maurice<br></p>
                                                    <div class="mb-3"><label class="form-label" for="name"
                                                                             style="color: var(--bs-gray-900);">Nom</label>
                                                        <input class="form-control" type="text" id="name" name="nom">
                                                    </div>
                                                    <div class="mb-3"><label class="form-label" for="objet"
                                                                             style="color: var(--bs-gray-900);">Prenom</label><input
                                                                class="form-control" type="text" id="prenom"
                                                                name="prenom"></div>
                                                    <div class="mb-3"><label class="form-label" for="email"
                                                                             style="color: var(--bs-gray-900);">Email</label><input
                                                                class="form-control" type="email" id="email"
                                                                name="email"></div>
                                                    <div class="mb-3"><label class="form-label" for="message"
                                                                             style="color: var(--bs-gray-900);">Message</label><textarea
                                                                class="form-control" id="message" name="message"
                                                                rows="6"></textarea></div>
                                                    <div class="mb-3">
                                                        <button class="btn btn-secondary" type="submit">Envoyer</button>
                                                    </div>
                                                </form>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </section>
                    <div class="card shadow-lg o-hidden border-0 my-5">
                        <div class="card-body p-0"></div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Brand 2022</span></div>
            </div>
        </footer>
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/theme.js"></script>
<?php include('footer.php'); ?>
</body>

</html>