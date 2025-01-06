window.table = initDataTable({
    url: BASE_URL + '/apps/categories/get-data',
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
            title: 'English Name',
            data: 'eng_name',
            name: 'eng_name',
            mRender: (data, type, row, meta) => {
                return data != null ? data : '-';
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

                render += `<button class="btn btn-primary btn-sm mx-1 mt-1" type="button" onclick="editModal('${row.hashid}','${row.name}', '${row.eng_name}')"><i class="fa fa-edit"></i></button>`;
                render += `<button type="button" onclick="deleteCategory('${row.hashid}')" class="btn btn-danger btn-sm mx-1 mt-1"><i class="fa fa-trash"></i></button>`;

                return render
            }
        },
    ],
    callback: () => {
    }
})

function deleteCategory(id){
    deleteData(`${BASE_URL}/apps/categories/${id}/delete`)
}

function addModal(){
    $('#titleModal').html('Add Data')
    $('#name').val()
    $('#eng_name').val()
    $('#form-Modal').attr('action', `${BASE_URL}/apps/categories/create`)
    $('#formModal').modal('show')
}
function editModal(id, name, eng_name){
    $('#name').val(name)
    $('#eng_name').val(eng_name)
    $('#titleModal').html('Edit Data')
    $('#form-Modal').attr('action', `${BASE_URL}/apps/categories/${id}/update`)
    $('#formModal').modal('show')
}