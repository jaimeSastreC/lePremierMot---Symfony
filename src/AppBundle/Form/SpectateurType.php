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
            ->add('civiliteSpectateur', ChoiceType::class, [
                        'choices' => [
                        'Mlle'    => 'Mlle',
                        'Mme'    => 'Mme',
                        'M'    => 'M',
                    ]
                ]
            )
            ->add('nomSpectateur')
            ->add('prenomSpectateur')
            ->add('categorie',EntityType::class, [
                    'class' => 'AppBundle\Entity\Categorie',
                    'choice_label' => function($categorie) {
                        return $categorie->getLibelle().': '.$categorie->getTarif()->getPrixPlace();
                    },
                ]
            ) // attention, prendre la méthode libelle de l'Entity Categorie !!!

            ->add('save', SubmitType::class, [
            'label' => 'Ajouter/Modifier un Spectateur'
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
