<?php

/* footer.twig */
class __TwigTemplate_964e9c510621394f30afd0317e158b21b1d159ee748d53f933294cdeab7dbf9b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<br class=\"clear\" />
<div data-role=\"footer\" class=\"ui-bar\"><footer>
        <div class=\"copyright\">
            <div id=\"fb\"
                 onclick=\"window.open('http://www.facebook.com/VillaFratelli')\"></div>
            <div id=\"ln\"
                 onclick=\"window.open('https://twitter.com/#!/villafratelli')\"></div>
            <div style=\"float: right; width: 150px\"><!-- Placez cette balise là où vous souhaitez positionner le bouton +1. -->
                <g:plusone></g:plusone> <!-- Placez cet appel d'affichage à l'endroit approprié. -->
                <script type=\"text/javascript\">
                    window.___gcfg = {lang: 'fr'};

                    (function () {
                        var po = document.createElement('script');
                        po.type = 'text/javascript';
                        po.async = true;
                        po.src = 'https://apis.google.com/js/plusone.js';
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(po, s);
                    })();
                </script>
                <iframe
                    src=\"//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fvillafratelli%2F&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=dark&amp;font=arial&amp;height=21&amp;appId=8132395339\"
                    scrolling=\"no\" frameborder=\"0\"
                    style=\"border: none; overflow: hidden; width: 450px; height: 21px;\"
                    allowTransparency=\"true\"></iframe>
            </div>
            <p>Copyright &copy; 2012 www.villafratelli.com.
                Tous droits r&eacute;serv&eacute;s. <br />
                Site developp&eacute; par Yaniv Afriat <br/>
                <a style=\"color: orange\"
                   href=\"mailto:yaniv@afriat.info?subject=Informations\">Mon email</a> || <a href=\"http://afriat.info\" style=\"color: orange\">My Websites</a></p>
        </div>


    </footer>
</div>
";
    }

    public function getTemplateName()
    {
        return "footer.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "footer.twig", "/home/vagrant/Code/villafratelli/src/VillaFratelli/Views/footer.twig");
    }
}
