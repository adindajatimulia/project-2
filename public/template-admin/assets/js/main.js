function popupNotify(type, message){
    $.notify({
        title:'',
        message:`${message ?? 'Oops! The request has timed out. Please try again.'}`
     },
     {
        type:`${type ?? 'danger'}`,
        allow_dismiss:false,
        newest_on_top:false ,
        mouse_over:false,
        showProgressbar:false,
        spacing:10,
        timer:2000,
        placement:{
          from:'top',
          align:'center'
        },
        offset:{
          x:30,
          y:30
        },
        delay:1000 ,
        z_index:10000,
        animate:{
          enter:'animated bounce',
          exit:'animated bounce'
      }
    });
}

function deleteData(url){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then(async (willDelete) => {
        if (willDelete) {
            
            const res = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), // Perbaiki selector
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            
            if (res.ok) { // Ganti res.status == 200 dengan res.ok, lebih bersih
                var data = await res.json();
                swal("Poof! Your data has been deleted!", {
                    icon: "success",
                });
                if (data.redirect) {
                    window.location.href = data.redirect; // Redirect jika data.redirect ada
                } else {
                    window.location.reload(); // Reload halaman
                }
            } else {
                var data = await res.json();
                swal("Error", `${data.message}`, "error"); // Perbaiki pesan error
            }
            
        } else {
            swal("Your data is safe!");
        }
    })
}

const generateFormBody = (fd) => {
    const formData = new FormData()
    fd.forEach((val, key) => {
        formData.append(key, val)
    })

    return formData
}


$('form').unbind().on('submit', async function (e) {
    e.preventDefault();

    resetInvalid()

    const res = await fetch($(this).attr('action'), {
        method: $(this).attr('method'),
        headers: {
            'accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: generateFormBody(new FormData(this))
    })

    if (res.status == 200) {
        var data = await res.json()
        $('.modal').modal('hide')
        $('.modal-backdrop').remove()
        $('body').removeClass('modal-open')
        popupNotify('success', data.message)

        if ($(this).data('target') == '_blank') {
            if ($(this).data('callback')) {
                window.open($(this).data('callback'), '_blank')
            } else {
                window.open(window.location.href, '_blank')
            }
        } else {
            if ($(this).attr('target') == 'reload') {
                if ($(this).data('callback')) {
                    window.location.href($(this).data('callback'))
                } else {
                    window.location.reload()
                }
            } else {
                if ($(this).data('callback')) {
                    window.location.href = `${$(this).data('callback')}`
                    // pushState($(this).data('callback'))
                    // window.open($(this).data('callback'))
                    // if (typeof window.table != 'undefined') window.table.ajax.reload()
                    } else {
                        window.location.reload()
                        // if (typeof window.table != 'undefined') window.table.ajax.reload()
                    }
        }
    }
        if (typeof data.redirect != undefined){
            window.location.href($(this).data('callback'))
            // pushState(data.redirect)
        }
    } else {
        if (res.status == 422) {
            var data = await res.json()
            showInvalid(data.errors)
        } else {
            if (res.status == 401) {
                window.location.reload()
            } else {
                var data = await res.json()
                popupNotify('danger', data.message)
            }
        }
    }
})

const showInvalid = (errorMessages) => {
    for (const errorField in errorMessages) {
        if ($(`.form-control[name="${errorField}"]`).parent().hasClass('choices__inner')) {
            $(`.form-control[name="${errorField}"]`).parent().parent().parent().append(`<div class="small text-danger py-1 choices-invalid">${errorMessages[errorField]}</div>`);
            $(`.form-control[name="${errorField}"]`).parent().addClass("border-danger");
        } else if ($(`*[name="${errorField}"]`).parent().parent().hasClass('filepond--root')) {
            $(`*[name="${errorField}"]`).parent().parent().parent().append(`<div class="small text-danger py-1 choices-invalid">${errorMessages[errorField]}</div>`);
            $(`*[name="${errorField}"]`).parent().parent().addClass('border-danger');
        } else {
            $(
                `<div class="invalid-feedback">${errorMessages[errorField]}</div>`
            ).insertAfter(`.form-control[name="${errorField}"]`);
            $(`.form-control[name="${errorField}"]`).addClass("is-invalid");
        }
    }
}

const resetInvalid = () => {
    for (const el of $(".form-control")) {
        $(el).removeClass("is-invalid");
        $('.choices__inner').removeClass("border-danger");
        $('.filepond--root').removeClass("border-danger")
        $(el).siblings(".invalid-feedback").remove();
        $(".invalid-feedback").remove();
        $(".choices-invalid").remove();
    }
}

function numberFormat(x) {
    x = parseInt(x)
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$('.logout').unbind().on('click', async function (e) {
    e.preventDefault()
    swal({
        title: "Logout?",
        text: "Are you sure!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then(async (willDelete) => {
        if (willDelete) {
            swal("Poof! Logout success!", {
                icon: "success",
            });
            const res = await fetch($(this).data('target'), {
                headers: {
                    accept: 'application/json'
                }
            })
    
            if(res.status == 200) {
                window.table = null
                var data = await res.json()
                if(data.redirect) {
                    window.location.reload()
                } else {
                    window.location.reload()
                }
            } else {
                var data = await res.json()
                popupNotify('danger', data.message)
            }
        } else {
            swal("Logout cancelled. You are still logged in to the application.");
        }
    })
})