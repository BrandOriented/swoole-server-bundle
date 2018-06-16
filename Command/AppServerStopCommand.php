<?php

namespace DPX\SwooleServerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class AppServerCommand
 *
 * @package \App\Command
 */
class AppServerStopCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('swoole:server:stop')
            ->setDescription('Stop Swoole HTTP Server.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        try {

            $this->getContainer()
                ->get('app.swoole.server')
                ->stop()
            ;

            $io->success('Swoole server stopped!');
        } catch (\Exception $exception) {
            $io->warning($exception->getMessage());
        }
    }
}