-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2020 pada 05.44
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localfarm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`) VALUES
('Fachry_53', '1fabd5daa7693f14a161771be155a19e', 'Fachry Azri Arrasyid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul` varchar(100) NOT NULL,
  `thumbnail` text NOT NULL,
  `konten` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `thumbnail`, `konten`, `author`, `created_at`) VALUES
(1, 'singkong-(manihot-esculenta-crantz)', 'artikel-2020-12-21_86ddd2f6e8434eba1855d56fc7d13926.JPG', '<p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Singkong </span><em>(Manihot esculenta Crantz) </em><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">merupakan tanaman perdu. Penyebaran tanaman singkong di Nusantara terjadi pada sekitar tahun 1914-1918, yaitu saat terjadi kekurangan atau sulit pangan.Tanaman singkong dapat tumbuh dengan baik pada daerah yang memiliki ketinggian sampai dengan 2.500 m dari permukaan laut. Demikian pesatnya tanaman singkong berkembang di daerah tropis sehingga singkong dijadikan sebagai bahan makanan pokok ketiga setelah padi dan jagung. Pada daerah yang kekurangan pangan tanaman ini merupakan makanan pengganti (substistusi) serta dapat pula dijadikan sebagai sumber karbohidrat utama.Adapun sentra produksi singkong di Nusantara adalah Jawa, Lampung, dan NTT (Sunarto, 2002). Umumnya tanaman ini dibudidayakan oleh manusia terutama adalah untuk diambil umbinya, sehingga segala upaya yang selama ini dilakukan adalah untuk mempertinggi produksinya. Selain sumber karbohidrat yang tinggi, singkong juga mengandung nutrisi lain seperti serat, vitamin, dan mineral. Hampir 98 persen dari nutrisi yang ada merupakan karbohidrat. Selain itu, singkong rebus juga mengandung sedikit zat besi, vitamin C, dan niasin.&nbsp;</span></p><p><strong>Manfaat singkong untuk kesehatan</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Dari beberapa kandungan nutrisi yang terdapat di dalamnya, singkong ternyata bisa memberikan manfaat bagi kesehatan tubuh kita.</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Berikut beberapa manfaat singkong bagi kesehatan yang harus kamu tahu:</span></p><p><strong>1. Sumber karbohidrat yang tinggi</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Seperti yang kita tahu, singkong mengandung kalori dan karbohidrat tinggi. Maka dari itu, singkong bisa jadi pilihan bahan makanan pokok pengganti nasi. Kalori yang terkandung pada singkong lebih tinggi ketimbang umbi-umbian yang lain. Ubi hanya mengandung 76 kalori, sedangkan buah bit hanya mengandung 44 kalori. Namun jika kamu memilih singkong sebagai sumber karbohidrat utama, jangan lupa untuk mengimbanginya dengan protein, ya. Karena jika tidak, kalori yang tinggi ini bisa memicu kenaikan berat badan.</span></p><p><strong>2. Membantu diet turunkan berat badan</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Kalori tinggi yang terkandung pada singkong ternyata bisa membuat kita merasa kenyang lebih lama. Karenanya nafsu untuk ngemil dan makan berlebih bisa berkurang. Jadi, jika kamu ingin </span><a href=\"https://www.gooddoctor.co.id/tips-kesehatan/kesehatan/diet-mediterania-untuk-diabetes/\"><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">memulai diet</span></a><span style=\"font-family:\'Times New Roman\'; font-size:12pt\"> bisa mulai dengan mengganti nasi ke singkong. Kamu bisa makan singkong dengan berbagai modifikasi, mulai dari rebusan hingga diolah menjadi kue.</span></p><p><strong>3. Membantu penyembuhan diare</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Dilansir </span><a href=\"https://www.webmd.com/vitamins/ai/ingredientmono-1473/cassava\"><em>Web MD</em></a><em>,</em><span style=\"font-family:\'Times New Roman\'; font-size:12pt\"> air rebusan singkong yang diberi tambahan garam ternyata bisa membantu atasi dehidrasi yang dialami penderita diare. Namun ini hanya bisa bekerja jika dehidrasi masih pada level ringan hingga menengah. Jika dehidrasi sudah pada tingkat akut, perlu penanganan lebih lanjut dari pihak medis. Cara pengolahannya mudah, cukup kupas dan bersihkan singkong hingga bersih dan rebus hingga mendidih. Minum air rebusannya saat sudah dingin 2 kali sehari.</span></p><p><strong>3. </strong><em>Gluten-free</em><strong> dan cegah diabetes</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Jika kamu alergi terhadap gluten, singkong adalah pilihan yang tepat. Sebab singkong merupakan salah satu bahan makanan yang </span><em>gluten-free. </em><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Selain itu, orang yang mengonsumsi tepung singkong juga memiliki risiko lebih rendah terhadap </span><a href=\"https://www.gooddoctor.co.id/tips-kesehatan/kesehatan/penderita-diabetes-makan-makanan-manis/\"><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">penyakit diabetes</span></a><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">.</span></p><p><strong>4. Menyehatkan sistem pencernaan</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Singkong mengandung sari pati resisten yang sangat mudah dicerna oleh tubuh. Dilansir </span><em>Medical News Today, </em><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">pati resisten ini bisa meningkatkan kesehatan usus. Dengan cara memelihara bakteri baik yang ada di usus. Selain itu, serat pada singkong juga tidak mudah larut dalam air. Sehingga bisa membantu penyerapan racun yang masuk ke saluran pencernaan. Dengan begitu kesehatan sistem pencernaan bisa terjaga.</span></p><p><strong>5. Manfaat singkong dari bagian daunnya</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Selain beberapa manfaat di atas, daun singkong juga berpotensi menyembuhkan atau meredakan beberapa masalah kesehatan lainnya. Berikut di antaranya:</span></p><ul><li><p><strong>Migrain</strong><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">: vitamin B2 dan ribovlafin pada daun singkong bisa membantu kurangi sakit kepala dan migrain</span></p></li><li><p><strong>Menyehatkan mata</strong><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">: vitamin A yang yang terkandung mampu menjaga dan meningkatkan kesehatan mata</span></p></li><li><p><strong>Demam</strong><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">: air rebusan daun dan akar singkong mampu membantu meredakan demam</span></p></li><li><p><strong>Rematik</strong><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">: daun singkong kaya akan magnesium. Magnesium bermanfaat untuk menurunkan tekanan darah, jadi potensi terserang rematik bisa berkurang.</span></p></li></ul><p><strong>Cara mengolah yang tepat agar dapatkan manfaat singkong</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Jika tak diolah dengan benar, singkong justru bisa menjadi racun bagi tubuh, lho. Singkong mentah mengandung zat yang bisa picu produksi sianida dalam tubuh. Sianida bersifat racun dan bisa membahayakan kesehatan. Maka dari itu kita disarankan untuk mengolah singkong dengan cara yang benar. Salah satu cara paling mudah mengonsumsi singkong adalah dengan merebusnya. Berikut tahapan pengolahan singkong yang tepat :&nbsp;</span></p><ul><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Pertama, kupas singkong dari kulit bagian terluar yang tipis dan kecokelatan dan kulit bagian dalam yang berwarna putih. Pada bagian kulit inilah zat pemicu produksi sianida berada</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Setelah itu rendam singkong di dalam air selama 48-60 jam sebelum diolah. Tujuannya agar zat berbahaya bisa berkurang jumlahnya</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Setelah direndam, kamu bisa mengolah singkong tersebut. Bisa dengan direbus, digoreng, atau mengolahnya jadi tepung untuk bahan kue</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Jangan lupa untuk imbangi tiap porsi sajian singkong dengan protein untuk cegah terjadinya malnutrisi</span></p></li></ul><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">sumber</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">http://darsatop.lecture.ub.ac.id/2016/02/singkong-manihot-esculenta-crantz/</span></p><p><a href=\"https://www.gooddoctor.co.id/tips-kesehatan/nutrisi/manfaat-singkong-untuk-kesehatan/\"><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">https://www.gooddoctor.co.id/tips-kesehatan/nutrisi/manfaat-singkong-untuk-kesehatan/</span></a></p>', 'Fachry Azri Arrasyid', '2020-12-21'),
(2, 'tentang-ubi', 'artikel-2020-12-21_db951d9cbb7af4600a9e1f7608c40f35.JPG', '<p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Ubi jalar merupakan makanan yang sudah tidak asing lagi di lidah masyarakat Indonesia. Tidak seperti ubi biasa yang merupakan umbi-umbian, ubi jalar dianggap sebagai sayuran akar.</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Berikut informasi lengkap tentang manfaat ubi jalar yang perlu kamu ketahui:</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Kandungan nutrisi ubi jalar</span></p><ul><li><p><a href=\"https://www.healthline.com/nutrition/foods/sweet-potatoes#nutrients\"><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Ubi jalar</span></a><span style=\"font-family:\'Times New Roman\'; font-size:12pt\"> kaya akan kandungan antioksidan betakaroten, yang sangat efektif untuk meningkatkan kadar vitamin A dalam darah, terutama pada anak-anak.</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Ubi jalar juga kaya akan nutrisi, tinggi serat, serta sangat mengenyangkan. Ubi jalar dapat dikonsumsi dengan cara direbus, dikukus, maupun digoreng.</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Ubi jalar dapat ditemukan dalam berbagai warna seperti oranye, putih, merah, merah muda, ungu, serta kuning.</span></p></li></ul><p><strong>Apa saja manfaat ubi jalar untuk kesehatan?</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Kandungan nutrisi yang dimiliki oleh ubi jalar membuat makanan ini memiliki banyak manfaat. Tak heran jika ubi jalar menjadi salah satu makanan yang disukai oleh berbagai kalangan.</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Dilansir </span><a href=\"https://www.healthline.com/nutrition/sweet-potato-benefits\"><em>Healthline</em></a><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">, berikut adalah manfaat ubi jalar yang perlu kamu ketahui:</span></p><p><strong>1. Baik untuk kesehatan usus</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Serat dan antioksidan yang terkandung di dalam ubi jalar memiliki banyak manfaat untuk sistem pencernaan.</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Ubi jalar mengandung dua jenis serat, yakni serat larut dan tidak larut. Tubuh tidak dapat mencerna serat apapun. Oleh karena itu, serat tetap berada dalam saluran pencernaan dan memberikan berbagai manfaat kesehatan untuk usus.</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Beberapa jenis dari serat larut yang juga dikenal sebagai serat kental, dapat menyerap air dan melunakkan feses. Di sisi lain, serat yang tidak kental dan tidak larut tidak dapat menyerap air.</span></p><p><strong>2. Memiliki tinggi antioksidan</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Ubi jalar menawarkan beberapa antioksidan. Salah satunya bahkan disebut dapat membantu melindungi tubuh dan melawan beberapa jenis kanker.</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Antosianin merupakan kelompok antioksidan yang ditemukan dalam ubi ungu.</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Dalam sebuah studi tahun 2013 yang dipublikasikan dalam jurnal </span><a href=\"https://pubmed.ncbi.nlm.nih.gov/23784800/\"><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">National Center for Biotechnology Information</span></a><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">, komponen ini diketahui dapat memperlambat beberapa pertumbuhan beberapa jenis sel kanker, termasuk kanker kandung kemih, usus besar, dan payudara.</span></p><p><strong>3. Manfaat ubi jalar untuk indra penglihatan</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Ubi jalar sangat kaya akan kandungan betakaroten, yang juga merupakan antioksidan yang bertanggung jawab atas warna oranye terang pada sayuran.</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Betakaroten diubah menjadi vitamin A dalam tubuh dan digunakan untuk membentuk reseptor pendeteksi cahaya di dalam mata.</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Kekurangan vitamin A merupakan masalah di negara-negara berkembang dan dapat menyebabkan jenis kebutaan khusus yang dikenal sebagai xerophthalmia. Mengonsumsi makanan yang mengandung betakaroten, seperti ubi jalar dapat mencegah terjadinya hal ini.</span></p><p><strong>4. Meningkatkan fungsi otak</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Mengonsumsi ubi jalar berwarna ungu dapat membantu meningkatkan fungsi otak.</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Tak hanya itu saja, diet buah-buahan, sayuran, serta antioksidan dikaitkan dengan risiko penurunan mental demensia sekitar 13 persen lebih rendah.</span></p><p><strong>5. Membantu sistem kekebalan tubuh</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Ubi jalar yang dagingnya berwarna oranye adalah salah satu sumber alami terkaya betakaroten, yang dapat diubah menjadi vitamin A dalam tubuh.</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Vitamin A sangat penting untuk sistem kekebalan tubuh yang sehat, serta kadar darah yang rendah yang telah dikaitkan dengan penurunan kekebalan.</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Vitamin A juga sangat penting untuk menjaga selaput lendir yang sehat, terutama di lapisan usus dalam tubuh kita.</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Usus adalah tempat tubuh yang sangat rentan terkena penyakit. Oleh karena itu, usus yang sehat adalah bagian penting dari sistem kekebalan tubuh yang sehat.</span></p>', 'Fachry Azri Arrasyid', '2020-12-21'),
(3, 'talas-yang-luar-biasa-hebatnya', 'artikel-2020-12-21_6807a912d249e82a70e29abfc2d6cbe1.JPG', '<p><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">Apa itu Talas? Mungkin sebagian orang masih belum mengenal dengan baik tanaman tersebut. Talas merupakan salah satu tanaman sumber penghasil karbohidrat non beras dari golongan umbi-umbian selain ubi kayu dan ubi jalar yang memiliki peranan cukup penting. Seperti yang kita ketahui bahwa kebutuhan karbohidrat dari tahun ke tahun senantiasa mengalami peningkatan sebagai akibat meningkatnya laju pertumbuhan jumlah penduduk. Penyediaan karbohidrat yang hanya bersumber dari beras saja tidak dapat mencukupi kebutuhan pangan. Kemampuan produksi pangan dalam negeri dari tahun ke tahun semakin terbatas. Dalam memenuhi kebutuhan pangan karbohidrat di masa mendatang terdapat berbagai macam kendala seperti laju pertumbuhan jumlah penduduk yang masih cukup besar, terjadinya alih fungsi lahan pertanian ke non pertanian, iklim yang kurang menguntungkan di bidang pertanian maupun serangan hama dan penyakit yang eksplosif, sedangkan tingkat konsumsi pangan karbohidrat (beras) per kapita per tahun yang masih meningkat dan lain-lain. Kesemuanya itu akan mengakibatkan semakin sulitnya penyediaan pangan, terlebih apabila masih bertumpu kepada beras semata (single commodity).</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">Agar kecukupan pangan nasional bisa terpenuhi, maka upaya yang dilakukan adalah diversifikasi pangan. Sehingga peranan tanaman penghasil karbohidrat dari umbi-umbian khususnya talas semakin penting.</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">Talas dapat dijumpai hampir di seluruh kepulauan dan tersebar dari tepi pantai sampai ke pegunungan di atas 1000 m dpl, baik liar maupun ditanam. (Lembaga Biologi Nasional, 1977). Didalam pertumbuhannya, tanaman talas tidak menuntut syarat tumbuh yang khusus. Tanaman ini dapat tumbuh diberbagai jenis tanah dengan berbagai kondisi lahan baik lahan becek (talas Bogor) maupun lahan kering. Talas mempunyai nilai ekonomis yang cukup tinggi karena hampir seluruh bagian tanaman talas dapat dimanfaatkan dalam kehidupan sehari-hari serta mempunyai kandungan gizi yang cukup (Widiyanti, 2008).</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">Manfaat utama umbi talas adalah sebagai bahan pangan sumber karbohidrat. Bagian tanaman ini yang dapat dimakan yaitu umbi, tunas muda, dan batang daun (Purwono &amp; Purnamawati, 2008). Selain itu, umbi talas juga banyak dibuat makanan ringan seperti keripik dan getuk talas (Purwono &amp; Purnamawati, 2008).&nbsp; Menurut Danumiharja (1978) umbi, pelepah, dan daun talas dapat dimanfaatkan sebagai bahan pangan, obat, maupun pembungkus makanan, sedangkan daun, kulit dan ampas umbinya dapat pula dimanfaatkan sebagai pakan ternak. Selain dapat digunakan sebagai bahan pangan talas juga digunakan untuk minuman. Akar rimpangnya jika difermentasikan dan ditambah gula serta semacam jagung (Kaffir corn) dan air akan menjadi sejenis bir. Penggunaan talas sebagai obat tradisional adalah pembuatan bubur akar rimpang talas yang dipercaya sebagai obat encok. Selain itu cairan akar rimpang sebagai obat bisul, sementara getah daunnya sering digunakan untuk menghentikan pendarahan karena luka dan sebagai obat untuk bengkak. Pelepah dan tangkai daun yang dipanggang dapat dimanfaatkan untuk mengurangi gatal-gatal. Pelepah daun juga diyakini mampu mengobati gigitan kalajengking.&nbsp; Dewasa ini usaha pengembangan pengolahan talas semakin berkembang, seperti talas rebus, talas goreng, keripik talas ataupun pengolahan lebih lanjut seperti tepung talas yang digunakan sebagai bahan baku sup talas, roti, dodol, dan cookies (Apriani 2007).</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">Sebagai pengganti nasi, talas mengandung banyak karbohidrat dan protein yang terkandung dalam umbinya sedangkan daunnya dipergunakan sebagai sumber nabati. Selain itu talas mengandung beberapa unsur mineral dan vitamin serta sangat mudah dicerna. Talas mirip dengan kentang tetapi lebih bergizi dan merupakan sumber energi yang luar biasa hebatnya.</span></p><p><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">Sungguh memukau kandungan gizi dari talas, makanan yang sehat dan cocok untuk masyarakat modern yang telah mengedepankan kesehatan dalam kehidupan serta talas merupakan makanan alternative pengganti beras yang pada akhirnya dapat mencukupi pangan nasional.</span></p><p><strong>Kandungan Nutrisi Penting Dalam Talas</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">Di dalam seporsi talas (sekitar 150 gram) yang sudah dimasak, kamu bisa mendapatkan:</span></p><ul><li><p><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">150 &ndash; 200 kalori</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">5 &ndash; 7 gram serat</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">Sekitar 4 gram </span><a href=\"https://www.alodokter.com/petik-manfaat-protein-dari-sumber-sumber-ini\"><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">protein</span></a></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">150 &ndash; 170 mg kalsium</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">450 &ndash; 600 mg kalium</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">30 &ndash; 50 mg magnesium</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">60 &ndash; 70 mg </span><a href=\"https://www.alodokter.com/mari-pelajari-cara-fosfat-memperkuat-tulang\"><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">fosfor</span></a></p></li></ul><p><span style=\"font-family:\'Times New Roman\'; font-size:11pt\">Tak hanya itu, talas juga diperkaya antioksidan, karbohidrat kompleks, vitamin C, vitamin B, vitamin A, serta mineral zat besi dan tembaga. Aneka nutrisi pada talas tersebut menjadikan talas sebagai salah satu makanan yang berperan penting dalam memelihara kesehatan dan fungsi organ tubuh.</span></p><p><br />&nbsp;</p><p><a href=\"https://artikelpanganhmppi.wordpress.com/artikel-pangan-hmppi-bulan-april/talas-yang-luar-biasa-hebatnya/\"><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">https://artikelpanganhmppi.wordpress.com/artikel-pangan-hmppi-bulan-april/talas-yang-luar-biasa-hebatnya/</span></a></p><p><span style=\"font-family:\'Times New Roman\'; font-size:10pt\">Oleh :</span><strong> Miswinda I Fakultas Pertanian Universitas Padjadjaran</strong></p>', 'Fachry Azri Arrasyid', '2020-12-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-12-06-222557', 'App\\Database\\Migrations\\Resep', 'default', 'App', 1607927746, 1),
(2, '2020-12-07-063657', 'App\\Database\\Migrations\\artikel', 'default', 'App', 1607927746, 1),
(3, '2020-12-10-155443', 'App\\Database\\Migrations\\Visitor', 'default', 'App', 1607927746, 1),
(4, '2020-12-10-160227', 'App\\Database\\Migrations\\Response', 'default', 'App', 1607927747, 1),
(5, '2020-12-13-173438', 'App\\Database\\Migrations\\Admin', 'default', 'App', 1607927747, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul` varchar(100) NOT NULL,
  `thumbnail` text NOT NULL,
  `konten` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`id`, `judul`, `thumbnail`, `konten`, `author`, `created_at`) VALUES
(1, 'membuat-sawut-singkong', 'resep-2020-12-21_cf87fb65fa879b17300509d1279ab95d.JPG', '<p><strong>Bahan-bahan</strong></p><ul><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;2 buah singkong</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;200 gr gula merah</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;100 gr gula pasir</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;1 sdt perasa vanila</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;100 gr kelapa parut</span></p></li></ul><p><strong>Langkah - Langkah</strong></p><ol><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Potong singkong lalu kupas kulit singkong dan cuci hingga bersih</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Parut kasar singkong dengan menggunakan parutan keju lalu sisihkan</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Siapkan mangkuk lalu campurkan singkong parut, gula merah, gula pasir, vanilla, dan kelapa parut. Aduk agar tercampur rata</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Siapkan kukusan yang telah dipanaskan dan dialasi dengan daun pisang. masukkan campuran parutan singkong dan bahan lain. Kukus di dalam kukusan hingga matang</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Sajikan dengan menambahkan kelapa parut&nbsp;</span></p></li></ol>', 'Fachry Azri Arrasyid', '2020-12-21'),
(2, 'nugget-singkong', 'resep-2020-12-21_6b56c23ca9c683505eedb4ff1f4d8d8d.JPG', '<p><strong>Bahan-bahan</strong></p><ul><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;400 gr singkong</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;1 siung bawang merah</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;1 siung bawang putih</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;1 butir telur</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;1 buah wortel</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;1 batang seledri&nbsp;</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;&frac12; sdt merica</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;1 sdt garam</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;&frac12; ons tepung panir</span></p></li></ul><p><strong>Langkah - Langkah</strong></p><ol><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Kukus 400 gr singkong sampai empuk</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Haluskan 400 gr singkong yang sudah dikukus</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Haluskan 1 siung bawang merah, 1 siung bawang putih, &frac12; sdt merica, dan 1 sdt garam</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Campurkan dalam wadah singkong yang sudah dihaluskan, bumbu yang sudah dihaluskan, irisan wortel, dan irisan seledri lalu ratakan</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Bentuk adonan sesuai selera</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Masukkan adonan ke dalam kocokan telur</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Kemudian lumuri adonan dengan tepung panir</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Goreng nugget dengan api kecil sampai matang tiriskan minyak lalu sajikan</span></p></li></ol>', 'Fachry Azri Arrasyid', '2020-12-21'),
(3, 'onde-onde-ubi-ungu', 'resep-2020-12-21_f51237d69f701317924c0bdb520610cb.JPG', '<p><strong>Bahan-bahan</strong></p><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adonan Kulit :</span></p><ul><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;&nbsp;125 gr tepung ketan</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;&nbsp;50 gr ubi ungu,kukus</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;&nbsp;2 sdm gula pasir</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;&nbsp;1/4 sdt garam</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;&nbsp;100 ml air</span></p></li></ul><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Isian :</span></p><ul><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;100 gr ubi ungu di kukus</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;1 sdm gula pasir</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;Sejumput garam</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;50 ml air</span></p></li></ul><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;&nbsp;&nbsp; </span><strong>Langkah - Langkah</strong></p><ol><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Isian : Kukus ubi ungu. Kemudian haluskan&nbsp;</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Campur ubi bersama gula, garam dan air. Masak sampai air menyusut&nbsp;</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Bentuk bulat dan sisihkan</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Kukus ubi ungu lalu haluskan kemudian campur bersama bahan lainnya. Uleni sampai tercampur rata</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Ambil secukupnya adonan. bentuk bulat pipih. Isi tengahnya dengan isian dan bentuk bulat</span></p></li></ol><ol><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Celupkan sebentar ke dalam air. kemudian gulingkan/taburkan pada biji wijen secara merata sambil ditekan-tekan&nbsp;</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Siapkan minyak. Masukkan onde-onde. Nyalakan kompor dengan api sedang cenderung kecil. Goreng onde-onde sampai mengembang kemudian balik hingga warna sedikit kecoklatan/dirasa sudah matang. Lalu angkat tiriskan dan sajikan&nbsp;</span></p></li></ol>', 'Fachry Azri Arrasyid', '2020-12-21'),
(4, 'klepon-ubi-jalar', 'resep-2020-12-21_f105740a93c90faebd15104a5bc2ab2d.JPG', '<p><strong>Bahan-bahan</strong></p><ul><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;1/4 kg ubi kuning kukus</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;300 gram Tepung ketan putih</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;1 keping besar gula merah potong kecil</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;Kelapa parut dari 1/4 kelapa</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;Garam</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;Air&nbsp;&nbsp;</span></p></li></ul><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">&nbsp;&nbsp;&nbsp; </span><strong>Langkah - Langkah</strong></p><ol><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Kukus ubi kemudian hancurkan dan kukus kelapa parut dengan diberi sejumput garam</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Campur ubi dengan tepung ketan lalu uleni. Tambahkan air sedikit demi sedikit hingga menjadi adonan yang kalis</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Setelah kalis bentuk bulat bulat dan isi dengan gula jawa yang sudah dipotong kecil</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Setelah semua dibentuk, lalu rebus klepon hingga matang atau sampai adonan mengapung lalu angkat dan tiriskan</span></p></li><li><p><span style=\"font-family:\'Times New Roman\'; font-size:12pt\">Campur dengan kelapa parut dan klepon siap dihidangkan</span></p></li></ol>', 'Fachry Azri Arrasyid', '2020-12-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `response`
--

CREATE TABLE `response` (
  `responseid` int(11) NOT NULL,
  `responses` text NOT NULL,
  `submitted_at` text NOT NULL,
  `visitor_ip` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor`
--

CREATE TABLE `visitor` (
  `visitor_ip` int(11) UNSIGNED NOT NULL,
  `kota` varchar(100) NOT NULL,
  `visited_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `visitor`
--

INSERT INTO `visitor` (`visitor_ip`, `kota`, `visited_at`) VALUES
(2130706433, 'localhost', '21-12-2020_11:40:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`responseid`),
  ADD KEY `response_visitor_ip_foreign` (`visitor_ip`);

--
-- Indeks untuk tabel `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`visitor_ip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `response_visitor_ip_foreign` FOREIGN KEY (`visitor_ip`) REFERENCES `visitor` (`visitor_ip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
