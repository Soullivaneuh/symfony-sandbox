<?php

namespace SFSB\FormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use SFSB\CoreBundle\Entity\Flag;
use SFSB\FormBundle\Form\Type\YesnoType;

/**
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/yesno")
     * @Method({"GET", "POST"})
     * @Template("SFSBFormBundle:Default:form.html.twig")
     */
    public function yesnoAction()
    {
        $flag = new Flag();
        
        $form = $this->createForm(new YesnoType(), $flag);
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            
            if ($form->isValid()) {
                var_dump($flag);
                
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($flag);
                $em->flush();
            }
        }
        
        return array(
            'form'      => $form->createView(),
        );
    }
}
