$(document).ready(function (){
    // deleteall();

    let url_today = (usertype === "admin") ? "/admin/queuing" : "/secretary/queuing";
    let url_upcoming = (usertype === "admin") ? "/admin/queuing/upcoming" : "/secretary/queuing/upcoming";

    let complete = $('#today').DataTable({
        processing: true,
        serverSide: true,
        ajax: url_today,
        dom: 'frtp',
        pageLength: 10,
        responsive: true,
        columns: [
            {data: 'id', name: 'id' , orderable: false, searchable: false},
            {data: 'user_id', name: 'user_id' , orderable: false, searchable: false},
            {data: 'fullname', name: 'fullname' , orderable: false},
            {data: 'contact_no', name: 'contact_no' , orderable: false, searchable: false},
            {data: 'email', name: 'email' , orderable: false, searchable: false},
            {data: 'date', name: 'date' , orderable: false, searchable: false},
            {data: 'time', name: 'time' , orderable: false, searchable: false},
        ],
        initComplete: function() {
            var api = this.api();
            var dataCount = api.data().length;
            if (dataCount < 10) {
                $('#today_paginate').hide(); // Hide pagination element
            }
        }     
    });

    let upcoming = $('#upcoming').DataTable({
        processing: true,
        serverSide: true,
        ajax: url_upcoming,
        dom: 'frtp',
        pageLength: 10,
        responsive: true,
        columns: [
            {data: 'id', name: 'id' , orderable: false, searchable: false},
            {data: 'user_id', name: 'user_id' , orderable: false, searchable: false},
            {data: 'fullname', name: 'fullname' , orderable: false},
            {data: 'contact_no', name: 'contact_no' , orderable: false, searchable: false},
            {data: 'email', name: 'email' , orderable: false, searchable: false},
            {data: 'date', name: 'date' , orderable: false, searchable: false},
            {data: 'time', name: 'time' , orderable: false, searchable: false},
        ], 
        initComplete: function() {
            var api = this.api();
            var dataCount = api.data().length;
            if (dataCount < 10) {
                $('#upcoming_paginate').hide(); // Hide pagination element
            }
        }
    });

});