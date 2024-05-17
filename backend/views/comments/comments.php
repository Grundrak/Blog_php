<?php

// include_once '../article/article.php';

?>

<?php     
  if (!empty($comments)) {
      echo '<ul>';
      foreach ($comments as $comment) {
          echo '<li>' . $comment['content'] . '</li>';
      }
      echo '</ul>';
  } else {
      echo "No comments found for this article.";
  }
?>

<form method="GET" action="/blog-php/backend/index.php">
    <input type="hidden" name="regs" value="getCommentById">
    <input type="text" name="id" placeholder="Enter Comment ID">
    <button type="submit" name="submit" style="margin-left: 10px;">ID</button>
</form>


<form method="POST" action="/blog-php/backend/index.php">
    <input type="hidden" name="regs" value="createComment">
    <textarea name="content" placeholder="Your comment..."></textarea>
    <input type="hidden" name="user_id" value="1">
    <input type="hidden" name="article_id" value="1">
    <button type="submit" name="submit">Create</button>
</form>

<form method="GET" action="/blog-php/backend/index.php">
    <input type="hidden" name="regs" value="readComments">
    <input type="hidden" name="article_id" value="1">
    <button type="submit" name="submit" style="margin-left: 177px;">Read</button>
</form>

<form method="POST" action="/blog-php/backend/index.php">
    <input type="hidden" name="regs" value="updateComment">
    <textarea name="content" placeholder="Edit your comment..."></textarea>
    <input type="hidden" name="_method" value="PUT"> 
    <input type="hidden" name="id" value="3">
    <button type="submit" name="submit">Update</button>
</form>

<form method="POST" action="/blog-php/backend/index.php">
    <input type="hidden" name="regs" value="deleteComment">
    <input type="hidden" name="_method" value="DELETE"> 
    <input type="hidden" name="id" value="3">
    <button type="submit" name="submit" style="margin-left: 175px;">Delete</button>
</form>
