<?php

namespace App\Form;

use App\Entity\ComplementInfo;
use Symfony\Component\Form\AbstractType;
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
                ]
            ])
            ->add('city', TextType::class, [
                'attr' => [
                    'class' => 'form-info',
                    'placeholder' => 'La ville de votre entreprise'
                ]
            ])
            ->add('zipCode', null, [
                'attr' => [
                    'class' => 'form-info',
                    'placeholder' => 'Code postale de votre sociète'
                ]
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
            ->add('cpfTime', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-info-select'
                ],
                'choices' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                    '13' => '1',
                    '14' => '14',
                    '15' => '15',
                    '16' => '16',
                    '17' => '17',
                    '18' => '18',
                    '19' => '19',
                    '20' => '20',
                    '21' => '21',
                    '22' => '22',
                    '23' => '23',
                    '24' => '24',
                ]
            ])
            ->add('codeNaf', null, [
                'attr' => [
                    'class' => 'form-info'
                ]
            ])
            ->add('opca', null, [
                'attr' => [
                    'class' => 'form-info'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ComplementInfo::class,
        ]);
    }
}
