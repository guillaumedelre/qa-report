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

/* default/dashboard/phpunit.html.twig */
class __TwigTemplate_14d331f6abb8ec3c7d7237c64470bcdb2b29cc7bf37964ac1602899329ab4a04 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "default/dashboard/phpunit.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "default/dashboard/phpunit.html.twig", 1);
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
    <link rel=\"stylesheet\" href=\"../assets/css/sunburst.css\">
    <link rel=\"stylesheet\" href=\"../assets/css/gauge.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/default.min.css\" />
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 12
    public function block_navigation($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "navigation"));

        // line 13
        echo "    ";
        echo twig_include($this->env, $context, "default/dashboard/navigation.html.twig");
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 16
    public function block_content($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 17
        echo "    <main role=\"main\" class=\"container-fluid\">
        <div class=\"card-columns my-3\">
            ";
        // line 19
        $this->loadTemplate("default/dashboard/organisms/file_list.html.twig", "default/dashboard/phpunit.html.twig", 19)->display($context);
        // line 20
        echo "            ";
        $this->loadTemplate("default/dashboard/organisms/clover_gauge_graph.html.twig", "default/dashboard/phpunit.html.twig", 20)->display($context);
        // line 21
        echo "            ";
        $this->loadTemplate("default/dashboard/organisms/clover_sunburst_graph.html.twig", "default/dashboard/phpunit.html.twig", 21)->display($context);
        // line 22
        echo "            ";
        $this->loadTemplate("default/dashboard/organisms/junit_tests_sum.html.twig", "default/dashboard/phpunit.html.twig", 22)->display($context);
        // line 23
        echo "            ";
        $this->loadTemplate("default/dashboard/organisms/junit_times_sum.html.twig", "default/dashboard/phpunit.html.twig", 23)->display($context);
        // line 24
        echo "            ";
        $this->loadTemplate("default/dashboard/organisms/crap_gauge_graph.html.twig", "default/dashboard/phpunit.html.twig", 24)->display($context);
        // line 25
        echo "            ";
        $this->loadTemplate("default/dashboard/organisms/crap_methods_graph.html.twig", "default/dashboard/phpunit.html.twig", 25)->display($context);
        // line 26
        echo "        </div>

    </main>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 31
    public function block_javascripts($context, array $blocks = [])
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 32
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.1/d3.min.js\"></script>
    <script src=\"../assets/js/sunburst.js\"></script>
    <script src=\"https://code.highcharts.com/highcharts.js\"></script>
    <script src=\"https://code.highcharts.com/highcharts-more.js\"></script>
    <script src=\"https://code.highcharts.com/modules/solid-gauge.js\"></script>
    <script src=\"../assets/js/gauge.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js\"></script>
    <script type=\"text/javascript\">
        hljs.initHighlightingOnLoad();
        Highcharts.chart('gauge-clover', Highcharts.merge(gaugeCloverOptions, {
            yAxis: {
                min: 0,
                max: 100,
            },

            credits: {
                enabled: false
            },

            series: [{
                name: 'coverage',
                data: [";
        // line 54
        echo twig_escape_filter($this->env, $this->extensions['Agilicode\QAT\Twig\CloverExtension']->cloverAvgCoverage((isset($context["artifacts"]) || array_key_exists("artifacts", $context) ? $context["artifacts"] : (function () { throw new RuntimeError('Variable "artifacts" does not exist.', 54, $this->source); })())), "html", null, true);
        echo "],
                dataLabels: {
                    format: '<div style=\"text-align:center\"><span style=\"font-size:25px;color:' +
                        ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '\">{y}</span><br/>' +
                        '<span style=\"font-size:12px;color:silver\">%</span></div>'
                },
                tooltip: {
                    valueSuffix: ' %'
                }
            }]

        }));
        Highcharts.chart('gauge-crap', Highcharts.merge(gaugeCrapOptions, {
            yAxis: {
                min: 0,
                max: 100,
            },

            credits: {
                enabled: false
            },

            series: [{
                name: 'crap',
                data: [";
        // line 78
        echo twig_escape_filter($this->env, $this->extensions['Agilicode\QAT\Twig\Crap4jExtension']->crapAvgPercent((isset($context["artifacts"]) || array_key_exists("artifacts", $context) ? $context["artifacts"] : (function () { throw new RuntimeError('Variable "artifacts" does not exist.', 78, $this->source); })())), "html", null, true);
        echo "],
                dataLabels: {
                    format: '<div style=\"text-align:center\"><span style=\"font-size:25px;color:' +
                        ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '\">{y}</span><br/>' +
                        '<span style=\"font-size:12px;color:silver\">%</span></div>'
                },
                tooltip: {
                    valueSuffix: ' %'
                }
            }]

        }));
        ";
        // line 90
        echo $this->extensions['Agilicode\QAT\Twig\CloverExtension']->sunburst((isset($context["artifacts"]) || array_key_exists("artifacts", $context) ? $context["artifacts"] : (function () { throw new RuntimeError('Variable "artifacts" does not exist.', 90, $this->source); })()));
        echo "
        ";
        // line 91
        echo $this->extensions['Agilicode\QAT\Twig\Crap4jExtension']->graphCrap("canvas-crap", (isset($context["artifacts"]) || array_key_exists("artifacts", $context) ? $context["artifacts"] : (function () { throw new RuntimeError('Variable "artifacts" does not exist.', 91, $this->source); })()));
        echo "
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "default/dashboard/phpunit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 91,  218 => 90,  203 => 78,  176 => 54,  150 => 32,  144 => 31,  134 => 26,  131 => 25,  128 => 24,  125 => 23,  122 => 22,  119 => 21,  116 => 20,  114 => 19,  110 => 17,  104 => 16,  94 => 13,  88 => 12,  75 => 6,  69 => 5,  54 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}QA-Tools | {{ page_section|capitalize|e }} {{ page_name|capitalize|e }}{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"../assets/css/sunburst.css\">
    <link rel=\"stylesheet\" href=\"../assets/css/gauge.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/default.min.css\" />
{% endblock %}

{% block navigation %}
    {{ include('default/dashboard/navigation.html.twig') }}
{% endblock %}

{% block content %}
    <main role=\"main\" class=\"container-fluid\">
        <div class=\"card-columns my-3\">
            {% include 'default/dashboard/organisms/file_list.html.twig' %}
            {% include 'default/dashboard/organisms/clover_gauge_graph.html.twig' %}
            {% include 'default/dashboard/organisms/clover_sunburst_graph.html.twig' %}
            {% include 'default/dashboard/organisms/junit_tests_sum.html.twig' %}
            {% include 'default/dashboard/organisms/junit_times_sum.html.twig' %}
            {% include 'default/dashboard/organisms/crap_gauge_graph.html.twig' %}
            {% include 'default/dashboard/organisms/crap_methods_graph.html.twig' %}
        </div>

    </main>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.1/d3.min.js\"></script>
    <script src=\"../assets/js/sunburst.js\"></script>
    <script src=\"https://code.highcharts.com/highcharts.js\"></script>
    <script src=\"https://code.highcharts.com/highcharts-more.js\"></script>
    <script src=\"https://code.highcharts.com/modules/solid-gauge.js\"></script>
    <script src=\"../assets/js/gauge.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js\"></script>
    <script type=\"text/javascript\">
        hljs.initHighlightingOnLoad();
        Highcharts.chart('gauge-clover', Highcharts.merge(gaugeCloverOptions, {
            yAxis: {
                min: 0,
                max: 100,
            },

            credits: {
                enabled: false
            },

            series: [{
                name: 'coverage',
                data: [{{ cloverAvgCoverage(artifacts) }}],
                dataLabels: {
                    format: '<div style=\"text-align:center\"><span style=\"font-size:25px;color:' +
                        ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '\">{y}</span><br/>' +
                        '<span style=\"font-size:12px;color:silver\">%</span></div>'
                },
                tooltip: {
                    valueSuffix: ' %'
                }
            }]

        }));
        Highcharts.chart('gauge-crap', Highcharts.merge(gaugeCrapOptions, {
            yAxis: {
                min: 0,
                max: 100,
            },

            credits: {
                enabled: false
            },

            series: [{
                name: 'crap',
                data: [{{ crapAvgPercent(artifacts) }}],
                dataLabels: {
                    format: '<div style=\"text-align:center\"><span style=\"font-size:25px;color:' +
                        ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '\">{y}</span><br/>' +
                        '<span style=\"font-size:12px;color:silver\">%</span></div>'
                },
                tooltip: {
                    valueSuffix: ' %'
                }
            }]

        }));
        {{ sunburst(artifacts)|raw }}
        {{ graphCrap('canvas-crap', artifacts)|raw }}
    </script>
{% endblock %}
", "default/dashboard/phpunit.html.twig", "/home/gdelre/sources/fmm/qat/templates/default/dashboard/phpunit.html.twig");
    }
}
