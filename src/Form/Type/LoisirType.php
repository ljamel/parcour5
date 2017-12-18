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
            ->add('title', TextType::class)
            ->add('lien', TextType::class)
            ->add('position', TextType::class)
            ->add('image', TextType::class)

            ->add('content', TextareaType::class);
    }

    public function getName()
    {
        return 'loisir';
    }
}

