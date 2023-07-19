<?php

namespace App\Form;

use App\Entity\Testimonial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestimonialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', null, [
            'label' => 'Nom',
        ])
        ->add('content', TextareaType::class , [
            'label' => 'Votre avis',
            'attr' => [
                'class' => 'tinymce',
                'rows' => 10,
                'cols' => 70
            ]
        ])
        ->add('note', null, [
            'label' => 'Note sur 5',
        ])
            ->add('service', null, [
                'choice_label' => 'name',
                'label' => 'Service',
                'placeholder' => 'Service concerné',
            ])
            ->add('prestation', null, [
                'choice_label' => 'name',
                'label' => 'Prestation',
                'placeholder' => 'Prestation souhaitée',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Testimonial::class,
        ]);
    }
}
