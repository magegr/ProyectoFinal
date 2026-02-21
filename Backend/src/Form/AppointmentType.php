<?php

namespace App\Form;

use App\Entity\Appointment;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AppointmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('surname1')
            ->add('surname2')
            ->add('firstTime', ChoiceType::class, [
                'choices' => [
                    'Sí' => true,
                    'No' => false
                ],
                'expanded' => true
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Revisió' => 'revision',
                    'Prova de lents de contacte' => 'prueba',
                    'Ulleres de sol' => 'sol',
                    'Taller' => 'taller'
                ]
            ])
            ->add('agreeTerms')
            /*->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }
}
