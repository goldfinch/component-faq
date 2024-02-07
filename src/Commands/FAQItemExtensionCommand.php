<?php

namespace Goldfinch\Component\FAQ\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-faq:ext:item')]
class FAQItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-faq:ext:item';

    protected $description = 'Create FAQItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/faqitem-extension.stub';

    protected $prefix = 'Extension';
}
