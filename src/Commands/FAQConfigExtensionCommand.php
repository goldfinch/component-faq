<?php

namespace Goldfinch\Component\FAQ\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-faq-faqconfig')]
class FAQConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-faq-faqconfig';

    protected $description = 'Create FAQConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-faq config extension';

    protected $stub = 'faqconfig-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
