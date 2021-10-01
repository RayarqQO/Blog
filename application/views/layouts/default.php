<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="/public/styles/main.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <script src="/public/scripts/jquery.js"></script>
        <script src="/public/scripts/form.js"></script>
    </head>
    <body>
        <div class="header">
            <div class="header__section">
                <div class="header__item headerlogo">
                    <a href="#">Blog</a>
                </div>
                <div class="header__item headerButton">
                    <a href="#">Posts</a>
                </div>
                <div class="header__item headerButton">
                    <a href="#">About me</a>
                </div>
                <div class="header__item headerButton">
                    <a href="#">Contacts</a>
                </div>
                <div class="header__item headerLogin">
                    <a href="#"><i class="fas fa-sign-in-alt"></i></a>
                </div>  
            </div>
        </div>
        <?php echo $content; ?>
        <footer>
            <div class="footer__section">
                <ul class="social__section">
                    <li><a href="#"><i class="fab fa-github"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></i></a></li>
                    <li><a href="#"><i class="fab fa-vk"></i></a></li>
                    <li><a href="#"><i class="fab fa-telegram"></i></a></li>
                </ul>
            </div>
        </footer>
    </body>
</html>