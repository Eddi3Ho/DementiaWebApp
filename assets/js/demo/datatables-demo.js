// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();

  $('#chat_table').DataTable({
    "lengthMenu": [ 5, 10, 25, 50],
    // "bInfo": false, // show x of y 
    //"paging": false,
    // "ordering": false,
    // "columnDefs": [{
    //   "width": "5%",
    //   "targets": [0]
    // }]
  });
});
