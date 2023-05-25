@extends('layouts.admin')

@section('content')
    <div class="page-heading">
        <h3>Status Ruang Dosen</h3>
    </div>
    <div class="page-content">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <!-- Basic Vertical form layout section start -->
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class=" col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="post"
                                    action="{{ route('ruang-dosen.update', $item->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="{{ $item->status }}">
                                                    {{ $item->status }}
                                                </option>
                                                <option value="BUKA">BUKA</option>
                                                <option value="TUTUP">TUTUP</option>
                                                <option value="RAPAT">RAPAT</option>
                                                <option value="LIBUR">LIBUR</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-12 d-flex justify-content-start">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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
