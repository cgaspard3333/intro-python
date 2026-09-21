<?php

namespace Cours;

/**
 * La page d'accueil du site : le choix du groupe.
 */
class Landing
{
    private $root;
    private $config;

    public function __construct($root, array $config)
    {
        $this->root = rtrim($root, '/');
        $this->config = $config;
    }

    public function write($targetDirectory)
    {
        $template = file_get_contents($this->root.'/themes/layout/landing.html');

        $contents = strtr($template, array(
            '{{title}}' => htmlspecialchars($this->config['title']),
            '{{shortTitle}}' => htmlspecialchars($this->config['shortTitle']),
            '{{subtitle}}' => htmlspecialchars($this->config['subtitle']),
            '{{settings}}' => file_get_contents($this->root.'/themes/layout/settings.html'),
            '{{choices}}' => $this->choices(),
            '{{teachers}}' => $this->teachers(),
            '{{moodle}}' => htmlspecialchars($this->config['moodle']),
        ));

        file_put_contents($targetDirectory.'/index.html', $contents);
    }

    private function choices()
    {
        $html = '';

        foreach ($this->config['groups'] as $group) {
            $html .= '<a class="choice" href="'.$group['slug'].'/index.html" data-group="'.$group['id'].'">'
                .'<span class="choiceValue">"'.htmlspecialchars($group['label']).'"</span>'
                .'<span class="choiceAction">Ouvrir le cours</span>'
                .'</a>';
        }

        return $html;
    }

    /**
     * Une ligne par enseignant, avec l'adresse en clair : c'est là que les
     * étudiants viennent la chercher.
     */
    private function teachers()
    {
        $lines = array();

        foreach ($this->config['teachers'] as $teacher) {
            $mail = htmlspecialchars($teacher['mail']);

            $lines[] = '<li><span class="contactName">'.htmlspecialchars($teacher['name']).'</span>'
                .'<a class="contactMail" href="mailto:'.$mail.'">'.$mail.'</a></li>';
        }

        return implode('', $lines);
    }
}
