@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Displaying <b><i>{{ $category->name }}</i></b> category</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $category->name }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><div class="text-center">Products</div></td>
                                </tr>
                                @forelse($category->products as $product)
                                    <tr>
                                        <td>
                                            Product name
                                        </td>
                                        <td>
                                            <a href="{{ route('products.show', ['productId' => $product->id]) }}">
                                                {{ $product->name }}
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2"><div class="text-center">No products assigned to category!</div></td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
