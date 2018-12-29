<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpectateurReservationType extends AbstractType
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
            )

            // TODO régler mise à jour id selon nouvel id
            ->add('reservation',EntityType::class, [
                    'class' => 'AppBundle\Entity\Reservation',
                    'choice_label' => 'id'
                ]
            );

        //fin du builder ;
    }

    /**
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
