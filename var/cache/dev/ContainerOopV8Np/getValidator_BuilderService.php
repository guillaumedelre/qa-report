<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'validator.builder' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/validator/Validation.php';
include_once $this->targetDirs[3].'/vendor/symfony/validator/ConstraintValidatorFactoryInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/validator/ContainerConstraintValidatorFactory.php';
include_once $this->targetDirs[3].'/vendor/symfony/validator/Util/LegacyTranslatorProxy.php';

$this->privates['validator.builder'] = $instance = \Symfony\Component\Validator\Validation::createValidatorBuilder();

$instance->setConstraintValidatorFactory(new \Symfony\Component\Validator\ContainerConstraintValidatorFactory(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'Symfony\\Component\\Validator\\Constraints\\EmailValidator' => ['privates', 'validator.email', 'getValidator_EmailService.php', true],
    'Symfony\\Component\\Validator\\Constraints\\ExpressionValidator' => ['privates', 'validator.expression', 'getValidator_ExpressionService.php', true],
    'validator.expression' => ['privates', 'validator.expression', 'getValidator_ExpressionService.php', true],
])));
$instance->setTranslator(new \Symfony\Component\Validator\Util\LegacyTranslatorProxy(($this->services['translator'] ?? $this->getTranslatorService())));
$instance->setTranslationDomain('validators');
$instance->enableAnnotationMapping(($this->privates['annotations.reader'] ?? $this->load('getAnnotations_ReaderService.php')));
$instance->addMethodMapping('loadValidatorMetadata');
$instance->addObjectInitializers([]);

return $instance;