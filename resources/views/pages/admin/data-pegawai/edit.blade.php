@extends('layouts.admin')

@section('content')
    <div class="page-heading">
        <h3>Edit Data Pegawai</h3>
    </div>
    <div class="page-content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $message)
                        <li><i class="bi bi-file-excel"></i> {{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Basic Vertical form layout section start -->
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class=" col-12">
                    <div class="card">

                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="post" enctype="multipart/form-data"
                                    action="{{ route('data-pegawai.update', $item->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="position">Jabatan</label>
                                                    <input type="text" id="position" class="form-control"
                                                        name="position" placeholder="position"
                                                        value="{{ $item->position }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Nama</label>
                                                    <input type="text" id="name" class="form-control" name="name"
                                                        placeholder="name" value="{{ $item->name }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nip">NIP</label>
                                                    <input type="text" id="nip" class="form-control" name="nip"
                                                        placeholder="nip" value="{{ $item->nip }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <fieldset class="form-group">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-select" id="status" name="status">
                                                        <option value="{{ $item->status }}">
                                                            Jangan Ubah
                                                        </option>
                                                        <option value="ADA">Ada</option>
                                                        <option value="TIDAK ADA">Tidak Ada</option>
                                                        <option value="LIBUR">Libur</option>
                                                        <option value="TUGAS BELAJAR">Tugas Belajar</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="image" class="form-label">Image</label>
                                                    <input class="form-control" type="file" id="image"
                                                        name="image">
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- // Basic Vertical form layout section end -->
    </div>
@endsection
