<?php
require __DIR__ . '/../../_gate/lib.php';
gma_gate(['ebstorf-viewer', 'all-access'], 'Ebstorf Mappa Mundi (c. 1300)');
readfile(__DIR__ . '/content.html');
