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
                        'Compétences en logistique' => 'Compétences en logistique',
                        'Contrôle des transports et marchandises' => 'Contrôle des transports et marchandises',
                        'Import/Export/International' => 'Import/Export/International',
                        'Logistique/Métiers du Transport' => 'Logistique/Métiers du Transport',
                        'Métiers de la distribution – Management/Resp.' => 'Métiers de la distribution – Management/Resp.',
                        'Permis pour les véhicules spéciaux' => 'Permis pour les véhicules spéciaux',
                        'Permis voiture' => 'Permis voiture'
                    ],
                    'Assistanat, Secrétariat, Support' => [
                        'Assistanat/Adm.ventes/Accueil' => 'Assistanat/Adm.ventes/Accueil',
                        'Compétences administratives' => 'Compétences administratives',
                        'Compétences en secrétariat' => 'Compétences en secrétariat',
                        'Gestion de la relation client' => 'Gestion de la relation client',
                        'SAV/Hotline/Téléconseiller' => 'SAV/Hotline/Téléconseiller',
                    ],
                    'Banque Finance Assurance' => [
                        'Compétences bancaires' => 'Compétences bancaires',
                        'Compétences financières' => 'Compétences financières'
                    ],
                    'Bâtiments, Travaux' => [
                        'BTP – Gros Oeuvre/Second Oeuvre' => 'BTP – Gros Oeuvre/Second Oeuvre',
                        'Bureau d’Etudes/R&D/BTP archi/conception' => 'Bureau d’Etudes/R&D/BTP archi/conception',
                        'Connaissance des processus du BTP' => 'Connaissance des processus du BTP',
                        'Gestion des travaux et chantiers' => 'Gestion des travaux et chantiers',
                        'Maîtrise des matériaux et outils BTP' => 'Maîtrise des matériaux et outils BTP',
                        'Maîtrise des techniques de mesure et de calcul BTP' => 'Maîtrise des techniques de mesure et de calcul BTP'
                    ],
                    'Bureautique' => [
                        'Logiciels bureautiques' => 'Logiciels bureautiques',
                        'Tâches bureautiques' => 'Tâches bureautiques'
                    ],
                    'Commerce' => [
                        'Commercial – Technico-Commercial' => 'Commercial – Technico-Commercial',
                        'Commercial auprès des particuliers' => 'Commercial auprès des particuliers',
                        'Commercial auprès des professionnels' => 'Commercial auprès des professionnels',
                        'Commercial-Vendeur en magasin' => 'Commercial-Vendeur en magasin',
                        'Compétences commerciales' => 'Compétences commerciales'
                    ],
                    'Comptabilité Audit' => [
                        'Compétences comptables' => 'Compétences comptables',
                        'Compta/Gestion/Finance/Audit' => 'Compta/Gestion/Finance/Audit'
                    ],
                    'Droit, Juridique' => [
                        'Compétences juridiques' => 'Compétences juridiques',
                        'Juridique/Droit' => 'Juridique/Droit',
                    ],
                    'Esthétique Cosmétique Coiffure' => [
                        'Compétences en esthétique et soin du corps' => 'Compétences en esthétique et soin du corps'
                    ],
                    'Fonction publique' => [
                        'Métiers de la Fonction Publique' => 'Métiers de la Fonction Publique'
                    ],
                    'Immobilier' => [
                        'Compétences en gestion immobilière' => 'Compétences en gestion immobilière',
                        'Négociation/Gestion immobilière' => 'Négociation/Gestion immobilière'
                    ],
                    'Industrie Sciences et Techniques, Méthodes' => [
                        'Compétences en chimie' => 'Compétences en chimie',
                        'Compétences R&D' => 'Compétences R&D',
                        'Gestion de la production et maintenance' => 'Gestion de la production et maintenance',
                        'Gestion de la qualité' => 'Gestion de la qualité',
                        'Ingénierie – Electro-tech./Automat.' => 'Ingénierie – Electro-tech./Automat.',
                        'Ingénierie – Mécanique/Aéron.' => 'Ingénierie – Mécanique/Aéron.',
                        'Maîtrise des outils, technologies et composants en électronique-télécom' => 'Maîtrise des outils, technologies et composants en électronique-télécom',
                        'Production – Gestion/Maintenance' => 'Production – Gestion/Maintenance',
                        'Production – Opérateur/Manoeuvre' => 'Production – Opérateur/Manoeuvre',
                        'Savoir-faire lié à la production opérationnelle' => 'Savoir-faire lié à la production opérationnelle',
                        'Tâches opérationnelles de mécanique-électronique-telecom' => 'Tâches opérationnelles de mécanique-électronique-telecom'
                    ],
                    'Informatique, Télécommunications' => [
                        'Champs de spécialisation informatique' => 'Champs de spécialisation informatique',
                        'Informatique – Développement' => 'Informatique – Développement',
                        'Informatique – Systèmes d’Information' => 'Informatique – Systèmes d’Information',
                        'Informatique – Systèmes/Réseaux' => 'Informatique – Systèmes/Réseaux',
                        'Langages informatiques' => 'Langages informatiques',
                        'Logiciels, applications, progiciels, frameworks' => 'Logiciels, applications, progiciels, frameworks',
                        'Matériel informatique' => 'Matériel informatique',
                        'Méthodes de modélisation et patrons d’architecture' => 'Méthodes de modélisation et patrons d’architecture',
                        'Méthodes de résolution de problème et OMQ' => 'Méthodes de résolution de problème et OMQ',
                        'Systèmes, réseaux, protocoles' => 'Systèmes, réseaux, protocoles',
                        'Tâches informatiques' => 'Tâches informatiques'
                    ],
                    'Langues' => [
                        'Langues couramment utilisées (commerce/tourisme)' => 'Langues couramment utilisées (commerce/tourisme)',
                        'Langues faiblement utilisées (commerce/tourisme)' => 'Langues faiblement utilisées (commerce/tourisme)'
                    ],
                    'Loisirs, Tourisme, Restauration' => [
                        'Compétences dans le domaine des sports et loisirs' => 'Compétences dans le domaine des sports et loisirs',
                        'Compétences dans le domaine du tourisme' => 'Compétences dans le domaine du tourisme',
                        'Compétences en hôtellerie-restauration' => 'Compétences en hôtellerie-restauration',
                        'Restauration/Tourisme/Hôtellerie/Loisirs' => 'Restauration/Tourisme/Hôtellerie/Loisirs'
                    ],
                    'Management, Projets' => [
                        'Capacité de management' => 'Capacité de management',
                        'Direction/Resp. Co. et Centre de Profit' => 'Direction/Resp. Co. et Centre de Profit',
                        'Mesure et gestion de la performance' => 'Mesure et gestion de la performance',
                        'Méthodes de management' => 'Méthodes de management'
                    ],
                    'Marketing Communication' => [
                        'Compétences documentaires' => 'Compétences documentaires',
                        'Gestion de la promotion des produits et de la marque' => 'Gestion de la promotion des produits et de la marque',
                        'Gestion des relations publiques' => 'Gestion des relations publiques',
                        'Marketing/Communication/Graphisme' => 'Marketing/Communication/Graphisme',
                        'Rédaction et diffusion de l’information journalistique' => 'Rédaction et diffusion de l’information journalistique'
                    ],
                    'Médical, Social, Services Personnes' => [
                        'Compétences éducationnelles et pédagogiques' => 'Compétences éducationnelles et pédagogiques',
                        'Compétences médicales et paramédicales' => 'Compétences médicales et paramédicales',
                        'Compétences ménagères' => 'Compétences ménagères',
                        'Santé/Social' => 'Santé/Social',
                        'Services à la personne/aux entreprises' => 'Services à la personne/aux entreprises'
                    ],
                    'RH, Sciences Humaines' => [
                        'Connaissance des techniques de développement personnel' => 'Connaissance des techniques de développement personnel',
                        'Formation du personnel' => 'Formation du personnel',
                        'Gestion des relations sociales' => 'Gestion des relations sociales',
                        'Gestion des ressources humaines (GRH)' => 'Gestion des ressources humaines (GRH)',
                        'RH/Personnel/Formation' => 'RH/Personnel/Formation'
                    ],
                    'Sécuritaire, Formations obligatoires, Méthodes' => [
                        'Connaissance des normes ISO' => 'Connaissance des normes ISO',
                        'Connaissance des normes QHSE' => 'Connaissance des normes QHSE',
                        'Gestion du risque et de la sécurité' => 'Gestion du risque et de la sécurité',
                        'Qualité/Hygiène/Sécurité/Environnement' => 'Qualité/Hygiène/Sécurité/Environnement'
                    ]
                ]
            ])
            ->add('cpfTime', null, [
                'attr' => [
                    'class' => 'form-info-select'
                ],
                'constraints' => (new Assert\Regex([
                    'pattern' => '/^[0-9]{1,3}$/',
                    'message' => 'il peux y avoir que des chiffres'
                ]))

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
            ->add('pdfFile', FileType::class, [
                'constraints' => [new Assert\File([
                    'maxSize' => '2M',
                    'mimeTypes' => '{"application/pdf", "application/x-pdf"}',
                    'mimeTypesMessage' => 'Il faut un fichier PDF, XPDF, PNG, JPEG'
                ])],
                'attr' => [
                    'class' => 'btn btn-blue'
                ]
            ])
            ->add('pdfFile2', FileType::class, [
                'constraints' => [new Assert\File([
                    'maxSize' => '2M',
                    'mimeTypes' => '{"application/pdf", "application/x-pdf"}',
                    'mimeTypesMessage' => 'Il faut un fichier PDF, XPDF, PNG, JPEG'
                ])],
                'attr' => [
                    'class' => 'btn btn-blue'
                ]
            ])
            ->add('pdfFile3', FileType::class, [
                'constraints' => [new Assert\File([
                    'maxSize' => '2M',
                    'mimeTypes' => '{"application/pdf", "application/x-pdf"}',
                    'mimeTypesMessage' => 'Il faut un fichier PDF, XPDF, PNG, JPEG'
                ])],
                'attr' => [
                    'class' => 'btn btn-blue'
                ]
            ])
            ->add('pdfFile4', FileType::class, [
                'constraints' => [new Assert\File([
                    'maxSize' => '2M',
                    'mimeTypes' => '{"application/pdf", "application/x-pdf"}',
                    'mimeTypesMessage' => 'Il faut un fichier PDF, XPDF, PNG, JPEG'
                ])],
                'attr' => [
                    'class' => 'btn btn-blue'
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
