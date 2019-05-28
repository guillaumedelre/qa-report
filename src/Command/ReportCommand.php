<?php
declare(strict_types=1);

namespace Agilicode\QAT\Command;

use Agilicode\QAT\Domain\QatTty;
use Agilicode\QAT\Entity\StateMachine\ReportStateMachine;
use Agilicode\QAT\Interfaces\ProjectContainerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Workflow\Registry;
use Symfony\Component\Workflow\Transition;

class ReportCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'report';

    /**
     * @var Registry
     */
    protected $workflows;

    /**
     * @var ProjectContainerInterface
     */
    protected $projectStore;

    /**
     * @param Registry                  $workflows
     * @param ProjectContainerInterface $projectContainer
     * @param null                      $name
     */
    public function __construct(
        Registry $workflows,
        ProjectContainerInterface $projectContainer,
        $name = null
    ) {
        parent::__construct($name);

        $this->workflows = $workflows;
        $this->projectStore = $projectContainer;
    }

    protected function configure()
    {
        $this
            ->setDescription('Dump an html qa report.');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $io->title(QatTty::QAT_TTY);

        $reportStateMachine = new ReportStateMachine($io, $this->projectStore->all());
        $workflow = $this->workflows->get($reportStateMachine);

        while (!empty($enabledTransitions = $workflow->getEnabledTransitions($reportStateMachine))) {
            /** @var Transition $transition */
            foreach ($enabledTransitions as $transition) {
                $workflow->apply($reportStateMachine, $transition->getName());
            }
        }

        return 0;
    }

}
