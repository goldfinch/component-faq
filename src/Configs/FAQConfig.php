<?php

namespace Goldfinch\Component\FAQ\Configs;

use Goldfinch\Fielder\Fielder;
use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use SilverStripe\View\TemplateGlobalProvider;

class FAQConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig, FielderTrait;

    private static $table_name = 'FAQConfig';

    private static $db = [
        'DisabledCategories' => 'Boolean',
        'OpenFirst' => 'Boolean',
    ];

    public function fielder(Fielder $fielder): void
    {
        $fielder->fields([
            'Root.Main' => [
                $fielder->checkbox('DisabledCategories', 'Disabled categories'),
                $fielder
                    ->checkbox('OpenFirst', 'Open first')
                    ->setDescription('Keep first item open by default'),
            ],
        ]);
    }
}
