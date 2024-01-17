<?php

namespace Goldfinch\Component\FAQ\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'config:component-faq')]
class ComponentFAQConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'config:component-faq';

    protected $description = 'Create component-faq config';

    protected $path = 'app/_config';

    protected $type = 'component-faq yml config';

    protected $stub = 'faqconfig.stub';

    protected $extension = '.yml';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
