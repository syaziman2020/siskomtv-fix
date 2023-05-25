@extends('layouts.admin')

@section('content')
    <div class="page-heading">
        <h3>Data Pegawai Siskom</h3>
    </div>
    <div class="page-content">
        <!-- Table head options start -->
        <section class="section">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body d-flex align-items-end flex-column">
                                <a href="{{ route('data-pegawai.create') }}" class="btn icon icon-left btn-primary">
                                    <i class='fa fa-plus'></i>
                                    Tambah Pegawai</a>
                            </div>
                            <!-- table head dark -->
                            <div class="table-responsive">
                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <table class="table mb-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Jabatan</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @forelse ($items as $index=>$item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->position }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->nip }}</td>
                                                <td>
                                                    {{ $item->status }}</td>

                                                <td>
                                                    <img src="{{ Storage::url($item->image) }}" alt=""
                                                        style="width: 150px;fit:cover" class="img-thumbnail">
                                                </td>
                                                <td class="inline">
                                                    <a href="{{ route('data-pegawai.edit', $item->id) }}"
                                                        class="btn icon btn-primary"><i class="bi bi-pencil"></i></a>
                                                    <form action="{{ route('data-pegawai.destroy', $item->id) }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn icon btn-danger" type="submit">
                                                            <i class='fa fa-trash'></i></button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Data is empty</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Table head options end -->
    </div>
@endsection
