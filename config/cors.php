<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
   
    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
    'allowedOriginsPatterns' => ['http://weilogg.com/api/*'],
    'allowedHeaders' => ['*'],
    'allowedMethods' => ['GET, POST, PUT, DELETE, OPTIONS'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
