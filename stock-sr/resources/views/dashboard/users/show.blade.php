@extends('dashboard.layouts.main')

@section('container')
<article>
      <div class="row my-5">
            <div class="col">
                  <div> 
                        <h1> <strong> Profil Detail </strong> </h1>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <tbody>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Username</th>
                                        <td>{{ $user->username }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Email</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Role</th>
                                        <?php $rule = ($user->is_admin == 1) ? 'Administrator' : 'Admin'; ?>
                                        <td><?= $rule; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Password</th>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 mb-3">
                              <a href="/dashboard/users" class="btn btn-success"> <i class="bi bi-arrow-left me-2"></i>Back to all Admin</a>
                              <a href="/dashboard/users/{{ $user->id }}/edit" class="btn btn-warning mx-1 px-3"><i class="bi bi-pencil-square text-white me-2"></i>Edit</a>
                              <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger " onclick="return confirm('Hapus ini akan menghapus semua Post dan Stok yang telah dibuat, Yakin?')"><i class="bi bi-trash-fill me-2"></i>Delete</button>
                              </form>
                        </div>
                  </div>
            </div>
      </div>
</article>
@endsection