<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder

            ->add('spectacle',EntityType::class,
                [
                    'class' => 'AppBundle\Entity\Spectacle',
                    /*'choice_label' => 'nomSpectacle'*/   //version simple

                    /*affichage précis du spectacle */
                    'choice_label' => function($spectacle) {
                        //conversion date et heure du spectacle
                        $newDate = $spectacle->getDateSpectacle();
                        $newDate = $newDate->format('d/m/Y');
                        $newTime = $spectacle->getHeureDebutSpectacle();
                        $newTime = $newTime->format('H:i');
                        return $spectacle->getNomSpectacle().' '.$newDate. ' '.$newTime;
                    },
                ]
            )

            ->add('client',EntityType::class, [
                    'class' => 'AppBundle\Entity\Client',
                    'choice_label' => function($client) {
                        return $client->getCiviliteClient().' '.$client->getNomClient();
                    },
                ]
            )

            ->add('spectateur', CollectionType::class, [
                    'entry_type' => SpectateurType::class,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'by_reference' => false,
                ]
            )

            ->add('save', SubmitType::class, [
                    'label' => 'Ajouter/Modifier une Réservation'
                ]
            ); //fin du builder ;

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Reservation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_reservation';
    }


}
