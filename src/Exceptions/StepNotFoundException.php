<?php

namespace MediaCentr\LaravelWizard\Exceptions;

use Facade\IgnitionContracts\BaseSolution;
use Facade\IgnitionContracts\ProvidesSolution;
use Facade\IgnitionContracts\Solution;
use MediaCentr\LaravelWizard\Wizard;

class StepNotFoundException extends InternalException implements ProvidesSolution
{
    /**
     * @var string
     */
    protected $stepSlug;

    /**
     * @var \MediaCentr\LaravelWizard\Wizard
     */
    protected $wizard;

    /**
     * @var string
     */
    protected $controllerClass;

    public function __construct($stepSlug, Wizard $wizard, string $controllerClass)
    {
        $this->stepSlug = $stepSlug;
        $this->wizard = $wizard;
        $this->controllerClass = $controllerClass;

        parent::__construct("Step [$stepSlug] is not found to {$this->wizard->getTitle()} wizard.", 404);
    }

    public function getSolution(): Solution
    {
        return BaseSolution::create('Step not found to WizardController')
            ->setSolutionDescription("Register Step `{$this->stepSlug}` to the `steps` property of your `{$this->controllerClass}`.");
    }
}
