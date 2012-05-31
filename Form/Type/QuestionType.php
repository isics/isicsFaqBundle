<?php

namespace Isics\FAQBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('question', 'textarea')
            ->add('date', 'date')
            ->add('answer', 'textarea')
        ;
    }

    public function getName()
    {
        return 'isics_faqbundle_questiontype';
    }
}
