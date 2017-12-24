<?php

/* layout.twig */
class __TwigTemplate_cd35cad961aa61b5b8a9378772ae5cfe8452f7e751e51e0eb37f3280e4aba99e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'js' => array($this, 'block_js'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">
    <head>
        ";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        // line 5
        echo "        <meta charset=\"utf-8\">
        <META NAME=\"Description\"
              CONTENT=\"Bienvenue dans un des plus beau palace de marrakech actuellement en vente. Des galleries et des informations de contact. Trois magnifique villas.\">
        <META http-equiv=\"Content-Type\" CONTENT=\"text/html;charset=utf-8\">
        <META NAME=\"google-site-verification\"
              CONTENT=\"+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34=\" />
        <meta name=\"keywords\"
              content=\"villas,buy villas,marrakech,morocco,maroc,villa fratelli,for sale,à vendre,acheter villas,real estate,luxury,house,immobilier,luxueuse\" />
        <meta name=\"author\" content=\"Yaniv Afriat\" />
        <meta name=\"DC.title\" content=\"selling property\" />
        <meta name=\"geo.region\" content=\"FR\" />
        <meta name=\"geo.placename\" content=\"Neuilly-sur-Seine\" />
        <meta name=\"geo.position\" content=\"48.882866;2.265378\" />
        <meta name=\"ICBM\" content=\"48.882866, 2.265378\" />

        <link href='https://fonts.googleapis.com/css?family=Italianno'
              rel='stylesheet' type='text/css'>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-31807202-1', 'auto');
            ga('send', 'pageview');

        </script>

        <link rel=\"stylesheet\"
              href=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/ui-darkness/jquery-ui.css\"
              type=\"text/css\" media=\"all\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/style.css\" />
        <link rel=\"stylesheet\" type=\"text/css\"
              href=\"/js/jquery.fancybox/fancybox/jquery.fancybox-1.3.4.min.css\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/skins/ie7/skin.css\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/mycss.css\" />


        <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/supersized.css\" />
    </head>
    <body>
        <!--<div class=\"cookieValidation row-fluid\">
            <div class=\"container text-center\">
                En poursuivant votre navigation sur ce site, vous acceptez l'<a href=\"/static/cookies/\">utilisation de cookies</a> pour vous proposer des services et offres adaptés.<a href=\"#\" class=\"closeCookie\"><span class=\"glyphicon glyphicon-remove\"></span></a>
            </div>
        </div>-->
        <div class=\"wrapper\">
            <div data-role=\"navbar\" id=\"menu\">
                <ul>
                    <li><a href=\"/\" ";
        // line 61
        if ((($context["page"] ?? null) == "home")) {
            echo "class=\"hover\"";
        }
        echo ">Home</a></li>
                    <li><a href=\"/description/\" ";
        // line 62
        if ((($context["page"] ?? null) == "description")) {
            echo "class=\"hover\"";
        }
        echo ">Description</a></li>
                    <li><a href=\"/rooms/\" ";
        // line 63
        if ((($context["page"] ?? null) == "rooms")) {
            echo "class=\"hover\"";
        }
        echo ">Chambres</a></li>
                    <li><a href=\"/spa/\" ";
        // line 64
        if ((($context["page"] ?? null) == "spa")) {
            echo "class=\"hover\"";
        }
        echo ">Spa</a></li>
                    <li><a href=\"/pool/\" ";
        // line 65
        if ((($context["page"] ?? null) == "piscine")) {
            echo "class=\"hover\"";
        }
        echo ">Piscine</a></li>
                    <li><a href=\"/night/\" ";
        // line 66
        if ((($context["page"] ?? null) == "nuit")) {
            echo "class=\"hover\"";
        }
        echo ">By
                            Night</a></li>
                    <li><a href=\"/contacts/\" ";
        // line 68
        if ((($context["page"] ?? null) == "contacts")) {
            echo "class=\"hover\"";
        }
        echo ">Contacts</a></li>
                </ul>
            </div>
            <div class=\"loader\"><!-- Place at bottom of page --></div>
        ";
        // line 72
        $this->displayBlock('body', $context, $blocks);
        // line 73
        echo "        ";
        $this->loadTemplate("footer.twig", "layout.twig", 73)->display($context);
        // line 74
        echo "
        <script type=\"text/javascript\" src=\"/js/jquery-1.7.2.min.js\"></script>
        <script type=\"text/javascript\" src=\"/js/jquery-ui-1.8.20.custom.min.js\"></script>
        <script type=\"text/javascript\" src=\"/js/supersized.3.2.7.min.js\" media=\"screen\" ></script>
        <script type=\"text/javascript\" src=\"/js/jquery.easing.min.js\" ></script>
        <script type=\"text/javascript\" src=\"/js/jquery.jcarousel.min.js\"></script>
        <script type=\"text/javascript\"
        src=\"/js/jquery.fancybox/fancybox/jquery.fancybox-1.3.4.pack.min.js\"></script>
        <script type=\"text/javascript\"
        src=\"/js/jquery.fancybox/fancybox/jquery.mousewheel-3.0.4.pack.min.js\"></script>
        <script>
            jQuery(function (\$) {

                //  Initialize Backgound Stretcher
                \$.supersized({
                    // Functionality
                    slideshow: 1, // Slideshow on/off
                    autoplay: 1, // Slideshow starts playing automatically
                    start_slide: 1, // Start slide (0 is random)
                    stop_loop: 0, // Pauses slideshow on last slide
                    random: 0, // Randomize slide order (Ignores start slide)
                    slide_interval: 3000, // Length between transitions
                    transition: 1, // 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                    transition_speed: 1000, // Speed of transition
                    new_window: 1, // Image links open in new window/tab
                    pause_hover: 0, // Pause slideshow on hover
                    keyboard_nav: 1, // Keyboard navigation on/off
                    performance: 1, // 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
                    image_protect: 1, // Disables image dragging and right click with Javascript

                    // Size & Position
                    min_width: 0, // Min width allowed (in pixels)
                    min_height: 0, // Min height allowed (in pixels)
                    vertical_center: 1, // Vertically center background
                    horizontal_center: 1, // Horizontally center background
                    fit_always: 0, // Image will never exceed browser width or height (Ignores min. dimensions)
                    fit_portrait: 1, // Portrait images will not exceed browser height
                    fit_landscape: 0, // Landscape images will not exceed browser width

                    // Components
                    slide_links: 'false', // Individual links for each slide (Options: false, 'num', 'name', 'blank')
                    thumb_links: 0, // Individual thumb links for each slide
                    thumbnail_navigation: 0, // Thumbnail navigation
                    slides: [{image: 'https://res.cloudinary.com/afriat/image/upload/e_contrast:51/e_saturation:90/c_scale,w_2272/villafratelli/images/big/piscine/IMG_1175.jpg', title: 'Image Credit: VillaFratelli'},
                        {image: 'https://res.cloudinary.com/afriat/image/upload/e_contrast:51/e_saturation:90/c_scale,w_2272/villafratelli/images/big/piscine/IMG_1078.jpg', title: 'Image Credit: VillaFratelli'},
                        {image: 'https://res.cloudinary.com/afriat/image/upload/e_contrast:51/e_saturation:90/c_scale,w_2272/villafratelli/images/big/piscine/IMG_1065.jpg', title: 'Image Credit: VillaFratelli'},
                        {image: 'https://res.cloudinary.com/afriat/image/upload/e_contrast:51/e_saturation:90/c_scale,w_2272/villafratelli/images/big/nuit/IMG_1424.jpg', title: 'Image Credit: VillaFratelli'},
                        {image: 'https://res.cloudinary.com/afriat/image/upload/e_contrast:51/e_saturation:90/c_scale,w_2272/villafratelli/images/big/nuit/IMG_1422.jpg', title: 'Image Credit: VillaFratelli'},
                        {image: 'https://res.cloudinary.com/afriat/image/upload/e_contrast:51/e_saturation:90/c_scale,w_2272/villafratelli/images/big/nuit/IMG_1349.jpg', title: 'Image Credit: VillaFratelli'}],
                    // Theme Options
                    progress_bar: 0, // Timer for each slide
                    mouse_scrub: 0
                });
                if (/Android|webOS|iPhone|iPad|BlackBerry|Windows Phone|Opera Mini|IEMobile|Mobile/i.test(navigator.userAgent) === false) {
                    jQuery('#mycarousel').jcarousel({
                    });
                }
            });
        </script>
    ";
        // line 133
        $this->displayBlock('js', $context, $blocks);
        // line 134
        echo "</body>
</html>
";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "<title>Trois Villas de R&ecirc;ves à marrakech à vendre - For sale</title>";
    }

    // line 72
    public function block_body($context, array $blocks = array())
    {
    }

    // line 133
    public function block_js($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 133,  213 => 72,  207 => 4,  201 => 134,  199 => 133,  138 => 74,  135 => 73,  133 => 72,  124 => 68,  117 => 66,  111 => 65,  105 => 64,  99 => 63,  93 => 62,  87 => 61,  29 => 5,  27 => 4,  22 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "layout.twig", "/home/vagrant/Code/villafratelli/src/VillaFratelli/Views/layout.twig");
    }
}
