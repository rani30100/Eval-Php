<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OffersTriType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('tri', ChoiceType::class, [
            'label' => 'Trier par',
            'required' => false,
            'choices' => [
                'Ordre croissant' => 'id-asc',
                'Ordre décroissant' => 'id-desc',
            ],
        ])
        ->add('submit', SubmitType::class, ['label' => 'Rechercher']);
        
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
