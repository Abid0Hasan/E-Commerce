@extends('admin.app')
@section('title') Order @endsection
@section('content')

    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Order
                            <span class="badge bg-blue"> {{ $orders->count() }}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>

                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                @foreach( $orders as $key=>$order)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->product->name }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->price }}</td>
                                        <th>
                                            @if($order->status == true)
                                                <span class="label label-info">Confirmed</span>
                                            @else
                                                <span class="label label-danger">not Confirmed yet</span>
                                            @endif

                                        </th>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->updated_at }}</td>
                                        <td class="text-center">
                                            @if($order->stutas == false)
                                                <form id="status-form-{{ $order->id }}" method="POST" action="{{route( 'admin.order.status', $order->id) }}" style="display: none;">
                                                    @csrf
                                                </form>
                                                <button type="button" class="btn btn-info" onclick="if(confirm('Are you verify this request by phone?')){
                                                    event.preventDefault();
                                                    document.getElementById('status-form-{{ $order->id }}').submit();
                                                    }else{
                                                    event.preventDefault();
                                                    }
                                                    "><i class="material-icons">done</i></button>
                                            @endif

                                            <button class="btn btn-danger waves-effect" type="button" onclick="deleteOrder( {{ $order->id }} )">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            <form id="delete-form-{{ $order->id }}" action="{{ route('admin.order.destroy', $order->id) }}" method="POST" style="display: none">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
        function deleteOrder(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>



@endsection
