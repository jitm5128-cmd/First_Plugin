jQuery(document).ready(function ($) {

    $('.jtm-like').on('click', function () {

        var post_id = $(this).data('post-id');
        var user_id = $(this).data('user-id');

        console.log(post_id);
        console.log(user_id);

        if (!user_id) {

            alert("You must login to vote");

        } else {

            $.ajax({

                url: jtm_ajax.ajax_url,

                type: 'POST',

                data: {
                    action: 'jtm_post_voting',
                    pid: post_id,
                    uid: user_id
                },

                success: function (response) {

                    console.log(response);

                    alert(response.data.message);
                },

                error: function (xhr, status, error) {

                    console.log(xhr.responseText);

                    alert("AJAX request failed");
                }

            });
        }
    });

});