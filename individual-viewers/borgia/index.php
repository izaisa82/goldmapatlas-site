<?php
require __DIR__ . '/../../_gate/lib.php';
gma_gate(['borgia-viewer', 'all-access'], 'Borgia Planisphere (c. 1430)');
readfile(__DIR__ . '/content.html');
