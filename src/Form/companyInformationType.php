<?php

namespace App\Form;

use App\Entity\CompanyInformation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;


class companyInformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('companyName', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Company Name',
                ]
            ])
            ->add('companyType', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'choices' => [
                    'Choose an option' => '',
                    'PG' => "pg",
                    'Hotel' => 'hotel',
                ],
            ])
            ->add('companyNumber', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Number',
                ]
            ])
            ->add('companyLogo', FileType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Company logo',
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional, so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '5m',
                        'mimeTypes' => [
                            'image/*',
                            'application/pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid jpg/pdf File',
                    ])
                ],
            ])
            ->add('city', ChoiceType::class, [
                'placeholder' => 'Choose an option',
                'required' => false,
                'choices' => [
                    'Choose an option' => '',
                    'Chandigarh' => "chandigarh",
                    'Delhi' => 'delhi',
                    'Gurgaon'=> 'gurgaon',
                    'Mohali' => 'mohali',
                ],
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('states', ChoiceType::class, [
                'required' => true,
                'choices' => [
                    'Choose an option' => '',
                    'Chandigarh' => "chandigarh",
                    'Delhi' => 'delhi',
                    'Haryana' => 'haryana',
                    'Punjab' => "punjab",
                    'Uttarakhand' => 'uttarakhand',
                ],
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('country', countryType::class, [
                'placeholder' => 'Choose an option',
                'required' => true,
                'disabled' => true,
                'choices' => [
                    'Choose an option' => ''
                ],
                'preferred_choices' => ['IN'],
                'data' => 'IN',
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            -> add('duplicateNumber', CheckboxType::class, [
                'data' => true,
                'required' => false,
            ])
            ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CompanyInformation::class,
            'ownerInformation' => false,
        ]);
    }
}