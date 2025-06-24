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
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class CoursesForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du cours',
                'attr' => [
                    'placeholder' => 'Nom du cours ici',
                    'class' => 'fs-4',
                ],
                'constraints' => [
                    new Length(
                        min : 5,
                        max : 100,
                        minMessage : 'Au moins {{ limit }} caractères autorisés',
                        maxMessage : 'Au plus {{ limit }} autorisés',
                    ),
                    new NotBlank(message : 'Veuillez entre le nom du cours'),
                ]
            ])
            ->add('coefficient', ChoiceType::class, [
                'placeholder' => 'coefficient du cours',
                'choices' => [
                    '1.5' => 1.5,
                    '2.0' => 2.0,
                    '2.5' => 2.5
                ]
            ])
            ->add('day', ChoiceType::class, [
                'label' => 'Jour de la semaine',
                'placeholder' => 'veuillez choisir un jours',
                'choices' => [
                    'Lundi' => 'Lundi',
                    'Mardi' => 'Mardi',
                    'Mercredi' => 'Mercredi',
                    'Jeudi' => 'Jeudi',
                    'Vendredi' => 'Vendredi'
                ]
            ])
            ->add('startedAt', DateTimeType::class, [
                'date_widget' => 'single_text',
                'label' => 'Début du cours',
                'html5' => true,
                'with_seconds' => true,
            ])
            ->add('endAt', DateTimeType::class, [
                'date_widget' => 'single_text',
                'label' => 'Fin du cours',
                'html5' => true,
                'with_seconds' => true,
            ])
            ->add('room', ChoiceType::class, [
                'placeholder' => 'Salle de cours',
                'choices' => [
                    'Room_6B' => 'Room_6B',
                    'Room_5B' => 'Room_5B',
                    'Room_4C' => 'Room_4C',
                    'Room_3A' => 'Room_3A',
                    'Room_3B' => 'Room_3B',
                ]
            ])
            ->add('ressources', EntityType::class, [
                'label' => 'Modules',
                'class' => Ressources::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('subjects', EntityType::class, [
                'label' => 'Matières',
                'class' => Subjects::class,
                'choice_label' => 'name',
            ])
            ->add('users', EntityType::class, [
                'class' => Users::class,
                'choice_label' => function (Users $user): string {
                    return $user->getLastname() . ' ' . $user->getFirstname();
                },
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('classes', EntityType::class, [
                'class' => Classes::class,
                'choice_label' => 'name',
            ])
            ->add('ajouter', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Courses::class,
        ]);
    }
}
