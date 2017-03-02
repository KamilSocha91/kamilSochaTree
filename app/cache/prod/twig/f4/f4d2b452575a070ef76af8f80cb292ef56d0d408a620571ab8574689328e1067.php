<?php

/* AppTreeBundle:Dashboard:index.html.twig */
class __TwigTemplate_d9490b80dc28ccc9ef6737edfd2e63b0d4e7063608388bc7fc423eeea1c067f0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@AppTree/Layouts/basic.html.twig", "AppTreeBundle:Dashboard:index.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@AppTree/Layouts/basic.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Tree Builder";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "\t";
        // line 7
        echo "\t<div ng-app=\"treeApp\">
\t\t<script type=\"text/ng-template\"  id=\"tree_item\">
\t\t\t<div class=\"btn\" >
\t\t\t    <label ng-bind=\"data.name\"></label>
\t\t\t    <input ng-value=\"data.content\" ng-model=\"data.content\" ng-change=\"change(data.content, data.id)\"></input>
\t\t\t    <button class=\"btn__confirm\" ng-click=\"add(data)\">Add node</button>
\t\t\t    <button class=\"btn__delete\" ng-click=\"delete(data)\" ng-show=\"data.nodes.length > 0\">Delete nodes</button>
\t\t    </div>
\t\t    <ul  ui-sortable=\"sortableOptions\" ng-model=\"data.nodes\">
\t\t        <li ng-repeat=\"data in data.nodes\" ng-include=\"'tree_item'\"></li>
\t\t    </ul>
\t\t</script>

\t    <section ng-controller=\"treeCtrl\" class=\"top\">
\t    \t<div class=\"top__left\">
\t\t\t\t<div  class=\"top__left-top\">
\t\t\t\t\t<header><h1>Tree</h1></header>

\t\t\t\t\t<div class=\"btn\">
\t\t\t\t\t\t<input name=\"jsonFile\" type=\"file\" accept=\".json\" on-read-file=\"getFile(\$fileContent)\"/>
\t\t\t    \t\t<button class=\"btn__save\" ng-click=\"save(data)\">Save Tree</button>
\t\t\t    \t\t<button class=\"btn__load\" ng-click=\"new()\">New</button>
\t\t\t    \t</div>

\t\t\t\t\t<ul>
\t\t\t\t\t    <li ng-repeat=\"data in tree\" ng-show=\"tree.error == null\" ng-include=\"'tree_item'\" style=\"cursor:default;\">
\t\t\t\t\t    \t<element ng-bind=\"data\"></element>
\t\t\t\t\t    </li>
\t\t\t\t\t</ul>
\t\t\t\t</div>

\t\t\t\t<div  class=\"top__left-bottom\">
\t\t\t\t\t<header><h1>Database</h1></header>

\t\t\t\t\t<ul ng-hide=\"showList\">
\t\t\t\t\t\t";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
            // line 43
            echo "\t\t\t\t\t\t\t<li> Tree id. ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "id", array()), "html", null, true);
            echo " <button class=\"btn__load\" ng-click=\"load(";
            echo twig_escape_filter($this->env, $this->getAttribute($context["data"], "id", array()), "html", null, true);
            echo ")\">Load</button></li>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "\t\t\t\t\t</ul>

\t\t\t\t\t<ul>
\t\t\t\t\t\t<li ng-repeat=\"data in list\"> Tree id. <element ng-bind=\"data.id\"></element>
\t\t\t\t\t\t\t<button class=\"btn__load\" ng-click=\"load(data.id)\">Load</button> 
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t\t
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"top__right\">
\t\t\t\t<header><h1>JSON</h1></header>
\t\t\t\t\t<pre ng-bind=\"tree|json\"></pre>
\t\t\t</div>
\t    </section>

\t\t<div style=\"clear: both;\"></div>

\t</div>
";
    }

    public function getTemplateName()
    {
        return "AppTreeBundle:Dashboard:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 45,  81 => 43,  77 => 42,  40 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends '@AppTree/Layouts/basic.html.twig' %}*/
/* */
/* {% block title %}{# {{ 'interface.title'|trans }} #}Tree Builder{% endblock %}*/
/* */
/* {% block content %}*/
/* 	{# <div class="loader">Loading...</div> #}*/
/* 	<div ng-app="treeApp">*/
/* 		<script type="text/ng-template"  id="tree_item">*/
/* 			<div class="btn" >*/
/* 			    <label ng-bind="data.name"></label>*/
/* 			    <input ng-value="data.content" ng-model="data.content" ng-change="change(data.content, data.id)"></input>*/
/* 			    <button class="btn__confirm" ng-click="add(data)">Add node</button>*/
/* 			    <button class="btn__delete" ng-click="delete(data)" ng-show="data.nodes.length > 0">Delete nodes</button>*/
/* 		    </div>*/
/* 		    <ul  ui-sortable="sortableOptions" ng-model="data.nodes">*/
/* 		        <li ng-repeat="data in data.nodes" ng-include="'tree_item'"></li>*/
/* 		    </ul>*/
/* 		</script>*/
/* */
/* 	    <section ng-controller="treeCtrl" class="top">*/
/* 	    	<div class="top__left">*/
/* 				<div  class="top__left-top">*/
/* 					<header><h1>Tree</h1></header>*/
/* */
/* 					<div class="btn">*/
/* 						<input name="jsonFile" type="file" accept=".json" on-read-file="getFile($fileContent)"/>*/
/* 			    		<button class="btn__save" ng-click="save(data)">Save Tree</button>*/
/* 			    		<button class="btn__load" ng-click="new()">New</button>*/
/* 			    	</div>*/
/* */
/* 					<ul>*/
/* 					    <li ng-repeat="data in tree" ng-show="tree.error == null" ng-include="'tree_item'" style="cursor:default;">*/
/* 					    	<element ng-bind="data"></element>*/
/* 					    </li>*/
/* 					</ul>*/
/* 				</div>*/
/* */
/* 				<div  class="top__left-bottom">*/
/* 					<header><h1>Database</h1></header>*/
/* */
/* 					<ul ng-hide="showList">*/
/* 						{% for data in list %}*/
/* 							<li> Tree id. {{data.id}} <button class="btn__load" ng-click="load({{data.id}})">Load</button></li>*/
/* 						{% endfor %}*/
/* 					</ul>*/
/* */
/* 					<ul>*/
/* 						<li ng-repeat="data in list"> Tree id. <element ng-bind="data.id"></element>*/
/* 							<button class="btn__load" ng-click="load(data.id)">Load</button> */
/* 						</li>*/
/* 					</ul>*/
/* 					*/
/* 				</div>*/
/* 			</div>*/
/* 			<div class="top__right">*/
/* 				<header><h1>JSON</h1></header>*/
/* 					<pre ng-bind="tree|json"></pre>*/
/* 			</div>*/
/* 	    </section>*/
/* */
/* 		<div style="clear: both;"></div>*/
/* */
/* 	</div>*/
/* {% endblock %}*/
