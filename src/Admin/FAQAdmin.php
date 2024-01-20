<?php

namespace Goldfinch\Component\FAQ\Admin;

use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use Goldfinch\Component\FAQ\Models\FAQItem;
use Goldfinch\Component\FAQ\Blocks\FAQBlock;
use Goldfinch\Component\FAQ\Configs\FAQConfig;
use Goldfinch\Component\FAQ\Models\FAQCategory;

class FAQAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'faq';
    private static $menu_title = 'FAQ';
    private static $menu_icon_class = 'font-icon-help-circled';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        FAQItem::class => [
            'title' => 'Questions',
        ],
        FAQCategory::class => [
            'title' => 'Categories',
        ],
        FAQBlock::class => [
            'title' => 'Blocks',
        ],
        FAQConfig::class => [
            'title' => 'Settings',
        ],
    ];

    public function getManagedModels()
    {
        $models = parent::getManagedModels();

        $cfg = FAQConfig::current_config();

        if ($cfg->DisabledCategories) {
            unset($models[FAQCategory::class]);
        }

        if (!class_exists('DNADesign\Elemental\Models\BaseElement')) {
            unset($models[FAQBlock::class]);
        }

        if (empty($cfg->config('db')->db)) {
            unset($models[FAQConfig::class]);
        }

        return $models;
    }
}
