<?php 
if(isset($_POST['btnphp'])){
    
    $ok=false;
    
    $prenom =  strip_tags($_POST['prenom']);
    $nom = strip_tags($_POST['nom']);
    $genre = strip_tags($_POST['genre']);
    $email = strip_tags($_POST['email']);
    $pays = strip_tags($_POST['pays']);
    $sujet = strip_tags($_POST['sujet']);
    $messages = strip_tags($_POST['message']);

    $countryList=["Belgique","Allemagne", "France" ,"Italie", "Pays-bas"];
    $subjectList=["Remerciement","Probleme","Autre"];

    $firstErr = "";
    $secondErr = "";
    $genreErr = "";
    $emailErr = "";
    $paysErr = "";
    $sujetErr = "";
    $messageErr = "";

// nom et prenom
    if(isset($prenom)) {
        $result = trim(filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING));
        if(!preg_match("/^[a-zA-Z éèçà-]*$/", $result , $prenom)) {
            $ok=false;
        } else {
            $prenom = $result;
            $ok=true;
        }
    }
    if(isset($nom)) {
    $result = trim(filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING));
     if(!preg_match("/^[a-zA-Z éèçà-]*$/", $result, $nom)) {
        $ok=false;
     } else {
         $nom = $result;
         $ok=true;
     }
    }
// gender
    if (isset($genre)) {
    $result = trim(filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING));
        if(empty($result)) {
            $ok=null;
        }
        else{
            if( ($result =='homme') || ($result =='femme') ) {
                 $genre = $result;
                $ok=true;
            }    
            else{
                $ok=false;
            }
        }
    }
// email
    if (isset($email)) {
        $result = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL));
        if(empty($result)) {
            $ok=null;
        }
        else{
            if (!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $result)) {
                $ok=false;
            }
            else{
                $email = $result;
                $ok=true;
            }
        }
        

    }
// pays
    if (isset($pays)){
        $ok=false;
        for($i=0;$i<count($countryList);$i++){
            if($pays==$countryList[$i]){
                $countryList=["","",""];
                $ok=true;
            }
        }  
    }

// sujet
    if (isset($sujet)){
        $ok=false;
        for($i=0;$i<count($subjectList);$i++){
            if($sujet==$subjectList[$i]){
                $subjectList=["","",""];
                $ok=true;
            }
        }  
    }

    // message 
    if (isset($messages)) {
        $result = trim (filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));
        if(empty($result)) {
            $ok=null;
        }else{
                $messages = $result;
                $ok=true;
        }
        
    }
    if($ok==true){
        $contenu="Nom du client : $nom \n Prénom du client: $prenom \n Genre: $genre \n Venu de: $pays \n Sujet: $sujet \n Message: $messages";
        $recipient = "sekri.yassine@gmail.com";
        $mailhead = "Hackers-Poulette Formulaire";
        $mailheader = "Mail de : $email \r\n";
        mail($recipient, $mailhead, $contenu, $mailheader) or die("Erreur!");
        echo '<script type="text/javascript">window.alert("votre message est bien envoyé ");</script>'; 
       }else{
        echo '<script type="text/javascript">window.alert("votre formulaire comporte de(s) erreur(s) ");</script>';
      }
}else{
    $prenom = ""; 
    $nom = ""; 
    $genre = ""; 
    $email =""; 
    $pays = "Choisisez un pays"; 
    $sujet = "Choisisez votre sujet"; 
    $messages ="";  
}
  
?>

<!DOCTYPE html>
<html class="no-js" lang="fr">

<head>
    <title>HackerPoullette</title>

    <!-- meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    <link rel="stylesheet" href="./assets/css/animate.css">
    <link rel="stylesheet" href="./style.css">
    <script src="https://kit.fontawesome.com/126bbe9047.js" crossorigin="anonymous"></script>

    <!-- google fonts -->
    <script src="assets/js/modernizr.js"></script>

</head>

