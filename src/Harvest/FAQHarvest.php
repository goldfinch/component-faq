<?php

namespace Goldfinch\Component\FAQ\Harvest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Blocks\Pages\Blocks;
use Goldfinch\Component\FAQ\Models\FAQItem;
use Goldfinch\Component\FAQ\Blocks\FAQBlock;
use Goldfinch\Component\FAQ\Models\FAQCategory;

class FAQHarvest extends Harvest
{
    public static function run(): void
    {
        FAQCategory::mill(5)->make();

        FAQItem::mill(30)->make()->each(function($item) {
            $categories = FAQCategory::get()->shuffle()->limit(rand(0,4));

            foreach ($categories as $category) {
                $item->Categories()->add($category);
            }
        });

        // add one block to Blocks demo page (if it's exists)
        if (class_exists(Blocks::class)) {
            $demoBlocks = Blocks::get()->filter('Title', 'Blocks')->first();

            if ($demoBlocks && $demoBlocks->exists() && $demoBlocks->ElementalArea()->exists()) {
                FAQBlock::mill(1)->make([
                    'ClassName' => $demoBlocks->ClassName,
                    'TopPageID' => $demoBlocks->ID,
                    'ParentID' => $demoBlocks->ElementalArea()->ID,
                    'Title' => 'FAQ',
                ]);
            }
        }
    }
}
