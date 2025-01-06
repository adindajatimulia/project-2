window.table = initDataTable({
    url: BASE_URL + '/apps/transaction/get-data',
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
            title: 'Table',
            data: 'table_id',
            name: 'table_id',
            mRender: (data, type, row, meta) => {
                return data != null ? row.table.table_code : '-';
            }
        },
        {
            title: 'Customer',
            data: 'customer_id',
            name: 'customer_id',
            mRender: (data, type, row, meta) => {
                return data != null ? row.customer.name : '-';
            }
        },
        {
            title: 'Date',
            data: 'order_date',
            name: 'order_date',
            mRender: (data, type, row, meta) => {
                return data != null ? data : '-';
            }
        },
        {
            title: 'Status',
            data: 'status',
            name: 'status',
            searchable: false,
            orderable: false,
            sClass: 'text-center nowrap',
            width: '15%',
            mRender: (data, type, row, meta) => {
                var render = ``

                if(data == 'pending'){
                    render += `<span class="badge badge-warning">Pending</span>`;
                }else if(data == 'paid'){
                    render += `<span class="badge badge-success">Paid</span>`;
                }else if(data == 'kitchen'){
                    render += `<span class="badge badge-secondary">Kitchen</span>`;
                }else if(data == 'done'){
                    render += `<span class="badge badge-primary">Done</span>`;
                }

                return render
            }
        },
        // {
        //     title: '',
        //     data: 'hashid',
        //     name: 'id',
        //     searchable: false,
        //     orderable: false,
        //     sClass: 'text-center nowrap',
        //     width: '15%',
        //     mRender: (data, type, row, meta) => {
        //         var render = ``

        //         render += `<button class="btn btn-primary btn-sm mx-1 mt-1" type="button" onclick="editModal('${row.hashid}','${row.table_code}')"><i class="fa fa-edit"></i></button>`;

        //         return render
        //     }
        // },
    ],
    callback: () => {
    }
})
