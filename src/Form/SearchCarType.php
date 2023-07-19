<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchCarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand', null, [
                'required' => false,
                'label' => 'Marque',
            ])
            ->add('model', null, [
                'required' => false,
                'label' => 'Modèle',
            ])
            ->add('price', null, [
                'required' => false,
                'label' => 'Prix',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Rechercher',
                'attr' => [
                    'class' => 'btn btn-warning',
                    'style' => 'padding: 10px 20px; font-size: 1rem;',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
            'method' => 'GET',
            
        ]);
    }
}
