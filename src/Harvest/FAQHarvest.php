<?php

namespace Goldfinch\Component\FAQ\Harvest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Component\FAQ\Models\FAQItem;
use Goldfinch\Component\FAQ\Models\FAQCategory;

class FAQHarvest extends Harvest
{
    public static function run(): void
    {
        FAQCategory::mill(5)->make();

        FAQItem::mill(20)->make()->each(function($item) {
            $categories = FAQCategory::get()->shuffle()->limit(rand(0,4));

            foreach ($categories as $category) {
                $item->Categories()->add($category);
            }
        });
    }
}
