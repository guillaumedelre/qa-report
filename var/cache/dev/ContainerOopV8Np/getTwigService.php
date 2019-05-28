<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'twig' shared service.

include_once $this->targetDirs[3].'/vendor/twig/twig/src/Environment.php';
include_once $this->targetDirs[3].'/vendor/twig/twig/src/Loader/LoaderInterface.php';
include_once $this->targetDirs[3].'/vendor/twig/twig/src/Loader/ExistsLoaderInterface.php';
include_once $this->targetDirs[3].'/vendor/twig/twig/src/Loader/SourceContextLoaderInterface.php';
include_once $this->targetDirs[3].'/vendor/twig/twig/src/Loader/FilesystemLoader.php';
include_once $this->targetDirs[3].'/vendor/symfony/twig-bundle/Loader/NativeFilesystemLoader.php';
include_once $this->targetDirs[3].'/vendor/twig/twig/src/Extension/ExtensionInterface.php';
include_once $this->targetDirs[3].'/vendor/twig/twig/src/Extension/AbstractExtension.php';
include_once $this->targetDirs[3].'/vendor/twig/twig/src/Extension/ProfilerExtension.php';
include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/ProfilerExtension.php';
include_once $this->targetDirs[3].'/vendor/twig/twig/src/Profiler/Profile.php';
include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/TranslationExtension.php';
include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/AssetExtension.php';
include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/CodeExtension.php';
include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/RoutingExtension.php';
include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/YamlExtension.php';
include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/HttpKernelExtension.php';
include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/HttpFoundationExtension.php';
include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/WorkflowExtension.php';
include_once $this->targetDirs[3].'/src/Twig/CloverExtension.php';
include_once $this->targetDirs[3].'/src/Twig/Crap4jExtension.php';
include_once $this->targetDirs[3].'/src/Twig/CucumberJsonExtension.php';
include_once $this->targetDirs[3].'/src/Twig/FileExtension.php';
include_once $this->targetDirs[3].'/src/Twig/JUnitExtension.php';
include_once $this->targetDirs[3].'/src/Twig/PhpmetricsExtension.php';
include_once $this->targetDirs[3].'/vendor/twig/twig/src/Extension/DebugExtension.php';
include_once $this->targetDirs[3].'/vendor/symfony/webpack-encore-bundle/src/Twig/EntryFilesTwigExtension.php';
include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/AppVariable.php';
include_once $this->targetDirs[3].'/vendor/twig/twig/src/RuntimeLoader/RuntimeLoaderInterface.php';
include_once $this->targetDirs[3].'/vendor/twig/twig/src/RuntimeLoader/ContainerRuntimeLoader.php';
include_once $this->targetDirs[3].'/vendor/symfony/twig-bundle/DependencyInjection/Configurator/EnvironmentConfigurator.php';

$a = new \Symfony\Bundle\TwigBundle\Loader\NativeFilesystemLoader([], $this->targetDirs[3]);
$a->addPath(($this->targetDirs[3].'/vendor/symfony/framework-bundle/Resources/views'), 'Framework');
$a->addPath(($this->targetDirs[3].'/vendor/symfony/framework-bundle/Resources/views'), '!Framework');
$a->addPath(($this->targetDirs[3].'/vendor/symfony/twig-bundle/Resources/views'), 'Twig');
$a->addPath(($this->targetDirs[3].'/vendor/symfony/twig-bundle/Resources/views'), '!Twig');
$a->addPath(($this->targetDirs[3].'/templates'));

$this->services['twig'] = $instance = new \Twig\Environment($a, ['default_path' => ($this->targetDirs[3].'/templates'), 'debug' => true, 'strict_variables' => true, 'exception_controller' => 'twig.controller.exception::showAction', 'form_themes' => $this->parameters['twig.form.resources'], 'autoescape' => 'name', 'cache' => ($this->targetDirs[0].'/twig'), 'charset' => 'UTF-8', 'paths' => [], 'date' => ['format' => 'F j, Y H:i', 'interval_format' => '%d days', 'timezone' => NULL], 'number_format' => ['decimals' => 0, 'decimal_point' => '.', 'thousands_separator' => ',']]);

$b = ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()));
$c = new \Symfony\Bridge\Twig\AppVariable();
$c->setEnvironment('dev');
$c->setDebug(true);
if ($this->has('request_stack')) {
    $c->setRequestStack($b);
}

$instance->addExtension(new \Symfony\Bridge\Twig\Extension\ProfilerExtension(new \Twig\Profiler\Profile(), NULL));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension(($this->services['translator'] ?? $this->getTranslatorService())));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\AssetExtension(($this->privates['assets.packages'] ?? $this->load('getAssets_PackagesService.php'))));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\CodeExtension(($this->privates['debug.file_link_formatter'] ?? ($this->privates['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter(NULL))), $this->targetDirs[3], 'UTF-8'));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\RoutingExtension(($this->services['router'] ?? $this->getRouterService())));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\YamlExtension());
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpKernelExtension());
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpFoundationExtension($b, ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService())));
$instance->addExtension(new \Symfony\Bridge\Twig\Extension\WorkflowExtension(($this->privates['workflow.registry'] ?? $this->load('getWorkflow_RegistryService.php'))));
$instance->addExtension(new \Agilicode\QAT\Twig\CloverExtension());
$instance->addExtension(new \Agilicode\QAT\Twig\Crap4jExtension());
$instance->addExtension(new \Agilicode\QAT\Twig\CucumberJsonExtension());
$instance->addExtension(new \Agilicode\QAT\Twig\FileExtension());
$instance->addExtension(new \Agilicode\QAT\Twig\JUnitExtension());
$instance->addExtension(new \Agilicode\QAT\Twig\PhpmetricsExtension());
$instance->addExtension(new \Twig\Extension\DebugExtension());
$instance->addExtension(new \Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'webpack_encore.entrypoint_lookup_collection' => ['privates', 'webpack_encore.entrypoint_lookup_collection', 'getWebpackEncore_EntrypointLookupCollectionService.php', true],
    'webpack_encore.tag_renderer' => ['privates', 'webpack_encore.tag_renderer', 'getWebpackEncore_TagRendererService.php', true],
])));
$instance->addGlobal('app', $c);
$instance->addRuntimeLoader(new \Twig\RuntimeLoader\ContainerRuntimeLoader(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => ['privates', 'twig.runtime.httpkernel', 'getTwig_Runtime_HttpkernelService.php', true],
])));
(new \Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator('F j, Y H:i', '%d days', NULL, 0, '.', ','))->configure($instance);

return $instance;