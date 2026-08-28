<form action="{{ route('pemasukans.update', $pemasukan->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <label>Tanggal</label>

    <input type="date"
           name="tanggal"
           class="form-control mb-3"
           value="{{ $pemasukan->tanggal }}"
           required>

    <label>Jumlah</label>

    <input type="number"
           name="jumlah"
           class="form-control mb-3"
           value="{{ $pemasukan->jumlah }}"
           required>

    <label>Keterangan</label>

    <textarea name="keterangan"
              class="form-control mb-3">{{ $pemasukan->keterangan }}</textarea>

    <a href="{{ route('administrasi.index') }}"
       class="btn btn-secondary">
        Kembali
    </a>

    <button class="btn btn-success">
        Update
    </button>

</form>