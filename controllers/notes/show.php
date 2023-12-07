<?php

use Core\Database;
use Core\App;


$db = App::resolve(Database::class);

$currentUserId = 1;

/* track the note that has am id that matches the one in the query string : http://navigation.test/note?id=2*/
$note = $db->query(
    'select * from notes where id = :id',
    [
        'id' => $_GET['id']
    ]
)->findOrFail();

//if the notes where not made from current user => 403 forbidden

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);

