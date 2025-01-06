window.table = initDataTable({
    url: BASE_URL + '/apps/tables/get-data',
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
            title: 'Table Code',
            data: 'table_code',
            name: 'table_code',
            mRender: (data, type, row, meta) => {
                return data != null ? data : '-';
            }
        },
        {
            title: 'Occupied',
            data: 'is_occupied',
            name: 'is_occupied',
            searchable: false,
            orderable: false,
            sClass: 'text-center nowrap',
            width: '15%',
            mRender: (data, type, row, meta) => {
                var render = ``

                if(data == 0){
                    render += `<span class="badge badge-danger">No</span>`;
                }else{
                    render += `<span class="badge badge-primary">Yes</span>`;
                }

                return render
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

                render += `<button class="btn btn-primary btn-sm mx-1 mt-1" type="button" onclick="editModal('${row.hashid}','${row.table_code}')"><i class="fa fa-edit"></i></button>`;
                render += `<button type="button" onclick="qrPrint('${row.table_code}')" class="btn btn-primary btn-sm mx-1 mt-1"><i class="fa fa-qrcode"></i></button>`;
                render += `<button type="button" onclick="deleteTables('${row.hashid}')" class="btn btn-danger btn-sm mx-1 mt-1"><i class="fa fa-trash"></i></button>`;

                return render
            }
        },
    ],
    callback: () => {
    }
})

function deleteTables(id){
    deleteData(`${BASE_URL}/apps/tables/${id}/delete`)
}

function addModal(){
    $('#titleModal').html('Add Data')
    $('#table_code').val()
    $('#form-Modal').attr('action', `${BASE_URL}/apps/tables/create`)
    $('#formModal').modal('show')
}
function editModal(id, table_code){
    $('#table_code').val(table_code)
    $('#titleModal').html('Edit Data')
    $('#form-Modal').attr('action', `${BASE_URL}/apps/tables/${id}/update`)
    $('#formModal').modal('show')
}

function qrPrint(code){
    // window.location.href(`${BASE_URL}/apps/tables/print?code=${code}`)
    window.open(`${BASE_URL}/apps/tables/print?code=${code}`, '_blank')
}