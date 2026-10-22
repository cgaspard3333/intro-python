<?php

namespace Cours\Directives;

use Gregwar\RST\Nodes\WrapperNode;
use Gregwar\RST\Parser;
use Gregwar\RST\SubDirective;

/**
 * Une carte de récapitulatif :
 *
 *     .. recap::
 *
 *         .. carte:: Affichage
 *
 *             .. code-block:: python
 *
 *                 print("Bonjour")
 *
 * Le titre est le texte qui suit « :: ». Le corps accepte du RST ordinaire :
 * paragraphes, listes, blocs de code.
 */
class Card extends SubDirective
{
    public function getName()
    {
        return 'carte';
    }

    public function processSub(Parser $parser, $document, $variable, $data, array $options)
    {
        $titre = trim((string) $data);
        $entete = $titre === '' ? '' : '<p class="recapTitle">'.$this->titre($titre).'</p>';

        return new WrapperNode($document, '<div class="recapCard">'.$entete, '</div>');
    }

    /**
     * Le titre d'une carte n'est pas du RST : le moteur le livre tel quel.
     * On y reconnaît tout de même les doubles apostrophes inverses, pour que
     * « ``return`` ou ``print()`` » s'habille comme partout ailleurs.
     */
    private function titre($titre)
    {
        return preg_replace('/``(.+?)``/', '<code>$1</code>', htmlspecialchars($titre));
    }
}
