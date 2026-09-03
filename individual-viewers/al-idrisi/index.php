<?php
require __DIR__ . '/../../_gate/lib.php';
gma_gate(['al-idrisi-viewer', 'all-access'], "Al-Idrisi's Tabula Rogeriana (1154)");
readfile(__DIR__ . '/content.html');
