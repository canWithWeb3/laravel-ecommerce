@extends("layouts.admin")

@section("content")
    <main>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">Kategoriler</h1>
            <a href="{{ url('/admin/kategoriler/ekle') }}" class="btn btn-success"><i class="fas fa-plus"></i> Ekle</a>
        </div>

        <div class="table-responsive">
            <table class="datatable table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Adı</th>
                        <th class="th-buttons-2" data-orderable="false"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ url('/admin/kategoriler/'. $category->id .'/guncelle') }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Güncelle</a>
                                <button type="button" data-action="{{ '/admin/kategoriler/'.$category->id }}" class="delete-btn btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Kaldır</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection