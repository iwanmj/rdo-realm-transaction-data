<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RDO Realm Transaction</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link href="{{ URL::asset('assets/css/custom.css') }}" rel="stylesheet">
    
	<style type="text/css">
		.hidden{
			display: none !important;
		}
		.card-gap{
			margin-bottom: 5px;
		}
	</style>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="{{ asset('assets/css/bootstrap/dist/js/bootstrap.min.js') }}" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('assets/js/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(function(){
            $('#listTables').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true,
                'order'		  : [[1, 'asc']],
                "columnDefs": [ {
                    "targets": 0,
                    "orderable": false
                } ],
            });
        })
    </script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
</html>


</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Realm Transaction</a>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
        <li><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="active"><a href="{{ url('/transaction') }}">Store</a></li>
        </ul>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">List Transaction</h1>

        <div class="table-responsive">
        <table class="table table-striped table-sm" id="listTables">
          <thead>
            <tr>
              <!-- <th scope="col">#</th> -->
              <th scope="col">Store Name</th>
              <th scope="col">Date</th>
              <th scope="col">Hour</th>
              <th scope="col">Total Transaction</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dataTrans as $index => $trans)
            
            <tr>
                <!-- <td></td> -->
                <td>{{$trans->store_name}}</td>
                <td>{{$trans->date}}</td>
                <td>{{$trans->hour}}</td>
                <td>{{$trans->total}}</td>
            </tr>

            @endforeach
          </tbody>
        </table>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
</html>