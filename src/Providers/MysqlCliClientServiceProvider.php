<?php

namespace SoulDoit\MysqlCliClient\Providers;
 
use Illuminate\Support\ServiceProvider;
use SoulDoit\MysqlCliClient\Commands\AccessCommand;
 
final class MysqlCliClientServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->commands(
            commands: [
                AccessCommand::class,
            ],
        );
    }
}