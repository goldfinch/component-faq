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
        $command = $this->getApplication()->find(
            'vendor:component-faq:ext:admin',
        );
        $input = new ArrayInput(['name' => 'FAQAdmin']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-faq:ext:config',
        );
        $input = new ArrayInput(['name' => 'FAQConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-faq:ext:block',
        );
        $input = new ArrayInput(['name' => 'FAQBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-faq:ext:item',
        );
        $input = new ArrayInput(['name' => 'FAQItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-faq:ext:category',
        );
        $input = new ArrayInput(['name' => 'FAQCategory']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-faq:config');
        $input = new ArrayInput(['name' => 'component-faq']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-faq:templates',
        );
        $input = new ArrayInput([]);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
