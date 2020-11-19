@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <a class="btn btn-md btn-success" href="{{ route('products.create') }}">Create</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <td>Product name</td>
                                            <td>Actions</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>
                                                    <a href="{{ route('products.show', ['productId' => $product->id]) }}" class="btn btn-sm btn-success">Show</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3"><div class="text-center">No data found!</div></td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        @include('partials.pagination', ['paginator' => $products])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
