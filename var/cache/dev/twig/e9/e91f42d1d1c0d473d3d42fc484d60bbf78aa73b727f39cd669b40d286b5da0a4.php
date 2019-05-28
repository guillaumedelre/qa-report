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

/* default/dashboard/behat.html.twig */
class __TwigTemplate_d577fc6ec8a0d224cb4a89fb4c51b9ef5fadef4775e44e4b8c27ec8a377abb32 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'navigation' => [$this, 'block_navigation'],
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "default/dashboard/behat.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "default/dashboard/behat.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "QA-Tools | ";
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, (isset($context["page_section"]) || array_key_exists("page_section", $context) ? $context["page_section"] : (function () { throw new RuntimeError('Variable "page_section" does not exist.', 3, $this->source); })())));
        echo " ";
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, (isset($context["page_name"]) || array_key_exists("page_name", $context) ? $context["page_name"] : (function () { throw new RuntimeError('Variable "page_name" does not exist.', 3, $this->source); })())));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/default.min.css\" />
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 10
    public function block_navigation($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "navigation"));

        // line 11
        echo "    ";
        echo twig_include($this->env, $context, "default/dashboard/navigation.html.twig");
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 14
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 15
        echo "    <main role=\"main\" class=\"container-fluid\">
        <div class=\"card-columns my-3\">
            ";
        // line 17
        $this->loadTemplate("default/dashboard/organisms/file_list.html.twig", "default/dashboard/behat.html.twig", 17)->display($context);
        // line 18
        echo "            ";
        $this->loadTemplate("default/dashboard/organisms/junit_tests_sum.html.twig", "default/dashboard/behat.html.twig", 18)->display($context);
        // line 19
        echo "
            ";
        // line 20
        $this->loadTemplate("default/dashboard/organisms/cucumber_features_sum.html.twig", "default/dashboard/behat.html.twig", 20)->display($context);
        // line 22
        echo "
";
        // line 25
        echo "
";
        // line 28
        echo "
";
        // line 30
        echo "
";
        // line 33
        echo "        </div>
    </main>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 37
    public function block_javascripts($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 38
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js\"></script>
    <script>
        hljs.initHighlightingOnLoad();
        ";
        // line 43
        echo "        ";
        echo $this->extensions['Agilicode\QAT\Twig\CucumberJsonExtension']->cucumberDoughnutFeature("canvas-doughnut-feature", (isset($context["artifacts"]) || array_key_exists("artifacts", $context) ? $context["artifacts"] : (function () { throw new RuntimeError('Variable "artifacts" does not exist.', 43, $this->source); })()));
        echo "
        ";
        // line 45
        echo "        ";
        // line 46
        echo "        ";
        // line 47
        echo "    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "default/dashboard/behat.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 47,  164 => 46,  162 => 45,  157 => 43,  149 => 38,  143 => 37,  134 => 33,  131 => 30,  128 => 28,  125 => 25,  122 => 22,  120 => 20,  117 => 19,  114 => 18,  112 => 17,  108 => 15,  102 => 14,  92 => 11,  86 => 10,  75 => 6,  69 => 5,  54 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}QA-Tools | {{ page_section|capitalize|e }} {{ page_name|capitalize|e }}{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/default.min.css\" />
{% endblock %}

{% block navigation %}
    {{ include('default/dashboard/navigation.html.twig') }}
{% endblock %}

{% block content %}
    <main role=\"main\" class=\"container-fluid\">
        <div class=\"card-columns my-3\">
            {% include 'default/dashboard/organisms/file_list.html.twig' %}
            {% include 'default/dashboard/organisms/junit_tests_sum.html.twig' %}

            {% include 'default/dashboard/organisms/cucumber_features_sum.html.twig' %}
{#            {% include 'default/dashboard/organisms/cucumber_feature_doughnut.html.twig' %}#}

{#            {% include 'default/dashboard/organisms/cucumber_scenario_sum.html.twig' %}#}
{#            {% include 'default/dashboard/organisms/cucumber_scenario_doughnut.html.twig' %}#}

{#            {% include 'default/dashboard/organisms/cucumber_steps_sum.html.twig' %}#}
{#            {% include 'default/dashboard/organisms/cucumber_step_doughnut.html.twig' %}#}

{#            {% include 'default/dashboard/organisms/cucumber_duration_sum.html.twig' %}#}

{#            {% include 'default/dashboard/organisms/cucumber_time_by_feature_avg.html.twig' %}#}
{#            {% include 'default/dashboard/organisms/cucumber_time_by_scenario_avg.html.twig' %}#}
        </div>
    </main>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js\"></script>
    <script>
        hljs.initHighlightingOnLoad();
        {#{{ cucumberDoughnutStep('canvas-doughnut-step', artifacts)|raw }}#}
        {{ cucumberDoughnutFeature('canvas-doughnut-feature', artifacts)|raw }}
        {#        {{ cucumberDoughnutScenario('canvas-doughnut-scenario', artifacts)|raw }}#}
        {#{{ cucumberDoughnutBenchFeature('canvas-doughnut-bench-feature', artifacts)|raw }}#}
        {#{{ cucumberDoughnutBenchScenario('canvas-doughnut-bench-scenario', artifacts)|raw }}#}
    </script>
{% endblock %}

", "default/dashboard/behat.html.twig", "/home/gdelre/sources/fmm/qat/templates/default/dashboard/behat.html.twig");
    }
}
