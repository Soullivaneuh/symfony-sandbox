<?php

namespace SFSB\FormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/jquery")
 */
class JQueryController extends Controller
{
    /**
     * @Route("/")
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/geolocation")
     * @Method({"GET", "POST"})
     * @Template("SFSBFormBundle:Default:form.html.twig")
     */
    public function geolocationAction()
    {
        $form = $this->createFormBuilder()
                ->add('geolocation', 'genemu_jquerygeolocation', array(
                    'map'       => true,
                    'latitude'  => array(
                        'enabled'   => true,
                        'hidden'    => false,
                    ),
                    'longitude' => array(
                        'enabled'   => true,
                        'hidden'    => false,
                    ),
                    'locality'  => array(
                        'enabled'   => true,
                        'hidden'    => false,
                    ),
                    'country'   => array(
                        'enabled'   => true,
                        'hidden'    => false,
                    ),
                ))
                ->getForm()
                ;
        
        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            
            if ($form->isValid()) {
                var_dump($form->getData());
            }
        }
        
        return array(
            'form'      => $form->createView(),
        );
    }
    
    /**
     * @Route("/slider")
     * @Method({"GET", "POST"})
     * @Template("SFSBFormBundle:Default:form.html.twig")
     */
    public function sliderAction()
    {
        $form = $this->createFormBuilder()
                ->add('price', 'genemu_jqueryslider', array(
                    'min'           => 0,
                    'max'           => 100,
                    'step'          => 1,
                    'orientation'   => 'horizontal',
                    'animate'       => false
                ))
                ->getForm()
                ;

        if ($this->getRequest()->isMethod('POST')) {
            $form->bind($this->getRequest());
            
            if ($form->isValid()) {
                var_dump($form->getData());
            }
        }

        return array(
            'form'      => $form->createView(),
        );
    }
}

?>
