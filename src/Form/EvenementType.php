<?php

namespace App\Form;

use App\Entity\Evenements;
use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, array('label' => 'Titre de l\'évènement'))
            ->add('contenu', TextType::class, array('label' => 'Description'))
            ->add('video', TextType::class, array('label' => 'Lien (embeded) de la vidéo du live.'))
            ->add('dateDebut', DateTimeType::class, array('label' => 'Débute le', 'input_format' => 'Y-m-d H:i:s'))
            ->add('categories',EntityType::class,[
                'class'=> Categories::class,
                'choice_label'=> 'nom'
            ])
            ->add('valider', SubmitType::class, array('label' => 'Créer l\'évènement', 'attr' => ['class' => 'btn btn-success']));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenements::class,
        ]);
    }
}