<body id="body">
    <!-- Header area -->
    <header id="header">
        <div class="center text-center">
            <h1 id="bigheadline"><img src="hackers-poulette-logo.png" alt="Logo societé hackerspoulette" ></h1>
            <h4 class="subheadline">Votre assistant raspberry</h4>
        </div>
        <div class="bottom">
            <a data-scroll href="#navigation" class="scrollDown animated pulse" id="scrollToContent"><i
                    class="fas fa-arrow-circle-down"></i></a>
        </div>
    </header>

    <!-- Navigation area -->
    <section id="navigation">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="logo"><a data-scroll href="#body" class="logo-text">Menu</a></div>
                </div>
                <div class="col-xs-6">
                    <div class="nav">
                        <a href="#" data-placement="bottom" title="Menu" class="menu" data-toggle="dropdown"><i
                                class="fas fa-bars"></i></a>
                        <div class="dropdown-menu">
                            <div class="arrow-up"></div>
                            <ul>
                                <li><a data-scroll href="#body">Acceuil <i class="fas fa-home"></i></a><span
                                        class="menu-effect"></span></li>
                                <li><a data-scroll href="#formscroll">Contact <i
                                            class="fas fa-envelope-open-text"></i></a><span class="menu-effect"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Content Area -->

    <!-- services section -->

    <section id="services" class="service-area">
        <div class="container">
            <h2 class="block_title">Services</h2>
            <div class="row">
                <div class="col-md-3 col-sm-6">

                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="services">
                        <div class="service-wrap">
                            <i class="fas fa-cart-arrow-down fa-5x"></i>
                            <h3>Vente particulier</h3>
                            <p>HackerPoullette vous propose different materielle RapberryPI !</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="services">
                        <div class="service-wrap">
                            <i class="fas fa-hammer fa-5x"></i>
                            <h3>Configuration</h3>
                            <p>HackPoullette vous propose de configurer et d'installer votre raspberry ! .</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                </div>
            </div>
        </div>
    </section><!-- services -->

    <!-- Portfolio Area -->

    <section id="portfolio" class="portfolio-area">
        <div class="container">
            <h2 class="block_title">Nos Produits</h2>
            <div class="row port cs-style-3">
                <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                    <figure>
                        <img src="assets/images/rasp01.jpg" alt="article 01">
                        <figcaption>
                            <h3>Raspberry Pi</h3>
                            <span>200€</span>
                            <a href="#" class="button">Take a look</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                    <figure>
                        <img src="assets/images/rasp02.jpg" alt="article 02">
                        <figcaption>
                            <h3>Raspberry Pi Zero</h3>
                            <span>20€</span>
                            <a href="#" class="button">Take a look</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                    <figure>
                        <img src="assets/images/rasp03.jpg" alt="article 03">
                        <figcaption>
                            <h3>Raspberry Pi Zero WH</h3>
                            <span>15€</span>
                            <a href="#" class="button">Take a look</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                    <figure>
                        <img src="assets/images/rasp04.jpg" alt="article 04">
                        <figcaption>
                            <h3>Raspberry Pi</h3>
                            <span>15€</span>
                            <a href="#" class="button">Take a look</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                    <figure>
                        <img src="assets/images/rasp05.jpg" alt="article 05">
                        <figcaption>
                            <h3>Raspberry pi 2</h3>
                            <span>15.99€</span>
                            <a href="#" class="button">Take a look</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 item-space">
                    <figure>
                        <img src="assets/images/rasp06.jpg" alt="article 06">
                        <figcaption>
                            <h3>Raspberry Pi Zero W</h3>
                            <span>19.99€</span>
                            <a href="#" class="button">Take a look</a>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div><!-- container -->
    </section><!-- portfolio -->

    <!-- Testimonial Area -->

    <section id="testimonial" class="testimonial-area">
        <div class="container">
            <h2 class="block_title">Nos assistant</h2>
            <div class="row">
                <div class="col-xs-12">
                </div>
                <div id="testimonial-container" class="col-xs-12">
                    <div class="testimonila-block">
                        <img src="assets/images/74479982_566159964138245_4111762034310250496_n.jpg" alt="Presentation equipe en charge"
                            class="selfshot">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem sed mollitia illum!
                            Molestiae dignissimos, hic dolorem et eius ut nobis. Corrupti totam amet aperiam aut
                            voluptate nobis dolor at soluta.</p>
                        <strong>Jean louis dupont</strong>
                        <br>
                        <small>Tech dev</small>
                    </div>
                    <div class="testimonila-block">
                        <img src="#" alt="Presentation equipe en charge" class="selfshot">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem sed mollitia illum!
                            Molestiae dignissimos, hic dolorem et eius ut nobis. Corrupti totam amet aperiam aut
                            voluptate nobis dolor at soluta.</p>
                        <strong>Mbappé</strong>
                        <br>
                        <small>Project Manager</small>
                    </div>
                    <div class="testimonila-block">
                        <img src="assets/images/yass.jpg" alt="Presentation equipe en charge" class="selfshot">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem sed mollitia illum!
                            Molestiae dignissimos, hic dolorem et eius ut nobis. Corrupti totam amet aperiam aut
                            voluptate nobis dolor at soluta.</p>
                        <strong>Sekri Yassine</strong>
                        <br>
                        <small>Developer</small>
                    </div>
                </div>
            </div>
        </div><!-- container -->
    </section><!-- testimonial -->

    <!--FORMULAIREUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU-->
    <section>
        <div class="container" id="formscroll">
            <div class="row">
                <article>
                    <h2 class="block_title">Nous contactez</h2>
                </article>
            </div>


            <form method="post" action="index.php">

                <div class="form-row">
                    <div class="form-group col-3">
                        <input name="prenom" type="text" class="form-control" id="prenom" placeholder="Prénom"
                            value="<?php echo $prenom?>">
                    </div>
                    <div class="form-group col-3">
                        <input name="nom" type="text" class="form-control" id="nom" placeholder="Nom"
                            value="<?php echo $nom ?>">
                    </div>

                    <div>
                        <label for="genre">sexe: homme</label>
                        <input type="radio" id="checkH" name="genre" value="homme" <?php if($genre=='homme'){ ?>
                            checked="checked" <?php } ?>>
                        <label for="genre">femme</label>
                        <input type="radio" id="checkF" name="genre" value="femme" <?php if($genre=='femme'){ ?>
                            checked="checked" <?php } ?>>
                        <p id="errorGenre"></p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                    <label for="E-mail"></label>
                        <input name="email" type="text" class="form-control" id="inputEmail" placeholder="Email"
                            value="<?php echo $email ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="selection pays"></label>
                        <select name="pays" class="mdb-select md-form" id="selectPays">
                            <option value="" disabled selected><?php echo $pays ?></option>
                            <option value="Belgique">Belgique</option>
                            <option value="Allemagne">Allemagne</option>
                            <option value="France">France</option>
                            <option value="Italie">Italie</option>
                            <option value="Pays-bas">Pays-bas</option>
                        </select>

                        <label for="Sujet a selectionner"></label>
                        <select name="sujet" class="mdb-select md-form" id="subject">
                            <option value="" disabled selected><?php echo $sujet ?></option>
                            <option value="Probleme">Probleme</option>
                            <option value="Remerciement">Remerciement</option>
                            <option value="Autres">Autres</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-10">
                        <label for="zone texte message"></label>
                        <textarea name="message" class="form-control" id="message" placeholder="Votre message..."
                            rows="5"><?php echo $messages ?></textarea>
                    </div>
                </div>
                <input name="btnphp" id="run" class="btn btn-secondary" type="submit" value="submit">
            </form>

        </div>
    </section>
    <hr>

    <!-- Contact Area -->

    <section id="contact" class="mapWrap">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1798.1165550452881!2d4.439332407669209!3d50.4053132430953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c227637e52f8cd%3A0xc86e426105b5a0e5!2sE6K%20-%20Square%20des%20Martyrs%201%2C%206000%20Charleroi!5e0!3m2!1sfr!2sbe!4v1582460858672!5m2!1sfr!2sbe"
            id="googleMap" width="100%;" height="auto;" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

        <div id="social">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="scoialinks">
                            <li class="normal-txt">Nos reseaux !</li>
                            <li class="social-icons"><a class="facebook" href="#"></a></li>
                            <li class="social-icons"><a class="twitter" href="#"></a></li>
                            <li class="social-icons"><a class="linkedin" href="#"></a></li>
                            <li class="social-icons"><a class="google-plus" href="#"></a></li>
                            <li class="social-icons"><a class="wordpress" href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- social -->
    </section><!-- contact -->

    <!-- Footer Area -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <p class="designed">©<img src="./hackers-poulette-logo.png" style="width:50px;"
                            alt="logo HackerPoullette"> HackerPoullette</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Necessery scripts -->
    <script src="script.js"></script>

    <script src="assets/js/jquery-2.1.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="assets/js/jquery.actual.min.js"></script>
    <script src="assets/js/smooth-scroll.js"></script>
    <script src="assets/js/owl.carousel.js"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>
