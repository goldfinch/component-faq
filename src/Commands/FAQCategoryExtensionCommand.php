<?php

namespace Goldfinch\Component\FAQ\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-faq:ext:category')]
class FAQCategoryExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-faq:ext:category';

    protected $description = 'Create FAQCategory extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/faqcategory-extension.stub';

    protected $suffix = 'Extension';
}
