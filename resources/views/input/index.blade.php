<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Rantang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    @include('components.header')
    <section class="bagian-pertama">
        <div class="container mt-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">{{ $rantang ? 'Edit' : 'Tambah' }} Rantang</h5>
                </div>
                <div class="card-body" style="padding-bottom:50px">
                    <form action="{{ route('rantang.update', $rantang->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="mb-3">
                            <label for="kode_rantang" class="form-label">Kode Rantang</label>
                            <input type="text" name="kode_rantang" id="kode_rantang" class="form-control"
                                value="{{ old('kode_rantang', $rantang ? $rantang->kode_rantang : '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pilih Lokasi</label>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="lokasi_type" id="lokasi_dapur"
                                        value="dapur" {{ old('lokasi_type', $rantang ? ($rantang->lokasi_terakhir == 'Dapur' ? 'dapur' : 'lain') : '') == 'dapur' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="lokasi_dapur">Dapur</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="lokasi_type" id="lokasi_lain"
                                        value="lain" {{ old('lokasi_type', $rantang ? ($rantang->lokasi_terakhir == 'Dapur' ? 'dapur' : 'lain') : '') == 'lain' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="lokasi_lain">Lokasi Lain</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3" id="lokasi_input_container" style="display: none;">
                            <label for="lokasi_terakhir" class="form-label">Lokasi Lain</label>
                            <input type="text" name="lokasi_terakhir" id="lokasi_terakhir" class="form-control"
                                value="{{ old('lokasi_terakhir', $rantang ? ($rantang->lokasi_terakhir != 'Dapur' ? $rantang->lokasi_terakhir : '') : '') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="pemegang_terakhir" class="form-label">Pemegang Terakhir</label>
                            <select name="pemegang_terakhir" id="pemegang_terakhir" class="form-control" required>
                                <option value="">-- Pilih Pegawai --</option>
                                @for($i = 1; $i <= 7; $i++)
                                    <option value="Pegawai {{ $i }}" {{ old('pemegang_terakhir', $rantang ? $rantang->pemegang_terakhir : '') == "Pegawai {$i}" ? 'selected' : '' }}>
                                        Pegawai {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="kondisi" class="form-label">Kondisi</label>
                            <select name="kondisi" id="kondisi" class="form-control" required>
                                <option value="">-- Pilih Kondisi --</option>
                                <option value="Baik" {{ old('kondisi', $rantang ? $rantang->kondisi : '') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Rusak" {{ old('kondisi', $rantang ? $rantang->kondisi : '') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                <option value="Perbaikan" {{ old('kondisi', $rantang ? $rantang->kondisi : '') == 'Perbaikan' ? 'selected' : '' }}>Perbaikan</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('rantang.index') }}" class="btn btn-secondary me-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('/public/js/location-selection.js') }}"></script>
</body>
</section>


</html>