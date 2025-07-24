<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rantang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body id="page-top">
    @include('components.header')
    <section class="page-section portfolio" id="portfolio">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <h5 class="mb-3">Daftar Rantang</h5>

                            <form method="GET" action="{{ route('rantang.index') }}"
                                class="row g-2 mb-3 align-items-end">
                                <div class="col-md-5">
                                    <label for="search" class="form-label">Pencarian</label>
                                    <div class="input-group">
                                        <input type="text" name="search" id="search" class="form-control"
                                            value="{{ request('search') }}"
                                            placeholder="Cari kode, lokasi, pemegang, kondisi...">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="kondisi" class="form-label">Filter Kondisi</label>
                                    <select name="kondisi" id="kondisi" class="form-select">
                                        <option value="">-- Semua Kondisi --</option>
                                        @foreach ($kondisiList as $kondisi)
                                            <option value="{{ $kondisi }}" {{ request('kondisi') == $kondisi ? 'selected' : '' }}>{{ $kondisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                                    <a href="{{ route('rantang.index') }}"
                                        class="btn btn-secondary w-100 mt-2">Reset</a>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <div class="scrollable-table-container" style="height: calc(100vh - 400px); overflow-y: auto;">
                                    <table class="table table-striped table-bordered table-hover align-middle" style="width: 100%;">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Kode</th>
                                                <th scope="col">Lokasi Terakhir</th>
                                                <th scope="col">Pemegang Terakhir</th>
                                                <th scope="col">Kondisi</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rantangs as $rantang)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $rantang->kode_rantang }}</td>
                                                    <td>{{ $rantang->lokasi_terakhir }}</td>
                                                    <td>{{ $rantang->pemegang_terakhir }}</td>
                                                    <td>{{ $rantang->kondisi }}</td>
                                                    <td>
                                                        <a href="{{ route('input.index', $rantang->id) }}" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>