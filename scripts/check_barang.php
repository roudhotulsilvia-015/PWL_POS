<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Bootstrap kernel
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\BarangModel;

$rows = BarangModel::orderBy('created_at', 'desc')->take(5)->get()->toArray();
print_r($rows);
