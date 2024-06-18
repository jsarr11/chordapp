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


// add category
jQuery(document).ready(function($) {
    $('#add-category-form').on('submit', function(e) {
        e.preventDefault();

        var categoryName = $('#category-name').val();
        var categorySlug = $('#category-slug').val();

        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'add_new_category',
                category_name: categoryName,
                category_slug: categorySlug
            },
            success: function(response) {
                $('#category-message').html('<p>New category created successfully.</p>').fadeIn();
                $('#category-name, #category-slug').val(''); // Clear input fields
            },
            error: function(xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
    });
});
