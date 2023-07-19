<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand', null, [
                'label' => 'Marque',
                'attr' => [
                    'placeholder' => 'Marque de la voiture',
                ],
            ])
            ->add('model', null, [
                'label' => 'Modèle',
                'attr' => [
                    'placeholder' => 'Modèle de la voiture',
                ],
            ])
            ->add('price', null, [
                'label' => 'Prix',
                'attr' => [
                    'placeholder' => 'Prix de la voiture',
                ],
            ])
            ->add('kilometers', null, [
                'label' => 'Kilométrage',
                'attr' => [
                    'placeholder' => 'Kilométrage de la voiture',
                ],
            ])
            ->add('description', null, [
                'label' => 'Description',
                'attr' => [
                    'placeholder' => 'Description de la voiture',
                    'rows' => 5,
                    'cols' => 50,
                ],
            ])
            ->add('releaseYear', null, [
                'label' => 'Année de sortie',
                'format' => 'dd-MM-yyyy',
                // on veut que l'année de sortie soit entre 1950 et 2030
                'years' => range(1950, 2030),
                // on veut que le mois de sortie soit entre 1 et 12
                'months' => range(1, 12),
                // on veut que le jour de sortie soit entre 1 et 31
                'days' => range(1, 31),
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
