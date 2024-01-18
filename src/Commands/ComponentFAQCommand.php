<?php

namespace Goldfinch\Component\FAQ\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-faq')]
class ComponentFAQCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-faq';

    protected $description = 'Populate goldfinch/component-faq components';

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find(
            'vendor:component-faq-faqitem',
        );
        $input = new ArrayInput(['name' => 'FAQItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-faq-faqcategory',
        );
        $input = new ArrayInput(['name' => 'FAQCategory']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-faq-faqconfig',
        );
        $input = new ArrayInput(['name' => 'FAQConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-faq-faqblock',
        );
        $input = new ArrayInput(['name' => 'FAQBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('templates:component-faq');
        $input = new ArrayInput([]);
        $command->run($input, $output);

        $command = $this->getApplication()->find('config:component-faq');
        $input = new ArrayInput(['name' => 'component-faq']);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
