<?php

namespace Goldfinch\Component\FAQ\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-faq:ext:block')]
class FAQBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-faq:ext:block';

    protected $description = 'Create FAQBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/faqblock-extension.stub';

    protected $prefix = 'Extension';
}
