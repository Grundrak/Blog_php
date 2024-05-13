<?php 
    // include_once '../corps/navbar.php';
?>

<h1 class="header">Please Signup</h1>

<form method="post" action="/blog-php/backend/index.php">
    <input type="hidden" name="regs" value="register">
    <input type="text" name="first_name" placeholder="First name...">
    <input type="text" name="last_name" placeholder="Last name...">
    <input type="text" name="user_name" placeholder="Username...">
    <input type="text" name="email" placeholder="Email...">
    <input type="password" name="password" placeholder="Password...">
    <button type="submit" name="submit">Sign Up</button>
</form>

<?php 
    // include_once '../corps/footer.php';
?>