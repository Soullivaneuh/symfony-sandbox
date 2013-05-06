<?php

namespace SFSB\FormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Event\DataEvent;
use Symfony\Component\Validator\ExecutionContext;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\CallbackValidator;

/**
 * Description of YesnoType
 *
 * @author sullivan
 */
class YesnoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('flag', 'choice', array(
                'choices'   => array(
                    0   => 'non',
                    1   => 'oui',
                )
            ))
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'    => 'SFSB\CoreBundle\Entity\Flag',
        ));
    }
    
    public function getName()
    {
        'yesno';
    }
}

?>
