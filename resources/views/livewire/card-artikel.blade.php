<div>
    @foreach ($art as $data)
        <div class="card border-info">
            <div class="card-header bg-info text-white justify-content-center d-flex">
                Artikel Terbaru
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $data->judul }}</h5>
                <p class="card-text">{{ $data->deskripsi }}</p>
            </div>
        </div>
    @endforeach
</div>