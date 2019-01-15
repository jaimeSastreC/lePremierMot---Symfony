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
            ->add('spectacle',EntityType::class,[

                    /*  méthode query_builder qui fait une requête sur Spectacles
                    dont l'ouverture est true  */
                    'class' => 'AppBundle\Entity\Spectacle',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('s')
                            ->andWhere('s.ouvertureSpectacle = true');
                    },

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
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('c')
                            ->where('c.id =:id')
                            ->setParameter('id', $this->id);
                    },
                    'choice_label' => function($client) {
                        return $client->getCiviliteClient() . ' ' . $client->getNomClient();
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