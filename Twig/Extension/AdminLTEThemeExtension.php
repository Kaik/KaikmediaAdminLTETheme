<?php

/*
 * This file is part of the Zikula package.
 *
 * Copyright Zikula Foundation - http://zikula.org/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kaikmedia\AdminLTETheme\Twig\Extension;


class AdminLTEThemeExtension extends \Twig_Extension
{
    public function __construct()
    {
    }

    public function getFunctions()
    {
        return ['registeredCount' => new \Twig_Function_Method($this, 'registeredCount', array('is_safe' => array('html')))
        ];
    }

    /**
     * @param $string
     * @return string
     */
    public function registeredCount()
    {
        return 88;
    }
}