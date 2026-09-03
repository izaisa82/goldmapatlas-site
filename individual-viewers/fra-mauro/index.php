<?php
require __DIR__ . '/../../_gate/lib.php';
gma_gate(['fra-mauro-viewer', 'all-access'], 'Fra Mauro Mappa Mundi (c. 1450)');
readfile(__DIR__ . '/content.html');
