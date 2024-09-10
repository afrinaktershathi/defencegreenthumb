@extends('layout.backendlayout')

@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Delivery Man Approval Lists</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone / Email</th>
                        <th></th>
                    </tr>
                    @forelse ($users as $key=>$user)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone ?? $user->email }}</td>
                        <td class="text-end">
                            <div class="btn-group  ">
                                <a href="{{ route('employee.approve', $user->id) }}"
                                    class="btn btn-sm btn-primary">Approve</a>
                                <a href="{{ route('employee.denied', $user->id) }}"
                                    class="btn btn-sm btn-danger">Denied</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No Pending Delivery Man</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>

    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h4>Low On Stock</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th class="text-center">Current Stock</th>

                    </tr>
                    @forelse ($products as $key=>$product)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $product->product->name }}</td>
                        <td class="text-center">{{ $product->stock }}</td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Every Product is on Stock!</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>

    </div>
</div>


@endsection