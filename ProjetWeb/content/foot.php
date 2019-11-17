<link rel="stylesheet" href="assets/css/stickyFooter.css">
<link rel="stylesheet" href="assets/css/cookieBox.css">

<footer class="footer">

    <?php 
        if(!isset($_COOKIE['accept_cookies']) || !$_COOKIE['accept_cookies']) {
            echo '<div class="cookie-box">
                    En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de cookies  dans le but d\'améliorer votre expérience utilisateur.<br /><button id="yes" onclick="acceptAndHide()">OK</button>
                </div>';
        }
    ?>

    <div class="text-center text-white bg-black">
        <span><a class="text-white" href="contact.php"><strong>Contact</a> -</strong></span>
        <span><a class="text-white" href="ml.php"><strong>Mentions Légales</a> -</strong></span>
        <span><a class="text-white" href="cgv.php"><strong>CGV</a></strong></span>
    </div>
    
    <script type="text/javascript" src="content/acceptCookies.js"></script>
</footer>

