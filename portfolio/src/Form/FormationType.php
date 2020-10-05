<?php

namespace App\Form;

use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add("name", TextType::class, [
            "label" => "Nom de la Formation :",
            "attr" => [
                "placeholder" => "Entrez le nom de la Formation..."
            ]
        ])
        ->add("school", TextType::class, [
            "label" => "Nom de l'Ecole :",
            "attr" => [
                "placeholder" => "Entrez le nom de l'Ecole..."
            ]
        ])

        ->add("gradeLevel", ChoiceType::class, [
            "label" => "Niveau d'étude:",
            "choices" => [
                "Bac" => 0,
                "Bac+1" => 1,
                "Bac+2" => 2,
                "Bac+3/4" => 3,
                "Bac+5" => 4
            ]
        ])
        ->add("description", DateType::class, [
            "label" => "Description de la formation",
            "attr" => [
                "placeholder" => "Entrez la description de votre formation..."
            ]
        ])
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
