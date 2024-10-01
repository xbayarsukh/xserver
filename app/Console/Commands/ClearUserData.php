<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearUserData extends Command
{
    protected $signature = 'clear:user-data';

    protected $description = 'Clear user data from the users table';

    public function handle()
    {
        DB::table('users')->truncate();

        $this->info('User data has been cleared successfully.');
    }
}


