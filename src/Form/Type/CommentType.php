<?php

namespace MicroCMS\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', TextareaType::class)
            ->add('note', ChoiceType::class, array(
            'choices' => array('10' => '10',  '9' => '9', '8' => '8', '7' => '7',  '6' => '6', '5' => '5', '4' => '4',  '3' => '3', '2' => '2', '1' => '1', '0' => '0') ));
    }

    public function getName()
    {
        return 'comment';
    }
}
