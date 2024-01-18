<?php

namespace Goldfinch\Component\FAQ\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-faq:faqcategory')]
class FAQCategoryExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-faq:faqcategory';

    protected $description = 'Create FAQCategory extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-faq category extension';

    protected $stub = 'faqcategory-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
