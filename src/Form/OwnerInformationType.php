<?php

namespace App\Form;

use App\Entity\CompanyInformation;
use App\Entity\OwnerInformation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OwnerInformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'userName',
                ]
            ])
            ->add('gender', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'choices' => [
                    'Choose an option' => '',
                    'Male' => "male",
                    'Female' => 'female',
                    'other' => 'other',
                ],
                'preferred_choices' => ['male', 'female'],
            ])

            ->add('userNumber', TextType::class,[
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Number'
                ],
            ])
            ->add('companyInformation', companyInformationType::class);


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OwnerInformation::class,
            'ownerInformation' => false,
        ]);
    }
}
