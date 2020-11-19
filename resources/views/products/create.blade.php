@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create product</div>
                    <div class="card-body">
                        <form class="container" method="POST" action="{{ route('products.store') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="name">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required/>
                                @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="price">Price</label>
                                <input
                                    type="number"
                                    step="0.01"
                                    min="0.01"
                                    class="form-control"
                                    name="price"
                                    value="{{ old('price') }}"
                                    required/>
                                @error('price')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="quantity">Quantity</label>
                                <input
                                    type="number"
                                    step="1"
                                    min="1"
                                    class="form-control"
                                    name="quantity"
                                    value="{{ old('quantity') }}"
                                    required/>
                                @error('quantity')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="description">Description</label>
                                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="category_id">Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="" {{ !$errors->has('category_id') ? 'selected' : '' }}>Choose category</option>
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}"
                                            {{ old('category_id') === $category->id ? 'selected' : '' }}
                                        >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-md btn-success" type="submit">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
