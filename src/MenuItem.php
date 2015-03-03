<?php

namespace GionniValeriana\laravelAdminlte;

use SleepingOwl\Admin\Admin;
use SleepingOwl\Admin\Menu\MenuItem as BaseMenuItem;

/**
 * Class MenuItem
 *
 * @author  Joy Lazari <joy.lazari@gmail.com>
 * @package GionniValeriana\laravelAdminlte
 */
class MenuItem {

    /**
     * @var BaseMenuItem
     */
    protected $menuItem;

    public function __construct(BaseMenuItem $menuItem) {
        $this->menuItem    = $menuItem;
        $admin             = Admin::instance();
        $this->htmlBuilder = $admin->htmlBuilder;
    }

    public function render($level = 1) {
        if ($this->menuItem->isHidden()) {
            return true;
        }
        if ($this->menuItem->hasSubItems()) {
            $level++;
            $content = $this->htmlBuilder->tag('i', [
                    'class' => [
                        'fa',
                        'fa-fw',
                        $this->menuItem->getIcon()
                    ]
                ]
            );
            $content .= ' ' . $this->menuItem->getLabel() . $this->htmlBuilder->tag('span', ['class' => 'fa arrow']);
            $content = $this->htmlBuilder->tag('a', ['href' => '#'], $content);

            $subitemsContent = '';
            foreach ($this->menuItem->getItems() as $item) {
                $subitemsContent .= $item->render($level);
            }
            $content .= $this->htmlBuilder->tag('ul', ['class' => 'treeview-menu'], $subitemsContent);
        } else {
            $content = $this->renderSingleItem();
        }
        return $this->htmlBuilder->tag('li', [], $content);
    }

    protected function renderSingleItem() {
        $content = $this->htmlBuilder->tag('i', [
                'class' => [
                    'fa',
                    'fa-fw',
                    $this->menuItem->getIcon()
                ]
            ]
        );
        $content .= ' ' . $this->menuItem->getLabel();
        return $this->htmlBuilder->tag('a', ['href' => $this->menuItem->getUrl()], $content);
    }

}