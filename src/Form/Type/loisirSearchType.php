<?php

namespace MicroCMS\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


// modifier en LeisureAddType
class loisirSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('prix', ChoiceType::class, array(
                'choices' => array('1' => 'GRATUIT', '20' => ' 20 €',  '100' => ' 100 €', '999999' => 'Tous voir') ))
            ->add('Distance', ChoiceType::class, array(
                'choices' => array('0.10' => '10 Kms', '0.20' => '20 Kms',  '0.56' => '56 Kms', '1.10' => '110 Kms') ))

            ->add('title', TextType::class)
            ->add('lien', TextType::class)
            ->add('position', TextType::class)
            ->add('positionLat', TextType::class)
            ->add('positionLng', TextType::class)
            ->add('image', FileType::class)
            ->add('imageModif', FileType::class)
            ->add('dateDebut', textType::class)
            ->add('dateFin', textType::class)

            ->add('content', TextareaType::class);
    }

    public function getName()
    {
        return 'loisir';
    }
}
