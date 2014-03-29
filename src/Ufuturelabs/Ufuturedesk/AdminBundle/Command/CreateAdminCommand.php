<?php

namespace Ufuturelabs\Ufuturedesk\AdminBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Ufuturelabs\Ufuturedesk\AdminBundle\Entity\Admin;

class CreateAdminCommand extends ContainerAwareCommand
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

		$password = $dialog->askAndValidate(
			$output,
			"<question>Enter the password:</question> ",
			function($data)
			{
				if (strlen($data) == 0)
				{
					throw new \InvalidArgumentException("Should not be empty");
				}

				if (strlen($data) > 255)
				{
					throw new \InvalidArgumentException("Max length is 255 characters");
				}

				return $data;
			},
			false,
			null
		);

		$repassword = $dialog->askAndValidate(
			$output,
			"<question>Enter the password again:</question> ",
			function($data) use ($password)
			{
				if (strlen($data) == 0)
				{
					throw new \InvalidArgumentException("Should not be empty");
				}

				if (strlen($data) > 255)
				{
					throw new \InvalidArgumentException("Max length is 255 characters");
				}

				if ($data != $password)
				{
					throw new \InvalidArgumentException("Both passwords must be equals");
				}

				return $data;
			},
			false,
			null
		);

		$admin = new Admin();
		$admin->setUserName($username);
		$admin->setSalt();

		$encoder = $this->getContainer()->get("security.encoder_factory")->getEncoder($admin);
		$encryptedPassword = $encoder->encodePassword($password, $admin->getSalt());

		$admin->setPassword($encryptedPassword);

		$em = $this->getContainer()->get("doctrine.orm.entity_manager");
		$em->persist($admin);
		$em->flush();

		$output->writeln("\n<info>Admin created</info>");

    }
} 