<?php

namespace App\Console\Commands;

use App\Http\Controllers\ApiController;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use PhpParser\Node\Stmt\TryCatch;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:database {--author=} {--genre=} {--limit=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create database based on harvard api';

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
     * @return int
     */
    public function handle()
    {
        $author = $this->option("author");
        $genre = $this->option("genre");
        $limit = $this->option("limit");

        $client = new Client();
        $url = "https://api.lib.harvard.edu/v2/items.json?";

        if ($author) {
            $url = $url . "name=" . $author . "&";
        }

        if ($genre) {
            $url = $url . "genre=" . $genre . "&";
        }

        if ($limit) {
            $url = $url . "limit=" . $limit . "&";
        }

        try {
            $response = $client->request('GET', $url, [
                'verify'  => false,
            ]);

            $responseBody = json_decode($response->getBody());
            $data = $responseBody->items->mods;
            foreach ($data as $item) {
                $item = json_encode($item);
                $item = json_decode($item, true);
                ApiController::store($item);
            }
            $this->info("database created successfully");
        } catch (\Throwable $th) {
            $this->info("Error creating database");
        }
    }
}
