jQuery(document).ready(function($) {
    $('.remove-category').click(function() {
        var postId = $(this).data('post-id');
        var categoryId = $(this).data('category-id');
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'POST',
            data: {
                action: 'remove_category',
                post_id: postId,
                category_id: categoryId
            },
            success: function(response) {
                location.reload();
            }
        });
    });

    $('.add-category').click(function() {
        var postId = $(this).data('post-id');
        var categoryId = $(this).data('category-id');
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'POST',
            data: {
                action: 'add_category',
                post_id: postId,
                category_id: categoryId
            },
            success: function(response) {
                location.reload();
            }
        });
    });
});
