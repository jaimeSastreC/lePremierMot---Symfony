<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageGallerieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomImage', FileType::class, [
                    'required' => false ]
            ) // chargement image

            ->add('thumbnailImage', FileType::class, [
                'required' => false ]
            )
            ->add('altImage')
            ->add('legendeImage', TextType::class, [
            'required' => false ]
            )
            ->add('save', SubmitType::class, [
                    'label' => 'ajouter/modifier une image'
                ]
            ); //fin du builder
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ImageGallerie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_imagegallerie';
    }


}
