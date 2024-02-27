<?php

namespace App\Jobs;

use Database\Seeders\API\ApiFootballData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SeedDatabaseTeamsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $league;
    /**
     * Create a new job instance.
     */
    public function __construct(string $league)
    {
        $this->league = $league;
    }

    /**
     * Execute the job.
     */
    public function handle(ApiFootballData $apiFootballData): void
    {
        $apiFootballData->fillTeamsDataApi($this->league);
    }
}
