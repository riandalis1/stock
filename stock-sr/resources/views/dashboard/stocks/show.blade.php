@extends('dashboard.layouts.main')

@section('container')
<article>
      <div class="row my-5">
            <div class="col">
                  <div>
                        <div class="mt-4 mb-3">
                              <a href="/dashboard/stocks" class="btn btn-success"> <i class="bi bi-arrow-left me-2"></i>Back to all product stocks</a>
                              <a href="/dashboard/stocks/{{ $stock->id }}/edit" class="btn btn-warning mx-1 px-3"><i class="bi bi-pencil-square text-white me-2"></i>Edit</a>
                              <form action="/dashboard/stocks/{{ $stock->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger " onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill me-2"></i>Delete</button>
                              </form>
                        </div>

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <tbody>
                                            <tr>
                                                <th scope="col">Nama Barang</th>
                                                <td class="fw-bold">{{ $stock->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Harga Jual</th>
                                                <td>{{ $stock->harga_jual }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Harga Beli</th>
                                                <td>{{ $stock->harga_beli }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Diskon Beli</th>
                                                <td>{{ $stock->diskon_beli }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Category</th>
                                                <td>{{ $stock->category->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Admin</th>
                                                <td>{{ $stock->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Status</th>
                                                <td>{{ $stock->status }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Pembeli</th>
                                                <td>{{ $stock->pembeli }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                  </div>
            </div>
      </div>
</article>
@endsection