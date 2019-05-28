<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'state_machine.qa_report' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/workflow/WorkflowInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/workflow/Workflow.php';
include_once $this->targetDirs[3].'/vendor/symfony/workflow/StateMachine.php';
include_once $this->targetDirs[3].'/vendor/symfony/workflow/Definition.php';
include_once $this->targetDirs[3].'/vendor/symfony/workflow/Transition.php';
include_once $this->targetDirs[3].'/vendor/symfony/workflow/Metadata/MetadataStoreInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/workflow/Metadata/GetMetadataTrait.php';
include_once $this->targetDirs[3].'/vendor/symfony/workflow/Metadata/InMemoryMetadataStore.php';

return $this->services['state_machine.qa_report'] = new \Symfony\Component\Workflow\StateMachine(new \Symfony\Component\Workflow\Definition([0 => 'init', 1 => 'artifacts_collected', 2 => 'report_rendered', 3 => 'terminated'], [0 => new \Symfony\Component\Workflow\Transition('collecting', 'init', 'artifacts_collected'), 1 => new \Symfony\Component\Workflow\Transition('rendering', 'artifacts_collected', 'report_rendered'), 2 => new \Symfony\Component\Workflow\Transition('finalizing', 'report_rendered', 'terminated')], 'init', new \Symfony\Component\Workflow\Metadata\InMemoryMetadataStore([], [], new \SplObjectStorage())), NULL, ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), 'qa_report');
