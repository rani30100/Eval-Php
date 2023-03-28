<?php

namespace App\Form;


use App\Entity\Offers;
use Symfony\Component\Form\AbstractType;
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
        ->add('description', TextareaType::class, [
            'label' => 'Description'
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
