<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Tutorial Example</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 9 CRUD Example Tutorial</h2>
                </div>
                <div class="pull-right mb-2">
                     <a class="btn btn-success" href="{{ route('product.create') }}"> Create product</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
                     <div class="col px-1">
                                <input type="search" class="typeahead form-control w-100" placeholder="Search..."
                                                   id="search" >
                     </div>
    <script type="text/javascript">
   var path = "{{ route('autocomplete') }}";
  
    $('#search').typeahead({
            source: function (query, process) {
                return $.get(path, {
                    query: query
                }, function (data) {
                    
                    
                      var res='';
            $.each (data, function (key, value) {
            res +=
            '<tr>'+
                '<td>'+value.id+'</td>'+
                '<td>'+value.title+'</td>'+
                '<td>'+value.author+'</td>'+
                '<td>'+value.created_at+'</td>'+
                
           '</tr>';

   });
 $('tbody').html(res);
                });
            }
        });
</script>                                           
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Create at</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                    @if(count($data) > 0)
                @foreach ($data as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->title }}</td>
                        <td>{{ $company->author }}</td>
                        <td>{{ $company->created_at }}</td>
                        <td>
                            <form action="{{ route('product.destroy',$company->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('product.edit',$company->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        
                    </tr>
                    @endforeach
                    @else
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
            @endif
        </table>
        {!! $data->links() !!}
            </tbody>
        </table>
        
    </div>
</body>
</html>