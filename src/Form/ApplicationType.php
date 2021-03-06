<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;

class ApplicationType extends AbstractType
{
    /**
     * Permet d'avoir la configuration de base d'un champ !
     * On utilise un tableau d'option pour personnaliser la configuration (comme 'required' => false)
     * @param string $label
     * @param string $placeholder
     * @param string $options
     * @return array
     */
    protected function getConfiguration(?String $label,?String $placeholder, $options = [])
    {
        return array_merge_recursive([
                               'label' => $label,
                               'attr' => [
                                   'placeholder' => $placeholder
                               ]
                           ], $options);
    }

}