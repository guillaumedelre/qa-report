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

/* default/dashboard/navigation.html.twig */
class __TwigTemplate_b97add7a6cf68cda1c3bca108782a08c4c1b2684abcc0954742ca9c54ca5363b extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "default/dashboard/navigation.html.twig"));

        // line 1
        echo "<div class=\"nav-scroller bg-light shadow-sm\">
    <nav class=\"nav nav-underline\">
        ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["navigation_links"]) || array_key_exists("navigation_links", $context) ? $context["navigation_links"] : (function () { throw new RuntimeError('Variable "navigation_links" does not exist.', 3, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["navigation_link"]) {
            // line 4
            echo "            <a class=\"nav-link ";
            if ((twig_get_attribute($this->env, $this->source, $context["navigation_link"], "label", []) == (isset($context["current_navigation_link"]) || array_key_exists("current_navigation_link", $context) ? $context["current_navigation_link"] : (function () { throw new RuntimeError('Variable "current_navigation_link" does not exist.', 4, $this->source); })()))) {
                echo "active";
            }
            echo "\" href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["navigation_link"], "href", []), "html", null, true);
            echo "\">
                ";
            // line 5
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["navigation_link"], "label", [])));
            echo "
            </a>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['navigation_link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "    </nav>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "default/dashboard/navigation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 8,  55 => 5,  46 => 4,  42 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"nav-scroller bg-light shadow-sm\">
    <nav class=\"nav nav-underline\">
        {% for navigation_link in navigation_links %}
            <a class=\"nav-link {% if navigation_link.label == current_navigation_link %}active{% endif %}\" href=\"{{ navigation_link.href }}\">
                {{ navigation_link.label|capitalize|e }}
            </a>
        {% endfor %}
    </nav>
</div>
", "default/dashboard/navigation.html.twig", "/home/gdelre/sources/fmm/qat/templates/default/dashboard/navigation.html.twig");
    }
}
