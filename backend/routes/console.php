<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('automitra:about', function () {
    $this->info('AutoMitra API foundation is installed.');
})->purpose('Display AutoMitra application information');
