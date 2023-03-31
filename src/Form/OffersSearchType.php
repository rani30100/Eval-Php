<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OffersSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'label' => false,
                'placeholder' => 'Type',
                'choices' => [
                    //clé => value (La value c'est ce qui rentre dans la base de donnée ecrit de la meme façon)
                    'CDI' => 'CDI',
                    'CDD' => 'CDD',
                    'Intérmim' => 'Intérim',
                    'Alternance' => 'Alternance'
                ],
                'required' => false
            ])


            ->add('department', ChoiceType::class, [
                'label' => false,
                'placeholder' => 'Département',
                'required' => false,
                'choices' => [
                    //clé => value (La value c'est ce qui rentre dans la base de donnée ecrit de la meme façon)
                    'Gard' => 'Gard',
                    'Vaucluse' => 'Vaucluse',
                    'Bouches-du-Rhône' => 'Bouches-du-Rhône',
                    'Var' => 'Var',
                    'Loire' => 'Loire',
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn btn-outline-success'
                ]
            ])

            ->add('search', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Trouvez une offre...'
                ]
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'attr' => ['id' => 'form_search'],
            'method' => 'GET',
        ]);
    }
}
