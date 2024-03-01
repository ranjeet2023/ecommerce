<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Enter Product Name </label>
                            <input type="text" name="name" id="" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ old('name') }}">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Enter Price</label>
                            <input type="number" name="price" id="" value="{{ old('price') }}"
                                class="form-control" placeholder="" aria-describedby="helpId">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Upload Image</label>
                            <input type="file" name="product_image" id="" class="form-control"
                                placeholder="" aria-describedby="helpId">
                            @error('product_image')
                                {{ $message }}
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary text-dark mx-auto d-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
