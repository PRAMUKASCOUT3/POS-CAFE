@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <a href="{{ route('pengguna.print') }}" class="btn btn-danger mb-3">Unduh PDF <i class="fas fa-file-pdf"></i></a>
            <a href="{{ route('user.excel') }}" class="btn btn-success mb-3">Unduh Excel <i class="fas fa-file-excel"></i></a>
            <h5 class="card-title">Laporan Pengguna / Kasir</h5>
            <table id="example" class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kasir <i class="fas fa-code"></i></th>
                        <th>Nama Pengguna / Kasir <i class="fas fa-users"></i></th>
                        <th>Email <i class="fas fa-envelope"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td class="text-bold-500">{{ $index + 1 }}</td>
                            <td>{{ $user->code }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
        #example {
            font-family: 'Inter', 'Segoe UI', Tahoma, Arial, sans-serif;
            font-size: 14.5px;
            color: #212529;
        }

        #example thead th {
            font-weight: 600;
            font-size: 15px;
        }

        #example tbody td {
            font-weight: 500;
        }

        #example tfoot td {
            font-weight: 700 !important;
            /* paksa bold */
            color: #198754;
            /* hijau tegas */
        }

        #example tfoot tr {
            background-color: #f8fdf9;
            /* biar nggak pucat */
        }
    </style>
@endsection