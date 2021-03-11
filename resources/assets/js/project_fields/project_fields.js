'use strict';

let tableName = '#projectFieldsTable';
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
            data: 'project_id',
            name: 'project_id'
        },{
            data: 'field_code',
            name: 'field_code'
        },{
            data: 'field_type',
            name: 'field_type'
        },{
            data: 'field_text',
            name: 'field_text'
        },{
            data: 'visible',
            name: 'visible'
        },{
            data: 'mandatory',
            name: 'mandatory'
        },{
            data: 'sequence',
            name: 'sequence'
        },
        {
            data: function (row) {
                let url = recordsURL + row.id;
                let data = [
                {
                    'id': row.id,
                    'url': url + '/edit',
                }];
                                
                return prepareTemplateRender('#projectFieldsTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id');
    deleteItem(recordsURL + recordId, tableName, 'Project Field');
});
