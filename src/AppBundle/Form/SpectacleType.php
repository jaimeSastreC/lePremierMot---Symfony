<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpectacleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomSpectacle')
            ->add('dateSpectacle', DateType::class, [
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd'
                ]
            )

            ->add('heureDebutSpectacle', TimeType::class, [
                    'input'  => 'datetime',
                    'widget' => 'choice',
                ]
            )
            ->add('heureFinSpectacle', TimeType::class, [
                    'input'  => 'datetime',
                    'widget' => 'choice',
                ]
            )
            ->add('salle', EntityType::class, [
                    'class' => 'AppBundle\Entity\Salle',
                    'choice_label' => function($salle) {
                        return $salle->getnomSalle().': '.$salle->getVilleSalle().': '.$salle->getplacesSalle();
                    },
                ]
            )
            ->add('ouvertureSpectacle', ChoiceType::class, [
                    'choices' => [
                        'réservation ouverte'    => true,
                        'réservation fermée'    => false,
                    ]
                ]
            )

            // option - pas nécessaire pour l'instant
            /*->add('tarif', EntityType::class, [
                'class' => 'AppBundle\Entity\Tarif',
                'choice_label' => 'prix_place'
            ])*/
            ->add('save', SubmitType::class, [
                    'label' => 'Ajouter /Modifier un Spectacle'
                ]
            ); //fin du builder ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Spectacle'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_spectacle';
    }


}
