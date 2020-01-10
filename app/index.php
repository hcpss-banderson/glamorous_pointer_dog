<?php

use HCPSS\ProjectNameGenerator;
use HCPSS\NameRepository;
use HCPSS\Table;

require_once __DIR__ . '/vendor/autoload.php';

header('Content-Type: text/plain');

$help = <<< HELP
Send me a POST with body:
{
    "command": "new",
    "data": {
        "description": "A Description of my project."
    }
}
HELP;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die($help);
}

$data = json_decode(file_get_contents('php://input'), true);
if (empty($data['command'])) {
    die($help);
}

switch ($data['command']) {
    case 'new':
        $description = filter_var($data['data']['description'], FILTER_SANITIZE_STRING);
        $generator   = new ProjectNameGenerator();
        $repo        = NameRepository::instance();
        
        do {
            $name = $generator->generate();
            $repo->exists($name);
        } while ($repo->exists($name));
        
        $repo->insert($name, $description);
        
        echo $name;
        
        break;
    case 'list':
        $repo = NameRepository::instance();
        $list = $repo->list();
        
        $table = new Table($list);
        
        echo $table;
        
        break;
    case 'insert':
        $description = filter_var($data['data']['description'], FILTER_SANITIZE_STRING);
        $name        = filter_var($data['data']['name'], FILTER_SANITIZE_STRING);
        
        $repo = NameRepository::instance();
        $repo->insert($name, $description);
        
        echo $name;
        
        break;
    default:
        die($help);
}
