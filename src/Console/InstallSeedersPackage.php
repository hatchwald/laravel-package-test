<?php
namespace MTR\PostPackage\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use MTR\PostPackage\Database\Seeders\PostSeeder;

class InstallSeedersPackage extends Command 
{
    protected $signature = 'postpackage:seed';
    protected $description = 'Seed data for posts';
    public function handle()
    {
        $param = ["--class" => "MTR\PostPackage\Database\Seeders\PostSeeder"];
        $this->info("Seeeding data posts");
        Artisan::call("db:seed",$param);
        $this->info("success seeding");
    }
}
