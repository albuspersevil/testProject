<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
<style type="text/css">
	.table.dataTable {
    width: 50%;
    margin: 0 auto;
    clear: both;
    border-collapse: separate;
    border-spacing: 0;
}


.dataTables_wrapper {
    position: relative;
    clear: both;
    *zoom: 1;
    zoom: 1;
    /* width: 55%; */
    /* margin: auto; */
    float: right;
    }
</style>
           
</head>
<body>
	<div class="container">
		<div class="row" >

			<table class="table" align="right" id="employee_table" >
		      <thead>
                <tr> 
                    <th>Employe ID</th>
                    <th>Employe Name</th>
                    <th>Employe Description</th>
                    <th>Employe Email</th>
                    <th>Employe Phone</th>
                </tr>
                </thead>
                <tbody>
          
                    </tbody>
			</table>
            <h4 align="center">Employee Info</h4>
        <form id="form" method="put">    
            {{ csrf_field() }}
           
            <div class = "container">    

                <div class = "form_group">    
                    <label>Employee Name:</label> &nbsp &nbsp
                    <input type = "text" name = "ename" id="ename" value = "" required/>    
                </div>    </br>
                <div class = "form_group">    
                    <label>Employe Description:</label>    
                    <input type = "text" name = "edes" id="edes" value = "" required />    
                </div>   
                     </br>
                  <div class = "form_group">    &nbsp &nbsp &nbsp &nbsp
                    <label>Employee Email:</label>    
                    <input type = "text" name = "email" id="email" value = "" required />    
                </div>  
                     </br>
                  <div class = "form_group">    &nbsp &nbsp &nbsp &nbsp
                    <label>Employee Phone:</label>    
                    <input type = "text" name = "ephone" id="ephone" value = "" required />    
                </div>   
                <input type = "hidden" name="rowID" id = "rowID" class="text"/>

                      <div class = "form_group">    &nbsp &nbsp &nbsp &nbsp
                     <br>
                    <input type = "submit" name = "update"  value = "update" required />    
                </div> 
            </div>    
        </form>    

		</div>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
		
   $.ajax({
        type: 'GET',
        url: 'api/getEmpdetails',
        success: function(data) {
            var $orders = $('#employee_table');
            var obj = JSON.parse(data);
            //console.log(obj);
           var employee_data = ''; //alert('1');
           var tempEmp=[];
           obj.emp_details.sort(function(a,b){
              return new Date(b.updated_at) - new Date(a.updated_at);
            });
                    console.log(obj);

          var temp = obj.emp_details;
              

           $.each(temp,function(key,value){
            
        employee_data += '<tr>';
        //$('<tr>').attr("classID", value.id);
        employee_data += '<td>' +value.id+ '</td>';
        employee_data += '<td>' +value.emp_name+ '</td>';
        employee_data += '<td>' +value.emp_description+ '</td>';
        employee_data += '<td>' +value.emp_email+ '</td>';      
        employee_data += '<td>' +value.emp_phone+ '</td>';

       employee_data += '</tr>';
    
    });
        $('#employee_table').append(employee_data);
        var table = $('#employee_table').DataTable({
            "order": []
        });
        console.log(table , 'oooooooooooo');
        
        //var order = table.order( [ 3, 'desc' ]).draw();
        $(document).on('click',"#employee_table tr",function(){

                     //console.log($(this).find('td:first').text() +'======'+ $(this).closest('td').next());
                     var table = document.getElementById('employee_table'),rIndex;
                    // console.log(rIndex , 'rowID' , this.cells);
                    document.getElementById("rowID").value = this.cells[0].innerHTML;
                      document.getElementById("ename").value = this.cells[1].innerHTML;
                          document.getElementById("edes").value = this.cells[2].innerHTML;
                          document.getElementById("email").value =this.cells[3].innerHTML;
                          document.getElementById("ephone").value = this.cells[4].innerHTML;
           });

        
}
	});
});
    $('#form').on('submit',function (e){
    e.preventDefault(); 
    //alert('1');
    var id= $('#rowID').val();
//alert(id);
$.ajax({
        type: 'put',
        url: "update/"+id,
        data:$('#form').serialize(),

        success: function(data) {
            console.log(data);
            alert('Data updated Successfully');

  },
  error:function(error){
    console.log(error);
  }
  });          
});
</script>
</body>
</html>