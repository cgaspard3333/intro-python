<?php

namespace Cours\Nodes;

use Gregwar\Slidey\Nodes\BrowserNode as Base;

/**
 * Les liens « page précédente / page suivante » en bas de chaque page.
 */
class BrowserNode extends Base
{
    public function render()
    {
        list($before, $after) = $this->environment->getMyToc();

        $previous = $before ? $this->reference($before[count($before) - 1]) : null;
        $next = $after ? $this->reference($after[0]) : null;
        $parent = $this->environment->getParent();

        $links = '';

        if ($previous) {
            $links .= $this->link($previous, 'prev', 'Page précédente');
        }

        if ($parent) {
            $links .= $this->link($this->reference($parent), 'up', 'Remonter à');
        }

        if ($next) {
            $links .= $this->link($next, 'next', 'Page suivante');
        }

        return $links ? '<nav class="pager">'.$links.'</nav>' : '';
    }

    private function link($reference, $kind, $hint)
    {
        return '<a class="pagerLink pagerLink-'.$kind.'" href="'.$reference[0].'">'
            .'<span class="pagerHint">'.$hint.'</span>'
            .'<span class="pagerTitle">'.$reference[1].'</span>'
            .'</a>';
    }
}
