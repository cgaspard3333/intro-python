<?php

namespace Cours\Nodes;

use Gregwar\Slidey\Nodes\CodeNode as Base;

/**
 * Comme celui de Slidey, mais le langage par défaut est Python et le bloc est
 * annoté pour que l'habillage puisse afficher le langage et un bouton copier.
 */
class CodeNode extends Base
{
    public function render()
    {
        if ($this->raw) {
            return $this->value;
        }

        $language = $this->language ?: 'python';
        $code = htmlspecialchars(trim($this->value));
        $label = $language;

        if ($language === 'text') {
            $language = 'no-highlight';
        }

        return '<div class="codeBlock" data-language="'.htmlspecialchars($label).'">'
            .'<pre><code class="'.$language.' hljs">'.$code.'</code></pre>'
            .'</div>';
    }
}
