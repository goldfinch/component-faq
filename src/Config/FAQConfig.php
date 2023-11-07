<?php

namespace Goldfinch\Component\FAQ\Configs;

use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\CompositeField;
use SilverStripe\View\TemplateGlobalProvider;

class FAQConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig;

    private static $table_name = 'FAQConfig';

    private static $db = [
        'OpenFirst' => 'Boolean',
    ];

    private static $field_descriptions = [];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName(['OpenFirst']);

        $fields->addFieldsToTab('Root.Main', [

            CompositeField::create(

                CheckboxField::create('OpenFirst', 'Open first')->setDescription('Keep first item open by default'),

            ),

        ]);

        return $fields;
    }
}
