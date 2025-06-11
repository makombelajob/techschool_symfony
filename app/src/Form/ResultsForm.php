<?php

namespace App\Form;

use App\Entity\Courses;
use App\Entity\Results;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResultsForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('note')
            ->add('monthly')
            ->add('yearly')
            ->add('remark')
            ->add('courses', EntityType::class, [
                'class' => Courses::class,
                'choice_label' => 'id',
            ])
            ->add('users', EntityType::class, [
                'class' => Users::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Results::class,
        ]);
    }
}
