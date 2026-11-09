<nav class="navbar navbar-expand-lg sticky-top nav-tarot">
    <div class="container">
        <a class="navbar-brand brand" href="#top">{{ config('tarot.brand') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Buka menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                <li class="nav-item"><a class="nav-link" href="#tentang">Tentang tarot</a></li>
                <li class="nav-item"><a class="nav-link" href="#pricelist">Pricelist</a></li>
                <li class="nav-item"><a class="nav-link" href="#cara-pesan">Cara pesan</a></li>
                <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                <li class="nav-item mt-2 mt-lg-0"><a class="btn btn-gold btn-sm" href="{{ $telegram }}" target="_blank" rel="noopener">Chat Telegram</a></li>
            </ul>
        </div>
    </div>
</nav>
