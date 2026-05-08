<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style>
    table{
        border: 1px solid black;
        margin: auto;
        width: 800px;
    }
    th{
        background: skyblue;
        color: blanchedalmond;
        padding: 10px ;
        margin: 10px;
    }
    td{
        color: blanchedalmond;
        padding: 10px;
    }
   </style>
  </head>
  <body>
    @include('admin.header')
  
@include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
      <h1>All Food Items</h1>   
<div>
    <table>
        <tr>
           <th>
Food Title
           </th> 
           <th>
            Details
           </th> 
           <th>
            Price
           </th> 
           <th>
            Image
           </th> 
           <th>Delete</th>
        </tr>
        @foreach($data as $data)
        <tr>
            <td>{{ $data->title }}</td>
            <td>{{ $data->details }}</td>
            <td>${{ $data->price }}</td>
            <td><img src="{{ asset('food_img/' . $data->image) }}" alt="{{ $data->title }}" width="100"></td>
            <td>
                
            <a href="{{ route('admin.delete_food', $data->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this food item?')">Delete</a>
        </td>
        <td>
            <a class="btn btn-warning" href="{{ url('update_food', $data->id) }}">Update</a>
        </td>
        </tr>
        @endforeach
        </tr>
    </table>
</div>
        </div> 
      </div>
    </div>
    <!-- JavaScript files-->


    @include('admin.js')
  </body>
</html>