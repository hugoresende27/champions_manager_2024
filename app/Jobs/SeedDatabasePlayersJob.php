<?php

namespace App\Jobs;

use Database\Seeders\API\ApiFootballData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SeedDatabasePlayersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $api_external_id;
    protected $id;
    /**
     * Create a new job instance.
     */
    public function __construct($api_external_id, $id)
    {
        $this->api_external_id = $api_external_id;
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle(ApiFootballData $apiFootballData): void
    {
        $apiFootballData->fillPlayersDataApi($this->api_external_id, $this->id); 
    }
}
