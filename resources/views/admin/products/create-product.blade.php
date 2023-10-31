@extends("layouts.admin")

@section("content")
    <main>
        <h1 class="h3 mb-3">Ürün Ekle</h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ url('/admin/urunler') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-10">
                            {{-- image --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Resim:</label>
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @endif">
                                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            {{-- name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Adı:</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @endif" value="{{ old('name') }}">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            {{-- description --}}
                            <div class="mb-3">
                                <label for="description" class="form-label">Açıklama:</label>
                                <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            {{-- price --}}
                            <div class="mb-3">
                                <label for="price" class="form-label">Fiyat:</label>
                                <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @endif" value="{{ old('price') }}">
                                @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            {{-- categories --}}
                            <div class="card">
                                <div class="card-header">Kategoriler</div>
                                <div class="card-body">
                                    @foreach ($categories as $category) 
                                        <div class="form-check">
                                            <label for="category_{{ $category->id }}" class="form-check-label">{{ $category->name }}</label>
                                            <input 
                                                type="checkbox" 
                                                name="categories[]" 
                                                id="category_{{ $category->id }}" 
                                                class="form-check-input @error('categories') is-invalid @enderror"
                                                value="{{ $category->id }}"
                                                @if(old('categories'))
                                                    @foreach (old('categories') as $c)
                                                        @if($c == $category->id) checked @endif
                                                    @endforeach
                                                @endif
                                                >
                                        </div>
                                    @endforeach
                                    @error('categories') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

@section("scripts")
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace("description");
</script>
@endsection
