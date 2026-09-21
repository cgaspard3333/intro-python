<?php

namespace Cours\Nodes;

use Gregwar\RST\HTML\Nodes\TableNode as Base;

/**
 * Un tableau sans classe Bootstrap, enveloppé pour pouvoir défiler sur mobile.
 */
class TableNode extends Base
{
    public function render()
    {
        $html = '<div class="tableWrap"><table>';

        foreach ($this->data as $index => &$row) {
            if (!$row) {
                continue;
            }

            $cell = isset($this->headers[$index]) ? 'th' : 'td';
            $html .= '<tr>';

            foreach ($row as &$column) {
                $html .= '<'.$cell.'>'.$column->render().'</'.$cell.'>';
            }

            $html .= '</tr>';
        }

        return $html.'</table></div>';
    }
}
