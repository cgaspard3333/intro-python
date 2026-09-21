<?php

namespace Cours\Nodes;

use Gregwar\RST\HTML\Nodes\TocNode as Base;

/**
 * Le sommaire, avec les sous-titres imbriqués dans leur chapitre plutôt que
 * placés à côté de lui.
 */
class TocNode extends Base
{
    protected function renderLevel($url, $titles, $level = 1, $path = array())
    {
        if ($level > $this->depth) {
            return '';
        }

        $html = '';

        foreach ($titles as $position => $entry) {
            $path[$level - 1] = $position + 1;
            list($title, $children) = $entry;

            // Le titre d'une page pointe vers la page elle-même, sans ancre :
            // « #title.1 » ne désigne que son sommet, et une ancre empêche la
            // reprise de lecture (voir restoreReading dans theme.js).
            $target = $level === 1 ? $url : $url.'#title.'.implode('.', $path);

            if (is_array($title)) {
                list($title, $reference) = $title;
                $info = $this->environment->resolve('doc', $reference);
                $target = $this->environment->relativeUrl($info['url']);
            }

            $html .= '<li><a href="'.$target.'">'.$title.'</a>';

            if ($children) {
                $sub = $this->renderLevel($url, $children, $level + 1, $path);

                if ($sub) {
                    $html .= '<ul>'.$sub.'</ul>';
                }
            }

            $html .= '</li>';
        }

        return $html;
    }
}
