<?php

/* home.twig */
class __TwigTemplate_299f1f9dc722b0b839fe32789c6ee043117f4fb86659b0dadbfb0cfe916f6f97 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "home.twig", 1);
        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'carousel' => array($this, 'block_carousel'),
            'body' => array($this, 'block_body'),
            'js' => array($this, 'block_js'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["page"] = "home";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_css($context, array $blocks = array())
    {
    }

    // line 7
    public function block_carousel($context, array $blocks = array())
    {
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 11
        echo "    <div style=\"opacity: 0.9; padding: 12px;color: white; font-weight: bold;width: 20%; background-color: black; margin-left: auto; margin-right: auto;margin-top: 15%\">    
        <h1 style=\"font-size: 18px; padding: 2px;font-weight: bold; text-align: center\">Villa Fratelli<br />Marrakech Morocco / Maroc</h1>
        <h2 style=\"padding-bottom: 8px; padding-top: 12px\">Luxurious villas for sale</h2>
        <p>Contact Us</p>
        <p><a style=\"text-decoration: underline\" href=\"mailto:info@villafratelli.com\">info@villafratelli.com</a></p>
        <br />
        <hr style=\"border: 1px solid gray;\" />
        <h2 style=\"padding-bottom: 8px\">Luxueuse Villas à vendre</h2>
        <br />
        <br />
        <p>Contactez nous</p>
        <p><a style=\"text-decoration: underline\" href=\"mailto:info@villafratelli.com\">info@villafratelli.com</a></p>
    </div>
";
    }

    // line 26
    public function block_js($context, array $blocks = array())
    {
        // line 27
        echo "    <script>
        \$(\"a[rel=example_group]\").fancybox({
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'titlePosition': 'over',
            'titleFormat': function (title, currentArray, currentIndex, currentOpts) {
                return '<span id=\"fancybox-title-over\">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
            }
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 27,  64 => 26,  47 => 11,  44 => 10,  39 => 7,  34 => 5,  30 => 1,  28 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "home.twig", "/home/vagrant/Code/villafratelli/src/VillaFratelli/Views/home.twig");
    }
}
