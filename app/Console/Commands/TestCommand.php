<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $response = Http::get('https://reqres.in/api/users?page=2');
//        dd($response->json());

        $response = Http::post('https://reqres.in/api/create', [
            'name' => 'Nemanja',
            'job' => 'programer'
        ]);
        dd($response->json());
    }
}
