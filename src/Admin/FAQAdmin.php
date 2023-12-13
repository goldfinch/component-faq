<?php

namespace Goldfinch\Component\FAQ\Admin;

use Goldfinch\Component\FAQ\Models\FAQItem;
use Goldfinch\Component\FAQ\Blocks\FAQBlock;
use Goldfinch\Component\FAQ\Configs\FAQConfig;
use Goldfinch\Component\FAQ\Models\FAQCategory;
use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use SilverStripe\Forms\GridField\GridFieldConfig;

class FAQAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'faq';
    private static $menu_title = 'FAQ';
    private static $menu_icon_class = 'font-icon-help-circled';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        FAQItem::class => [
            'title'=> 'Questions',
        ],
        FAQCategory::class => [
            'title'=> 'Categories',
        ],
        FAQBlock::class => [
            'title'=> 'Blocks',
        ],
        FAQConfig::class => [
            'title'=> 'Settings',
        ],
    ];

    // public $showImportForm = true;
    // public $showSearchForm = true;
    // private static $page_length = 30;

    public function getList()
    {
        $list = parent::getList();

        // ..

        return $list;
    }

    protected function getGridFieldConfig(): GridFieldConfig
    {
        $config = parent::getGridFieldConfig();

        // ..

        return $config;
    }

    public function getSearchContext()
    {
        $context = parent::getSearchContext();

        // ..

        return $context;
    }

    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);

        // ..

        return $form;
    }

    // public function getExportFields()
    // {
    //     return [
    //         // 'Name' => 'Name',
    //         // 'Category.Title' => 'Category'
    //     ];
    // }
}
