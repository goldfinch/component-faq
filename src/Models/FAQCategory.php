<?php

namespace Goldfinch\Component\FAQ\Models;

use Goldfinch\Harvest\Harvest;
use SilverStripe\ORM\DataObject;
use Goldfinch\Harvest\Traits\HarvestTrait;

class FAQCategory extends DataObject
{
    use HarvestTrait;

    private static $table_name = 'FAQCategory';
    private static $singular_name = 'category';
    private static $plural_name = 'categories';

    private static $db = [
        'Title' => 'Varchar',
    ];

    private static $belongs_many_many = [
        'Items' => FAQItem::class,
    ];

    public function harvest(Harvest $harvest): void
    {
        $harvest->require(['Title']);

        $harvest->fields([
            'Root.Main' => [$harvest->string('Title')],
        ]);
    }
}
