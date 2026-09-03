<?php
require __DIR__ . '/../_gate/lib.php';
gma_gate(['all-access'], 'GoldMapAtlas — All 10 Maps');
readfile(__DIR__ . '/content.html');
