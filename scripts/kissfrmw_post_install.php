<?php

$corePath  = __DIR__.'/vendor/levitarmouse/core';
$restPath  = __DIR__.'/vendor/levitarmouse/kiss_rest';
$ormPath   = __DIR__.'/vendor/levitarmouse/kiss_orm';

$fwCfgPath = __DIR__.'/config';

if (!is_dir($fwCfgPath)) {
    mkdir($fwCfgPath);
}