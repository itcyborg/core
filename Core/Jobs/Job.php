<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/11/2018
 * Time: 11:53 AM
 */

namespace Core\Jobs;


class Job
{
    private $system;
    private $cmd;

    public function __construct()
    {
    }

    public function create($name, $interval, $file)
    {
        $this->cmd = 'schtasks /create /sc minute /mo ' . $interval . ' /tn "' . $name . '" /tr "' . $file . '"';
        return `$this->cmd`;
    }

    public function delete($name)
    {
        $this->cmd = 'schtasks /delete /tn "' . $name . '" /f';
        return `$this->cmd`;
    }

    public function end($name)
    {
        return `schtasks /end /tn "$name" /f`;
    }

    public function disable($name)
    {
        return `schtasks /disable /tn "$name" /f`;
    }

    public function enable($name)
    {
        return `schtasks /enable /tn "$name"`;
    }
}