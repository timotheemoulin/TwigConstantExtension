<?php
/**
 * ConstantExtention allow you testing if a php constant is already defined
 * from a Twig template
 * you just call it like below :
 * {%if isConstDefined('myConstant')%}
 * 
 * @author Timothée Moulin timothee.moulin@gmail.com
 * @version 1.0
 * 
 */
namespace Acme\TwigExtensionBundle\Twig;
use Twig_Extension;
use Twig_Filter_Method;
class ConstantExtension extends \Twig_Extension 
{
    public function getFunctions() 
    {
        return array(
            'isConstDefined' => new \Twig_Function_Method($this, 'isConstDefined'),
        );
    }
 
    /**
     * @param $name => string that contains the name of the constant
     * @return true if the constant is already defined in php
     * @return false if the constant is not defined
     */
    public function isConstDefined($name)
    {
        if (defined($name))
            return true;
        else
            return false;
    }
 
    public function getName() 
    {
        return 'ConstantExtension';
    }
}