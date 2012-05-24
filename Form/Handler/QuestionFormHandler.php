<?php

namespace Isics\FAQBundle\Form\Handler;

use Isics\FAQBundle\Entity\Question;
use Isics\FAQBundle\Manager\QuestionManager;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class QuestionFormHandler
{
    protected $form;
    protected $request;
    protected $termManager;

    public function __construct(Form $form, Request $request, QuestionManager $questionManager)
    {
        $this->form = $form;
        $this->request = $request;
        $this->questionManager = $questionManager;
    }

    public function process($question)
    {
        $this->form->setData($question);
        if ('POST' === $this->request->getMethod() && $this->request->request->has($this->form->getName())) {
            $this->form->bindRequest($this->request);
            if ($this->form->isValid()) {
                $this->doOnSuccess($this->form->getData());

                return true;
            }
        }

        return false;
    }

    protected function doOnSuccess(Question $question)
    {
        $this->questionManager->save($question);
    }
    
    /**
     * Get form
     *
     * @return Symfony\Component\Form\Form
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Set form
     *
     * @param Symfony\Component\Form\Form $form
     */
    public function setForm(Form $form)
    {
        $this->form = $form;
    }
}
