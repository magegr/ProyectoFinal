<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('price')
            ->add('stock')
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Gafas graduadas' => 'graduadas',
                    'Gafas de sol' => 'sol',
                    'Lentillas' => 'lentilla',
                    'Accesorio' => 'accesorio'
                ]
            ])
            ->add('active')
            ->add('trend')
            ->add('mount_type')
            ->add('material')
            ->add('gender')
            ->add('color')
            ->add('graduation')
            ->add('duration', ChoiceType::class, [
                'choices' => [
                    'Diaria' => 'diaria',
                    'Mensual' => 'mensual',
                ]
            ])
            ->add('diameter')
            /*->add('users', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])*/
            ->add('image', TextType::class, [
                'label' => "Nombre de la imagen",
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
