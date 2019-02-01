<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PieceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class )
            ->add('accroche', TextType::class )
            ->add('auteur', TextType::class)
            ->add('genre', TextType::class)
            ->add('participants', TextType::class)
            ->add('resume',TextareaType::class)
            ->add('dates',TextareaType::class)
            ->add('salle', EntityType::class, [
                    'class' => 'AppBundle\Entity\Salle',
                    'choice_label' => function($salle) {
                        return $salle->getnomSalle().': '.$salle->getVilleSalle();
                    },
                ]
            )

            ->add('image', FileType::class, [
                'required' => false ]
            ) // chargement image
            ->add('imageThumbnail', FileType::class, [
                'required' => false ]
            ) // chargement image vignette
            ->add('save', SubmitType::class, [
                'label' => 'Ajouter/Modifier une pièce'
            ]
        ); //fin du builder ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Piece'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_piece';
    }


}
