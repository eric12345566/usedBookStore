$(document).ready(function() {
    var table = $('#myTable').DataTable(
      {
        "processing": true,
        "serverSide": true,
        "ajax": "./API/server_processing.php"
      }
    );

    $('#myTable tbody').on('click', 'tr', function () {
        var data = table.row(this).data();
        alert( 'You clicked on '+data[0]+'\'s row' );
        // document.location.href="http://" + location.hostname + "/ub/src" + "/backboard/index.php";
    } );
} );
