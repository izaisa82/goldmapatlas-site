<?php
require __DIR__ . '/../../_gate/lib.php';
gma_gate(['waldseemuller-viewer', 'all-access'], 'Waldseemüller 1507 World Map');
readfile(__DIR__ . '/content.html');
