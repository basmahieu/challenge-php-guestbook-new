<?php

declare(strict_types=1);

require('guestbook.php');


class UserValidator
{

    private $data;
    private $errors = [];
    private static $fields = ['title', 'author', 'content'];
    private $formValidation = '';

    public function __construct($postData)
    {
        $this->data = $postData;
    }

    public function validateForm()
    {
        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("{$field} is not present in data");
                return;
            }
        }
        $this->validateTitle();
        $this->validateAuthor();
        $this->validateContent();
        $this->formValidationTrue();



        return $this->errors;
    }

    public function formValidationTrue()
    {
        if ($this->formValidation === true) {
            $guestbook = new Guestbook;
            $guestbook->guestbookData();
            // $guestbook->showPost();
        } else {
            echo '<div class="rounded-0 alert alert-danger" role="alert">Please fill in all required fields</div>';
        }
    }


    public function validateTitle()
    {
        $val = trim($this->data['title']);
        $this->formValidation = true;

        if (empty($val)) {
            $this->addError('title', '* title cannot be empty');
            $this->formValidation = false;
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{3,120}/', $val)) {
                $this->addError('title', '* Only letters allowed and min 2 letters');
                $this->formValidation = false;
            }
        }
    }


    public function validateAuthor()
    {
        $val = trim($this->data['author']);
        $this->formValidation = true;

        if (empty($val)) {
            $this->addError('author', '* author cannot be empty');
            $this->formValidation = false;
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{3,120}/', $val)) {
                $this->addError('author', '* Only letters allowed and min 2 letters');
                $this->formValidation = false;
            }
        }
    }

    public function validateContent()
    {
        $val = trim($this->data['content']);
        $this->formValidation = true;

        if (empty($val)) {
            $this->addError('content', '* content cannot be empty');
            $this->formValidation = false;
        }
    }

    public function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
}
