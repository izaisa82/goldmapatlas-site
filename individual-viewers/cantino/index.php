<?php
require __DIR__ . '/../../_gate/lib.php';
gma_gate(['cantino-viewer', 'all-access'], 'Cantino Planisphere (1502)');
readfile(__DIR__ . '/content.html');
