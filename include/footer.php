</body>
</html>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
   var dataTable = $('#shakowat_zaman').DataTable({
    "processing" : true,
    "serverSide" : true,
    "participation_fee" : [],
    "ajax" : {
     url:"getController.php",
     type:"POST"
    },
    drawCallback:function(settings)
    {
     $('#total_amount').html(settings.json.total);
    }
   });

    
  
 });
 
</script>