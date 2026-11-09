<header class="hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h1 class="display-title">Lagi bingung? Tarik satu kartu dulu.</h1>
                    <p class="lead-text">Pilih satu dari tiga kartu di samping untuk mencicipi seperti apa pembacaan tarot. Kalau mau dibaca lengkap sesuai pertanyaanmu, pesan lewat Telegram.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <a class="btn btn-gold" href="{{ $telegram }}" target="_blank" rel="noopener">Chat di Telegram</a>
                        <a class="btn btn-ghost" href="#pricelist">Lihat pricelist</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="draw">
                        <p class="draw-hint" id="drawHint">Tarik napas, pikirkan satu pertanyaan, lalu pilih kartu.</p>
                        <div class="deck" id="deck">
                            @for ($i = 1; $i <= 3; $i++)
                                <button type="button" class="tcard" aria-label="Kartu {{ $i }}, belum dibuka">
                                    <span class="tcard-inner">
                                        <span class="tcard-back"></span>
                                        <span class="tcard-front">
                                            <span class="tcard-face">
                                                <span class="tcard-num"></span>
                                                <span class="tcard-name"></span>
                                            </span>
                                        </span>
                                    </span>
                                </button>
                            @endfor
                        </div>
                        <div class="reading" id="reading" hidden aria-live="polite">
                            <h2 class="reading-title" id="rTitle"></h2>
                            <p class="reading-kw" id="rKw"></p>
                            <p class="reading-text" id="rText"></p>
                            <div class="d-flex flex-wrap gap-2 align-items-center">
                                <a class="btn btn-gold btn-sm" href="{{ $telegram }}" target="_blank" rel="noopener">Minta dibaca lengkap</a>
                                <button type="button" class="btn btn-ghost btn-sm" id="reset">Kocok ulang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
