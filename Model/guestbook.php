<?php

declare(strict_types=1);



class Guestbook
{

    const FILE_NAME = 'data/guestbook-data.json';
    private array $content;

    public function guestbookData()
    {

        if (file_exists(self::FILE_NAME)) {
            $currentData = file_get_contents(self::FILE_NAME);
            $arrayData = json_decode($currentData, true);
            $extra = array(
                'title' => htmlspecialchars($_POST['title']),
                'author' => htmlspecialchars($_POST['author']),
                'content' => htmlspecialchars($_POST['content']),
                'date' => date("d-m-Y H:i:s", time())
            );
            $arrayData[] = $extra;
            $finalData = json_encode($arrayData, JSON_PRETTY_PRINT);
            if (file_put_contents(self::FILE_NAME, $finalData)) {

                echo '<div class="rounded-0 alert alert-success " role="alert ">Message is posted!</div>';
            }
        } else {
            echo '<div class="rounded-0 alert alert-danger" role="alert">File guestbook-data.json not found!</div>';
        }
    }

    public function showPosts()
    {
        $jsonData = file_get_contents(self::FILE_NAME);
        $posts = json_decode($jsonData, true);
        if (empty($posts)) {
            echo '<div class="posts  container ">';
            echo  '<div class="rounded alert alert-success " role="alert ">Add your first post!</div>';
            echo '</div>';
        } else {
            foreach (array_slice(array_reverse($posts), 0, 19) as $post) {

                echo '<div class="posts bg-light container p-4 mt-4 rounded shadow p-3">';
                echo "<h4>{$post['title']}</h4>";
                echo "<h5>{$post['author']}<h5>";
                echo "<hr/>";
                echo "<p>{$post['content']}</p>";
                echo "<h6>{$post['date']}</h6>";
                echo '</div>';
            }
        }
    }
}
