<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\gateready\Receipt;

class CronTests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:tests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      \DB::table('cron_test')->insert([
          'test_int' => '1',
          'created_at' => now(),
      ]);
    }
}
