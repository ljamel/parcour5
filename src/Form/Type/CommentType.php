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
            'choices' => array('0' => '0', '1' => '1',  '2' => '1', '3' => '3', '4' => '4',  '5' => '5', '6' => '6', '7' => '7',  '8' => '8', '9' => '9', '10' => '10') ));
    }

    public function getName()
    {
        return 'comment';
    }
}
