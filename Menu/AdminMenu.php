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

class AdminMenu implements ContainerAwareInterface
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
        if ($permApi->hasPermission('ZikulaSettingsModule::', '::', ACCESS_ADMIN)) {
            $menu->addChild($this->__('Settings', 'zikula'), ['route' => 'zikulasettingsmodule_settings_main']);
        }
        if ($permApi->hasPermission('ZikulaExtensionsModule::', '::', ACCESS_ADMIN)) {
            $menu->addChild($this->__('Extensions', 'zikula'), ['route' => 'zikulaextensionsmodule_module_viewmodulelist']);
        }
        if ($permApi->hasPermission('ZikulaBlocksModule::', '::', ACCESS_EDIT)) {
            $menu->addChild($this->__('Blocks', 'zikula'), ['route' => 'zikulablocksmodule_admin_view']);
        }
        if ($permApi->hasPermission('ZikulaUsersModule::', '::', ACCESS_MODERATE)) {
            $menu->addChild($this->__('Users', 'zikula'), ['route' => 'zikulausersmodule_useradministration_list']);
        }
        if ($permApi->hasPermission('ZikulaGroupsModule::', '::', ACCESS_EDIT)) {
            $menu->addChild($this->__('Groups', 'zikula'), ['route' => 'zikulagroupsmodule_group_adminlist']);
        }
        if ($permApi->hasPermission('ZikulaPermissionsModule::', '::', ACCESS_ADMIN)) {
            $menu->addChild($this->__('Permissions', 'zikula'), ['route' => 'zikulapermissionsmodule_permission_list']);
        }
        if ($permApi->hasPermission('ZikulaThemeModule::', '::', ACCESS_EDIT)) {
            $menu->addChild($this->__('Themes', 'zikula'), ['route' => 'zikulathememodule_theme_view']);
        }

        return $menu;
    }

    public function setTranslator($translator)
    {
        $this->translator = $translator;
    }
}
