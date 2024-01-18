<?php

namespace Goldfinch\Component\FAQ\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-faq:faqitem')]
class FAQItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-faq:faqitem';

    protected $description = 'Create FAQItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-faq item extension';

    protected $stub = 'faqitem-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
