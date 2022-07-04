$(document).ready(function () {
    var swalInit = swal.mixin({});
    $(document).on('click', '.btn-trigger', function () {
        let id = $(this).data('id');
        let type = $(this).data('type') || '';
        let that = $(this);
        swalInit.fire({
            title: 'هل انت متاكد ؟',
            text: 'من تغيير حالة هذا البيان',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'نعم , قم بالتغيير',
            cancelButtonText: 'لا , الغاء'
        })
            .then((isConfirm) => {
                if (isConfirm.value) {
                    $.post(window.routes + id + '/trigger', {
                        _method: 'PATCH',
                        type: type
                    }).done(function (response) {
                        if (response.value) {
                            $('.datatable-ajax').DataTable().ajax.reload();
                            swalInit.fire("عمل جيد!", response.data || 'لقد تم تنفيذ طلبك بنجاح', "success");
                        } else {
                            swalInit.fire("الطلب فشل", 'حدث خطئ غير متوقع حدث الصفحة', "error");
                            console.log(response);
                        }
                    })
                }
            });
    });
    $(document).on('click', '.btn-delete', function () {
        let id = $(this).data('id');
        let that = $(this);
        swalInit.fire({
            title: 'Are you sure ?',
            text: 'You wont be able to restore it again',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete',
            cancelButtonText: 'No, cancel'
        }).then((isConfirm) => {
            if (isConfirm.value) {
                $.post(window.routes + id, {_method: 'DELETE'}).done(function (response) {
                    if (response.status) {
                        $('.datatable-ajax').DataTable().ajax.reload();
                        swalInit.fire("Good Job", response.data, "success");
                    } else {
                        swalInit.fire("Failed!", 'Unexpected error occurred', "error");
                        console.log(response);
                    }
                })
            }
        });
    });
});
