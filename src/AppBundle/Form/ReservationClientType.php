<?php

namespace AppBundle\Form;

use AppBundle\Entity\Reservation;
use AppBundle\Repository\ReservationRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationClientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //récupération de l'entité client
        $this->id = $options['id_client'];

        $builder
            ->add('spectacle',EntityType::class,
                [
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
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('c')
                            ->where('c.id =:id')
                            ->setParameter('id', $this->id)
                            ->orderBy('c.nomClient', 'ASC');
                    },
                    'choice_label' => function($client) {
                        return $client->getCiviliteClient() . ' ' . $client->getNomClient();
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
            'data_class' => 'AppBundle\Entity\Reservation',
            //création de l'attribut id_client
            'id_client'         => null,
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










/* Test divers de recherche par critères:
->add('client',EntityType::class, [
                    'class' => 'AppBundle\Entity\Client',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('c')
                            ->orderBy('c.nomClient', 'ASC');
                    },
                    'choice_label' => function($client) {
                    if ($client->getId() > 5) {
                        return $client->getCiviliteClient() . ' ' . $client->getNomClient();
                        }
                    },
                ]
            )
*/