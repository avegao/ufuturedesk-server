<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;

class CreateAdminCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName("ufuturedesk:admin:create")
            ->setDescription("Create an administrator");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dialog = $this->getHelperSet()->get('dialog');

        $output->writeln("<info>Create an administrator for uFutureDesk Server</info>\n");

        $username = $dialog->askAndValidate(
            $output,
            "<question>Enter the username:</question> ",
            function($data)
            {
                if (strlen($data) == 0)
                {
                    throw new \InvalidArgumentException("Should not be empty");
                }

                if (strlen($data) > 30)
                {
                    throw new \InvalidArgumentException("Max length is 30 characters");
                }

                if (!preg_match("|^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ]*$|", $data))
                {
                    throw new \InvalidArgumentException("There should be no spaces");
                }

                return $data;
            },
            false,
            null
        );
    }
} 