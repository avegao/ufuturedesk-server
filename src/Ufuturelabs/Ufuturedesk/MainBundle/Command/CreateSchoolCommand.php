<?php

namespace Ufuturelabs\Ufuturedesk\MainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Ufuturelabs\Ufuturedesk\MainBundle\Entity\School;

class CreateSchoolCommand extends ContainerAwareCommand
{
	protected function configure()
	{
		$this
			->setName("ufuturedesk:school:create")
			->setDescription("Add school/highschool/university data");
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$dialog = $this->getHelperSet()->get('dialog');

		$output->writeln("<info>Add basic information about the school/highschool/university for
			uFutureDesk Server</info>\n");

		$school = new School();

		$school->setName($dialog->askAndValidate(
			$output,
			"<question>Insert name:</question> ",
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

				return $data;
			}));

		$school->setAddress($dialog->askAndValidate(
			$output,
			"<question>Insert address:</question> ",
			function($data)
			{
				if (strlen($data) == 0)
				{
					throw new \InvalidArgumentException("Should not be empty");
				}

				if (strlen($data) > 150)
				{
					throw new \InvalidArgumentException("Max length is 150 characters");
				}

				return $data;
			}));

		$school->setTelephone($dialog->askAndValidate(
			$output,
			"<question>Insert a telephone number:</question> ",
			function($data)
			{
				if (strlen($data) == 0)
				{
					throw new \InvalidArgumentException("Should not be empty");
				}

				if (strlen($data) > 15)
				{
					throw new \InvalidArgumentException("Max length is 15 characters");
				}

				return $data;
			}));

		$school->setFax($dialog->askAndValidate(
			$output,
			"<question>Insert a fax number:</question> ",
			function($data)
			{
				if (strlen($data) == 0)
				{
					$data = null;
				}

				if (strlen($data) > 15)
				{
					throw new \InvalidArgumentException("Max length is 15 characters");
				}

				return $data;
			}));

		$school->setEmail($dialog->askAndValidate(
			$output,
			"<question>Insert a email address:</question> ",
			function($data)
			{
				if (strlen($data) == 0)
				{
					throw new \InvalidArgumentException("Should not be empty");
				}

				if (strlen($data) > 50)
				{
					throw new \InvalidArgumentException("Max length is 50 characters");
				}

				if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $data))
				{
					throw new \InvalidArgumentException("Invalid email format");
				}

				return $data;
			}));

		$em = $this->getContainer()->get("doctrine.orm.entity_manager");
		$em->persist($school);
		$em->flush();

		$output->writeln("\n<info>School created</info>");
	}
} 