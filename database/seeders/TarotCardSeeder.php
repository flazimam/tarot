<?php

namespace Database\Seeders;

use App\Models\TarotCard;
use Illuminate\Database\Seeder;

class TarotCardSeeder extends Seeder
{
    public function run(): void
    {
        // [nomor, nama, kata kunci, makna tegak, makna terbalik]
        $cards = [
            ['0', 'The Fool', 'awal baru, spontan, berani melompat', 'Kesempatan baru terbuka. Ambil langkah pertama walau belum semuanya jelas.', 'Ragu atau terlalu gegabah. Cek lagi risikonya sebelum melompat.'],
            ['I', 'The Magician', 'kemauan, kemampuan, aksi', 'Kamu sudah punya alat yang dibutuhkan. Saatnya dieksekusi.', 'Potensi belum dipakai atau energi terpencar. Fokus ke satu hal dulu.'],
            ['II', 'The High Priestess', 'intuisi, rahasia, hening', 'Dengarkan firasatmu. Ada hal yang belum terlihat dan butuh waktu.', 'Mengabaikan intuisi atau ada yang disembunyikan. Tanyakan lebih jujur.'],
            ['VI', 'The Lovers', 'pilihan, hubungan, nilai hidup', 'Keputusan penting soal hubungan atau prinsip. Pilih yang selaras dengan dirimu.', 'Tidak selaras atau pilihan yang terus ditunda. Bicarakan terus terang.'],
            ['VII', 'The Chariot', 'tekad, arah, kendali', 'Maju dengan tujuan jelas. Kendalikan dua dorongan yang saling tarik.', 'Kehilangan arah atau terlalu memaksa. Atur ulang tujuanmu.'],
            ['VIII', 'Strength', 'keberanian lembut, sabar', 'Kekuatan sejati datang dari sabar dan kasih, bukan paksaan.', 'Percaya diri sedang turun. Beri dirimu ruang untuk pulih.'],
            ['IX', 'The Hermit', 'refleksi, menyendiri, bijak', 'Waktunya menepi sebentar dan mencari jawaban dari dalam.', 'Terlalu menutup diri. Terima bantuan dari orang yang kamu percaya.'],
            ['X', 'Wheel of Fortune', 'siklus, perubahan, momentum', 'Keadaan sedang berputar. Manfaatkan momentum perubahannya.', 'Hambatan sementara. Ini satu fase, bukan akhir.'],
            ['XIII', 'Death', 'akhir, transformasi, melepas', 'Satu babak selesai supaya babak baru mulai. Bukan soal kematian.', 'Menolak berubah. Yang sudah selesai perlu dilepas.'],
            ['XVI', 'The Tower', 'gejolak, kebenaran, runtuh', 'Perubahan mendadak merobohkan yang tidak kokoh, lalu membuka ruang baru.', 'Menunda keruntuhan yang sebenarnya sudah terlihat. Hadapi lebih awal.'],
            ['XVII', 'The Star', 'harapan, pemulihan, tenang', 'Harapan kembali setelah masa berat. Istirahat dan percaya prosesnya.', 'Semangat menipis. Cari hal kecil yang memulihkanmu.'],
            ['XVIII', 'The Moon', 'ilusi, emosi, belum jelas', 'Situasi masih berkabut dan perasaan campur aduk. Jangan buru-buru memutuskan.', 'Kabut mulai terangkat. Kebenaran perlahan terlihat.'],
            ['XIX', 'The Sun', 'sukacita, kejelasan, berhasil', 'Energi positif, situasi jelas, dan hasil yang baik.', 'Optimisme meredup sementara. Terangnya masih ada, hanya tertutup.'],
        ];

        foreach ($cards as $i => [$num, $name, $kw, $up, $rev]) {
            TarotCard::create([
                'number' => $num, 'name' => $name, 'arcana' => 'major',
                'keywords' => $kw, 'upright' => $up, 'reversed' => $rev,
                'sort_order' => $i + 1,
            ]);
        }
    }
}
