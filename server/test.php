<?php

$json = '[{"name": "karl"}, {"name": "fritz"}]';

$content = json_decode($json);

var_dump($content);

var_dump(json_encode($content));
