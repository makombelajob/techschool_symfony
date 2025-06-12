<?php

namespace App\Form;

use App\Entity\Courses;
use App\Entity\Results;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResultsForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('note', IntegerType::class, [
                'attr' => [
                    'placeholder' => 'Note',
                    'class' => 'fs-4',
                ]
            ])
            ->add('monthly', IntegerType::class, [
                'label' => 'Note mensuelle',
                'attr' => [
                    'placeholder' => 'Mensuelle',
                    'class' => 'fs-4'
                ]
            ])
            ->add('yearly', IntegerType::class, [
                'label' => 'Note anuuelle',
                'attr' => [
                    'placeholder' => 'Annuelle',
                    'class' => 'fs-4'
                ]
            ])
            ->add('remark', TextareaType::class, [
                'label' => 'Remarques',
                'attr' => [
                    'placeholder' => 'Entrez vos remarques',
                    'cols' => 10,
                    'rows' => 10,
                    'class' => 'fs-4',
                ]
            ])
            ->add('courses', EntityType::class, [
                'class' => Courses::class,
                'choice_label' => 'name',
            ])
            ->add('users', EntityType::class, [
                'class' => Users::class,
                'choice_label' => function (Users $user) {
                    return $user->getFirstname() . ' ' . $user->getLastname();
                },

            ])
            ->add('ajouter', SubmitType::class, []);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Results::class,
        ]);
    }
}
