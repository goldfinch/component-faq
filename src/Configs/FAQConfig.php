<?php

namespace Goldfinch\Component\FAQ\Configs;

use Goldfinch\Harvest\Harvest;
use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use Goldfinch\Harvest\Traits\HarvestTrait;
use SilverStripe\View\TemplateGlobalProvider;

class FAQConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig, HarvestTrait;

    private static $table_name = 'FAQConfig';

    private static $db = [
        'OpenFirst' => 'Boolean',
    ];

    public function harvest(Harvest $harvest)
    {
        $harvest->fields([
            'Root.Main' => [
                $harvest->checkbox('OpenFirst', 'Open first')->setDescription('Keep first item open by default'),
            ],
        ]);
    }
}
