<?php
namespace CollDev\MainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class DatabaseUpdateCommand extends ContainerAwareCommand
{
    protected function configure() {
        $this->setName('database:update')
             ->setDescription('Delete and reconstruct database.')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $output->write('<comment>Dropping database</comment> <question>>></question> ');
        $out = shell_exec('cd ' . __DIR__ . '/../../../../;php app/console doctrine:database:drop --force');
        $output->writeln($out);
        $output->writeln('<comment>Creating database</comment> <question>>></question> ');
        $out = shell_exec('cd ' . __DIR__ . '/../../../../;php app/console doctrine:database:create');
        $output->writeln($out);
        $output->writeln('<comment>Creating schema</comment> <question>>></question> ');
        $out = shell_exec('cd ' . __DIR__ . '/../../../../;php app/console doctrine:schema:create');
        $output->writeln($out);
        //$output->writeln('<comment>Deleting pictures folder</comment> <question>>></question> ');
        //$out = shell_exec('cd ' . __DIR__ . '/../../../../;php app/console delete:pictures');
        //$output->writeln($out);
        $output->writeln('<comment>Loading fixtures</comment> <question>>></question> ');
        $out = shell_exec('cd ' . __DIR__ . '/../../../../;php app/console doctrine:fixtures:load -n');
        $output->writeln($out);
        $output->writeln('<info>Finished successfully.</info>');
    }
}
