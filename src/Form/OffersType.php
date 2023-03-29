<?php

namespace App\Form;


use App\Entity\Offers;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class OffersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title',TextType::class, [
            'label' => "Nom de l'offre"
        ])
        ->add('department', ChoiceType::class, [
            'choices'=>[
                'Gard'=> 'Gard',
                'Vaucluse'=> 'Vaucluse',
                'Bouches-du-Rhône'=> 'Bouches-du-Rhône',
                'Var'=>'Var',
                'Loire'=>'Loire',
            ]
        ])
        ->add('description', CKEditorType::class, [
            'label' => 'Description'
        ])
        ->add('type', ChoiceType::class, [
            'choices'=>[
                'CDI'=> 'CDI',
                'CDD'=> 'CDD',
                'Intérim'=> 'Intérim',
                'Alternance'=>'Alternance'
            ]
        ])
        ->add("Date_added",  DateType::class, [
            'label' => "Date d'ajout",
            'widget' => 'single_text',
            'input'  => 'datetime'
        ])
        ->add("expiration_date",  DateType::class, [
            'label' => "Date d'éxpiration",
            'widget' => 'single_text',
            'input'  => 'datetime'
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offers::class,
        ]);
    }
}
