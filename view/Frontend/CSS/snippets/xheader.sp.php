<script src="https://kit.fontawesome.com/6016e9420e.js" crossorigin="anonymous"></script>
<style>
    .header {
        width: 100%;
        margin: 0 auto;
        text-align: center;
        position: relative;
        padding-bottom: 0.02;
    }

    h1 {
        color: #002a50;
    }

    #white_label {
        height: 5em;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.9);
        position: relative;
        bottom: 26em;
        z-index: 2;
    }

    #img_schule {

    }

    #logo_bs {
        margin: 2em;
        position: relative;
        bottom: 31.5em;
        text-align: left;
        z-index: 3;
    }

    #logo_od {
        margin: 2em;
    }

    .social_icons {
        position: absolute;
        right: 10px;
        top: 100px;
        z-index: 4;
    }

    .social_label {
        position: absolute;
        bottom: 2em;
    }

    a {
        text-decoration: none;
    }

    .icon-cog {
        color: #002a50;
    }

    .icon-cog:hover {
        color: rgba(245, 196, 0, 1);
    }
</style>

<header class="header">

    <img src="/Schul-Fuehrung/view/Frontend/CSS/img/lbshi_cropped.png" id="img_schule" width="100%">

    <div id="white_label">
    </div>

    <a href="/Schul-Fuehrung/view/startseite.tpl.php">
        <div id="logo_bs">
            <img src="/Schul-Fuehrung/view/Frontend/CSS/img/Logos Berufsschule.bz/LBSHI_Logo_RGB_PNG.png" alt="Landesberufsschule für Handwerk und Industrie Bozen" width="250" loading="lazy">
        </div>
    </a>

    <h1>Führungen buchen</h1>

    <div class="social_icons">

        <a class="btn btn-social-icon" href="https://www.facebook.com/lbs.bozen" title="Facebook">
            <i class="fa fa-facebook-square fa-2x icon-cog" aria-hidden="true"></i>
            <span class="sr-only">Facebook</span></a>

        <a class="btn btn-social-icon" href="https://www.instagram.com/lbshandwerkindustrie/" title="Instagram">
            <i class="fa fa-instagram fa-2x icon-cog" aria-hidden="true"> </i>
            <span class="sr-only">Instagram</span></a>

        <a class="btn btn-social-icon" href="https://www.youtube.com/channel/UCsAU2KSrwCFmkUFeCMhQD4Q/feed" title="YouTube">
            <i class="fa fa-youtube fa-2x icon-cog" aria-hidden="true"> </i>
            <span class="sr-only">YouTube</span></a>

    </div>
</header>