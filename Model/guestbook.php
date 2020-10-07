<?php


if (file_exists('data/guestbook-data.json')) {
    $currentData = file_get_contents('data/guestbook-data.json');
    $arrayData = json_decode($currentData, true);
    $extra = array(
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'content' => $_POST['content']
    );
    $arrayData[] = $extra;
    $finalData = json_encode(($arrayData));
    if (file_put_contents('data/guestbook-data.json', $finalData)) {
        echo 'SUCCES';
    }
}
