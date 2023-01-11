<?php

class App extends FSA\Neuron\App
{
    private static $articles;
    private static $edds;

    protected static function constVarPrefix(): string
    {
        return "smf";
    }

    protected static function constSessionName(): string
    {
        return "smf";
    }

    public static function constWorkDir(): string
    {
        return __DIR__ . '/../';
    }

    protected static function getContext(): array
    {
        return [
            'title' => 'SMF',
            'session' => self::session()
        ];
    }

    public static function init()
    {
        parent::init();
        ini_set('syslog.filter', 'raw');
        openlog('smf', LOG_PID | LOG_ODELAY, LOG_USER);
    }
}
