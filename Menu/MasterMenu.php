<?php

/*
 * This file is part of the Zikula package.
 *
 * Copyright Zikula Foundation - http://zikula.org/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kaikmedia\AdminLTETheme\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Zikula\Common\Translator\TranslatorTrait;

class MasterMenu implements ContainerAwareInterface
{
    use ContainerAwareTrait;
    use TranslatorTrait;

    public function menu(FactoryInterface $factory, array $options)
    {
        $this->setTranslator($this->container->get('translator.default'));
        $permApi = $this->container->get('zikula_permissions_module.api.permission');
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
        $menu->addChild($this->__('Home', 'zikula'), ['route' => 'home']);
        $menu->addChild($this->__('Account', 'zikula'), ['route' => 'zikulausersmodule_account_menu']);
        $menu->addChild($this->__('Logout', 'zikula'), ['route' => 'zikulausersmodule_account_menu']);
        return $menu;
    }

    public function setTranslator($translator)
    {
        $this->translator = $translator;
    }
}
