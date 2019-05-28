<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'qat.container.projects' shared service.

include_once $this->targetDirs[3].'/src/Interfaces/ProjectContainerInterface.php';
include_once $this->targetDirs[3].'/src/Core/ProjectContainer.php';
include_once $this->targetDirs[3].'/src/Interfaces/ProjectInterface.php';
include_once $this->targetDirs[3].'/src/Core/Project.php';

return $this->services['qat.container.projects'] = new \Agilicode\QAT\Core\ProjectContainer([0 => new \Agilicode\QAT\Core\Project(['project_name' => 'authentication', 'path' => './artifacts/authentication', 'vendors' => [0 => ['name' => 'behat', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/behat', 'name' => [0 => '*.xml', 1 => '*.json']]], 1 => ['name' => 'phpunit', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpunit', 'name' => '*.xml']], 2 => ['name' => 'phpcs', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpcs', 'name' => [0 => '*.xml']]], 3 => ['name' => 'phpmetrics', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpmetrics', 'name' => [0 => '*.log']]]]]), 1 => new \Agilicode\QAT\Core\Project(['project_name' => 'common', 'path' => './artifacts/common', 'vendors' => [0 => ['name' => 'behat', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/behat', 'name' => [0 => '*.xml', 1 => '*.json']]], 1 => ['name' => 'phpunit', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpunit', 'name' => '*.xml']], 2 => ['name' => 'phpcs', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpcs', 'name' => [0 => '*.xml']]], 3 => ['name' => 'phpmetrics', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpmetrics', 'name' => [0 => '*.log']]]]]), 2 => new \Agilicode\QAT\Core\Project(['project_name' => 'consumer', 'path' => './artifacts/consumer', 'vendors' => [0 => ['name' => 'behat', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/behat', 'name' => [0 => '*.xml', 1 => '*.json']]], 1 => ['name' => 'phpunit', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpunit', 'name' => '*.xml']], 2 => ['name' => 'phpcs', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpcs', 'name' => [0 => '*.xml']]], 3 => ['name' => 'phpmetrics', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpmetrics', 'name' => [0 => '*.log']]]]]), 3 => new \Agilicode\QAT\Core\Project(['project_name' => 'content', 'path' => './artifacts/content', 'vendors' => [0 => ['name' => 'behat', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/behat', 'name' => [0 => '*.xml', 1 => '*.json']]], 1 => ['name' => 'phpunit', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpunit', 'name' => '*.xml']], 2 => ['name' => 'phpcs', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpcs', 'name' => [0 => '*.xml']]], 3 => ['name' => 'phpmetrics', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpmetrics', 'name' => [0 => '*.log']]]]]), 4 => new \Agilicode\QAT\Core\Project(['project_name' => 'conversion', 'path' => './artifacts/conversion', 'vendors' => [0 => ['name' => 'behat', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/behat', 'name' => [0 => '*.xml', 1 => '*.json']]], 1 => ['name' => 'phpunit', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpunit', 'name' => '*.xml']], 2 => ['name' => 'phpcs', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpcs', 'name' => [0 => '*.xml']]], 3 => ['name' => 'phpmetrics', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpmetrics', 'name' => [0 => '*.log']]]]]), 5 => new \Agilicode\QAT\Core\Project(['project_name' => 'dispatcher', 'path' => './artifacts/dispatcher', 'vendors' => [0 => ['name' => 'behat', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/behat', 'name' => [0 => '*.xml', 1 => '*.json']]], 1 => ['name' => 'phpunit', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpunit', 'name' => '*.xml']], 2 => ['name' => 'phpcs', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpcs', 'name' => [0 => '*.xml']]], 3 => ['name' => 'phpmetrics', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpmetrics', 'name' => [0 => '*.log']]]]]), 6 => new \Agilicode\QAT\Core\Project(['project_name' => 'exposure', 'path' => './artifacts/exposure', 'vendors' => [0 => ['name' => 'behat', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/behat', 'name' => [0 => '*.xml', 1 => '*.json']]], 1 => ['name' => 'phpunit', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpunit', 'name' => '*.xml']], 2 => ['name' => 'phpcs', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpcs', 'name' => [0 => '*.xml']]], 3 => ['name' => 'phpmetrics', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpmetrics', 'name' => [0 => '*.log']]]]]), 7 => new \Agilicode\QAT\Core\Project(['project_name' => 'media', 'path' => './artifacts/media', 'vendors' => [0 => ['name' => 'behat', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/behat', 'name' => [0 => '*.xml', 1 => '*.json']]], 1 => ['name' => 'phpunit', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpunit', 'name' => '*.xml']], 2 => ['name' => 'phpcs', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpcs', 'name' => [0 => '*.xml']]], 3 => ['name' => 'phpmetrics', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpmetrics', 'name' => [0 => '*.log']]]]]), 8 => new \Agilicode\QAT\Core\Project(['project_name' => 'notify', 'path' => './artifacts/notify', 'vendors' => [0 => ['name' => 'behat', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/behat', 'name' => [0 => '*.xml', 1 => '*.json']]], 1 => ['name' => 'phpunit', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpunit', 'name' => '*.xml']], 2 => ['name' => 'phpcs', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpcs', 'name' => [0 => '*.xml']]], 3 => ['name' => 'phpmetrics', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpmetrics', 'name' => [0 => '*.log']]]]]), 9 => new \Agilicode\QAT\Core\Project(['project_name' => 'product', 'path' => './artifacts/product', 'vendors' => [0 => ['name' => 'behat', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/behat', 'name' => [0 => '*.xml', 1 => '*.json']]], 1 => ['name' => 'phpunit', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpunit', 'name' => '*.xml']], 2 => ['name' => 'phpcs', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpcs', 'name' => [0 => '*.xml']]], 3 => ['name' => 'phpmetrics', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpmetrics', 'name' => [0 => '*.log']]]]]), 10 => new \Agilicode\QAT\Core\Project(['project_name' => 'shorty', 'path' => './artifacts/shorty', 'vendors' => [0 => ['name' => 'behat', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/behat', 'name' => [0 => '*.xml', 1 => '*.json']]], 1 => ['name' => 'phpunit', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpunit', 'name' => '*.xml']], 2 => ['name' => 'phpcs', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpcs', 'name' => [0 => '*.xml']]], 3 => ['name' => 'phpmetrics', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpmetrics', 'name' => [0 => '*.log']]]]]), 11 => new \Agilicode\QAT\Core\Project(['project_name' => 'sitemap', 'path' => './artifacts/sitemap', 'vendors' => [0 => ['name' => 'behat', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/behat', 'name' => [0 => '*.xml', 1 => '*.json']]], 1 => ['name' => 'phpunit', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpunit', 'name' => '*.xml']], 2 => ['name' => 'phpcs', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpcs', 'name' => [0 => '*.xml']]], 3 => ['name' => 'phpmetrics', 'lookup' => ['in' => './artifacts', 'path' => 'var/build/phpmetrics', 'name' => [0 => '*.log']]]]])]);