<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre nom',
                    'maxlength' => '30',
                    'minlength' => '3'

                ],
                'constraints' => [ new Assert\Length([
                    'min' => '3',
                    'minMessage' => 'La taille minimum de ton nom est de {{ limit }} caractère.',
                    'max' => '30',
                    'minMessage' => 'La taille minimum de ton nom est de {{ limit }} caractère.'
                ])]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => 'Email'
                ],
                'constraints' => [ new Assert\Regex([
                    'pattern' => '/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/',
                    'message' => 'Ton email n\'est pas valide.'
                ])]
            ])
            ->add('subject', TextType::class, [
                'attr' => [
                    'placeholder' => 'Sujet',
                    'maxlength' => '60'
                ],
                'constraints' => [ new Assert\Length([
                    'min' => '3',
                    'minMessage' => 'Ton sujet doit avoir minimum {{ limit }} caractère.',
                    'max' => '60',
                    'maxMessage' => 'sujet ne doit pas dépasser {{ limit }} caractère'
                ])]
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Votre méssage, veuiller bien expliquer votre demande pour qu\'on vous réponde le plus rapidement possible !',
                    'rows' => '7',
                    'cols' => '30',
                    'minlength' => '20'
                ],
                'constraints' => [ new Assert\Length([
                    'min' => '20',
                    'minMessage' => 'Ton message doit contenir minimum {{ limit }} caractère.',
                    'max' => '3000',
                    'maxMessage' => 'Ton message ne doit pas dépasser {{ limit }} caractère.'
                ])]
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}