<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategorieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', ChoiceType::class, [
                    'choices' => [
                        'Adulte'    => 'Adulte',
                        'Enfant'    => 'Enfant',
                        'Senior'    => 'Senior',
                        'Chômeur'    => 'Chômeur',
                        'Tarif Réduit' => 'Tarif Réduit',
                    ]
                ]
            )
            ->add('tarif', EntityType::class, [
                'class' => 'AppBundle\Entity\Tarif',
                'choice_label' => 'prix_place',
            ]) // attention, prendre la méthode prix_place de l'Entity Tarif !!!

            ->add('spectacle',EntityType::class,
                [
                    'class' => 'AppBundle\Entity\Spectacle',
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

            ->add('save', SubmitType::class, [
                    'label' => 'Ajouter/Modifier une Catégorie'
                ]
            ); //fin du builder ;

    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Categorie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_categorie';
    }


}
