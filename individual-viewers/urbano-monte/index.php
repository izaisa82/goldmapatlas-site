<?php
require __DIR__ . '/../../_gate/lib.php';
gma_gate(['urbano-monte-viewer', 'all-access'], "Urbano Monte's World Map (1587)");
readfile(__DIR__ . '/content.html');
