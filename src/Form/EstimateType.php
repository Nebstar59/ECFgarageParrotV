<?php

namespace App\Form;

use App\Entity\Estimate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EstimateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', null, [
                'label' => 'Nom'
            ])
            ->add('firstname', null, [
                'label' => 'Prénom'
            ])
            ->add('email')
            ->add('message', null, [
                'label' => 'Message',
                'attr' => [
                    'rows' => 10,
                    'cols' => 50,
                ],
            ])
            ->add('service', null, [
                'choice_label' => 'name',
                'label' => 'Service',
                'placeholder' => 'Service concerné',
            ])
            ->add('prestation', null, [
                // en fonction du service choisi, on affiche les prestations correspondantes dans le select
                'group_by' => 'service.name',
                'choice_label' => 'name',
                'label' => 'Prestation',
                'placeholder' => 'Prestation concernée',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Estimate::class,
        ]);
    }
}
