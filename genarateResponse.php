<?php

require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.

use Orhanerday\OpenAi\OpenAi;

if (isset($_GET["prompt"])) {

    $prompt = $_GET["prompt"];
}

$open_ai = new OpenAi('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');

$complete = $open_ai->completion([
    'model' => 'text-davinci-002',
    'prompt' => $prompt,
    'temperature' => 0.9,
    'max_tokens' => 150,
    'frequency_penalty' => 0,
    'presence_penalty' => 0.6,
]);

if ($complete != null) {
    $php_obj = json_decode($complete);
    $response = $php_obj->choices[0]->text;
    echo $response;
}
