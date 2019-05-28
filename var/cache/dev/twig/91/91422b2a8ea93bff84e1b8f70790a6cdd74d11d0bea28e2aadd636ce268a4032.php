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

/* default/common/header.html.twig */
class __TwigTemplate_ea2ceb45c3e1595133a9a6483319b7a8a159f89b5dba10822279703481b6d774 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "default/common/header.html.twig"));

        // line 1
        echo "<nav class=\"navbar navbar-expand-lg fixed-top navbar-dark bg-dark\">
    <a class=\"navbar-brand mr-auto mr-lg-0\" href=\"";
        // line 2
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["brand_link"]) || array_key_exists("brand_link", $context) ? $context["brand_link"] : (function () { throw new RuntimeError('Variable "brand_link" does not exist.', 2, $this->source); })()), "href", []), "html", null, true);
        echo "\">
        <img class=\"mr-3\" src=\"data:image/png;base64,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\" alt=\"\" width=\"28\" height=\"28\">
        ";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["brand_link"]) || array_key_exists("brand_link", $context) ? $context["brand_link"] : (function () { throw new RuntimeError('Variable "brand_link" does not exist.', 4, $this->source); })()), "label", []), "html", null, true);
        echo "
    </a>
    <button class=\"navbar-toggler p-0 border-0\" type=\"button\" data-toggle=\"offcanvas\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>

    <div class=\"navbar-collapse offcanvas-collapse\" id=\"navbarsExampleDefault\">
        <ul class=\"navbar-nav mr-auto\">
            ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["header_links"]) || array_key_exists("header_links", $context) ? $context["header_links"] : (function () { throw new RuntimeError('Variable "header_links" does not exist.', 12, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["header_link"]) {
            // line 13
            echo "                <li class=\"nav-item\">
                    <a class=\"nav-link ";
            // line 14
            if ((twig_get_attribute($this->env, $this->source, $context["header_link"], "label", []) == (isset($context["current_header_link"]) || array_key_exists("current_header_link", $context) ? $context["current_header_link"] : (function () { throw new RuntimeError('Variable "current_header_link" does not exist.', 14, $this->source); })()))) {
                echo "active";
            }
            echo "\" href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["header_link"], "href", []), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["header_link"], "label", [])));
            echo "</a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['header_link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "        </ul>
    </div>
</nav>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "default/common/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 17,  64 => 14,  61 => 13,  57 => 12,  46 => 4,  41 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav class=\"navbar navbar-expand-lg fixed-top navbar-dark bg-dark\">
    <a class=\"navbar-brand mr-auto mr-lg-0\" href=\"{{ brand_link.href }}\">
        <img class=\"mr-3\" src=\"data:image/png;base64,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\" alt=\"\" width=\"28\" height=\"28\">
        {{ brand_link.label }}
    </a>
    <button class=\"navbar-toggler p-0 border-0\" type=\"button\" data-toggle=\"offcanvas\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>

    <div class=\"navbar-collapse offcanvas-collapse\" id=\"navbarsExampleDefault\">
        <ul class=\"navbar-nav mr-auto\">
            {% for header_link in header_links %}
                <li class=\"nav-item\">
                    <a class=\"nav-link {% if header_link.label == current_header_link %}active{% endif %}\" href=\"{{ header_link.href }}\">{{ header_link.label|capitalize|e }}</a>
                </li>
            {% endfor %}
        </ul>
    </div>
</nav>
", "default/common/header.html.twig", "/home/gdelre/sources/fmm/qat/templates/default/common/header.html.twig");
    }
}
