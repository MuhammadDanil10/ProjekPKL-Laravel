<?php

namespace Database\Seeders;

use App\Models\Voting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VotingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $voting = [
            [
                'name' => 'Nova',
                'visi' => 'Menciptakan Lingkungan Belajar yang Inklusif: Visi ini bertujuan untuk menciptakan lingkungan di mana setiap anggota kelas merasa diterima, dihargai, dan didukung. Saya ingin memastikan bahwa setiap siswa memiliki kesempatan yang adil untuk belajar dan berkembang.',
                'misi' => 'Meningkatkan Partisipasi Aktif: Misi ini melibatkan mendorong semua siswa untuk berpartisipasi aktif dalam kegiatan kelas. Saya akan menciptakan peluang partisipasi yang beragam, seperti diskusi kelompok, presentasi, dan kegiatan interaktif lainnya, serta memberikan penghargaan yang pantas bagi siswa yang berpartisipasi aktif.',
                'photo' => 'fatma.jpg',
                'umur' => '17',
                'alamat'=> 'Padang',
                'hobi' => 'bola',
                'jabatan_lama' => 'ketua kelas',
                'motivasi' => 'hidup santai',
                'votes' => '15'
            ],
            [
                'name' => 'Fay',
                'visi' => 'Meningkatkan Kolaborasi dan Komunikasi: Visi ini bertujuan untuk meningkatkan kolaborasi antara siswa dan mengembangkan keterampilan komunikasi yang efektif. Saya ingin mendorong siswa untuk bekerja sama dalam proyek, diskusi, dan kegiatan kelompok, serta memfasilitasi saluran komunikasi yang terbuka antara siswa dan guru.',
                'misi' => 'Membangun Keterampilan Sosial dan Emosional: Misi ini melibatkan membantu siswa mengembangkan keterampilan sosial dan emosional yang kuat. Saya akan mengadakan sesi pengembangan diri, mendorong kerjasama dalam kelompok, dan memberikan dukungan emosional kepada siswa yang membutuhkan.',
                'photo' => 'photo_2022-11-16_22-16-37.jpg',
                'umur' => '17',
                'alamat'=> 'Padang',
                'hobi' => 'bola',
                'jabatan_lama' => 'ketua kelas',
                'motivasi' => 'hidup santai',
                'votes' => '30'
            ],
            [
                'name' => 'Clyla',
                'visi' => 'Memotivasi dan Menginspirasi Siswa: Visi ini bertujuan untuk memotivasi siswa untuk meraih prestasi yang tinggi dan menginspirasi mereka untuk mengembangkan potensi penuh mereka. Saya ingin menciptakan atmosfer positif di kelas yang mendorong siswa untuk mencapai tujuan pribadi dan akademik mereka.',
                'misi' => 'Menjaga Keteraturan dan Disiplin: Misi ini melibatkan menjaga keteraturan di kelas dan mempromosikan disiplin yang baik. Saya akan menegakkan aturan kelas dengan adil dan konsisten, serta bekerja sama dengan siswa, guru, dan staf sekolah untuk menciptakan lingkungan belajar yang aman dan teratur.',
                'photo' => 'VESTIA2.png',
                'umur' => '17',
                'alamat'=> 'Padang',
                'hobi' => 'bola',
                'jabatan_lama' => 'ketua kelas',
                'motivasi' => 'hidup santai',
                'votes' => '70'
            ]
            ];

            foreach($voting as $vote){
                Voting::create($vote);
            }
    }
}
