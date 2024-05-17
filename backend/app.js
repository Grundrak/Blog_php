$.ajax({
    url: '/blog-php/backend/index.php?regs=fetchUser',
    success: function(data) {
        $('#user-avatar').attr('src', data.avatar);
        $('#user-name').text(data.user_name);
    }
});