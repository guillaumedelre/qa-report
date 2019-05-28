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

/* default/dashboard/organisms/cucumber_time_by_feature_avg.html.twig */
class __TwigTemplate_3b1d0154fc7b4fcedaea0de72284e0309c70c765a79d39d76b215bd1df05ebb3 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "default/dashboard/organisms/cucumber_time_by_feature_avg.html.twig"));

        // line 1
        echo "<div class=\"card\">
    <div class=\"p-3\">
        <h6 class=\"border-bottom border-gray pb-2 mb-0\">Time by feature</h6>
        <h3 class=\"text-center text-dark mt-3\">
            <i class=\"material-icons\">timer</i>
            ";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Agilicode\QAT\Twig\CucumberJsonExtension']->cucumberAvgTimeByFeature((isset($context["artifacts"]) || array_key_exists("artifacts", $context) ? $context["artifacts"] : (function () { throw new RuntimeError('Variable "artifacts" does not exist.', 6, $this->source); })())), "html", null, true);
        echo " (average)
        </h3>
        <canvas id=\"canvas-doughnut-bench-feature\"></canvas>
    </div>
</div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "default/dashboard/organisms/cucumber_time_by_feature_avg.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 6,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"card\">
    <div class=\"p-3\">
        <h6 class=\"border-bottom border-gray pb-2 mb-0\">Time by feature</h6>
        <h3 class=\"text-center text-dark mt-3\">
            <i class=\"material-icons\">timer</i>
            {{ cucumberAvgTimeByFeature(artifacts) }} (average)
        </h3>
        <canvas id=\"canvas-doughnut-bench-feature\"></canvas>
    </div>
</div>

", "default/dashboard/organisms/cucumber_time_by_feature_avg.html.twig", "/home/gdelre/sources/fmm/qat/templates/default/dashboard/organisms/cucumber_time_by_feature_avg.html.twig");
    }
}
