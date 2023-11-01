@extends("layouts.admin")

@section("content")
    <main>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">Ürünler</h1>
            <a href="{{ url('/admin/urunler/ekle') }}" class="btn btn-success"><i class="fas fa-plus"></i> Ekle</a>
        </div>

        <div class="table-responsive">
            <table class="datatable table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="td-image">Resim</th>
                        <th>Adı</th>
                        <th>Fiyat</th>
                        <th>Kategoriler</th>
                        <th class="th-buttons-2" data-orderable="false"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="p-0"><img src="{{ $product->image }}" alt="" class="img-fluid"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                @if (isset($product->categories) && count($product->categories) > 0)
                                    <ul>
                                        @foreach ($product->categories as $category)
                                            <li>{{ $category->name }}</li>                                        
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('/admin/urunler/'. $product->id .'/guncelle') }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Güncelle</a>
                                <button type="button" data-action="{{ '/admin/urunler/'.$product->id }}" class="delete-btn btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Kaldır</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection