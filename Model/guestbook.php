<?php

declare(strict_types=1);



class Guestbook
{

    const FILE_NAME = 'data/guestbook-data.json';

    public function guestbookData()
    {

        if (file_exists(self::FILE_NAME)) {
            $currentData = file_get_contents(self::FILE_NAME);
            $arrayData = json_decode($currentData, true);
            $extra = array(
                'title' => htmlspecialchars($_POST['title']),
                'author' => htmlspecialchars($_POST['author']),
                'content' => htmlspecialchars($_POST['content'])
            );
            $arrayData[] = $extra;
            $finalData = json_encode($arrayData, JSON_PRETTY_PRINT);
            if (file_put_contents(self::FILE_NAME, $finalData)) {

                echo $finalData;
            }
        } else {
            echo '<div class="rounded-0 alert alert-danger" role="alert">File guestbook-data.json not found!</div>';
        }
    }
}


  // public function showPost()
    // {
    // }

// public function showPost()
//     {
//         //GET POSTS DATA
//         $posts = file_get_contents(self::FILE_NAME);
//         $postsDecoded = json_decode($posts, true);
//         $postsDecodedReversed = array_slice(array_reverse($postsDecoded), 0, self::MAX_POSTS - 1);

//         return $postsDecodedReversed;

//     }

// class Guestbook
// {

//     public function guestbookData()
//     {

//         if (file_exists('data/guestbook-data.json')) {
//             $currentData = file_get_contents('data/guestbook-data.json');
//             $arrayData = json_decode($currentData, true);
//             $extra = array(
//                 'title' => $_POST['title'],
//                 'author' => $_POST['author'],
//                 'content' => $_POST['content']
//             );
//             $arrayData[] = $extra;
//             $finalData = json_encode(($arrayData));
//             if (file_put_contents('data/guestbook-data.json', $finalData)) {

//                 echo $finalData;
//             }
//         }
//     }
// }