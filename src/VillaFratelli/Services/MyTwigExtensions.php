<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace VillaFratelli\Services;

use Twig_Extension;

/**
 * Description of MyTwigExtensions
 *
 * @author Yaniv-PC
 */
class MyTwigExtensions extends Twig_Extension
{
    
    /**
     * Get extension twig function
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('is_mobile', array($this, 'isMobile'))
        );
    }
    /**
     * Is mobile
     * @return boolean
     */
    public function isMobile()
    {
        $oMobileDetect = new \Mobile_Detect();
        return $oMobileDetect->isMobile();
        //return $this->mobileDetector->isMobile();
    }
    
    
    public function getName()
    {
        return 'warezzzz_twig_extension';
    }
}
