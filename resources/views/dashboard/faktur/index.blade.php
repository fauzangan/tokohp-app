@extends('dashboard.layouts.main')
@section('container')
<div id="layoutSidenav_content">
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Faktur List</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <div class="table-responsive col-lg-12">
            <a href="/dashboard/invoices/recycle" class="btn btn-danger mb-3"><i class="fas fa-trash"></i> Deleted Faktur</a>
            <div class="card mb-4">
                <div class="card-header">All Faktur</div>
                <div class="card-body">
                    <table class="table table-bordered table-sm" id="invoice-table">
                        <thead>
                            <tr>
                            <th scope="col"># </th>
                            <th scope="col">No. Invoice</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">No Hp Pembeli</th>
                            <th scope="col">Tanggal Pembelian</th>
                            <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fakturs as $faktur)
                            <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $faktur->id }}</td>
                            <td>{{ $faktur->nama_pembeli }}</td>
                            <td>{{ $faktur->nohp_pembeli }}</td>
                            <td>{{ $faktur->created_at->toDateString() }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#detail{{ $faktur->id }}" class="btn btn-warning mx-1">Detail</a>
                                <form action="/dashboard/invoices/{{ $faktur->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Apakah kamu yakin?')">Delete</button>
                                </form>
                            </td>
                            </tr>
                            {{-- Modal --}}
                            {{-- @include('dashboard.faktur.modal') --}}
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/datatables.min.js"></script>
<script>
    $('#invoice-table').DataTable({});
</script>
</main>
    @include('dashboard.layouts.footer')
</div>
@endsection