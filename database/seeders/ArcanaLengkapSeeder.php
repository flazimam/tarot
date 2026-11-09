<?php

namespace Database\Seeders;

use App\Models\TarotCard;
use Illuminate\Database\Seeder;

/**
 * Melengkapi deck jadi 78 kartu: 9 Major Arcana yang belum ada + 56 Minor Arcana.
 * Aman dijalankan berulang (updateOrCreate berdasarkan nama kartu).
 *
 * Jalankan sendiri : php artisan db:seed --class=ArcanaLengkapSeeder
 */
class ArcanaLengkapSeeder extends Seeder
{
    public function run(): void
    {
        $this->majorTambahan();
        $this->minor();
    }

    private function majorTambahan(): void
    {
        // [nomor, nama, kata kunci, makna tegak, makna terbalik]
        $rows = [
            ['III', 'The Empress', 'kelimpahan, kasih, kreativitas', 'Masa subur dan penuh kasih. Rawat apa yang sedang tumbuh.', 'Terlalu sibuk mengurus orang lain atau kreativitas buntu. Rawat dirimu dulu.'],
            ['IV', 'The Emperor', 'struktur, otoritas, stabil', 'Butuh aturan dan struktur. Pimpin dengan tegas dan adil.', 'Terlalu kaku atau kurang disiplin. Cari keseimbangan.'],
            ['V', 'The Hierophant', 'tradisi, bimbingan, nilai', 'Belajar dari guru atau tradisi. Ikuti nilai yang kamu yakini.', 'Menentang aturan atau terjebak kebiasaan. Cari jalanmu sendiri.'],
            ['XI', 'Justice', 'keadilan, kebenaran, sebab akibat', 'Keputusan adil dan konsekuensi sesuai perbuatan. Bersikaplah jujur.', 'Ketidakadilan atau menghindari tanggung jawab. Hadapi akibatnya.'],
            ['XII', 'The Hanged Man', 'jeda, sudut pandang baru, pasrah', 'Berhenti sejenak dan lihat dari sudut lain. Tidak semua harus dipaksa.', 'Menunda tanpa alasan atau berkorban sia-sia. Ambil keputusan.'],
            ['XIV', 'Temperance', 'keseimbangan, sabar, harmoni', 'Cari titik tengah dengan sabar. Perlahan tapi selaras.', 'Tidak seimbang atau berlebihan. Atur ulang ritmemu.'],
            ['XV', 'The Devil', 'keterikatan, godaan, kebiasaan', 'Ada hal yang mengikatmu, sering kali kuncinya ada di tanganmu sendiri. Sadari polanya.', 'Mulai lepas dari belenggu. Teruskan.'],
            ['XX', 'Judgement', 'panggilan, evaluasi, bangkit', 'Saatnya menilai ulang dan bangkit. Dengarkan panggilan batinmu.', 'Menyangkal diri atau ragu. Maafkan dan lanjutkan.'],
            ['XXI', 'The World', 'tuntas, utuh, pencapaian', 'Satu siklus selesai dengan utuh. Rayakan pencapaianmu.', 'Hampir selesai tapi ada yang tertinggal. Tuntaskan.'],
        ];

        foreach ($rows as $i => [$num, $name, $kw, $up, $rev]) {
            TarotCard::updateOrCreate(['name' => $name], [
                'number' => $num, 'arcana' => 'major', 'keywords' => $kw,
                'upright' => $up, 'reversed' => $rev, 'sort_order' => 20 + $i,
            ]);
        }
    }

