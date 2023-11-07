<?php

namespace Goldfinch\Component\FAQ\Models;

use Goldfinch\Component\FAQ\Models\FAQCategory;
use SilverStripe\ORM\DataObject;
use SilverStripe\TagField\TagField;

class FAQItem extends DataObject
{
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
            'SortOrder' => 'Int',
        ],
    ];

    // private static $has_one = [];
    // private static $belongs_to = [];
    // private static $has_many = [];
    // private static $belongs_many_many = [];
    // private static $default_sort = null;
    // private static $indexes = null;
    // private static $owns = [];
    // private static $casting = [];
    // private static $defaults = [];

    private static $summary_fields = [
        'Question' => 'Question',
        'Answer.Summary' => 'Answer',
        'Disabled.NiceAsBoolean' => 'Disabled',
    ];
    // private static $field_labels = [];
    // private static $searchable_fields = [];

    // private static $cascade_deletes = [];
    // private static $cascade_duplicates = [];

    // * goldfinch/helpers
    private static $field_descriptions = [
        'Disabled' => 'hide this item from the list',
    ];
    private static $required_fields = [
        'Question',
        'Answer',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'Categories',
        ]);

        $fields->insertAfter('Answer', TagField::create('Categories', 'Categories', FAQCategory::get()));

        return $fields;
    }

    // public function validate()
    // {
    //     $result = parent::validate();

    //     // $result->addError('Error message');

    //     return $result;
    // }

    // public function onBeforeWrite()
    // {
    //     // ..

    //     parent::onBeforeWrite();
    // }

    // public function onBeforeDelete()
    // {
    //     // ..

    //     parent::onBeforeDelete();
    // }

    // public function canView($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canEdit($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canDelete($member = null)
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }

    // public function canCreate($member = null, $context = [])
    // {
    //     return Permission::check('CMS_ACCESS_Company\Website\MyAdmin', 'any', $member);
    // }
}
