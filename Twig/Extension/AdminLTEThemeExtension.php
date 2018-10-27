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
        return [
            'registeredCount' => new \Twig_Function_Method($this, 'registeredCount', array('is_safe' => array('html'))),
            'latestRegisteredUsers' => new \Twig_Function_Method($this, 'latestRegisteredUsers', array('is_safe' => array('html')))
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

    /**
     * @param $string
     * @return string
     */
    public function latestRegisteredUsers()
    {
        //'users' => $this->get('zikula_users_module.user_repository')->findBy([], ['user_regdate' => 'DESC'], $properties['amount']),

        $users = [
            ['name'=> 'Karol'],
            ['name'=> 'Maciek'],
            ['name'=> 'Tomasz']
        ];

        return $users;
    }
}