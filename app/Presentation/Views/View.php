<?php

namespace App\Presentation\Views;

class View implements AbstractView
{
    private array $data;

    private string $templateDirectory;

    public function setTemplateDirectory(string $templateDirectory) {
        $this->templateDirectory = $templateDirectory;
    }

    public function render(string $template = null)
    {
        $templateFile = dirname(__DIR__, 3) . $this->templateDirectory. $template . '.php';
        if (is_null($template)) {
            exit(implode($this->data));
        }
        extract($this->data);
        include_once $templateFile;
    }

    public function setData(array $data) {
        $this->data = $data;
    }
}