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

/* table/index_rename_form.twig */
class __TwigTemplate_8877c012fcbacdba953c024066f7d7cf2336f4a9844a0bfb84ae36e0120e37c1 extends \Twig\Template
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
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<form action=\"";
        echo PhpMyAdmin\Url::getFromRoute("/table/indexes/rename");
        echo "\" method=\"post\" name=\"index_frm\" id=\"index_frm\" class=\"ajax\">

  ";
        // line 3
        echo PhpMyAdmin\Url::getHiddenInputs(($context["form_params"] ?? null));
        echo "

  <fieldset id=\"index_edit_fields\">
    <div class=\"index_info\">
      <div>
          <div class=\"label\">
              <strong>
                  <label for=\"input_index_name\">
                      ";
        // line 11
        echo _gettext("Index name:");
        // line 12
        echo "                      ";
        echo \PhpMyAdmin\Html\Generator::showHint(_gettext("\"PRIMARY\" <b>must</b> be the name of and <b>only of</b> a primary key!"));
        echo "
                  </label>
              </strong>
          </div>

          <input type=\"text\"
              name=\"index[Key_name]\"
              id=\"input_index_name\"
              size=\"25\"
              maxlength=\"64\"
              value=\"";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["index"] ?? null), "getName", [], "method", false, false, false, 22), "html", null, true);
        echo "\"
              onfocus=\"this.select()\">
      </div>
    </div>
  </fieldset>
  <fieldset class=\"tblFooters\">
    <button class=\"btn btn-secondary\" type=\"submit\" id=\"preview_index_frm\">";
        // line 28
        echo _gettext("Preview SQL");
        echo "</button>
  </fieldset>
</form>
";
    }

    public function getTemplateName()
    {
        return "table/index_rename_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 28,  70 => 22,  56 => 12,  54 => 11,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "table/index_rename_form.twig", "C:\\_ELABORATO\\MegaCar\\public\\phpMyAdmin\\templates\\table\\index_rename_form.twig");
    }
}
