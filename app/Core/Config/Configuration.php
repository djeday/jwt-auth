<?php

namespace App\Core\Config;

class Configuration
{
    private string $templateDir;

    private string $dbHost;

    private string $dbName;

    private string $dbUser;

    private string $dbPass;

    public function getTemplateDir(): string
    {
        return $this->templateDir;
    }

    public function setTemplateDir(string $templateDir): void
    {
        $this->templateDir = $templateDir;
    }

    public function getDbHost(): string
    {
        return $this->dbHost;
    }

    public function setDbHost(string $dbHost): void
    {
        $this->dbHost = $dbHost;
    }

    public function getDbName(): string
    {
        return $this->dbName;
    }

    public function setDbName(string $dbName): void
    {
        $this->dbName = $dbName;
    }

    public function getDbUser(): string
    {
        return $this->dbUser;
    }

    public function setDbUser(string $dbUser): void
    {
        $this->dbUser = $dbUser;
    }

    public function getDbPass(): string
    {
        return $this->dbPass;
    }

    public function setDbPass(string $dbPass): void
    {
        $this->dbPass = $dbPass;
    }
}