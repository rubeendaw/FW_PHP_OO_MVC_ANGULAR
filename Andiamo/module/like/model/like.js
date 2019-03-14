// $(document).ready(function(){
//   $(document).on('click','.details',function () {
//     var id = this.getAttribute('id');
//     // console.log(data);
//     window.location.href = 'index.php?page=controller_like&op=like&id=' + id;
//     // console.log(id);
//   });
// });
// $(document).ready(function () {            
//     $("#table").jqxDataTable(
//     {
//         altRows: true,
//         sortable: true,
//         editable: true,
//         selectionMode: 'singleRow',
//         columns: [
//           { text: 'First Name', dataField: 'First Name', width: 200 },
//           { text: 'Last Name', dataField: 'Last Name', width: 200 },
//           { text: 'Product', dataField: 'Product', width: 250 },
//           { text: 'Unit Price', dataField: 'Price', width: 100, align: 'right', cellsAlign: 'right', cellsFormat: 'c2' },
//           { text: 'Quantity', dataField: 'Quantity', width: 100, align: 'right', cellsAlign: 'right', cellsFormat: 'n' }
//         ]
//     });
// });

// $(document).ready(function () {
//     // prepare the data
//     var source =
//     {
//         dataType: "json",
//         dataFields:
//         [
//             { name: 'destination', type: 'string' },
//             { name: 'country', type: 'string' },
//         ]
//     };
//     var dataAdapter = new $.jqx.dataAdapter(source);

//     $("#dataTable").jqxDataTable(
//     {
//         pageable: true,
//         // width: $("dataTable").width(),
//         pagerButtonsCount: 10,
//         source: dataAdapter,
//         sortable: true,
//         pageable: true,
//         altRows: true,
//         filterable: true,
//         columnsResize: true,
//         pagerMode: 'advanced',
//         columns: [
//           { text: 'Destination', dataField: 'destination'},
//           { text: 'Country', dataField: 'country'}

//         ]
//     });
// });
// $(document).ready(function () {               
//     // create jqxcalendar.            
//     $("#jqxWidget").jqxCalendar({ value: new Date(2017, 7, 7), width: 220, height: 220, selectionMode: 'range' });
//     $("#jqxWidget").on('change', function (event) {
//         var selection = event.args.range;
//         $("#selection").html("<div>From: " + selection.from.toLocaleDateString() + " <br/>To: " + selection.to.toLocaleDateString() + "</div>");
//     });
     
//     var date1 = new Date();
//     date1.setFullYear(2017, 7, 7);
//     var date2 = new Date();
//     date2.setFullYear(2017, 7, 15);
//     $("#jqxWidget").jqxCalendar('setRange', date1, date2);
// });