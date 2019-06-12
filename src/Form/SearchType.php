<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{

    /**
     * Build form to search location
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'location',
                TextType::class,
                [
                    'label'    => 'Location name',
                    'required' => false,
                ]
            )
            ->add(
                'nearBeach',
                CheckboxType::class,
                [
                    'label'    => 'Near a beach?',
                    'required' => false,
                ]
            )
            ->add(
                'acceptsPets',
                CheckboxType::class,
                [
                    'label'    => 'Accept pets?',
                    'required' => false,
                ]
            )
            ->add(
                'sleeps',
                TextType::class,
                [
                    'label'    => 'How many people?',
                    'required' => false,
                ]
            )
            ->add(
                'beds',
                TextType::class,
                [
                    'label'    => 'How many beds?',
                    'required' => false,
                ]
            )
            ->add(
                'startDate',
                DateType::class,
                [
                    'label'    => 'Start Date',
                    'html5'    => true,
                    'widget'   => 'single_text',
                    'required' => false,
                ]
            )
            ->add(
                'endDate',
                DateType::class,
                [
                    'label'    => 'End Date',
                    'html5'    => true,
                    'widget'   => 'single_text',
                    'required' => false,
                ]
            )
            ->add('submit', SubmitType::class, ['label' => 'Search']);
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        // Configure your form options here
    }
}
