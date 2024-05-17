<?php 
require_once '../../../helpers/session.php';

?>


<form action="/blog-php/backend/index.php?regs=deleteUser" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
    <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
    <button type="submit" class="text-red-500 hover:underline ml-2">
        <i class="fas fa-trash"></i>
    </button>
</form>
