<?php

namespace App\Form;

use App\Entity\Classes;
use App\Entity\Courses;
use App\Entity\Ressources;
use App\Entity\Subjects;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoursesForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('coefficient', ChoiceType::class,[
                'placeholder' => 'coefficient du cours',
                'choices' => [
                    '1.5' => 1.5,
                    '2.0' => 2.0,
                    '2.5' => 2.5
                ]
            ])
            ->add('day', ChoiceType::class, [
                'placeholder' => 'veuillez choisir un jours',
                'choices' => [
                    'Lundi' => 'Lundi',
                    'Mardi' => 'Mardi',
                    'Mercredi' => 'Mercredi',
                    'Jeudi' => 'Jeudi',
                    'Vendredi' => 'Vendredi'
                ]
            ])
            ->add('startedAt', null, [
                'widget' => 'single_text',
            ])
            ->add('endAt', null, [
                'widget' => 'single_text',
            ])
            ->add('room')
            ->add('ressources', EntityType::class, [
                'class' => Ressources::class,
                'choice_label' => 'name',
                'multiple' => true,
            ])
            ->add('subjects', EntityType::class, [
                'class' => Subjects::class,
                'choice_label' => 'name',
            ])
            ->add('users', EntityType::class, [
                'class' => Users::class,
                'choice_label' => function(Users $user):string
                {
                    return $user->getLastname() . ' ' . $user->getFirstname();
                },
                'multiple' => true,
            ])
            ->add('classes', EntityType::class, [
                'class' => Classes::class,
                'choice_label' => 'name',
            ])
            ->add('ajouter', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Courses::class,
        ]);
    }
}
