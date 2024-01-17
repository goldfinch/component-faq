<?php

namespace Goldfinch\Component\FAQ\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-faq-faqblock')]
class FAQBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-faq-faqblock';

    protected $description = 'Create FAQBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-faq block extension';

    protected $stub = 'faqblock-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
