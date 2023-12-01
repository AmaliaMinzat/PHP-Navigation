<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 1;

 /* track the note that has am id that matches the one in the query string : http://navigation.test/note?id=2*/
$note = $db->query('select * from notes where id = :id',
    [
        'id' => $_GET['id']
    ]
)->findOrFail();

//if the notes where not made from current user => 403 forbidden

authorize($note['user_id'] === $currentUserId);

require "views/note.view.php";