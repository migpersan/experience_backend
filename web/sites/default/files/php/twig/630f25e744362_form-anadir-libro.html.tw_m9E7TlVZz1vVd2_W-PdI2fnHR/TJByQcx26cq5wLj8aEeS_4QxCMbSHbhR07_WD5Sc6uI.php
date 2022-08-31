<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/anadir_libro/templates/form-anadir-libro.html.twig */
class __TwigTemplate_d5c5a36199ea4a2fcccfa36cdbf19e02307a85f4d876e379dfdd4f051069f246 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div id=\"div_anadir_libro\">
  <div>
    <label>T&iacute;tulo: </label>
    <input type=\"text\" id=\"anadir_libro_titulo\" required>
  </div>
  <div id=\"div_descripcion\">
    <label>Descripci&oacute;n: </label>
    <textarea id=\"anadir_libro_descripcion\" required></textarea>
  </div>
  <div>
    <label>Autor: </label>
    <input type=\"text\" id=\"anadir_libro_autor\" required>
  </div>
  <div>
    <label>Categor&iacute;a: </label>
    <input type=\"text\" id=\"anadir_libro_categoria\" required>
  </div>
  <div>
    <label>Imagen: </label>
    <input type=\"file\" id=\"anadir_libro_imagen\" required>
  </div>
  <button id=\"btn_anadir_libro\" class=\"form-control\">Añadir libro</button>
</div>
<link rel=\"stylesheet\" media=\"all\" href=\"/experience_backend/web/modules/custom/anadir_libro/src/css/anadir_libro.css\">
<script src=\"/experience_backend/web/modules/custom/anadir_libro/src/js/anadir_libro.js\"></script>";
    }

    public function getTemplateName()
    {
        return "modules/custom/anadir_libro/templates/form-anadir-libro.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/anadir_libro/templates/form-anadir-libro.html.twig", "C:\\xampp\\htdocs\\experience_backend\\web\\modules\\custom\\anadir_libro\\templates\\form-anadir-libro.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
