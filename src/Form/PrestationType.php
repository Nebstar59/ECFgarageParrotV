<?php

namespace App\Form;

use App\Entity\Prestation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PrestationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [ 
                'label' => 'Nom de la prestation',
                'attr' => [
                    'placeholder' => 'Nom de la prestation',
                ],
            ])
            ->add('description', null, [
                'label' => 'Description de la prestation',
                'attr' => [
                    'placeholder' => 'Description de la prestation',
                    'rows' => 5,
                    'cols' => 50,
                ],
            ])
            ->add('price', null, [
                'label' => 'Prix de la prestation',
                'attr' => [
                    'placeholder' => 'Prix de la prestation',
                ],
            ])
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'label' => 'Image d\'illustration de la prestation'
            ])
            ->add('duration', null, [
                'label' => 'Durée de la prestation',
                'attr' => [
                    'placeholder' => 'Durée de la prestation',
                ],
            ])            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prestation::class, VichImageType::class,
        ]);
    }
}