    private function minor(): void
    {
        $ranks = [
            ['Ace', 'A'], ['Two', '2'], ['Three', '3'], ['Four', '4'], ['Five', '5'],
            ['Six', '6'], ['Seven', '7'], ['Eight', '8'], ['Nine', '9'], ['Ten', '10'],
            ['Page', 'Page'], ['Knight', 'Knight'], ['Queen', 'Queen'], ['King', 'King'],
        ];

        // Tiap suit: 14 baris [kata kunci, makna tegak, makna terbalik], urut Ace sampai King
        $suits = [
            'Wands' => [
                ['ide baru, semangat, awal kreatif', 'Percikan ide dan energi baru. Mulai proyek yang membuatmu bersemangat.', 'Semangat belum menyala atau ide tertahan. Cari pemicunya dulu.'],
                ['rencana, pilihan, melihat jauh', 'Kamu di persimpangan rencana. Tentukan arah sebelum melangkah lebih jauh.', 'Takut keluar dari zona nyaman atau rencana mentok. Berani ambil keputusan.'],
                ['ekspansi, menunggu hasil, peluang', 'Usahamu mulai berbuah dan peluang meluas. Hasilnya sedang menuju padamu.', 'Hasil tertunda atau rencana meleset. Cek lagi strategimu.'],
                ['perayaan, stabilitas, rumah', 'Ada alasan untuk bersyukur dan merayakan. Fondasi yang kamu bangun kokoh.', 'Rasa belum aman atau perayaan batal. Perkuat dasarnya dulu.'],
                ['persaingan, konflik, adu pendapat', 'Banyak benturan ide atau persaingan. Jaga agar tetap sehat dan terarah.', 'Konflik mereda atau dihindari. Selesaikan, jangan dipendam.'],
                ['kemenangan, pengakuan, percaya diri', 'Kerja kerasmu diakui. Nikmati kemenangan tanpa lengah.', 'Pengakuan belum datang atau terlalu haus pujian. Fokus ke prosesnya.'],
                ['bertahan, membela posisi, berani', 'Kamu perlu mempertahankan pendirian. Tetap berdiri meski ditekan.', 'Kewalahan dan ingin menyerah. Pilih pertempuran yang penting saja.'],
                ['gerak cepat, kabar, momentum', 'Semuanya bergerak cepat. Segera tanggapi kabar dan kesempatan.', 'Terhambat atau terlalu terburu-buru. Atur ritmenya.'],
                ['tangguh, hampir sampai, waspada', 'Kamu lelah tapi hampir sampai. Bertahan sedikit lagi.', 'Kelelahan atau terlalu defensif. Izinkan dirimu istirahat.'],
                ['beban, tanggung jawab, kelelahan', 'Kamu memikul terlalu banyak. Delegasikan atau lepaskan sebagian.', 'Beban mulai terlepas atau malah makin berat. Minta bantuan.'],
                ['penjelajah, ide segar, antusias', 'Kabar atau dorongan baru untuk mencoba. Rasa penasaran itu modal bagus.', 'Antusias tanpa arah. Selesaikan satu hal sebelum pindah.'],
                ['bergerak, berani, impulsif', 'Energi besar dan aksi cepat. Arahkan supaya tidak sembrono.', 'Terburu-buru atau mudah bosan. Pelankan langkah.'],
                ['karismatik, percaya diri, hangat', 'Pancarkan percaya diri dan kehangatan. Kamu menginspirasi orang sekitar.', 'Cemburu atau mudah tersulut. Kembali ke tenang.'],
                ['pemimpin, visi, berani memutuskan', 'Memimpin dengan visi yang jelas. Ambil tanggung jawab dengan tenang.', 'Terlalu mengatur atau gegabah. Dengarkan masukan.'],
            ],
            'Cups' => [
                ['perasaan baru, cinta, kasih', 'Hati terbuka untuk perasaan baru. Terima kasih sayang dengan tulus.', 'Emosi tertahan atau hati tertutup. Beri ruang untuk merasa.'],
                ['ikatan, saling hargai, kemitraan', 'Hubungan seimbang dan saling menghargai. Ada koneksi yang tulus.', 'Hubungan timpang atau salah paham. Bicarakan terbuka.'],
                ['persahabatan, perayaan, komunitas', 'Waktunya berbagi bahagia bersama orang terdekat.', 'Lingkaran sosial renggang atau terlalu berlebihan. Pilih yang tulus.'],
                ['bosan, merenung, menolak tawaran', 'Kamu merasa jenuh dan melewatkan tawaran. Lihat lagi apa yang ada di depanmu.', 'Mulai terbuka pada peluang baru. Saatnya keluar dari kebosanan.'],
                ['kehilangan, menyesal, melihat yang tersisa', 'Sedih atas yang hilang itu wajar. Jangan lupa yang masih tersisa.', 'Mulai menerima dan melangkah. Luka perlahan pulih.'],
                ['nostalgia, kenangan, kebaikan', 'Kenangan lama atau orang dari masa lalu muncul. Kebaikan sederhana berarti besar.', 'Terjebak di masa lalu. Hiduplah di hari ini.'],
                ['banyak pilihan, angan-angan, ilusi', 'Pilihan banyak dan menggoda. Pisahkan angan dari yang nyata.', 'Kembali realistis dan mulai memilih. Fokus ke satu.'],
                ['meninggalkan, mencari makna, melepas', 'Kamu perlu pergi dari yang tak lagi memuaskan, demi hal yang lebih bermakna.', 'Ragu pergi atau kabur dari masalah. Jujur pada alasanmu.'],
                ['puas, terkabul, syukur', 'Keinginanmu terwujud. Nikmati dan syukuri.', 'Puas yang semu atau serakah. Cari kepuasan yang sungguhan.'],
                ['keluarga, harmoni, bahagia utuh', 'Kebahagiaan dan keharmonisan bersama orang tercinta.', 'Keluarga atau rumah tangga kurang selaras. Perbaiki komunikasi.'],
                ['pesan hati, kreatif, peka', 'Kabar menyenangkan atau ide kreatif datang. Dengarkan perasaanmu.', 'Terlalu sensitif atau menghindari perasaan. Respons dengan dewasa.'],
                ['romantis, tawaran, idealis', 'Ajakan atau tawaran datang dengan manis. Ikuti hati tapi tetap sadar.', 'Janji manis tak ditepati. Cek kenyataannya.'],
                ['empati, intuitif, penyayang', 'Penuh empati dan intuisi. Percayai perasaanmu.', 'Terlalu larut dalam emosi. Jaga batas diri.'],
                ['tenang, bijak, seimbang secara emosi', 'Kendalikan emosi dengan bijak dan tenang.', 'Memendam atau meledak. Beri emosi saluran yang sehat.'],
            ],
            'Swords' => [
                ['kejelasan, kebenaran, terobosan', 'Pikiran jernih dan kebenaran terungkap. Ambil keputusan tegas.', 'Pikiran keruh atau komunikasi kasar. Cek ulang faktanya.'],
                ['buntu, menutup mata, menimbang', 'Keputusan sulit dan kamu menghindar. Hadapi informasi yang ada.', 'Kebuntuan pecah atau kebingungan memuncak. Segera putuskan.'],
                ['patah hati, sakit, duka', 'Rasa sakitnya nyata dan perlu diakui. Biarkan lukanya dirasakan.', 'Mulai pulih atau masih menahan sakit. Beri waktu.'],
                ['istirahat, jeda, pemulihan', 'Kamu butuh jeda. Mundur sebentar untuk memulihkan diri.', 'Terlalu lama diam atau tak bisa tenang. Pelan-pelan bangkit.'],
                ['menang dengan harga, konflik, ego', 'Menang tapi dengan harga mahal. Pikirkan apakah ini sepadan.', 'Menyesal atau berdamai. Lepaskan dendam.'],
                ['transisi, pindah, tenang', 'Kamu berpindah ke fase yang lebih tenang. Perlahan tapi pasti.', 'Sulit melepas masa lalu. Terima perubahannya.'],
                ['diam-diam, strategi, tidak jujur', 'Ada yang tidak terbuka, mungkin juga kamu. Waspada dan jujurlah.', 'Rahasia terbongkar atau mengaku. Beranilah jujur.'],
                ['terjebak, merasa tak berdaya, pikiran', 'Kamu merasa terkurung padahal jalan keluar ada. Ubah cara pikirmu.', 'Mulai bebas dan melihat pilihan. Ambil langkah pertama.'],
                ['cemas, susah tidur, khawatir', 'Kekhawatiran membesar di pikiran. Ceritakan pada orang yang kamu percaya.', 'Kecemasan mulai reda. Cari bantuan jika masih terasa berat.'],
                ['akhir pahit, titik terendah, selesai', 'Satu fase berakhir dengan menyakitkan. Dari titik ini jalannya hanya naik.', 'Bangkit pelan-pelan. Jangan memperpanjang drama.'],
                ['ingin tahu, waspada, belajar', 'Pikiran tajam dan rasa ingin tahu. Cari informasi dulu.', 'Banyak bicara tanpa data. Pikir sebelum bicara.'],
                ['tegas, cepat, terus terang', 'Bertindak cepat dan lugas. Hati-hati jangan melukai.', 'Tergesa dan kasar. Atur kata-katamu.'],
                ['jernih, jujur, mandiri', 'Berpikir jernih dan jujur. Tegas tanpa bermusuhan.', 'Dingin atau pahit. Lembutkan sikapmu.'],
                ['logika, otoritas, adil', 'Keputusan adil berdasarkan logika dan integritas.', 'Terlalu kaku atau manipulatif. Gunakan nalar bersama hati.'],
            ],
            'Pentacles' => [
                ['peluang finansial, awal yang stabil, benih', 'Ada peluang nyata di bidang uang atau pekerjaan. Tanam benihnya.', 'Peluang terlewat atau perencanaan lemah. Teliti lagi.'],
                ['menyeimbangkan, adaptasi, prioritas', 'Kamu sedang menyeimbangkan banyak hal. Atur prioritas.', 'Kewalahan atau keuangan berantakan. Sederhanakan.'],
                ['kerja tim, keahlian, karya', 'Kerja sama dan keahlian menghasilkan karya yang bagus.', 'Tim tidak kompak atau hasil asal-asalan. Selaraskan peran.'],
                ['hemat, mengamankan, menggenggam', 'Menjaga aset dengan hati-hati. Jangan terlalu menggenggam.', 'Terlalu pelit atau mulai melepas. Cari keseimbangan.'],
                ['kesulitan, kekurangan, merasa terabaikan', 'Masa sulit soal uang atau kesehatan. Bantuan ada, jangan ragu mencari.', 'Kondisi mulai membaik. Tetap hemat dan cari dukungan.'],
                ['berbagi, murah hati, timbal balik', 'Memberi dan menerima dengan seimbang. Kemurahan hati kembali padamu.', 'Bantuan tidak seimbang. Perjelas batas dan harapan.'],
                ['bersabar, evaluasi, panen', 'Hasil butuh waktu. Evaluasi dan bersabarlah.', 'Tidak sabar atau usaha tak terarah. Cek lagi rencana.'],
                ['tekun, belajar, ahli', 'Ketekunan mengasah keahlianmu. Detail kecil itu penting.', 'Bosan atau terlalu perfeksionis. Cari semangat lagi.'],
                ['mandiri, hasil kerja, nyaman', 'Kamu menikmati hasil kerja sendiri. Kemandirian itu berharga.', 'Terlalu bergantung pada materi. Hargai juga hal lain.'],
                ['warisan, keluarga, kemapanan', 'Stabilitas jangka panjang dan keluarga. Pondasi untuk masa depan.', 'Ketidakstabilan atau konflik harta keluarga. Rapikan urusannya.'],
                ['belajar, target, peluang praktis', 'Mulai belajar atau merintis dengan tekun. Langkah kecil yang terarah.', 'Malas atau tidak fokus. Susun target yang nyata.'],
                ['rajin, setia, pelan tapi pasti', 'Tekun dan bisa diandalkan. Pelan tidak apa-apa asal konsisten.', 'Terlalu kaku atau mandek. Beranikan sedikit perubahan.'],
                ['praktis, merawat, mapan', 'Hangat dan praktis. Merawat orang dan sumber daya di sekitarmu.', 'Terlalu sibuk mengurus atau materialistis. Jaga dirimu juga.'],
                ['sukses, stabil, dermawan', 'Mapan dan tenang dengan keputusan matang. Memimpin lewat teladan.', 'Serakah atau terlalu mengejar status. Ingat nilai yang penting.'],
            ],
        ];

        $order = 100;
        foreach ($suits as $suit => $cards) {
            foreach ($cards as $i => [$kw, $up, $rev]) {
                [$rankName, $rankNumber] = $ranks[$i];
                TarotCard::updateOrCreate(['name' => "{$rankName} of {$suit}"], [
                    'number' => $rankNumber, 'arcana' => 'minor', 'keywords' => $kw,
                    'upright' => $up, 'reversed' => $rev, 'sort_order' => $order++,
                ]);
            }
        }
    }
}
