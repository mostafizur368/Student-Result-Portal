<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('portal:info', function () {
    $this->info('Student Result Portal is ready.');
})->purpose('Display portal status');
