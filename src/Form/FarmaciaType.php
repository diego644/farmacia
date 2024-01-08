<?php

namespace App\Form;

use App\Entity\Farmacia;
use App\Entity\Post;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FarmaciaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('historiaClinica')
            ->add('obraSocial')
            ->add('auditoria')
            ->add('recibido')
            ->add('enviado_O_S')
            ->add('recibido_2')
            ->add('entregado_2')
            ->add('observacionesFarmacia')
            ->add('creation_date')
            ->add('user', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
            ->add('post', EntityType::class, [
                'class' => Post::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Farmacia::class,
        ]);
    }
}
