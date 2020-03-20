$(document).ready(function() {
    $('button[name=addCategory]').click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/save',
            data: {
                'id': $('#categoryId').val(),
                'parent': $('#parent').val(),
                'categories': $('#category').val(),
            },
            dataType: 'json',
            success: function(data) {
                alert(data.message);
                window.location.reload();
            },
            error: function(data) {
                var error = $.parseJSON(data.responseText);
                alert(error.message);
            }
        })
    })
    $('#deleteButton').click(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                }
            });
            $.ajax({
                type: 'DELETE',
                url: '/delete/' + $('#deleteId').val(),
                success: function(data) {
                    $('button[name=close_delete_modal]').click();
                    alert(data.message);
                    window.location.reload();
                },
                error: function() {
                    $('button[name=close_delete_modal]').click();
                    alert('Cannot delete category has child');
                }
            })
        })
        // $('#updateButton').click(function() {
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         type: 'PUT',
        //         url: '/update/' + $('#categoryId').val(),
        //         data: {
        //             parent: $('#editParent').val(),
        //             categories: $('#editCategoryName').val()
        //         },
        //         dataType: 'json',
        //         success: function(data) {
        //             $('button[name=close_update_modal]').click();
        //             alert(data.message);
        //             window.location.reload();
        //         },
        //         error: function(data) {
        //             var error = $.parseJSON(data.responseText);
        //             $('#updateFrm').html('');
        //             $.each(error.message, function(key, value) {
        //                 $('#updateFrm').append('<li>' + value + '</li>');
        //             })
        //         }
        //     });
        // })
    $("a[name='deleteCategory']").click(function() {
        $('#deleteId').val($(this).closest('tr').attr('data-id'));
    })
    $("a[name='editCateogry']").click(function() {
        $('#categoryId').val($(this).closest('tr').attr('data-id'));
        $('button[name=addCategory]').html('Save');
        $('#category').val($(this).closest('tr').children().eq(1).html());
        $('#parent').val($(this).closest('tr').children().eq(2).html());
    })
})