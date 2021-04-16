<?php

namespace App\Presentation\Controllers;

use App\Core\Config\Configuration;
use App\Core\Config\ConfigurationRepositoryInterface;
use App\Core\Exceptions\ActionNotFoundException;
use App\Presentation\Views\AbstractView;

abstract class BaseController
{
    protected AbstractView $view;

    protected Configuration $configuration;

    public function __construct(
        AbstractView $view,
        ConfigurationRepositoryInterface $configuration
    ) {
        $this->view = $view;
        $this->configuration = $configuration->getConfiguration();
        $this->view->setTemplateDirectory($this->configuration->getTemplateDir());
    }

    /**
     * @param string $name
     * @param array $arguments
     * @throws ActionNotFoundException
     */
    public function __call(string $name, array $arguments)
    {
        throw new ActionNotFoundException("Action $name not found!", 404);
    }
}