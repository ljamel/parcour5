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

            ->add('categorie', ChoiceType::class, array(
                'choices' => array('0' => 'toutes la famille', '1' => 'bebe', '2' => 'senior') ))
            ->add('title', TextType::class, array('label' => 'Titre'))
            ->add('lien', TextType::class, array('label' => 'Lien'))
            ->add('prix', TextType::class, array('label' => 'Prix'))
            ->add('position', TextType::class, array('label' => 'Adresse'))
            ->add('positionLat', TextType::class)
            ->add('positionLng', TextType::class)
            ->add('imageModif', FileType::class)
            ->add('image', TextType::class)

            ->add('dateDebut', textType::class, array('label' => 'Debut'))
            ->add('dateFin', textType::class, array('label' => 'Fin'))

            ->add('content', TextareaType::class, array('label' => 'Description'));
    }

    public function getName()
    {
        return 'loisir';
    }
}

