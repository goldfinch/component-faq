<?php

namespace Goldfinch\Component\FAQ\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-faq:ext:admin')]
class FAQAdminExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-faq:ext:admin';

    protected $description = 'Create FAQAdmin extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/faqadmin-extension.stub';

    protected $prefix = 'Extension';
}
