window.table = initDataTable({
    url: BASE_URL + '/apps/vendors/get-data',
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
            title: 'Address',
            data: 'address',
            name: 'address',
            mRender: (data, type, row, meta) => {
                return data != null ? data : '-';
            }
        },
        {
            title: 'Contact Person',
            data: 'contact_person',
            name: 'contact_person',
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

                render += `<button class="btn btn-primary btn-sm mx-1 mt-1" type="button" onclick="editModal('${row.hashid}','${row.name}', '${row.address}', '${row.contact_person}')"><i class="fa fa-edit"></i></button>`;
                render += `<button type="button" onclick="deleteVendor('${row.hashid}')" class="btn btn-danger btn-sm mx-1 mt-1"><i class="fa fa-trash"></i></button>`;

                return render
            }
        },
    ],
    callback: () => {
    }
})

function deleteVendor(id){
    deleteData(`${BASE_URL}/apps/vendors/${id}/delete`)
}

function addModal(){
    $('#titleModal').html('Add Data')
    $('#name').val()
    $('#address').val()
    $('#contact_person').val()
    $('#form-Modal').attr('action', `${BASE_URL}/apps/vendors/create`)
    $('#formModal').modal('show')
}
function editModal(id, name, address, contact_person){
    $('#name').val(name)
    $('#address').val(address)
    $('#contact_person').val(contact_person)
    $('#titleModal').html('Edit Data')
    $('#form-Modal').attr('action', `${BASE_URL}/apps/vendors/${id}/update`)
    $('#formModal').modal('show')
}