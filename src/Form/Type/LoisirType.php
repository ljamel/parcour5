<?php

namespace MicroCMS\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class LoisirType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('etat', ChoiceType::class, array(
                'choices' => array('0' => 'En attente', '1' => 'Publier', '3' => 'Refuser' ) ))

            ->add('type', ChoiceType::class, array(
                'choices' => array('0' => 'bebe', '1' => 'toutes la famille', '2' => 'senior') ))
            ->add('title', TextType::class)
            ->add('lien', TextType::class)
            ->add('position', TextType::class)
            ->add('positionLat', TextType::class)
            ->add('positionLng', TextType::class)
            ->add('imageModif', FileType::class)
            ->add('image', TextType::class)

            ->add('dateDebut', textType::class)
            ->add('dateFin', textType::class)

            ->add('content', TextareaType::class);
    }

    public function getName()
    {
        return 'loisir';
    }
}

