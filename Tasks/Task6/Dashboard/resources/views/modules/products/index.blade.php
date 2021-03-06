@extends('layout.parent')
@section('title', 'All Products')
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
    @include('includes.message')
    <div class="col-12">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Creation Date</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->code}} </td>
                        <td>{{$product->price}} EGP</td>
                        <td 
                            class=" @if($product->quantity == 0) text-danger 
                                    @elseif($product->quantity > 0 && $product->quantity <= 5 ) text-warning 
                                    @else text-success 
                                    @endif">
                            {{$product->quantity}}
                        </td>
                        <td class="text-{{$product->status ? 'success' : 'danger'}}">
                            <form action="{{route('products.change.status',$product->id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch{{$product->id}}" {{$product->status == 1 ? 'checked="checked"' : ''}}>
                                    <input type="submit"  name="status" value="{{$product->status}}" class="d-none submit">
                                    <label class="custom-control-label" for="customSwitch{{$product->id}}">{{$product->status ? 'Active' : 'Not Active'}}</label>
                                </div>
                            </form>
                        </td>
                        <td>{{$product->created_at}}</td>
                        <td>
                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-warning"> Edit </a>
                            <form action="{{route('products.destroy',$product->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"> Delete </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
     <!-- DataTables  & Plugins -->
  <script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{url('plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{url('plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{url('plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
  <script>
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,"order":false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('.custom-control-input').on('click',function(){
        $(this).next().click();
      });
      
  </script>
@endsection
