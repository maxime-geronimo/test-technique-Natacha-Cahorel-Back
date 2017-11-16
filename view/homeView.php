<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Profile pic manager" content="">
    <meta name="Natacha" content="">

    <title>Profile Pic manager</title>

    <!-- Bootstrap core CSS -->
    <link href="view/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="view/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="view/css/freelancer.min.css" rel="stylesheet">

    <!-- Custom styles by Natacha -->
    <link rel="stylesheet" href="view/css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-light fixed-top" id="mainNav">
    <div class="container">
        <h1>PROFILE PIC MANAGER</h1>
        <div class="profilPic">
            <img src="view/img/<?= ($defautPic["nom"]); ?>" alt="profile pic">
        </div>
    </div>
</nav>


<!-- Picture Grid Section -->
<section id="portfolio">
    <div class="container">
        <div class="row">


            <?php
            $i=1;
            foreach ($articles as $key => $value): ?>

                <div class="portfolio-item">
                    <a class="portfolio-link" href="#portfolioModal<?=$i ?>" data-toggle="modal">
                        <figure>
                        <img class="img-fluid" src="view/img/<?=($value["nom"]);?>" alt="">
                        <figcaption><a href="?setNewPic=<?=($value["id"]);?>">Set as default</a></figcaption>
                        </figure>
                    </a>
                </div>

            <?php
            $i++;
            endforeach; ?>




        </div>
    </div>
</section>


<!-- ADD Section -->
<section id="add">
    <div class="container">
        <div class="addBtn">

                <a class="addBtnLink" href="#addModal" data-toggle="modal">
                    <img src="view/img/add/add.png"
                         srcset="view/img/add/add@2x.png 2x,
             view/img/add/add@3x.png 3x"
                         class="add">
                </a>

        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center">
</footer>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top d-lg-none">
    <a class="btn btn-primary js-scroll-trigger" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>

<!-- Portfolio Modals -->

<?php
$i=1;
foreach ($articles as $key => $value): ?>

    <div class="portfolio-modal modal fade" id="portfolioModal<?= $i ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="modal-body">
                                <h2><?=($value["titre"]);?></h2>
                                <hr class="star-primary">
                                <img class="img-fluid img-centered" src="img/portfolio/cabin.png" alt="">
                                <p>Use this area of the page to describe your project. The icon above is part of a free icon set by
                                    <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                                <ul class="list-inline item-details">
                                    <li>Client:
                                        <strong>
                                            <a href="http://startbootstrap.com">Start Bootstrap</a>
                                        </strong>
                                    </li>
                                    <li>Date:
                                        <strong>
                                            <a href="http://startbootstrap.com">April 2014</a>
                                        </strong>
                                    </li>
                                    <li>Service:
                                        <strong>
                                            <a href="http://startbootstrap.com">Web Development</a>
                                        </strong>
                                    </li>
                                </ul>
                                <button class="btn btn-success" type="button" data-dismiss="modal">
                                    <i class="fa fa-times"></i>
                                    Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $i++;
endforeach; ?>

<!-- Add Picture Modal -->

<div class="portfolio-modal modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <h2>Ajouter une nouvelle photo</h2>

                            <form action="" method="POST" enctype="multipart/form-data">
                                <div>
                                    titre
                                    <br/>
                                    <input type="text" name="titre" class="form-control">
                                </div>

                                <div>description
                                    <br/>
                                    <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>
                                </div>


                                <div>
                                    image
                                    <br/>
                                    <input type="file" name="image" class="form-control">
                                </div>


                                <div>
                                    Remplacer la photo par défaut ?
                                    <br/>
                                    <select name="defautPic" id="defPic" class="form-control">
                                        <optgroup>
                                            <option value="oui" name="defautPic">oui</option>
                                            <option value="non" name="defautPic">non</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div>
                                    <button class="btn btn-primary" id="addArticleBtn">Enregistrer</button>
                                </div>


                            </form>


                            <button class="btn btn-success" type="button" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                Close</button>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Bootstrap core JavaScript -->
<script src="view/vendor/jquery/jquery.min.js"></script>
<script src="view/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="view/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="view/js/jqBootstrapValidation.js"></script>
<script src="view/js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="view/js/freelancer.min.js"></script>

</body>

</html>
