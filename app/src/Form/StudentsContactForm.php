<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentsContactForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('subject', ChoiceType::class, [
                'label' => 'Sujet',
                'choices' => [
                    'Demande d\'informations' => 'information',
                    'Problème téchnique' => 'technical_issue',
                    'Autre' => 'autre',
                ],
                'data' => 'Message admin',
                'placeholder' => 'Choisissez un sujet',
                'attr' => [
                    'class' => 'fs-3',
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'attr' => [
                    'placeholder' => 'Veuillez écrire votre message à l\'administration',
                    'class' => 'fs-3',
                    'rows' => 10,
                    'cols' => 30,
                ]
            ])
            ->add('gpdr', CheckboxType::class, [
                'label' => 'J\'accpetes les conditions d\'utilisations',
                'required' => true,
                'mapped' => false
            ])
            ->add('envoyer', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                   'class' => 'btn btn-primary fs-3', 
                ]
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
