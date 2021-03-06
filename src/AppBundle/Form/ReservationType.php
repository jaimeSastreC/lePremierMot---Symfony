<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            ->add('spectacle',EntityType::class,[

                    'class' => 'AppBundle\Entity\Spectacle',
                    /*'choice_label' => 'nomSpectacle'*/   //version simple

                    /* affichage précis du spectacle avec date et heure */
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

            ->add('spectateurs', CollectionType::class, [
                    'entry_type' => SpectateurReservationType::class,
                    'entry_options' => ['label' => false],
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'by_reference' => false,
                ]
            )

            ->add('mode_payement_reservation', ChoiceType::class, [
                    'choices' => [
                        'chèque'    => 'cheque',
                        'sur place'    => 'sur place',
                        'paypal'    => 'paypal',
                    ]
                ]
            )

            ->add('valide_reservation', ChoiceType::class, [
                    'choices' => [
                        'oui'    => 'oui',
                        'non'    => 'en attente',
                    ]
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
