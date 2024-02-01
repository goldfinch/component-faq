<?php

namespace Goldfinch\Component\FAQ\Commands;

use Goldfinch\Taz\Services\Templater;
use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-faq:templates')]
class FAQTemplatesCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-faq:templates';

    protected $description = 'Publish [goldfinch/component-faq] templates';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $templater = Templater::create($input, $output, $this, 'goldfinch/component-faq');

        $theme = $templater->defineTheme();

        if (is_string($theme)) {

            $componentPathTemplates = BASE_PATH . '/vendor/goldfinch/component-faq/templates/';
            $componentPath = $componentPathTemplates . 'Goldfinch/Component/FAQ/';
            $themeTemplates = 'themes/' . $theme . '/templates/';
            $themePath = $themeTemplates . 'Goldfinch/Component/FAQ/';

            $files = [
                [
                    'from' => $componentPath . 'Blocks/FAQBlock.ss',
                    'to' => $themePath . 'Blocks/FAQBlock.ss',
                ],
            ];

            return $templater->copyFiles($files);
        } else {
            return $theme;
        }
    }
}
