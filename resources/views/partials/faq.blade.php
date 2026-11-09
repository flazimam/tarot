<section class="section section-alt" id="faq">
        <div class="container">
            <h2 class="section-title">Pertanyaan yang sering muncul</h2>
            <div class="accordion faq" id="faqList">
                @foreach ([
                    ['Apakah hasilnya pasti terjadi?', 'Tidak. Tarot menggambarkan kecenderungan dan sudut pandang, bukan kepastian. Keputusan akhirnya tetap di tanganmu.'],
                    ['Boleh tanya soal kesehatan atau hukum?', 'Untuk dua hal itu, tetap konsultasi ke dokter atau pengacara. Tarot hanya bisa jadi bahan refleksi tambahan.'],
                    ['Pertanyaan seperti apa yang cocok?', 'Pertanyaan terbuka, misalnya "apa yang perlu aku perhatikan di hubungan ini?". Pertanyaan ya atau tidak biasanya kurang kaya jawabannya.'],
                    ['Berapa lama hasilnya jadi?', 'Tergantung paket, kira-kira 10 sampai 60 menit setelah detail disepakati. Estimasi tiap paket ada di pricelist.'],
                ] as $n => [$q, $a])
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button {{ $n ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#f{{ $n }}" aria-expanded="{{ $n ? 'false' : 'true' }}">{{ $q }}</button>
                        </h3>
                        <div id="f{{ $n }}" class="accordion-collapse collapse {{ $n ? '' : 'show' }}" data-bs-parent="#faqList">
                            <div class="accordion-body">{{ $a }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
