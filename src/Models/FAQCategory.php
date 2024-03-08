<?php

namespace Goldfinch\Component\FAQ\Models;

use SilverStripe\ORM\DataObject;
use Goldfinch\Mill\Traits\Millable;

class FAQCategory extends DataObject
{
    use Millable;

    private static $table_name = 'FAQCategory';
    private static $singular_name = 'category';
    private static $plural_name = 'categories';

    private static $db = [
        'Title' => 'Varchar',
    ];

    private static $belongs_many_many = [
        'Items' => FAQItem::class,
    ];

    private static $summary_fields = [
        'Title' => 'Title',
        'Items.Count' => 'Questions',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fielder = $this->intFielder($fields)->getFielder();

        $fielder->required(['Title']);

        $fielder->fields([
            'Root.Main' => [$fielder->string('Title')],
        ]);

        return $fields;
    }
}
