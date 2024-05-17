<?php 
    // include_once '../corps/navbar.php';

?>

<form method="POST" action="/blog-php/backend/index.php" style="display: flex; flex-direction: column; width: 30vw;">
    <input type="hidden" name="regs" value="createArticle">
    <input type="text" name="title" placeholder="Enter Title...">
    <textarea name="content" placeholder="Enter Content..."></textarea>
    <input type="hidden" name="user_id" value="1">
    <button type="submit" name="submit">Create</button>
</form>

