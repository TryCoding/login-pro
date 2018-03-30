<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <!--dataTable-->      
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">   
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap4.min.css">   

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
  		<div class="card" style="margin-top:3%;">
		  <div class="card-header"> Featured Admin </div>
		  <div class="card-body">
		    <h5 class="card-title">Congratulation Broooo</h5>
		    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
		    <a href="<?php echo base_url();?>auth/logout" class="btn btn-primary">Logout</a>
		  </div>
		</div></br>


   <table class="table table-bordered" id="user">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>No HP</th>
      </tr>
    </thead>    
  </table>

	</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>   
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap4.min.js"></script>         


    <script type="text/javascript">

    $(document).ready(function(){
         var dataTable = $('#user').DataTable({
              "responsive":true,
              "processing":true,
              "serverSide":true,
              "order":[],
              "ajax":{
                   url:"<?php echo base_url() .'admin/Duser'; ?>",
                   type:"POST"
              },
              "columnDefs":[
                   {
                        "targets":[0, 1, 2],
                        "orderable":false,
                   },
              ],
         });
         
    });  

     </script>
  </body>
</html>