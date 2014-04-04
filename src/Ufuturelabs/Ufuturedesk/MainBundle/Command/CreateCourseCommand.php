namespace Ufuturelabs\Ufuturedesk\MainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

Ufuturelabs\Ufuturedesk\MainBundle\Entity

class CreateCourseCommand extends ContainerAwareCommand
{
	protected function configure()
	{
		$this
			->setName('ufuturedesk:course:create')
			->setDescription('Create a course');
	}
	
	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$dialog = $this->getHelperSet()->get('dialog');
		
		$output->writeln("<info>Create a grade for uFutureDesk Server</info>\n");
		
		$name = $dialog->askAndValidate(
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
			});
			
		$course = new Course();
		$course->setName($name);
		
		$em = $this->getContainer()->get("doctrine.orm.entity_manager");
		$em->persist($course);
		$em->flush();
		
		$output->writeln("\n<info>Grade created</info>")
		
	}
}
