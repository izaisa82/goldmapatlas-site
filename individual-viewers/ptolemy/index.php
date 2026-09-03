<?php
require __DIR__ . '/../../_gate/lib.php';
gma_gate(['ptolemy-viewer', 'all-access'], "Ptolemy's World Map (1482 Ulm)");
readfile(__DIR__ . '/content.html');
