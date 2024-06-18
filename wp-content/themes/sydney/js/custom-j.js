jQuery(document).ready(function($) {
    $('.remove-category').on('click', function() {
        var postId = $(this).data('post-id');
        var categoryId = $(this).data('category-id');
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'remove_category',
                post_id: postId,
                category_id: categoryId
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    });

    $('.add-category').on('click', function() {
        var postId = $(this).data('post-id');
        var categoryId = $(this).data('category-id');
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'add_category',
                post_id: postId,
                category_id: categoryId
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    });
});
