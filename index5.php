
<!DOCTYPE html>
<html lang="en">
 <head>
  <title>Rexx Coding Test Project</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container box">
   <h3 align="center">Events List Table</h3>
   <br />
   <div class="table-responsive">
    <table id="order_data" class="table table-bordered table-striped">
     <thead>
      <tr>
        <th>P-ID</th>
        <th>E-Name</th>
        <th>E-Mail</th>
        <th>EV-ID</th>
        <th>EV-Name</th>
        <th>P-Fee</th>
        <th>EV-Date</th>
        <th>Version</th>
      </tr>
     </thead>
     <tbody></tbody>
     <tfoot>
      <tr>
       <th colspan="5">Total</th>
       <th colspan="3" id="total_amounts"></th>
      </tr>
     </tfoot>
    </table>
    <br />
    <br />
    <br />
   </div>
  </div>
 </body>
</html>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
   var dataTable = $('#order_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "participation_fee" : [],
    "ajax" : {
     url:"fetch.php",
     type:"POST"
    },
    drawCallback:function(settings)
    {
     $('#total_amounts').html(settings.json.total);
    }
   });

    
  
 });
 
</script>