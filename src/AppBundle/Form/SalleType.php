<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomSalle', TextType::class, [
                    'label' => 'Nom de la Salle*'
                ]
            )
            ->add('villeSalle',TextareaType::class , [
                    'label' => 'Adresse de la Salle*'
                ]
            )
            ->add('placesSalle',NumberType::class, [
                    'label' => 'Nombre de Places'
                ]
            )

            ->add('latitude', NumberType::class)
            ->add('longitude', NumberType::class)
            ->add('save', SubmitType::class, [
                    'label' => 'Ajouter/Modifier une Salle'
                ]
            ); //fin du builder ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Salle'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_salle';
    }


}
