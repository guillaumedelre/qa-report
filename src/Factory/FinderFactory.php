<?php
declare(strict_types=1);

namespace Agilicode\QAT\Factory;

use Symfony\Component\Finder\Finder;

class FinderFactory
{
    /**
     * @return Finder
     */
    public static function create(): Finder
    {
        return new Finder();
    }

    /**
     * @param array $context
     *
     * @return Finder
     */
    public static function createFromContext(array $context): Finder
    {
        return (self::create())
            ->ignoreVCS($context['ignore_vcs'] ?? false)
            ->in($context['in'] ?? [])
            ->depth($context['depth'] ?? [])
            ->exclude($context['exclude'] ?? [])
            ->path($context['path'] ?? [])
            ->notPath($context['not_path'] ?? [])
            ->name($context['name'] ?? [])
            ->notName($context['not_name'] ?? [])
            ->contains($context['contains'] ?? [])
            ->notContains($context['not_contains'] ?? [])
            ->sortByName()
            ;
    }
}
