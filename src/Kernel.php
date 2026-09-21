<?php

namespace Cours;

use Cours\Directives\Card;
use Gregwar\RST\HTML\Directives\Wrap;
use Gregwar\RST\HTML\Kernel as HtmlKernel;
use Gregwar\Slidey\Directives as Slidey;
use Gregwar\Slidey\Kernel as Base;

/**
 * Le noyau de Slidey, avec des classes CSS qui nous appartiennent à la place
 * de celles de Bootstrap, et quelques directives de plus.
 */
class Kernel extends Base
{
    /**
     * Encadrés : nom de la directive => classe CSS.
     *
     * « warning » rend un exemple, et non un avertissement : c'est à cela
     * qu'il sert dans l'intégralité du cours. Pour un véritable
     * avertissement, écrire « .. attention:: ».
     */
    private static $callouts = array(
        'important' => 'callout callout-cle',
        'note' => 'callout callout-note',
        'warning' => 'callout callout-exemple',
        'exemple' => 'callout callout-exemple',
        'attention' => 'callout callout-attention',
        'success' => 'callout callout-acquis',
        'danger' => 'callout callout-piege',
        'astuce' => 'callout callout-astuce',
    );

    public function getDirectives()
    {
        $directives = HtmlKernel::getDirectives();

        $directives[] = new Slidey\Slide;
        $directives[] = new Slidey\Math;
        $directives[] = new Slidey\DiscoverList;
        $directives[] = new Slidey\Youtube;

        // « lead » : la phrase d'accroche sous un titre de page.
        // « pratique » : les informations d'organisation (contacts, rendu).
        foreach (array('textOnly', 'slideOnly', 'discover', 'step', 'tip', 'spoiler', 'center',
            'lead', 'pratique', 'recap') as $class) {
            $directives[] = new Wrap($class);
        }

        foreach (self::$callouts as $name => $class) {
            $directives[] = new Slidey\TriggerWrap($name, $class);
        }

        $directives[] = new Card;
        $directives[] = new Wrap('poll', true);

        return $directives;
    }

    public function getClass($name)
    {
        $ours = array(
            'Nodes\\CodeNode' => Nodes\CodeNode::class,
            'Nodes\\TableNode' => Nodes\TableNode::class,
            'Nodes\\TocNode' => Nodes\TocNode::class,
        );

        return isset($ours[$name]) ? $ours[$name] : parent::getClass($name);
    }
}
