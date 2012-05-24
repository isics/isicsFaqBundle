<?php

namespace Isics\FAQBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Isics\FAQBundle\Entity\Question;
use Isics\FAQBundle\Form\QuestionType;

/**
 * Question controller.
 *
 */
class MainController extends Controller
{
    /**
     * Lists all Question entities.
     *
     */
    public function listAction(Request $request, $id = null)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $questions = $em->getRepository('IsicsFAQBundle:Question')->findAllOrderedByDate();
        
        $question = $this->get('isics_faq.manager.question_manager')->create();
        if (null != $id) {
            $question = $this->get('isics_faq.manager.question_manager')->getRepository()->find($id);
        }
        
        if ($this->get('isics_faq.form.handler.question_form_handler')->process($question)) {
            return $this->redirect($this->generateUrl('isics_faq_list'));
        }

        return $this->render('IsicsFAQBundle:Main:list.html.twig', array(
            'id' => $id,
            'questions' => $questions,
            'form' => $this->get('isics_faq.form.handler.question_form_handler')->getForm()->createView()
        ));
    }

    /**
     * Deletes a Question entity.
     *
     */
    public function deleteAction($id)
    {
        $term = $this->get('isics_faq.manager.question_manager')->getRepository()->find($id);
        
        if (!$term) {
            throw $this->createNotFoundException('Unable to find Question entity.');
        }
        
        $this->get('isics_faq.manager.question_manager')->delete($term);

        return $this->redirect($this->generateUrl('isics_faq_list'));
    }
}
