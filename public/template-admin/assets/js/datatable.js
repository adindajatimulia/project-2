if (typeof initDataTable == 'undefined') {
    let initDataTable
}

initDataTable = (tableData) => {
    var dataElement = tableData
    var element = dataElement.element ?? 'v-datatables'
    var callback = dataElement.callback
    var addOptions = dataElement.options ?? {}

    if (element == 'v-datatables') {
        $('v-datatables').html(`
            <table class="table table-bordered" id="datatables-response"></table>
        `)
    }

    var table = $('#datatables-response').DataTable({
        // "processing": true,
        "ajax": {
            url: dataElement.url,
            method: 'GET',
        },
        "columns": dataElement.table,
    });

    

    return table
}
