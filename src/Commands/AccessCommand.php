<?php

namespace SoulDoit\MysqlCliClient\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Symfony\Component\Process\Process;

class AccessCommand extends Command
{
    use ConfirmableTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:access';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Access MySQL CLI Client';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $connection = config('database.default');

        $host = config("database.connections.$connection.host");
        $port = config("database.connections.$connection.port");
        $username = config("database.connections.$connection.username");
        $password = config("database.connections.$connection.password");
        $database = config("database.connections.$connection.database");

        $process = new Process([
            'mysql',
            "--host=$host",
            "--port=$port",
            "--user=$username",
            "--password=\"$password\"",
            $database,
        ]);

        $process->run();
    }
}
