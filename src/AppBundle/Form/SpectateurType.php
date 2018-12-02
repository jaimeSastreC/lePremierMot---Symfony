<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpectateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civiliteSpectateur')
            ->add('nomSpectateur')
            ->add('prenomSpectateur')
            ->add('categorie',EntityType::class, [
                    'class' => 'AppBundle\Entity\Categorie',
                    'choice_label' => 'libelle',
                ]
            ) // attention, prendre la méthode libelle de l'Entity Categorie !!!

           /* ->add('categorie',EntityType::class, [
                    'class' => 'AppBundle\Entity\Categorie',
                    'choice_label' => 'tarif',
                ]
            )*/ // attention, prendre la méthode tarif de l'Entity Categorie !!!

            ->add('save', SubmitType::class, [
            'label' => 'Ajouter une Catégorie'
        ]
    ); //fin du builder ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Spectateur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_spectateur';
    }


}
