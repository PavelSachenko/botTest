<?php

namespace App\Console\Commands;

use danog\MadelineProto\Settings;
use Illuminate\Console\Command;

class MessageHandlerCommand extends Command
{
    protected $signature = 'message:handler';

    protected $description = 'Command description';

    public function handle()
    {
        \App\MyEventHandler::startAndLoop('./../session.madeline', new Settings());
    }
}
