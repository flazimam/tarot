@props(['service'])
<article class="price-card {{ $service->is_featured ? 'is-featured' : '' }}">
                            @if ($service->is_featured)
                                <span class="price-badge">Paling sering dipilih</span>
                            @endif
                            <h3 class="price-name">{{ $service->name }}</h3>
                            <p class="price-tagline">{{ $service->tagline }}</p>
                            <p class="price-amount">{{ $service->priceFormatted() }}</p>
                            <ul class="price-meta">
                                <li>{{ $service->cards_count }} kartu</li>
                                @if ($service->duration)<li>{{ $service->duration }}</li>@endif
                                <li>Hasil via Telegram</li>
                            </ul>
                            <a class="btn {{ $service->is_featured ? 'btn-gold' : 'btn-ghost' }} w-100" href="{{ $service->telegramUrl() }}" target="_blank" rel="noopener">Pesan di Telegram</a>
                        </article>
