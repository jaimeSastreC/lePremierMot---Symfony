<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('dateReservation',DateType::class, [
        'widget' => 'single_text',
        'format' => 'yyyy-MM-dd'
    ]// $article->setDate(new \DateTime('now'));
            )


            ->add('spectacle',EntityType::class,
                [
                    'class' => 'AppBundle\Entity\Spectacle',
                    'choice_label' => 'nomSpectacle'
                ]
            )
            ->add('client', EntityType::class,
                [
                    'class' => 'AppBundle\Entity\Client',
                    'choice_label' => 'nomClient'   // TODO possible ajouter ? civilité prénom oui! idem spectateur
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
