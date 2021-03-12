'use strict';

let tableName = '#usersTable';
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
            data: 'name',
            name: 'name'
        },{
            data: 'position',
            name: 'position'
        },{
            data: 'email',
            name: 'email'
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
            data: 'role',
            name: 'role'
        },
        {
            data: function (row) {
                let url = userURL + row.id;
                let data = [
                {
                    'id': row.id,
                    'url': url + '/edit',
                }];
                                
                return prepareTemplateRender('#usersTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id');
    deleteItem(recordsURL + recordId, tableName, 'User');
});
