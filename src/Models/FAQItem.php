<?php

namespace Goldfinch\Component\FAQ\Models;

use Goldfinch\Fielder\Fielder;
use SilverStripe\ORM\DataObject;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\FAQ\Configs\FAQConfig;

class FAQItem extends DataObject
{
    use FielderTrait, Millable;

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

    private static $owns = ['Categories'];

    private static $summary_fields = [
        'Question' => 'Question',
        'Answer.Summary' => 'Answer',
        'Disabled.NiceAsBoolean' => 'Disabled',
        'Categories.Count' => 'Categories',
    ];

    private static $field_descriptions = [
        'Disabled' => 'hide this item from the list',
    ];

    public function summaryFields()
    {
        $fields = parent::summaryFields();

        $cfg = FAQConfig::current_config();

        if ($cfg->DisabledCategories) {
            unset($fields['Categories.Count']);
        }

        return $fields;
    }

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Question', 'Answer']);

        $cfg = FAQConfig::current_config();

        if ($cfg->DisabledCategories) {
            $fielder->remove('Categories');
        } else {
            $fielder->fields([
                'Root.Main' => [$fielder->tag('Categories')],
            ]);
        }
    }
}
