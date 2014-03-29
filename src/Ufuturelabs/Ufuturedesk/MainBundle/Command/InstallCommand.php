<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class InstallCommand extends ContainerAwareCommand
{
	protected function configure()
	{
		$this
			->setName('ufuturedesk:install')
			->setDescription('uFutureDesk Server installer');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$output->writeln("<info>Installing uFutureDesk Server</info>\n");

		$this
			->checkStep($input, $output)
			->setupStep($input, $output);

		$output->writeln("<info>uFutureDesk Server has been successfully installed</info>\n");
	}

	protected function checkStep(InputInterface $input, OutputInterface $output)
	{
		return $this;
	}

	protected function setupStep(InputInterface $input, OutputInterface $output)
	{
		$output->writeln("<comment>Creating the database...</comment>\n");
		$this->runCommand("doctrine:database:create", $input, $output);
		$output->writeln("<comment>Database created</comment>\n");

		$output->writeln("<comment>Creating tables...</comment>\n");
		$this->runCommand("doctrine:schema:create", $input, $output);
		$output->writeln("<comment>Tables created</comment>\n");

		// $output->writeln("<comment>Creating the database...</comment>\n");
		// $this->runCommand("doctrine:phpcr:repository:init", $input, $output);
		// $output->writeln("<comment>Creating the database...</comment>\n");

		$output->writeln("<comment>Generating CSS, JavaScript, images...</comment>\n");
		$this->runCommand("assetic:dump", $input, $output);
		$output->writeln("<comment>CSS, JavaScript and images generated</comment>\n");

		$this->runCommand("ufuturedesk:admin:create", $input, $output);

		return $this;
	}

	protected function runCommand($command, InputInterface $input, OutputInterface $output)
	{
		$this
			->getApplication()
			->find($command)
			->run($input, $output);

		return $this;
	}
} 