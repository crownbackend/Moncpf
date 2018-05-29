<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-info'
                ]
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'class' => 'form-info'
                ]
            ])
            ->add('numeroDeTelephone', null, [
                'attr' => [
                    'class' => 'form-info',
                    'placeholder' => 'Votre numéro de télephone'
                ]
            ])
            ->add('identity', ComplementInfoType::class)
            ->add('email', null, [
                'attr' => [
                    'class' => 'form-info',
                    'placeholder' => 'Vous aller recevoir une confirmations par mail'
                ]
            ])
            ->remove('username')
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }
    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}
