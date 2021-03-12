'use strict';

let tableName = '#companiesTable';
$(tableName).DataTable({
    scrollX: true,
    deferRender: true,
    scroller: true,
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: recordsURL,
    },
    columnDefs: [
        {
            'targets': [7],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
    ],
    columns: [
        {
            data: 'company_name',
            name: 'company_name'
        },{
            data: 'trading_name',
            name: 'trading_name'
        },{
            data: 'company_code',
            name: 'company_code'
        },{
            data: 'city',
            name: 'city'
        },{
            data: 'country',
            name: 'country'
        },{
            data: 'phone_number',
            name: 'phone_number'
        },{
            data: 'email',
            name: 'email'
        },
        {
            data: function (row) {
                let url = recordsURL + row.id;
                let data = [
                {
                    'id': row.id,
                    'url': url + '/edit',
                }];
                                
                return prepareTemplateRender('#companiesTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id');
    deleteItem(recordsURL + recordId, tableName, 'Company');
});
