
<!doctype html>
<html>   
<head>    




<script type="text/javascript" src="{{asset('js/FlexiblePagination.js')}}"></script>


        <title>Registration Form</title>    
        <link rel = "stylesheet" type = "text/css" href = "{{ asset('css/styles.css') }}" /> 
         <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}" ></script>
        <script type="text/javascript" src="{{ asset('js/main.js')}}" ></script>
        
    </head>    
    <body>    
          
        <h2>One-Page Display Data with User Click On Listing Row And Functionality For Search User</h2>    

<form action="{{url('/search')}}" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" value="" class="btn btn-default">
                <span class="glyphicon glyphicon-search">search</span>
            </button>
        </span>
    </div>
</form> 


<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
   
    <table class="table table-striped" border="6">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr>
                <td>{{$user->emp_name}}</td>
                <td>{{$user->emp_email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @elseif(isset($message))
    <p>{{ $message}}</p>
    @endif
</div>

    <div id="content">
        <table id="employee_table" align="right" border="6" cellspacing="10" cellpadding="10">
  <tr>
                <td>Employee ID</td>&nbsp&nbsp
                <td>Employee Name</td>&nbsp&nbsp
                <td>Employee Description</td>
            </tr>
        </table>
        <div id="pagingControls"></div>
        <div id="showingInfo" class="well" style="margin-top:20px"></div>
    </div>
        <form name = "form1" action="modified.php" method = "post" enctype = "multipart/form-data" >    
            <div class = "container">    

                <div class = "form_group">    
                    <label>Employee Name:</label>    
                    <input type = "text" name = "ename" id="ename" value = "" required/>    
                </div>    
                <div class = "form_group">    
                    <label>Employee Description:</label>    
                    <input type = "text" name = "" id="edes" value = "" required />    
                </div>    
                  
            </div>    
        </form>    

    </body>    
</html>    
