window.table = initDataTable({
    url: BASE_URL + '/apps/menuitems/get-data',
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
            title: 'Description',
            data: 'description',
            name: 'description',
            mRender: (data, type, row, meta) => {
                return data != null ? data : '-';
            }
        },
        {
            title: 'English Description',
            data: 'eng_description',
            name: 'eng_description',
            mRender: (data, type, row, meta) => {
                return data != null ? data : '-';
            }
        },
        {
            title: 'Vendor',
            data: 'vendor_id',
            name: 'vendor_id',
            mRender: (data, type, row, meta) => {
                return data != null ? row.vendor.name : '-';
            }
        },
        {
            title: 'Category',
            data: 'category_id',
            name: 'category_id',
            mRender: (data, type, row, meta) => {
                return data != null ? row.category.name : '-';
            }
        },
        {
            title: 'Price',
            data: 'price',
            name: 'price',
            mRender: (data, type, row, meta) => {
                return data != null ? 'Rp. '+numberFormat(row.price) : '-';
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

                render += `<button class="btn btn-primary btn-sm mx-1 mt-1" type="button" onclick="editModal('${row.hashid}','${row.name}', '${row.eng_name}', '${row.description}', '${row.eng_description}', '${row.vendor_id}', '${row.category_id}', '${parseInt(row.price)}')"><i class="fa fa-edit"></i></button>`;
                render += `<button type="button" onclick="deleteItems('${row.hashid}')" class="btn btn-danger btn-sm mx-1 mt-1"><i class="fa fa-trash"></i></button>`;

                return render
            }
        },
    ],
    callback: () => {
    }
})

function deleteItems(id){
    deleteData(`${BASE_URL}/apps/menuitems/${id}/delete`)
}

function addModal(){
    $('#titleModal').html('Add Data')
    $('#name').val()
    $('#eng_name').val()
    $('#description').val()
    $('#eng_description').val()
    $('#vendor_id').val()
    $('#category_id').val()
    $('#price').val()
    $('#contact_person').val()
    $('#form-Modal').attr('action', `${BASE_URL}/apps/menuitems/create`)
    $('#formModal').modal('show')
}
function editModal(id, name, eng_name, description, eng_description, vendor_id, category_id, price){
    $('#name').val(name)
    $('#eng_name').val(eng_name)
    $('#description').val(description)
    $('#eng_description').val(eng_description)
    $('#vendor_id').val(vendor_id)
    $('#category_id').val(category_id)
    $('#price').val(price)
    $('#titleModal').html('Edit Data')
    $('#form-Modal').attr('action', `${BASE_URL}/apps/menuitems/${id}/update`)
    $('#formModal').modal('show')
}