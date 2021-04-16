<p>Uncaught exception: '<?=get_class($exception)?>'</p>
<p>Message: '<?=$exception->getMessage()?>'</p>
<p>Stack trace:<pre><?=$exception->getTraceAsString()?></pre></p>
<p>Thrown in '<?=$exception->getFile()?>' on line <?=$exception->getLine()?>