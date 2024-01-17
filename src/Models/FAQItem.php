<?php

namespace Goldfinch\Component\FAQ\Models;

use Goldfinch\Harvest\Harvest;
use SilverStripe\ORM\DataObject;
use Goldfinch\Harvest\Traits\HarvestTrait;

class FAQItem extends DataObject
{
    use HarvestTrait;

    private static $table_name = 'FAQItem';
    private static $singular_name = 'question';
    private static $plural_name = 'questions';

    private static $db = [
        'Question' => 'Varchar',
        'Answer' => 'HTMLText',
        'Disabled' => 'Boolean',
    ];

    private static $many_many = [
        'Categories' => FAQCategory::class,
    ];

    private static $many_many_extraFields = [
        'Categories' => [
            'SortExtra' => 'Int',
        ],
    ];

    private static $owns = [
        'Categories',
    ];

    private static $summary_fields = [
        'Question' => 'Question',
        'Answer.Summary' => 'Answer',
        'Disabled.NiceAsBoolean' => 'Disabled',
    ];

    // * goldfinch/helpers
    private static $field_descriptions = [
        'Disabled' => 'hide this item from the list',
    ];

    public function harvest(Harvest $harvest)
    {
        $harvest->require(['Question', 'Answer']);

        $harvest->fields([
            'Root.Main' => [
                $harvest->tag('Categories'),
            ],
        ]);
    }
}
