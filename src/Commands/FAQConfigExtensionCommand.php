<?php

namespace Goldfinch\Component\FAQ\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-faq:ext:config')]
class FAQConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-faq:ext:config';

    protected $description = 'Create FAQConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/faqconfig-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
