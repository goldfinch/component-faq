<?php

namespace Goldfinch\Component\FAQ\Configs;

use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use SilverStripe\View\TemplateGlobalProvider;

class FAQConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig;

    private static $table_name = 'FAQConfig';

    private static $db = [
        'DisabledCategories' => 'Boolean',
        'OpenFirst' => 'Boolean',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fielder = $fields->fielder($this);

        $fielder->fields([
            'Root.Main' => [
                $fielder->checkbox('DisabledCategories', 'Disabled categories'),
                $fielder
                    ->checkbox('OpenFirst', 'Open first')
                    ->setDescription('Keep first item open by default'),
            ],
        ]);

        return $fields;
    }
}
