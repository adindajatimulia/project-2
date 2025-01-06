window.table = initDataTable({
    url: BASE_URL + '/apps/users/get-data',
    table: [
        {
            title: 'No',
            data: 'id',
            name: null,
            searchable: false,
            orderable: false,
            width: '5%',
            mRender: (data, type, row, meta) => {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            title: 'Name',
            data: 'name',
            name: 'name',
            mRender: (data, type, row, meta) => {
                return data != null ? data : '-';
            }
        },
        {
            title: 'Email',
            data: 'email',
            name: 'email',
            mRender: (data, type, row, meta) => {
                return data != null ? data : '-';
            }
        },
        {
            title: 'Role',
            data: null,
            name: 'id',
            mRender: (data, type, row, meta) => {
                return row.roles[0].name
            }
        },
        {
            title: '',
            data: 'hashid',
            name: 'id',
            searchable: false,
            orderable: false,
            sClass: 'text-center nowrap',
            width: '15%',
            mRender: (data, type, row, meta) => {
                var render = ``

                render += `<button class="btn btn-primary btn-sm mx-1 mt-1" type="button" onclick="editModal('${row.hashid}','${row.name}','${row.email}','${row.roles[0].name}',)"><i class="fa fa-edit"></i></button>`;
                render += `<button type="button" onclick="deleteUsers('${row.hashid}')" class="btn btn-danger btn-sm mx-1 mt-1"><i class="fa fa-trash"></i></button>`;

                return render
            }
        }
    ],
    callback: () => {
    }
})

function deleteUsers(id){
    deleteData(`${BASE_URL}/apps/users/${id}/delete`)
}

function addModal(){
    $('#titleModal').html('Add Data')
    $('#name').val()
    $('#email').val()
    $('#role').val()
    $("#password").prop("disabled", false);
    $('#form-Modal').attr('action', `${BASE_URL}/apps/users/create`)
    $('#formModal').modal('show')
}
function editModal(id, name, email, role){
    $('#name').val(name)
    $('#email').val(email)
    $('#role').val(role)
    $("#password").prop("disabled", true);
    $('#titleModal').html('Edit Data')
    $('#form-Modal').attr('action', `${BASE_URL}/apps/users/${id}/update`)
    $('#formModal').modal('show')
}