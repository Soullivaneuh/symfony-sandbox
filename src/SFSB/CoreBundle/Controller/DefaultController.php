<?php

namespace SFSB\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/")
 */
class DefaultController extends Controller
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
}
