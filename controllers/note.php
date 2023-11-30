<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 1;

$note = $db->query(
    'select * from notes where id = :id', /* track the note that has am id 
that matches the one in the query string : http://navigation.test/note?id=2*/
    [
        'id' => $_GET['id']
    ]
)->fetch();

if (!$note) { //when asking for a non existent id => 404 not found
    abort();
}


if ($note['user_id'] !== $currentUserId) { //if the notes where not made from current user => 403 forbidden
    abort(Response::FORBIDDEN);
}

require "views/note.view.php";