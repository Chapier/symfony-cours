<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;


class AccountType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, $this->getConfiguration("Prénom", "Votre prénom"))
            ->add('lastName', TextType::class, $this->getConfiguration("Nom", "Votre nom de famille"))
            ->add('email', EmailType::class, $this->getConfiguration("Adresse email", "URL de votre avatar"))
            ->add('picture', UrlType::class, $this->getConfiguration("Photo de profil", "Présentez vous en quelques mots"))
            ->add('introduction', TextType::class, $this->getConfiguration("Introduction", "Présentez vous en quelques mots" ))
            ->add('description', TextType::class, $this->getConfiguration("Description", "C'est le moment de vous présenter en détails !"))
        ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
