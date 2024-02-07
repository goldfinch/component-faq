<?php

namespace Goldfinch\Component\FAQ\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-faq:config')]
class FAQConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-faq:config';

    protected $description = 'Create FAQ YML config';

    protected $path = 'app/_config';

    protected $type = 'config';

    protected $stub = './stubs/config.stub';

    protected $extension = '.yml';
}
