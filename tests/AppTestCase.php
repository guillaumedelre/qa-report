<?php

namespace Tests\Agilicode\QAT;

use Agilicode\QAT\Command\HelloCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\StreamOutput;

abstract class AppTestCase extends TestCase
{
    private $app;

    protected function setUp(): void
    {
        $this->app = new Application('QAT', 'test');
        $this->app->add(new HelloCommand());
        $this->app->setAutoExit(false);
    }

    /**
     * Runs a command and returns it output
     */
    protected function runCommand($command)
    {
        $fp = tmpfile();
        $input = new StringInput($command);
        $output = new StreamOutput($fp);

        $this->app->run($input, $output);

        fseek($fp, 0);
        $output = '';
        while (!feof($fp)) {
            $output = fread($fp, 4096);
        }
        fclose($fp);

        return $output;
    }
}
