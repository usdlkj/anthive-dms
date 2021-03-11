'use strict';

let tableName = '#mailTypesTable';
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
            'targets': [5],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
    ],
    columns: [
        {
            data: 'project_id',
            name: 'project_id'
        },{
            data: 'mail_type',
            name: 'mail_type'
        },{
            data: 'mail_type_code',
            name: 'mail_type_code'
        },{
            data: 'last_mail_number',
            name: 'last_mail_number'
        },{
            data: 'is_transmittal',
            name: 'is_transmittal'
        },
        {
            data: function (row) {
                let url = recordsURL + row.id;
                let data = [
                {
                    'id': row.id,
                    'url': url + '/edit',
                }];
                                
                return prepareTemplateRender('#mailTypesTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id');
    deleteItem(recordsURL + recordId, tableName, 'Mail Type');
});
