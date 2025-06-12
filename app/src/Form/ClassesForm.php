<?php

namespace App\Form;

use App\Entity\Classes;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClassesForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom de la classe',
                    'class' => 'fs-4',
                ]
            ])
            ->add('level', IntegerType::class, [
                'label' => 'Niveau',
                'attr' => [
                    'placeholder' => 'Entrez le niveau Niveau',
                    'class' => 'fs-4',
                ]
            ])
            ->add('users', EntityType::class, [
                'placeholder' => 'Choix des élèves',
                'class' => Users::class,
                'choice_label' => function (Users $user) {
                    return $user->getLastname() . ' ' . $user->getFirstname();
                },
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('affecter', SubmitType::class, [])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Classes::class,
        ]);
    }
}
