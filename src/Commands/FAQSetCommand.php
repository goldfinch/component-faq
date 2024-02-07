<?php

namespace Goldfinch\Component\FAQ\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-faq')]
class FAQSetCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-faq';

    protected $description = 'Set of all [goldfinch/component-faq] commands';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find('vendor:component-faq:ext:admin');
        $command->run(new ArrayInput(['name' => 'FAQAdmin']), $output);

        $command = $this->getApplication()->find('vendor:component-faq:ext:config');
        $command->run(new ArrayInput(['name' => 'FAQConfig']), $output);

        $command = $this->getApplication()->find('vendor:component-faq:ext:block');
        $command->run(new ArrayInput(['name' => 'FAQBlock']), $output);

        $command = $this->getApplication()->find('vendor:component-faq:ext:item');
        $command->run(new ArrayInput(['name' => 'FAQItem']), $output);

        $command = $this->getApplication()->find('vendor:component-faq:ext:category');
        $command->run(new ArrayInput(['name' => 'FAQCategory']), $output);

        $command = $this->getApplication()->find('vendor:component-faq:config');
        $command->run(new ArrayInput(['name' => 'component-faq']), $output);

        $command = $this->getApplication()->find('vendor:component-faq:templates');
        $command->run(new ArrayInput([]), $output);

        return Command::SUCCESS;
    }
}
