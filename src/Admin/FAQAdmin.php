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
}
