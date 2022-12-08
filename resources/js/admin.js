$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

if ($("a").hasClass('active')) {
    $("a.active").parents('div:first').collapse();
}

$("body").on("click", ".confirm-delete", function (e) {
    var btn = $(this);
    e.preventDefault();

    swal({
        text: "آیا مطمئنید میخواهید حذف کنید؟",
        icon: "error",
        buttons: true,
        buttons: ["خیر", "تایید"],
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            // console.log($(btn).data('id'));
            Livewire.emit('delete', $(btn).data('id'));
        }
    });
});

window.addEventListener('delete', value => {
    if (value.detail.type == "success") {
        swal({
            title: '',
            text: "با موفقیت حذف شد",
            icon: "success",
            buttons: false,
        });
    }
});

window.addEventListener('create', value => {
    if (value.detail.type == "success") {
        swal({
            title: '',
            text: "با موفقیت افزوده شد",
            icon: "success",
            buttons: false,
        });
    }
});

window.addEventListener('error', data => {
    swal({
        title: '',
        text: "خطایی رخ داده است",
        icon: "error",
        buttons: false,
    });
});
