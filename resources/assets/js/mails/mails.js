'use strict';

let tableName = '#mailsTable';
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
            'targets': [8],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
    ],
    columns: [
        {
            data: 'thread_starter_id',
            name: 'thread_starter_id'
        },{
            data: 'previous_mail_id',
            name: 'previous_mail_id'
        },{
            data: 'mail_type_id',
            name: 'mail_type_id'
        },{
            data: 'sender_id',
            name: 'sender_id'
        },{
            data: 'mail_code',
            name: 'mail_code'
        },{
            data: 'mail_status',
            name: 'mail_status'
        },{
            data: 'subject',
            name: 'subject'
        },{
            data: 'message',
            name: 'message'
        },
        {
            data: function (row) {
                let url = recordsURL + row.id;
                let data = [
                {
                    'id': row.id,
                    'url': url + '/edit',
                }];
                                
                return prepareTemplateRender('#mailsTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id');
    deleteItem(recordsURL + recordId, tableName, 'Mail');
});
