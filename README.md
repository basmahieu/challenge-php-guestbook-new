# Title: PHP Guestbook

- Repository: `challenge-php-guestbook`
- Type of Challenge: `Consolidation Challenge`
- Duration: `1 day`
- Deployment strategy : `heroku`
- Team challenge : `solo`

## Learning objectives

- Store data (in files)
- Convert complex constructs (array/objects) to string representation.
- Deliver a project under a strict deadline
- Deploy on Heroku

## The Mission

It is time for our first PHP consolidation challenge!  
Let's make a guestbook in PHP.

![guestbook.jpg](guestbook.jpg)

Every visitor of your page can leave a message that is then saved. Messages are then showed (last message on top) for everybody who visits the page.

Make sure to deploy the site before 17:00 o'clock on Heroku and publish the URL on our usual exercises spreadsheet!

### How to store the messages?

You can store the messages in a file on your system. You can use the brother of [file_get_contents()](https://php.net/file_get_contents) for this: [file_put_contents()](https://php.net/file_put_contents) .

You can either use [json_encode()](https://php.net/json_encode) or [serialize()](https://php.net/serialize) to convert your array to a string to store (and viceversa).

## Must-have features

- Posts must have the following attributes:
  - Title
  - Date
  - Content
  - Author name
- Use at least 2 classes: Post & PostLoader
- The messages are sorted from new (top) to old (bottom).
- Make sure the script can handle [site defacement attacks](https://en.wikipedia.org/wiki/Website_defacement): use [htmlspecialchars()](https://www.php.net/htmlspecialchars)
- Only show the latest 20 posts.

## Nice to have features

- Profanity filter: at the top of your script create an array of "bad" words. If somebody tries to enter a message with on of those words, their messages gets rejected.
- When the user enters uses a "smiley" like ":-)", ";-)", ":-(" replace it with an image of such a smiley.
- Have an input field where the user can enter how many messages he wants to see displayed.

### Tips & Advice

- To keep the code in good shape we recommend separating the view (HTML code) from the PHP code. If you want, you can use the MVC pattern, but it is not required in this exercise.
- Write your footer and header HTML code in two separate files, and `require` them in your main view files to avoid repeating HTML code.
