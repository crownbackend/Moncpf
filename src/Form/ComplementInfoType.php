<?php

namespace App\Form;

use App\Entity\ComplementInfo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComplementInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('society', TextType::class, [
                'attr' => [
                    'placeholder' => 'sociète dans la quel vous travailler',
                    'class' => 'form-info'
                ],
                'constraints' => (new Assert\Length([
                    'min' => '3',
                    'max' => '50',
                    'minMessage' => 'Votre entreprise doit avoir minimum {{ limit }} caractères !',
                    'maxMessage' => 'Votre entreprise ne doit pas dépasser {{ limit }} caractères !'
                ]))
            ])
            ->add('city', TextType::class, [
                'attr' => [
                    'class' => 'form-info',
                    'placeholder' => 'La ville de votre entreprise'
                ],
                'constraints' => (new Assert\Length([
                    'min' => '2',
                    'max' => '50',
                    'minMessage' => 'Votre ville doit avoir minimum 2 lettre',
                    'maxMessage' => 'Votre ville doit avoir minimum 3 lettre',
                ]))
            ])
            ->add('zipCode', null, [
                'attr' => [
                    'class' => 'form-info',
                    'placeholder' => 'Code postale de votre sociète'
                ],
                'constraints' => (new Assert\Regex([
                    'pattern' => '/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/',
                    'message' => 'Votre code postal n\'est pas valide'
                ]))
            ])
            ->add('professionalCategory', ChoiceType::class, [
                'choices' => [
                    'Employer' => 'Employer',
                    'Ouvrier non qualifier' => 'Ouvreir non qualifier',
                    'Ouvrier qualifier' => 'Ouvrier qualifier',
                    'Ingénieur / cadre' => 'Ingénieur / cadre',
                    'Technicien / agent de maitrise / Autres professions intermédiaires' => 'Technicien / agent de maitrise / Autres professions intermédiaires'
                ],
                'attr' => [
                    'class' => 'form-info-select'
                ]
            ])
            ->add('typeOfContract', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-info-select'
                ],
                'choices' => [
                    'CDI – Contrat à durée indéterminée' => 'CDI – Contrat à durée indéterminée',
                    'CDD – Contrat à durée déterminée' => 'CDD – Contrat à durée déterminée',
                    'CTT – Contrat de travail temporaire ou Intérim' => 'CTT – Contrat de travail temporaire ou Intérim',
                    'Contrat d’apprentissage (alternance)' => 'Contrat d’apprentissage (alternance)',
                    'Contrat de professionnalisation (alternance)' => 'Contrat de professionnalisation (alternance)',
                    'CUI – Contrat unique d’insertion' => 'CUI – Contrat unique d’insertion',
                    'CAE - Contrat d’accompagnement dans l’emploi' => 'CAE - Contrat d’accompagnement dans l’emploi',
                    'CIE - Contrat initiative emploi' => 'CIE - Contrat initiative emploi'
                ]
            ])
            ->add('numberSiret', null, [
                'attr' => [
                    'class' => 'form-info',
                    'placeholder' => 'Numéro de siret de votre entreprise'
                ],
                'constraints' => [new Assert\Regex([
                    'pattern' => '/^[0-9]{14,14}$/',
                    'message' => 'Mauvais code siret'
                ])]
            ])
            ->add('selectedTraining', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-info-select'
                ],
                'choices' => [
                    'Achat, Logistique et Transport' => [
                        'Achat' => 'Achat',
                        'Compétences en logistique' => 'Compétences en logistique'
                    ]
                ]
            ])
            ->add('cpfTime', NumberType::class, [
                'attr' => [
                    'class' => 'form-info-select'
                ],

            ])
            ->add('codeNaf', null, [
                'attr' => [
                    'class' => 'form-info'
                ],
                'constraints' => (new Assert\Regex([
                    'pattern' => '/^[0-9]{4}[A-Z]{1}$/',
                    'message' => 'Votre code naf doit comporter 4 chiffre et une lettre en majuscule'
                ]))

            ])
            ->add('pdfFile', FileType::class)
            ->add('pdfFile2', FileType::class)
            ->add('pdfFile3', FileType::class)
            ->add('pdfFile4', FileType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ComplementInfo::class,
        ]);
    }
}
