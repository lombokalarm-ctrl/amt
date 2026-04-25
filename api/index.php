<?php
if (!file_exists('/tmp/database.sqlite')) {
    copy(__DIR__ . '/../database/database.sqlite', '/tmp/database.sqlite');
    chmod('/tmp/database.sqlite', 0777);
}
require __DIR__ . '/../public/index.php';
