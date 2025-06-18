<?php

namespace App\Form;

use App\Entity\Courses;
use App\Entity\Ressources;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RessourcesForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'attr' => [
                    'placeholder' => 'Veuillez entrer le nom',
                    'class' => 'fs-4'
                ],
                'constraints' => [
                    new NotBlank(message: 'Veuillez entrer un nom'),
                    new Length(
                        min: 5,
                        max: 100,
                        minMessage: 'Au moins {{ limit }} caractères autorisés',
                        maxMessage: 'Au plus {{ limit }} caractères autorisés'
                    )
                ]
            ])
            ->add('fileType', TextType::class, [
                'attr' => [
                    'placeholder' => 'Type du fichier',
                    'class' =>  'fs-4'
                ],
                'constraints' => [
                    new NotBlank(message: 'Veuillez entrer le type du fichier'),
                    new Length(
                        min: 2,
                        max: 10,
                        minMessage : 'Au moins {{ limit }} caractères autorisés',
                        maxMessage : 'Au plus {{ limit }} caractères autorisés'
                    )
                ]
            ])
            ->add('uploadedAt', null, [
                'widget' => 'single_text',
            ])
            ->add('courses', EntityType::class, [
                'class' => Courses::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ressources::class,
        ]);
    }
}
