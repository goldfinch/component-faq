<?php

namespace Goldfinch\Component\FAQ\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-faq:ext:config')]
class FAQConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-faq:ext:config';

    protected $description = 'Create FAQConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/faqconfig-extension.stub';

    protected $suffix = 'Extension';
}
