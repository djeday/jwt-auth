<?php

namespace App\Presentation\Views;

interface AbstractView {

    public function render(string $template = null);

    public function setData(array $data);

    public function setTemplateDirectory(string $templateDirectory);
}