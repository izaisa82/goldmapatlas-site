<?php
require __DIR__ . '/../../_gate/lib.php';
gma_gate(['carta-marina-viewer', 'all-access'], 'Carta Marina (1539)');
readfile(__DIR__ . '/content.html');
