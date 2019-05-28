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

/* default/dashboard/organisms/file_list.html.twig */
class __TwigTemplate_847f23f2c4514261512f827c45662dd0fc7eba2d5e322931f6f8c83551788ef9 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "default/dashboard/organisms/file_list.html.twig"));

        // line 1
        echo "<div class=\"card\">
    <div class=\"p-3\">
        <h6 class=\"border-bottom border-gray pb-2 mb-0\">";
        // line 3
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, (isset($context["current_vendor"]) || array_key_exists("current_vendor", $context) ? $context["current_vendor"] : (function () { throw new RuntimeError('Variable "current_vendor" does not exist.', 3, $this->source); })())));
        echo " artifacts</h6>
        <table class=\"table table-hover table-sm table-borderless my-3\">
            ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->extensions['Agilicode\QAT\Twig\FileExtension']->filterByVendor((isset($context["artifacts"]) || array_key_exists("artifacts", $context) ? $context["artifacts"] : (function () { throw new RuntimeError('Variable "artifacts" does not exist.', 5, $this->source); })()), (isset($context["current_vendor"]) || array_key_exists("current_vendor", $context) ? $context["current_vendor"] : (function () { throw new RuntimeError('Variable "current_vendor" does not exist.', 5, $this->source); })())));
        foreach ($context['_seq'] as $context["_key"] => $context["artifact"]) {
            // line 6
            echo "                <tr class=\"media text-muted\">
                    <td class=\"col-1 text-center\">
                        <i class=\"material-icons ";
            // line 8
            if (twig_get_attribute($this->env, $this->source, $context["artifact"], "isValid", [])) {
                echo "text-success";
            } else {
                echo "text-danger";
            }
            echo "\">cloud_done</i>
                    </td>
                    <td class=\"col text-gray-dark\">
                        ";
            // line 11
            echo twig_escape_filter($this->env, $this->extensions['Agilicode\QAT\Twig\FileExtension']->filenameAndExtension(twig_get_attribute($this->env, $this->source, $context["artifact"], "file", [])));
            echo "
                    </td>
                    <td class=\"col-1 text-center\">
                        <a href=\"javascript:void(0);\" data-toggle=\"modal\" data-target=\"#modal";
            // line 14
            echo twig_escape_filter($this->env, $this->extensions['Agilicode\QAT\Twig\FileExtension']->md5(twig_get_attribute($this->env, $this->source, $context["artifact"], "file", [])), "html", null, true);
            echo "\" class=\"btn btn-sm btn-link text-dark\">
                            <i class=\"material-icons\">zoom_in</i>
                        </a>
                    </td>
                    <td class=\"col-2 text-right\">
                        <span class=\"badge badge-info\">";
            // line 19
            echo twig_escape_filter($this->env, $this->extensions['Agilicode\QAT\Twig\FileExtension']->fileSize(twig_get_attribute($this->env, $this->source, $context["artifact"], "file", [])));
            echo "</span>
                    </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['artifact'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "        </table>
    </div>
</div>

";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["artifacts"]) || array_key_exists("artifacts", $context) ? $context["artifacts"] : (function () { throw new RuntimeError('Variable "artifacts" does not exist.', 27, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["artifact"]) {
            // line 28
            echo "    <!-- Modal -->
    <div class=\"modal fade\" id=\"modal";
            // line 29
            echo twig_escape_filter($this->env, $this->extensions['Agilicode\QAT\Twig\FileExtension']->md5(twig_get_attribute($this->env, $this->source, $context["artifact"], "file", [])), "html", null, true);
            echo "\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-xl modal-dialog-centered\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\"><span class=\"badge badge-primary\">";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["artifact"], "project", []), "html", null, true);
            echo "</span> ";
            echo twig_escape_filter($this->env, $this->extensions['Agilicode\QAT\Twig\FileExtension']->filenameAndExtension(twig_get_attribute($this->env, $this->source, $context["artifact"], "file", [])));
            echo "</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    <pre><code class=\"xml\">";
            // line 39
            echo twig_escape_filter($this->env, $this->extensions['Agilicode\QAT\Twig\FileExtension']->fileContent(twig_get_attribute($this->env, $this->source, $context["artifact"], "file", [])));
            echo "</code></pre>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                </div>
            </div>
        </div>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['artifact'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "default/dashboard/organisms/file_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 39,  109 => 33,  102 => 29,  99 => 28,  95 => 27,  89 => 23,  79 => 19,  71 => 14,  65 => 11,  55 => 8,  51 => 6,  47 => 5,  42 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"card\">
    <div class=\"p-3\">
        <h6 class=\"border-bottom border-gray pb-2 mb-0\">{{ current_vendor|capitalize|e }} artifacts</h6>
        <table class=\"table table-hover table-sm table-borderless my-3\">
            {% for artifact in filterByVendor(artifacts, current_vendor) %}
                <tr class=\"media text-muted\">
                    <td class=\"col-1 text-center\">
                        <i class=\"material-icons {% if artifact.isValid %}text-success{% else %}text-danger{% endif %}\">cloud_done</i>
                    </td>
                    <td class=\"col text-gray-dark\">
                        {{ filenameAndExtension(artifact.file)|e }}
                    </td>
                    <td class=\"col-1 text-center\">
                        <a href=\"javascript:void(0);\" data-toggle=\"modal\" data-target=\"#modal{{ md5(artifact.file) }}\" class=\"btn btn-sm btn-link text-dark\">
                            <i class=\"material-icons\">zoom_in</i>
                        </a>
                    </td>
                    <td class=\"col-2 text-right\">
                        <span class=\"badge badge-info\">{{ fileSize(artifact.file)|e }}</span>
                    </td>
                </tr>
            {% endfor %}
        </table>
    </div>
</div>

{% for artifact in artifacts %}
    <!-- Modal -->
    <div class=\"modal fade\" id=\"modal{{ md5(artifact.file) }}\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-xl modal-dialog-centered\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\"><span class=\"badge badge-primary\">{{ artifact.project }}</span> {{ filenameAndExtension(artifact.file)|e }}</h5>
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                <div class=\"modal-body\">
                    <pre><code class=\"xml\">{{ fileContent(artifact.file)|e }}</code></pre>
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                </div>
            </div>
        </div>
    </div>
{% endfor %}
", "default/dashboard/organisms/file_list.html.twig", "/home/gdelre/sources/fmm/qat/templates/default/dashboard/organisms/file_list.html.twig");
    }
}
