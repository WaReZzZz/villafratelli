<?php 
include_once 'include/functions.php';
if (detection_mobile() == true) {
    header('Location: http://mobile.villafratelli.com');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Trois Villas de R&ecirc;ves à marrakech à vendre - For sale</title>
        <meta charset="utf-8">
        <META NAME="Description"
              CONTENT="Bienvenue dans un des plus beau palace de marrakech actuellement en vente. Des galleries et des informations de contact. Trois magnifique villas.">
        <META http-equiv="Content-Type" CONTENT="text/html;charset=utf-8">
        <META NAME="google-site-verification"
              CONTENT="+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34=" />
        <meta name="keywords"
              content="villas,buy villas,marrakech,morocco,maroc,villa fratelli,for sale,à vendre,acheter villas,real estate,luxury,house,immobilier,luxueuse" />
        <meta name="author" content="Yaniv Afriat" />
        <meta name="DC.title" content="selling property" />
        <meta name="geo.region" content="FR" />
        <meta name="geo.placename" content="Neuilly-sur-Seine" />
        <meta name="geo.position" content="48.882866;2.265378" />
        <meta name="ICBM" content="48.882866, 2.265378" />

        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Italianno'
              rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/supersized.3.2.7.min.js" media="screen" />
        <script type="text/javascript" src="js/jquery.easing.min.js" />
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-31807202-1', 'auto');
		  ga('send', 'pageview');

		</script>
        <script type="text/javascript" src="js/jquery-ui-1.8.20.custom.min.js"></script>

        <link rel="stylesheet"
              href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/ui-darkness/jquery-ui.css"
              type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css"
              href="js/jquery.fancybox/fancybox/jquery.fancybox-1.3.4.css" />
        <link rel="stylesheet" type="text/css" href="css/skins/ie7/skin.css" />
        <link rel="stylesheet" type="text/css" href="css/mycss.css" />

        <script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
        <?php if ($_SERVER['PHP_SELF'] != '/index.php') { ?>
            <script type="text/javascript"
            src="js/jquery.fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<?php } ?>
        <script type="text/javascript"
        src="js/jquery.fancybox/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

        <link rel="stylesheet" type="text/css" href="css/supersized.css" />
        <script>
            jQuery(function ($) {

                //  Initialize Backgound Stretcher
                $.supersized({
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
                    slides: [{image: 'images/moyenne/piscine/IMG_1175.jpg', title: 'Image Credit: VillaFratelli'},
                        {image: 'images/moyenne/piscine/IMG_1078.jpg', title: 'Image Credit: VillaFratelli'},
                        {image: 'images/moyenne/piscine/IMG_1065.jpg', title: 'Image Credit: VillaFratelli'},
                        {image: 'images/moyenne/nuit/IMG_1424.jpg', title: 'Image Credit: VillaFratelli'},
                        {image: 'images/moyenne/nuit/IMG_1422.jpg', title: 'Image Credit: VillaFratelli'},
                        {image: 'images/moyenne/nuit/IMG_1349.jpg', title: 'Image Credit: VillaFratelli'}],
                    // Theme Options
                    progress_bar: 0, // Timer for each slide
                    mouse_scrub: 0
                });
<?php if (detection_mobile() == false) { ?>
                    jQuery('#mycarousel').jcarousel({
                    });
                    /*$('#page').hover(function() {
                     $(this).stop().animate({"opacity": 1});
                     },function() {
                     $(this).stop().animate({"opacity": 0.5});
                     });*/


                    /* Apply fancybox to multiple items */
    <?php if ($_SERVER['PHP_SELF'] != '/index.php') { ?>

                        $("a[rel=example_group]").fancybox({
                            'transitionIn': 'elastic',
                            'transitionOut': 'elastic',
                            'titlePosition': 'over',
                            'titleFormat': function (title, currentArray, currentIndex, currentOpts) {
                                return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                            }
                        });
    <?php } ?>


<?php } ?>
            });
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div data-role="navbar" id="menu">
                <ul>
                    <li><a href="index.php"
                           <?php if ($_SERVER['PHP_SELF'] == '/') echo 'class="hover"' ?>>Home</a></li>
                    <li><a href="description.php"
                           <?php if ($_SERVER['PHP_SELF'] == '/description.php') echo 'class="hover"' ?>>Description</a></li>
                    <li><a href="rooms.php"
                           <?php if ($_SERVER['PHP_SELF'] == '/rooms.php') echo 'class="hover"' ?>>Chambres</a></li>
                    <li><a href="spa.php"
                           <?php if ($_SERVER['PHP_SELF'] == '/spa.php') echo 'class="hover"' ?>>Spa</a></li>
                    <li><a href="pool.php"
                           <?php if ($_SERVER['PHP_SELF'] == '/pool.php') echo 'class="hover"' ?>>Piscine</a></li>
                    <li><a href="night.php"
                           <?php if ($_SERVER['PHP_SELF'] == '/night.php') echo 'class="hover"' ?>>By
                            Night</a></li>
                    <li><a href="contacts.php"
<?php if ($_SERVER['PHP_SELF'] == '/contacts.php') echo 'class="hover"' ?>>Contacts</a></li>
                </ul>

                <!--<?php if (detection_mobile() == false) { ?>
    <div id="google_translate_element" style="float: left"></div>
    <script>
    function googleTranslateElementInit() {
    new google.translate.TranslateElement({
      pageLanguage: 'fr',
      autoDisplay: false,
      gaTrack: true,
      gaId: 'UA-31807202-1',
      layout: google.translate.TranslateElement.InlineLayout.SIMPLE
    }, 'google_translate_element');
    }
    </script>
    <script
          src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<?php } ?>-->
<<<<<<< HEAD
            </div>
=======
            </div>
>>>>>>> 5d6614ca236466d6b93802bd814096c1ac75f08b
