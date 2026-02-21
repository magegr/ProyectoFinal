<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
          //  ->add('roles') de este
            ->add('password')
            ->add('name')
            ->add('surname1')
            ->add('surname2')
            ->add('phone')
            ->add('active')
            ->add('createdAt', null, [
                'widget' => 'single_text'
            ])
            ->add('Relation', EntityType::class, [ //de este
              'class' => Product::class,
                'choice_label' => 'name',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
