<?php
require __DIR__ . '/../../_gate/lib.php';
gma_gate(['mercator-viewer', 'all-access'], 'Mercator World Map (1569)');
readfile(__DIR__ . '/content.html');
