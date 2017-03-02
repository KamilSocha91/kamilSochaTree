<?php

/* @AppTree/Layouts/basic.html.twig */
class __TwigTemplate_2b42301d8bd143baaca4419391b85fe381a3ce3849784946a12d085948e4a2fe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'addCSS' => array($this, 'block_addCSS'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
            'addJavaScript' => array($this, 'block_addJavaScript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>

<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

    <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 17
        echo "    ";
        $this->displayBlock('addCSS', $context, $blocks);
        // line 20
        echo "</head>
<body>
    ";
        // line 22
        $this->displayBlock('content', $context, $blocks);
        // line 24
        echo "
    ";
        // line 25
        $this->displayBlock('javascripts', $context, $blocks);
        // line 40
        echo "    ";
        $this->displayBlock('addJavaScript', $context, $blocks);
        // line 43
        echo "</body>

</html>
";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 11
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "6f45f4f_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_6f45f4f_0") : $this->env->getExtension('asset')->getAssetUrl("css/6f45f4f_master_1.css");
            // line 14
            echo "        <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"/>
        ";
        } else {
            // asset "6f45f4f"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_6f45f4f") : $this->env->getExtension('asset')->getAssetUrl("css/6f45f4f.css");
            echo "        <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"/>
        ";
        }
        unset($context["asset_url"]);
        // line 16
        echo "    ";
    }

    // line 17
    public function block_addCSS($context, array $blocks = array())
    {
        // line 18
        echo "
    ";
    }

    // line 22
    public function block_content($context, array $blocks = array())
    {
        // line 23
        echo "    ";
    }

    // line 25
    public function block_javascripts($context, array $blocks = array())
    {
        // line 26
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData"));
        echo "\"></script>
        ";
        // line 28
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "dc06c75_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_dc06c75_0") : $this->env->getExtension('asset')->getAssetUrl("js/dc06c75_jquery.min_1.js");
            // line 37
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
        ";
            // asset "dc06c75_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_dc06c75_1") : $this->env->getExtension('asset')->getAssetUrl("js/dc06c75_jquery-ui.min_2.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
        ";
            // asset "dc06c75_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_dc06c75_2") : $this->env->getExtension('asset')->getAssetUrl("js/dc06c75_angular.min_3.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
        ";
            // asset "dc06c75_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_dc06c75_3") : $this->env->getExtension('asset')->getAssetUrl("js/dc06c75_sortable.min_4.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
        ";
            // asset "dc06c75_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_dc06c75_4") : $this->env->getExtension('asset')->getAssetUrl("js/dc06c75_controller_5.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
        ";
            // asset "dc06c75_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_dc06c75_5") : $this->env->getExtension('asset')->getAssetUrl("js/dc06c75_directives_6.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
        ";
            // asset "dc06c75_6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_dc06c75_6") : $this->env->getExtension('asset')->getAssetUrl("js/dc06c75_services_7.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "dc06c75"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_dc06c75") : $this->env->getExtension('asset')->getAssetUrl("js/dc06c75.js");
            echo "        <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 39
        echo "    ";
    }

    // line 40
    public function block_addJavaScript($context, array $blocks = array())
    {
        // line 41
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "@AppTree/Layouts/basic.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  184 => 41,  181 => 40,  177 => 39,  127 => 37,  123 => 28,  119 => 27,  114 => 26,  111 => 25,  107 => 23,  104 => 22,  99 => 18,  96 => 17,  92 => 16,  78 => 14,  73 => 11,  70 => 10,  65 => 8,  58 => 43,  55 => 40,  53 => 25,  50 => 24,  48 => 22,  44 => 20,  41 => 17,  39 => 10,  34 => 8,  25 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* */
/* <head>*/
/*     <meta charset="utf-8">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0">*/
/* */
/*     <title>{% block title %}{% endblock %}</title>*/
/* */
/*     {% block stylesheets %}*/
/*         {% stylesheets*/
/*             '@AppTreeBundle/Resources/public/css/master.css'*/
/*         %}*/
/*         <link rel="stylesheet" type="text/css" media="screen" href="{{ asset_url }}"/>*/
/*         {% endstylesheets %}*/
/*     {% endblock %}*/
/*     {% block addCSS %}*/
/* */
/*     {% endblock %}*/
/* </head>*/
/* <body>*/
/*     {% block content %}*/
/*     {% endblock %}*/
/* */
/*     {% block javascripts %}*/
/*             <script src="{{ asset('bundles/fosjsrouting/js/router.js') }}"></script>*/
/*             <script src="{{ path('fos_js_routing_js', {'callback': 'fos.Router.setData'}) }}"></script>*/
/*         {% javascripts */
/*             'assets/vendor/jquery/jquery.min.js'*/
/*             'assets/vendor/jquery-ui/ui/minified/jquery-ui.min.js'*/
/*             'assets/vendor/angular/angular.min.js'*/
/*             'assets/vendor/angular-ui-sortable/sortable.min.js'*/
/*             '@AppTreeBundle/Resources/public/angular/controller.js'*/
/*             '@AppTreeBundle/Resources/public/angular/directives.js'*/
/*             '@AppTreeBundle/Resources/public/angular/services.js'*/
/*         %}*/
/*         <script type="text/javascript" src="{{ asset_url }}"></script>*/
/*         {% endjavascripts %}*/
/*     {% endblock %}*/
/*     {% block addJavaScript %}*/
/* */
/*     {% endblock %}*/
/* </body>*/
/* */
/* </html>*/
/* */
