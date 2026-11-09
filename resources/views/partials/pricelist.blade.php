<section class="section section-alt" id="pricelist">
        <div class="container">
            <h2 class="section-title">Pricelist</h2>
            <p class="section-lead">Semua pembacaan dikirim lewat Telegram. Pembayaran dibahas langsung di chat, website ini tidak memproses pembayaran.</p>

            @if ($services->isEmpty())
                <p class="text-muted-soft">Pricelist belum diisi. Jalankan <code>php artisan db:seed</code> atau tambahkan data ke tabel <code>services</code>.</p>
            @endif

            <div class="row g-4 justify-content-center">
                @foreach ($services as $s)
                    <div class="col-sm-6 col-lg-3">
                        <x-price-card :service="$s" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
