jQuery( document ).ready( function($) {
    $(document).on( 'click', '.delete-post', function() {
        var id = $(this).data('id');
        var nonce = $(this).data('nonce');
        var post = $(this).parents('.post:first');
        $.ajax({
            type: 'post',
            url: MyAjax.ajaxurl,
            data: {
                action: 'my_delete_post',
                nonce: nonce,
                id: id
            },
            success: function( result ) {
                if( result == 'success' ) {
                    post.fadeOut( function(){
                        post.remove();
                    });
                }
            }
        })
        return false;
    })
})

/*
Let’s pull this apart!
We detect whenever a user clicks on the delete post link and make sure the function returns false at the end so the link isn’t followed.
We strip 3 pieces of data from the HTML, the ID of the post, the security nonce and the post element.

We the perform our AJAX call by using the Ajax URL defined and passed to the script.
Keep in mind that an ‘action’ parameter must be passed.
In addition we pass the nonce and the id to our server-side script.

We finish off by making sure that the post element is faded out when the deletion has completed and was successful.
Remember that the success of an AJAX call has nothing to do with the success of the deletion process.
If the user does not have permission to delete the item, the call itself will still be successful, the item just won’t be deleted.
*/
