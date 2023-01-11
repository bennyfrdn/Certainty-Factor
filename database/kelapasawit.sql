-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Mar 2022 pada 12.21
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelapasawit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `nama`, `username`, `password`) VALUES
(1, 'administrator', 'admin@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id` int(11) NOT NULL,
  `kode_diagnosa` varchar(20) NOT NULL,
  `idgejala` varchar(10) NOT NULL,
  `cfuser` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id`, `kode_diagnosa`, `idgejala`, `cfuser`) VALUES
(1, 'DA220326061941', 'GJ001', 0.6),
(2, 'DA220326061941', 'GJ002', 0.6),
(3, 'DA220326061947', 'GJ001', 0.6),
(4, 'DA220326061947', 'GJ003', 0.4),
(5, 'DA220326061947', 'GJ006', 0.6),
(6, 'DA220326061956', 'GJ010', 0.6),
(7, 'DA220326061956', 'GJ008', 0.4),
(8, 'DA220326061956', 'GJ009', 0.6),
(9, 'DA220326062009', 'GJ001', 0.6),
(10, 'DA220326062009', 'GJ002', 0.6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gangguan`
--

CREATE TABLE `gangguan` (
  `idgangguan` varchar(11) NOT NULL,
  `nama_gangguan` varchar(100) NOT NULL,
  `desk_gangguan` longtext NOT NULL,
  `saran` longtext NOT NULL,
  `gambar` varchar(254) NOT NULL,
  `jenis` enum('penyakit','hama') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gangguan`
--

INSERT INTO `gangguan` (`idgangguan`, `nama_gangguan`, `desk_gangguan`, `saran`, `gambar`, `jenis`) VALUES
('D001', 'Garis Kuning (Patch Yellow) ', '<p style=\"text-align:justify\">Penyakit Garis Kuning merupakan penyakit yang menyerang bagian daun tanaman yang dimulai dari daun muda. Penyakit ini disebut juga sebagai penyakit fusarium karena disebabkan oleh jamur <em>fusarium oxysporum</em>. Penyakit ini menyerang tanaman yang mempunyai kepekaan tinggi dan disebabkan oleh faktor turunan dan juga banyak ditemukan menginfeksi daun muda dan menjalar hingga ke daun tua. Pada daun yang terserang, tampak bercak-bercak lonjong berwarna kuning dan di tengahnya terdapat warna cokelat. Penyakit ini sudah menyerang pada saat bagian ujung dan daun belum membuka dan akan menyebar ke helai daun lain yang telah terbuka pada pelepah yang sama. Daun yang terserang akan mengering dan gugur. Serangan jamur <em>fusarium oxyporum</em> dapat menyebabkan tanaman pertumbuhan yang tidak normal, tanaman tidak mampu membentuk bunga dan buah. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Penyebab penyakit ini biasanya menyerang pada tanaman yang berumur kurang dari 6 tahun, Tanaman yang terinfeksi biasanya akan mati 12 bulan setelah gejala pertama. Jaringan pengangkut air berubah warna dari orange menjadi coklat dan akhirnya mati. Jaringan-jaringan pengangkut lain nya akan terganggu pada daerah yang terserang dan akhirnya menjadi nekrotik dan membusuk</p>\r\n', '<p><strong>Cara pencegahan :</strong></p>\r\n\r\n<p>- Usaha pencegahan penyakit ini dapat dilakukan dengan cara usaha inokulasi penyakit pada bibit dan tanaman muda. Dengan cara ini diketahui dapat mengurangi penyakit di pesemaian dan tanaman muda di lapangan. Selain itu cara ini diketahui dapat mengurangi berkembangnya penyakit pada persemaian dan tanaman muda di lahan produksi&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>Cara Pengendalian:</strong></p>\r\n\r\n<p>- Anda bisa mengaplikasikan fungisida pada titik serangan dan sekitarnya. Namun jika sudah parah, disarankan untuk membuang bagian tanaman yang terinfeksi</p>\r\n', '18259952_garis kuning.png', 'penyakit'),
('D002', 'Bercak Daun', '<p style=\"text-align:justify\">Penyakit Bercak Daun kelapa sawit yang disebabkan oleh beberapa pathogen yaitu <em>Culvularia eragrostidis, Drechslera halodes, Cochobolus carbonus</em>. Mula-mula menyerang daun pupus yang belum membuka atau dua daun termuda yang sudah membuka. Tampak bercak bulat kecil, warna kuning tembus cahaya. Bercak membesar, warna pusat bercak menjadi coklat muda dan tampak mengendap (melekuk). Penyakit ini mampu menghambat pertumbuhan pada tanaman muda (pembibitan). Penyakit ini merupakan penyakit utama di bagian pembibitan kelapa sawit dan akan menyebabkan spot kecokelatan pada daun dan tidak bisa balik, artinya daun yang terserang tidak bisa balik hijau lagi, hal ini akan berimbas pada kemampuan fotosintesis daun. Penyakit ini mudah menyebar, penyebaran bercak tercepat adalah pada media bawah atau akar, bukan melalui atas dengan angin. Pengendalian penyakit biasanya dilakukan secara preventif dengan menerapkan praktik pembibitan yang baik Penyakit-penyakit yang termasuk ke dalam kelompok bercak daun adalahyang disebabkan oleh jamur-jamur patogenik. Penyakit bercak daun seringkali terjadi bersamaan dengan penyakit antraknosa, hawar atau busuk daun.</p>\r\n', '<div><strong>Cara pencegahan:</strong></div>\r\n\r\n<p>â¦ Jangan terlambat pindah tanam dari <em>pre-nursery</em> (PN) atau yang menggunakan polibeg kecil ke <em>main-nursery</em> (MN) atau polibeg besar.<br />\r\nâ¦&nbsp;Melakukan penyiangan gulma tepat waktu<br />\r\nâ¦&nbsp;Pemupukan harus berimbang, tepat dosis, tepat waktu&nbsp;<br />\r\nâ¦&nbsp;Membuat drainase yang baik bagi tanaman<br />\r\nâ¦&nbsp;Menjaga jarak tanam&nbsp;<br />\r\nâ¦ Penyiraman diusahakan tidak mengenai daun dan menggunakan sumber air yang mengalir.<br />\r\nâ¦&nbsp;Untuk mencegah terjadinya penyakit bercak daun bisa dilakukan pengendalian preventif dengan cara penyemprotan secara rotasi dengan bahan aktif jenis Mankozeb (seperti DITHANE M-45) atau yang sejenisnya dengan konsentrasi 0,2 %, Benomil (seperti Benlox) konsentrasi 0,3 %, dan Propineb (Seperti Antracol) konsentrasi 0,2 %, dengan interval 2 minggu 1 kali.</p>\r\n\r\n<div><br />\r\n<strong>Cara pengendalian:</strong></div>\r\n\r\n<div>â¦&nbsp;Memperjarang letak bibit menjadi 90 x 90 cm (ukuran SOP Perkebunan PT, PP London Sumatra, Tbk) apabila beberapa tanaman sudah terinfeksi penyakit bercak daun.</div>\r\n\r\n<div>â¦ Penyiraman secara manual menggunakan gembor lebih dianjurkan, dan sebaiknya diarahkan ke permukaan tanah didalam polibeg, bukan ke daun</div>\r\n\r\n<div>â¦&nbsp;Mengisolasi dan memangkas daun-daun sakit dari tanaman yang bergejala ringan-sedang, selanjutnya disemprot dengan fungisida secara rotasi dengan bahan aktif jenis Mankozeb (seperti DITHANE M-45) atau yang sejenisnya dengan konsentrasi 0,2 %, Benomil (seperti Benlox) konsentrasi 0,3 %, dan Propineb (Seperti Antracol) konsentrasi 0,2 %, dengan interval satu minggu</div>\r\n\r\n<div>â¦&nbsp;Sanitasi gulma rumputan disekitar bibitan atau tanaman yang bergejala bercak daun</div>\r\n\r\n<div>â¦&nbsp;Memusnahkan dengan cara membakar bibit yang yang &nbsp;terserang berat</div>\r\n\r\n<div style=\"margin-left:40px\">&nbsp;</div>\r\n', '910633646_bercak daun.png', 'penyakit'),
('D003', 'Karat Daun (Cephaleuros virescens)', '<p style=\"text-align:justify\">Penyakit Karat Daun pada kelapa sawit bukan disebabkan oleh jamur karat yang umum tetapi disebabkan oleh ganggang hijau (<em>alga cephaleuros virescen</em>), penyakit ini biasanya hanya menyerang daun-daun tua pada tanaman menghasilkan berumur &nbsp;&gt; 5 tahun, beberapa gejala berat dijumpai pada beberapa kebun di Kalimantan terutama di tanah gambut. <em>Cephaleuros virescens</em> hanya hidup dipermukaan atas daun dan penutupnya tidak seratus persen padahal sebagian besar stomata dipermukaan bawah daun, dan tingkat parasitasi rendah yaitu hanya sedikit merusak di jaringan epidermis daun dan tidak menembus kebagian daun yang lebih dalam. Iklim di Indonesia pada umumnya cocok untuk pertumbuhan dan perkembangan karat daun dan penyakit karat daun lebih banyak muncul ditanaman yang dekat dengan jalan dengan tipe tanah termasuk lempung Di papua dilaporkan 40 % dari jumlah pelepah mulai dari daun terbawah terserang secara merata, hal ini menghambat aktivitas fotosintesis, mengakibatkan kurangnya asupan asimilat yang digunakan selama proses pembentukan dan perkembangan bunga kelapa sawit sehingga dapat mempengaruhi produksi tandan buah</p>\r\n', '<p><strong>Cara pencegahan :</strong><br />\r\nâ¦&nbsp;Menjaga kebersihan tanaman terutama pruning, yaitu pemangkasan pelepah-pelepah daun tua dan pelepah yang tidak produktif lagi pada tanaman&nbsp;kelapa sawit, lakukan pemangkasan pelepah dengan tetap mempertahankan jumlah pelepah optimal, agar menurunkan tingkat kelembapan dan menurunkan jumlah inokulum</p>\r\n\r\n<p><br />\r\n<strong>Cara pengendalian </strong>:<br />\r\nâ¦&nbsp;&nbsp;Melakukan penunasan pada pelepah yang terserang secara teratur dan benar dengan tetap mempertahankan jumlah pelepah optimal.<br />\r\nâ¦&nbsp;&nbsp;Melakukan penyemprotan dengan fungisida berbahan aktif tembaga (terutama adalah tembaga hidroksida) dengan dosis 2,5 gram/2 liter air dengan interval penyemprotan satu minggu</p>\r\n', '951363739_karat daun.png', 'penyakit'),
('D004', 'Defisiensi Unsur Hara Nitrogen (N)', '<p style=\"text-align:justify\">Unsur Hara Nitrogen (N) mempunyai peranan penting terhadap tanaman kelapa sawit, yaitu berfungsi dalam pembentukan zat hijau daun (klorofil) yang sangat penting untuk melakukan proses fotosintesis bagi tanaman kelapa sawit. Berperan dalam pembentukan protein, lemak dan berbagai persenyawaan organik lainnya. Jumlah unsur ini harus seimbang di dalam tanaman, kelebihan atau kekurangan unsur ini akan memberi efek negatif terhadap tanaman kelapa sawit. Tetapi kebanyakan gejala yang timbul dikarenakan kandungan unsur N di dalam tanah yang rendah, kemudian ada beberapa penyebab lain, seperti aplikasi pupuk N yang tidak tepat dosis, cara, dan waktu aplikasi, dan drainase yang buruk. Unsur Nitrogen juga berfungsi merangsang pertumbuhan vegetatif tanaman secara keseluruhan, khususnya pertumbuhan pada daun kelapa sawit.&nbsp;<br />\r\n&nbsp;</p>\r\n', '<p><strong>Cara pencegahan:</strong><br />\r\nâ¦&nbsp;Membuat drainase yang baik dan mengurangi erosi<br />\r\nâ¦&nbsp;Mengendalikan gulma berbahaya, seperti lalang dan lain sebagainya<br />\r\nâ¦&nbsp;Meningkatkan ketersediaan nitrogen dengan tanaman kacangan, terutama pada kebun yang masih tanaman belum menghasilkan (TBM)&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>Cara pengendalian:</strong><br />\r\nâ¦&nbsp;Mengendalikan secara dini tumbuhan yang bersifat kompetitor bagi tanaman kelapa sawit (seperti pakisan, lalang dan lain sebagainya) dan melakukan perawatan tanaman kacangan.<br />\r\nâ¦&nbsp;Meningkatkan bahan organik tanah pada areal lahan kelapa sawit.<br />\r\nâ¦&nbsp;Meningkatkan ketersediaan nitrogen tanah secara bioteknologi.<br />\r\nâ¦&nbsp;Mencegah terjadinya aliran permukaan dan erosi pada areal lahan.<br />\r\nâ¦&nbsp;Mengaplikasikan pupuk secara tepat yang mengandung unsur nitrogen seperti urea, dan pupuk-pupuk lain yang mengandung unsur nitrogen.<br />\r\nâ¦&nbsp;Untuk penggunaan pupuk urea dosis yang bisa digunakan adalah sebagai berikut:&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; â¦&nbsp;umur 2-3 tahun : 1-1,5 kg / pokok / tahun&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; â¦&nbsp;umur 5-10 tahun 2-3 kg / pokok / tahun&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; â¦&nbsp;umur 10-23 tahun 4-6 kg / pokok / tahun<br />\r\nâ¦&nbsp;Melakukan monitoring rutin pada areal lahan dengan pengambilan contoh daun pada tanaman kelapa sawit dalam langkah upaya melihat perkembangan pada bagian pelepah daun kelapa sawit<br />\r\n&nbsp;</p>\r\n', '1931829044_nitrogen.png', 'penyakit'),
('D005', 'Tajuk (Crown Disease) ', '<p style=\"text-align:justify\">Penyakit Tajuk (<em>Crown Disease</em>) adalah penyakit pada tanaman kelapa sawit yang disebabkan oleh kelainan genetik yang diturunkan tanaman induk. Tetapi beberapa penelitian yang telah lama dilakukan untuk mencari penyebab pasti terjadinya penyakit tajuk menyebutkan bahwa sampai sekarang penyebab pasti penyakit tajuk tidak dapat diketahui dengan pasti. Penyakit ini merupakan penyakit yang berbahaya dan perlu penanganan yang serius. Jika tidak segara ditangani, sudah dapat dipastikan tanaman kelapa sawit yang berasal dari induk berpenyakit, produktivitasnya sangat rendah karena tanaman tidak dapat membentuk buah dengan maksimal. Penyakit tajuk biasanya terjadi pada tanaman belum menghasilkan yang berumur 1-3 tahun, tetapi kadang-kadang gejalanya sudah mulai terlihat di pembibitan. Tanaman yang memiliki gen penyakit tajuk dapat diketahui jika terdapat pelepah yang bengkok dan tidak memiliki helai daun. Gejala lainnya yaitu helai daun mulai pertengahan sampai ujung pelepah kecil-kecil, sobek, atau tidak ada sama sekali. Penyakit ini tidak mematikan tanaman dan hanya bersifat sementara karena 2-3 tahun kemudian tanaman sakit pada umumnya pulih sendiri, tetapi tanaman yang memiliki penyakit akan menjadi penghambat memasuki periode generative.&nbsp;</p>\r\n', '<p><strong>Cara pencegahan:</strong><br />\r\nâ¦&nbsp;Menggunakan bibit yang sehat dan berkualitas dan jelas asal &ndash; usulnya<br />\r\nâ¦&nbsp;Menggunakan bibit bersertifikat yang sudah terbukti kualitasnya,<br />\r\nâ¦&nbsp;Melakukan penyeleksian yang ketat terhadap bibit yang akan ditanam yaitu memilih tanaman yang berasal dari pohon induk yang resisten terhadap penyakit Tajuk<br />\r\nâ¦&nbsp;Melakukan seleksi (<em>culling</em>) bibitan pada umur 3 bulan, 6 bulan, dan 9 bulan yang berguna untuk mencegah adanya tanaman yang terserang penyakit tajuk.</p>\r\n\r\n<p><br />\r\n<strong>Cara pengendalian:</strong><br />\r\nâ¦ Pada gejala ringan, pangkas pada bagian yang bengkok dan amati tiap semester, jika ditemukan dalam 4 kali pengamatan berturut-turut tetap bergejala demikian, maka tanaman perlu dibongkar dan disisip.<br />\r\nâ¦&nbsp;Pada gejala berat di TBM, tanaman yang terkena penyakit tajuk disisip dan diganti dengan tanaman baru yang sehat&nbsp;<br />\r\nâ¦&nbsp;Karena penyebab penyakit tajuk daun belum bisa dipastikan, maka metode pengendaliannya pun masih simpang siur. Tidak sedikit malah para petani yang sengaja membiarkan kelapa sawit yang berpenyakit sembuh dengan sendirinya meskipun harus menanggung kerugian waktu.<br />\r\nâ¦&nbsp;Salah satu teknik pengendalian yang cukup banyak dipakai yaitu memberantas penyakit tajuk daun menggunakan fungisida dengan maksud untuk membunuh jamur-jamur yang hidup di tajuk yang berpenyakit. Metode pengendalian ini diawali dengan memotong janur kelapa sawit sedalam mungkin dekat dengan titik tumbuh. Perhatikan hanya janur yang masih menutup saja yang dibuang, sementara janur yang sudah membuka tetap dipertahankan untuk mendukung pertumbuhan tanaman. Berikutnya aplikasikan fungisida tiabendazol, tiram atau benomil tepat pada pemotongan tajuk daun tadi.<br />\r\n&nbsp;</p>\r\n', '1715135699_tajuk.png', 'penyakit'),
('D006', 'Busuk Pupus', '<p style=\"text-align:justify\">Penyakit Busuk Pupus&nbsp;dapat terjadi pada tanaman belum menghasilkan (TBM) hingga ke tanaman menghasilkan (TM), biasanya muncul pada awal musim hujan setelah kemarau pada awal musim hujan setelah kemarau panjang. Busuk pangkal pupus dapat menyebabkan kematian tanaman. Penyebab utamanya adalah bakteri diduga <em>Erwinia</em> yang berasosiasi dengan beberapa genera jamur dan ditularkan oleh kumbang penggerek pucuk. Gejala awal yaitu daun-daun pupus, kira-kira 8 pelepah menguning, mengering dan bewarna coklat, selanjutnya jaringan di pangkal pupus membusuk, berair (basah) dan berbau busuk, dan pembusukannya berlanjut disekitar titik tumbuh, bahkan dalam keadaan parah titik tumbuh juga ikut busuk menyebabkan matinya tanaman.&nbsp;Beberapa faktor pendorong terjadinya penyakit busuk pupus adalah kultur teknis (penyiraman berlebih di pembibitan, pemupukan tidak berimbang, penyiangan gulma terlambat), iklim (curah hujan dan kelembaban yang tinggi), blok tergenang secara periodik.&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nJika titik tumbuh tidak rusak, maka tanaman masih dapat pulih dengan menghasilkan pupus-pupus baru.&nbsp;&nbsp;biasanya beberapa pupus yang baru muncul tidak sempurna, bengkok, melengkung dan berkerut atau melipat, kadangkala tanpa&nbsp;&nbsp;tanpa anak-anak daun sehingga mirip dengan gejala berat defisiensi hara B (Boron)&nbsp;&nbsp;pada perkembangan selanjutnya, tanaman menghasilkan pelepah-pelepah baru, bunga dan tandan yang normal, hal ini membutuhkan waktu 1-2 tahun dan tanaman yang telah pulih tampak &ldquo;berpinggang&rdquo; bahkan kadang-kadang menjadi bercabang.&nbsp;&nbsp;Sistem parakaran pada tanaman sakit umumnya tampak normal, kecuali jika penyakit telah berlangsung cukup lama dengan tingkat dengan tingkat gejala sangat berat, akar menjadi ikut busuk, berair, bewarna coklat dan berbau busuk.&nbsp;&nbsp;Tanaman sakit tersebar tidak merata, sering berkelompok beberapa pohon, dapat menular ke pohon-pohon sehat yang berdekatan&nbsp;</p>\r\n', '<p><strong>Cara pencegahan:</strong><br />\r\nâ¦&nbsp;Rutin membersihkan kotoran atau sampah-sampah organik berupa bunga/buah dan seludang bunga kering diketiak pelepah daun terutama sebelum musim hujan untuk mengurangi kelembaban.<br />\r\nâ¦ Membersihkan kebun dari sampah-sampah untuk mengurangi sarang perkembangbiakan hama&nbsp;<em>Rhynchophorus spp.</em> yang berperan sebagai serangga penyebar jamur penyakit.</p>\r\n\r\n<p><br />\r\n<strong>Cara pengendalian:</strong><br />\r\nâ¦ Bagian yang mengalami nekrosis dipotong dan dimusnahkan<br />\r\nâ¦ Sebelum pembusukan jaringan berlanjut ke titik tumbuh maka semua pupus yang patah dicabut dan semua jaringan busuk dikeluarkan,&nbsp;&nbsp;letakkan ditempat terbuka agar langsung kena sinar matahari dan dibakar setelah kering&nbsp;<br />\r\nâ¦ Melakukakan penuangan atau penyemprotan campuran formulasi fungisida dan antibiotik&nbsp;&nbsp;yaitu 1 g benlate (b.a benomil) + 1 g streptomycin atau agrimycin 15 wp (oksitetrasiklin) dalam 1 liter air, dilakukan 3 kali dengan pusingan 2 minggu<br />\r\nâ¦ Pengendaliaan juga bisa dilakukan secara chemical yaitu dengan cara menggunakan marshal, dengan dosis 10 gram / pokok selama sebulan, &nbsp;untuk wilayah yang sedang musim penghujan (karena ditakutkan tergerus air hujan) maka dilakukan pengendalian dengan dosis 5 gram / pokok untuk 2 minggu sekali.<br />\r\nâ¦ Apabila pupusnya mengalami kerusakan, pupusnya wajib untuk dicabut dan dibuang, kemudian dibelah antar pelepah-pelepah, untuk mempermudah pertumbuhan pupus sekaligus mencegah bengkoknya pertumbuhan pupus baru apabila tidak dibelah.<br />\r\nâ¦ Mengendalikan <em>Rhynchophorus spp.</em> secara manual dengan menangkap atau dengan insektisida azodrin 15 wsc sebanyak 10-15 ml/pohon secara injeksi batang atau absorbs akar.&nbsp;<br />\r\nâ¦ Pengendalian hama Rhynchophorus spp juga dapat dilakukan dengan pemasangan feromon 1 ferotrap / 2 ha. Ferotrap terbuat dari ember plastic dengan volume 12 atau 25 liter. Tutup ember diletakkan terbalik dengan 9 lubang berdiameter 3cm. feromon dipasang pada bagian dalam tutup ember, lubang kurang lebih 0,5 cm, berada dibagian samping sebanyak 4 lubang setinggi 15 cm dari bawah. Ferotrap ini dipasang pada tiang bambu&nbsp;setinggi 2,5 meter, kemudian didalam ember di isi air sabun<br />\r\nâ¦ Untuk tanaman yang baru pulih disarankan memberi ekstra pupuk N dan MG sebesar 25%.<br />\r\n&nbsp;</p>\r\n', '115803848_busuk pupus.png', 'penyakit'),
('D007', 'Busuk Daun (Antraknosa)', '<p style=\"text-align:justify\">Penyakit Busuk Daun (Antraknosa) merupakan sekumpulan nama infeksi pada daun bibit-bibit muda, yang disebabkan oleh 3 genera jamur patogenik, yaitu <em>Botryodiplodia spp, Melanconium elaeidis dan Glomerella cingulata</em>. Spora dihasilkan di dalam piknidia atau aservuli, menyebar dengan bantuan angin atau percikan air siraman atau hujan. GÐµjÐ°lÐ° biasanya dijumpai Ñ€Ð°dÐ° bÐ°gÑ–Ð°n tÐµngÐ°h atau ujung daun, bÐµruÑ€Ð° bÑ–ntÑ–k tÐµrÐ°ng ÑƒÐ°ng Ñ•ÐµlÐ°njutnÑƒÐ° mÐµlÐµbÐ°r dÐ°n mÐµnjÐ°dÑ– kuning dÐ°n ÑÐ¾klÐ°t gÐµlÐ°Ñ€. JÐ°rÑ–ngÐ°n Ñ•Ð°kÑ–t Ñ•ÐµlÐ°njutnÑƒÐ° nÐµkrÐ¾Ñ•Ñ–Ñ•, bercak meluas dÐµngÐ°n bÐ°tÐ°Ñ• Ð°ntÐ°rÐ° bercak dÐµngÐ°n jÐ°rÑ–ngÐ°n sehat bÐµrwÐ°rnÐ° kuning. Bercak kÐ°dÐ°ngkÐ°lÐ° memanjang sejajar tulang dÐ°un. Bagian tanaman yang diserang adalah daun dan tulang daun, Daun-daun tanaman kelapa sawit yang terinfeksi akan mengering, dan pada serangan berat, penyakit antraknosa dapat menyebabkan kematian tanaman. Gejala penyakit antraknosa pada tanaman kelapa sawit dapat diketahui jika terdapat bercak-bercak cokelat tua pada ujung daun dan tepi daun. Bercak-bercak dikelilingi warna kuning yang merupakan batas antara bagian daun yang sehat dan yang terserang. Jika menyerang tulang daun, terlihat adanya warna coklat dan hitam diantara tulang daun. Pada serangan parah, seluruh daun akan mengering dan selanjutnya tanaman mati</p>\r\n', '<p style=\"text-align:justify\"><strong>Cara Pencegahan:</strong></p>\r\n\r\n<p style=\"text-align:justify\">â¦ Pencegahan secara agornomis dengan mengatur jarak tanam pada pembibitan, melakukan penyiraman yang teratur,&nbsp;dan pemupukan yang teratur.<br />\r\nâ¦ Menanam bibit dengan benar, jangan sampai media semai rusak atau pecah saat&nbsp;melakukan penanaman.<br />\r\nâ¦ Jangan terlambat pindah tanam dan <em>pre nursery</em> (PN) ke <em>main nurse</em><br />\r\n<br />\r\n<strong>Cara pengendalian:</strong><br />\r\nâ¦ Sanitasi atau pemotongan pada daun-daun yang sakit, dikumpulkan kemudian dibakar atau dibuang<br />\r\nâ¦ Memisahkan bibit sakit dari bibit yang sehat<br />\r\nâ¦ Penyemprotan dengan fungisida secara rotasi dengan bahan aktif jenis Mankozeb (seperti DITHANE M-45) atau yang sejenisnya dengan konsentrasi 0,2%, Benomil (seperti Benlox) konsentrasi 0,3%, dan Propineb (Seperti Antracol) konsentrasi 0,2%, dengan interval satu minggu<br />\r\nâ¦ Jika mengalami serangan yang sangat berat, sebaiknya bibit kelapa sawit dimusnahkan dengan cara dibakar</p>\r\n', '315066580_busuk daun.png', 'penyakit'),
('D008', 'Jelaga (Sooty Moulds)', '<p style=\"text-align:justify\">Penyakit Jelaga adalah penyakit yang menyerang bagian daun kelapa sawit dewasa yang sangat umum diseluruh dunia. Penyakit jelaga disebabkan oleh jamur <em>Ceramothyrium</em>, <em>Chatothyrium</em> dan <em>Brooksia</em>. Perkembangan jamur jelaga tergantung pada sekresi serangga, contoh embun-madu dari kepik dan kutu daun (aphid). Spora jamur jelaga melekat di permukaan daun dan berkecambah bila ada sekresi serangga. Spora jamur disebarkan oleh angin dan serangga Pada musim hujan cendawan akan berkembang ekstensif dan padat. Koloni cendawan biasanya dibawah daun, 0 &ndash; 5 mm berwarna hitam, namun terkadang cendawan tumbuh diatas permukaan daun, tampak menghitam seperti disemprot dengan jelaga atau seperti terkena asap hitam tebal. Biasanya menyerang tanaman pada umur di atas 5 tahun, terutama pada daun-daun tua. Penyakit ini dianggap tidak merugikan secara ekonomi karena kerusakan pada fisik yang ditimbulkan tidak nyata dan dianggap epifitik. Tetapi jika kasusnya berat dapat mempengaruhi proses fotosintesis karena kurangnya akses cahaya ke daun akibat tertutup oleh koloni jamur, beberapa faktor pendorong penyakit ini adalah tingkat kelembaban tinggi pada areal kebun, terutama pada rendahan dan adanya serangga kutu daun. Bila koloni jamur dikupas secara perlahan, maka jaringan daun di bawahnya tidak ada kerusakan fisik, tetapi berwarna hijau pucat dibandingkan dengan jaringan di sekelilingnya.&nbsp;</p>\r\n', '<p><strong>Cara pencegahan:</strong><br />\r\nâ¦&nbsp;Penunasan jangan terlambat<br />\r\nâ¦ Jarak tanam antar tanaman jangan terlalu rapat</p>\r\n\r\n<p><br />\r\n<strong>Cara pengendalian:</strong><br />\r\nâ¦ Melakukan penunasan pelepah pada gejala serangan yang berat.<br />\r\nâ¦ Melakukan penyemprotan dengan insektisida yang efektif. Pengendalian dapat dilakukan dengan penyemprotan detergen 5%, dan tidak boleh terlalu sering<br />\r\n&nbsp;</p>\r\n', '1366542692_jelaga.png', 'penyakit'),
('D009', 'Defisiensi Unsur Hara B (Boron)', '<p style=\"text-align:justify\">Unsur Hara Boron (B) merupakan suatu unsur perpaduan antara gula, karbohidrat, inti dan protein asam metabolis yang penting untuk kelancaran proses kegiatan tanaman kelapa sawit. Fungsi boron pada tanaman kelapa sawit yaitu berperan meningkatkan peredaran kandungan gula dan kalsium serta berperan dalam pembungaan dan pembuahan serta berperan dalam pembentukan sel terutama dalam titik tumbuh pucuk tanaman. Dalam hal ini bahwa kekurangan Boron akan mempengaruhi perkembangan ujung pada helai daun, dan menghasilkan buah <em>Parthenocarpic</em>. Ciri-ciri umum &nbsp;gejala defisiensi Boron biasanya tampak pada bentuk daun dan permukaan daun. Kekurangan boron terjadi pada lapisan dimana boron (B) mudah sekali tercuci (curah hujan tinggi, tanah berpasir dan tanah gambut). Fungsi unsur hara Boron bagi tanaman sangat penting dalam sintesa karbohidrat dan gula, metabolisme asam nukleat dan protein. Peranan yang sangat penting lainnya adalah peranannya dalam proses meristematic (komponen jaringan pertumbuhan)</p>\r\n', '<p><strong>Cara pencegahan:</strong><br />\r\nâ¦ Untuk mencegah kekurangan Boron, lakukan pengaplikasian pupuk borat dosis 70-100 gr / tahun&nbsp;</p>\r\n\r\n<p><br />\r\n<strong>Cara pengendalian:</strong><br />\r\nâ¦ Pada kelapa sawit muda yang berumur (1-3 tahun) Memberikan BORATE pentahydrate dengan dosis 60-100 gram / pokok / tahun<br />\r\nâ¦ Pada tanaman yang berumur (di atas 3 tahun) Memberikan BORATE pentahydrate dengan dosis 100-200 gram / pokok / tahun<br />\r\nâ¦ Pengendalian juga bisa dilakukan dengan memberikan pupuk yang mengandung boron sebanyak 100-200 gram / pokok/ tahun<br />\r\n&nbsp;</p>\r\n', '1387511313_boron.png', 'penyakit'),
('D010', 'Ulat Api (Setothosea asigna, Setora nitens, Darna trima dan Ploneta diducta)', '<p style=\"text-align:justify\">Ulat Api merupakan salah satu kendala penting dalam budidaya tanaman kelapa sawit, karena ulat ini dapat memakan daun dan menyebabkan kerusakan berat sehingga dapat merugikan perkebunan kelapa sawit dan sudah menjadi hama endemik pada daerah tertentu. Ada empat jenis ulat api yang biasa menyerang kelapa sawit yaitu: <em>Setothosea asigna, Setora nitens, Darna trima</em>, dan <em>Parasa lepida</em>. Yang paling sering menyerang perkebunan adalah ulat api yang berjeniskan <em>Setothosea asigna</em> dan&nbsp;<em>Setora nitens</em>. Ulat api termasuk dalam serangga ordo Lepidopteradan famili Limacodidae. Ulat api adalah salah satu musuh yang sangat ditakuti dalam perkebunan kelapa sawit, karena serangan ulat api akan menurunkan produktifitas tanaman kelapa sawit.&nbsp;Serangan hama ulat ini dengan cara menggerogoti bagian daun kelapa sawit, dimulai dari helaian daun bagian bawah hingga menjadi lidi, dalam kondisi yang sangat parah tanaman akan kehilangan daun hingga 50% &ndash; 90%. Ulat api menyukai daun kelapa sawit tua, tetapi apabila daun-daun tua sudah habis ulat juga memakan daun-daun muda. Selanjutnya bisa mengakibatkan kematian apabila tidak segera dikendalikan dengan benar.<em>&nbsp;</em></p>\r\n\r\n<p style=\"text-align:justify\">Pada tahap pembibitan, serangan ulat api akan berdampak jangka panjang dan akan mempengaruhi kualitas dan kuantitas produksi dimasa yang akan datang. Pada kelompok tanaman menghasilkan (TM) serangan ulat api akan berdampak pada penurunan produktivitas tanaman karena terganggunya proses fotosintesis yang mengakibatkan terganggunya proses pembentukan bunga dan buah. Berdasarkan hasil pengamatan yang dilakukan beberapa perusahaan, serangan ulat api dapat menurunkan produksi sebanyak 25% pada tahun pertama, dan menurunkan produksi sebanyak 50% &minus; 75% pada tahun kedua dan ketiga. Ciri khas ulat ini adalah memiliki bulu yang apabila mengenai kulit kita akan terasa seperti tersengat api, pedas dan gatal. Termasuk ke dalam seranggan dengan metamorfosis sempurna dengan stadia telur dan larva umumnya pada daun sawit, kepompong terbungkus pada pupa yang terletak di tanah atau ketiak pelepah tanaman. Untuk mengetahui tingkat serangan hama ulat api dilakukan deteksi biasanya dilakukan 1 bulan sekali, sensus hama untuk mengetahui persentase tingkat serangan (dilakukan 10 -20 hari), dan kemudian dilakukan pengendalian. Apabila tingkat serangan diatas 10 persen maka dilakukan pengendalian.</p>\r\n', '<p><strong>Cara pencegahan:</strong><br />\r\nâ¦ Menanam bunga pukul delapan (<em>Tunera Subulata</em>), bunga ini selain berfungsi untuk memperindah kebun (biasanya ditanam di pinggir jalan produksi) juga berfungsi sebagai sumber pakan bagi predator (pemangsa) hama ulat api dan ulat kantong.<br />\r\nâ¦ Menanam bunga air mata pengantin (<em>Antigonon Leptopus</em>) dan ketepeng cina (<em>Cassia cobanensis</em>), yang digunakan &nbsp;sebagai inang bagi predator ulat api. &nbsp;</p>\r\n\r\n<p><br />\r\n<strong>Cara pengendalian:</strong><br />\r\nâ¦ Pengutipan dan pemusnahan ulat dan kepompong yang terdapat di sekitar tanaman yang terserang. Selain itu, pemasangan <em>light trap</em> untuk menarik dan menangkap imago dapat juga dilakukan (menggunakan alat pelindung dikarenakan ulat memilik efek gatal dan panas jika menyentuh kulit)<br />\r\nâ¦ Pengendalian kimiawi dilakukan jika tingkat populasi ulat api sekitar 5-10 ekor ulat pada setiap pelepah. Pada tanaman kelapa sawit yang masih rendah, pengendalian ulat api dilakukan dengan menyemprotkan larutan inteksida berbahan aktif Deltametrin dengan dosis 2cc/liter air atau menggunakan Insektisida yang telah diizinkan oleh Menteri Pertanian. Pengendalian ulat api dengan insektisida berbahan aktif Deltametrin dapat dilakukan dengan cara <em>fogging</em>. Pengendalian dengan cara fogging lebih cocok diaplikasikan pada tanaman pendek atau tanaman kecil, karena alat ini mempunyai batas jangkauan penyemprotan, dan dikhawatirkan tidak maksimal digunakan pada tanaman tinggi, &nbsp;beberapa ada yang berpendapat bahwa cara ini dianggap kurang efektif, karena dianggap dapat menimbulkan tidak tepat sasaran pada saat melakukan <em>fogging</em>, dikhawatirkan akan dapat membunuh hama lain seperti predator hama ulat api yang sifatnya menguntungkan yaitu dapat mengurangi populasi hama ulat api di kelapa sawit.<br />\r\nâ¦ Pengendalian dapat dilakukan dengan Injeksi batang dengan menggunakan bor dengan cara melubangi batang dan kemudian cairan atau bahan aktif yang telah dicampur di suntikan ke dalam batang kelapa sawit, bahan aktif yang digunakan adalah jenis Achepate seperti starthen atau orthen dengan dosis 20 gram / pokok, setelah dicampur air menjadi 40 cc untuk dosis / pokok. Pengendalian ini lebih efektif diaplikasikan pada tanaman yang sudah tinggi (tanaman menghasilkan).&nbsp;<br />\r\nâ¦ Setelah 10 hari dilakukan pengendalian, kemudian dilakukan sensus kembali, apabila tingkat serangan tidak menurun dilakukan cara pengendalian yang sama kembali.<br />\r\n&nbsp;</p>\r\n', '64630053_ulat api.png', 'hama'),
('D011', 'Ulat Kantong (Metisa plana, Mahasena corbetti dan Cremastopsyche pendula)', '<p style=\"text-align:justify\">Salah satu faktor yang mempengaruhi penurunan produksi, produktivitas dan mutu kelapa sawit akibat adanya serangan OPT yaitu hama ulat kantung <em>Mahasena corbetti</em> dari <em>Ordo Lepidoptera</em> dan <em>Famili Psychidae</em>. Ulat kantung adalah salah satu musuh yang sangat ditakuti dalam perkebunan kelapa sawit, karena serangan ulat api akan menurunkan produktifitas tanaman kelapa sawit. Serangan ulat kantung menyebabkan daun tidak utuh, rusak, dan berlubang- lubang. Kerusakan helaian daun dimulai dari lapisan epidermisnya. Kerusakan lebih lanjut adalah mengeringnya daun yang menyebabkan tajuk bagian bawah bewarna abu-abu dan hanya daun mudah yang bewarna hijau. Ulat kantung adalah larva yang hidup pada kantung tersendiri. Mereka tetap tinggal pada kantungnya sampai dewasa pada ulat betina dan sampai pupa pada ulat jantan. Ulat kantung merupakan hama penting yang paling sering muncul pada perkebunan sawit disebabkan potensinya untuk mencapai titik puncak serangan, merupakan hama penting yang paling sering muncul pada perkebunan sawit disebabkan potensinya untuk mencapai titik puncak serangan. Ambang batas untuk ulat kantong ini adalah 5 ulat per pelepah. Hama ulat kantong merusak tanaman kelapa sawit dengan memakan daun yang terdapat pada pelepah kelapa sawit yang digunakan sebagai perkembangan tubuhnya dan untuk pembentukan kantongnya dari hama tersebut. Larva ulat kantong lebih suka memakan daun bagian atas dan daun bagian bawah untuk menggantung dan membentuk kantong. Kerusakan pada tanaman kelapa sawit akan terlihat secara jelas ketika sudah terjadi defoliasi sebesar 50%. Kerusakan pada tingkat ini akan mengurangi hasil hingga 10 ton TBS/ha. Ulat kantung terdapat beragam jenis nya yaitu <em>Metisa Plana, Mahasena corbetti,&nbsp;Cremastopsyche pendula.</em>&nbsp;jenis ulat kantong yang paling umum atau yang sering menyerang perkebunan adalah&nbsp;<em>Metisa Plana</em> dan&nbsp;<em>Mahasena corbetti</em>,</p>\r\n', '<p><strong>Cara pencegahan</strong>:<br />\r\nâ¦ Menanam bunga pukul delapan (<em>Tunera Subulata</em>), bunga ini selain berfungsi untuk memperindah kebun (biasanya ditanam di pinggir jalan produksi) juga berfungsi sebagai sumber pakan bagi predator (pemangsa) hama ulat kantong dan juga ulat api.<br />\r\nâ¦ Menanam bunga air mata pengantin (<em>Antigonon Leptopus</em>) dan ketepeng cina (<em>Cassia cobanensis</em>), yang digunakan &nbsp;sebagai inang bagi predator ulat kantong. &nbsp;</p>\r\n\r\n<p><br />\r\n<strong>Cara pengendalian:</strong><br />\r\nâ¦ Pengendalian hama secara mekanis mencakup usaha untuk menghilangkan secara langsung hama serangga yang menyerang tanaman. Pengendalian mekanis ini biasanya bersifat manual, yaitu dengan cara pemangkasan pelepah yang terdapat banyak larva ulat, mengambil larva yang sedang menyerang dengan tangan secara langsung (disarankan menggunakan sarung tangan) menumpuk dan kemudian membakarnya.<br />\r\nâ¦ Pengendalian ulat pemakan daun Kelapa Sawit, khusus Ulat Kantong memiliki perilaku yang khusus. Hal ini dikarenakan Ulat Kantong memiliki kantong yang menyelimutinya. Kantong tersebut berguna untuk melindungi ulat dari ancaman predator. Jadi, jika hendak melakukan pengendalian secara kimiawi dapat dilakukan dengan racun yang bersifat sistemik. Racun sistemik adalah racun yang diserap melalui sistem organisme misalnya melalui akar atau daun kemudian diserap ke dalam jaringan tanaman yang akan bersentuhan atau dimakan oleh hama sehingga mengakibatkan peracunan bagi hama. Pengendaliannya dapat dilakukan dengan Injeksi batang dengan menggunakan bor dengan cara melubangi batang dan kemudian cairan atau bahan aktif yang telah dicampur di suntikan ke dalam batang kelapa sawit, bahan aktif yang digunakan adalah jenis Achepate seperti starthen atau orthen dengan dosis 20 gram / pokok, setelah dicampur air menjadi 40 cc untuk dosis / pokok<br />\r\nâ¦ Pada tanaman TBM yang terserang hama ulat kantong lebih efektif menggunakan <em>Mist Blowwer </em>(alat ini dapat digunakan dengan jangkauan maksimal 4 meter).<br />\r\n&nbsp;</p>\r\n', '1358819983_ulat kantung.png', 'hama'),
('D012', 'Kumbang Tanduk (Oryctes rhinoceros)', '<p style=\"text-align:justify\">Hama&nbsp;<em>Oryctes rhinoceros</em>&nbsp;atau yang sering disebut kumbang tanduk atau kumbang badak merupakan salah satu hama utama pada tanaman kelapa sawit. Hama&nbsp;<em>Oryctes rhinoceros</em>&nbsp;menyerang tanaman kelapa sawit yang baru ditanam sampai tanaman tua. Hama ini menyerang Tanaman belum menghasilkan (TBM) maupun tanaman menghasilkan (TM) dengan menggerek bagian pangkal pelepah muda tanaman, kumbang tanduk biasanya menyerang tanaman kelapa sawit yang ditanam di lapangan sampai umur 2,5 tahun dengan merusak titik tumbuh sehingga terjadi kerusakan pada daun muda. Kumbang tanduk (<em>Oryctes rhinoceros</em>) dapat menyebabkan kerusakan sampai 69 % pada serangan pertama, menurunkan produksi tandan buah segar (TBS), dan bahkan menyebabkan tanaman muda mati mencapai 25%. Masalah menjadi semakin berat dengan semakin banyaknya kebun kelapa sawit yang melakukan replanting.</p>\r\n\r\n<p style=\"text-align:justify\">Permasalahan hama ini semakin menjadi lebih penting diakibatkan populasi <em>Oryctes rhinoceros</em>&nbsp;&nbsp;yang sangat tinggi. Tidak hanya menyerang tanaman belum menghasilkan (TBM) saja tetapi dapat menyerang tanaman kelapa sawit yang sudah tua. Bahkan ada kebun yang harus melakukan kegiatan replanting yang di percepat meskipun umur kelapa sawit baru 15 tahun. Supaya tidak terjadi pada tanaman kelapa sawit tersebut yang telah terserang penyakit ganoderma yang akan menjadi tempat sangat sesuai untuk perkembangan hama <em>Oryctes rhinoceros</em> yang dapat menyebabkan semakin banyak perkembangan dari hama kumbang tanduk tersebut. Jika tidak dilakukan pengendalian hama kumbang tanduk maka akan terjadi kerugian yang sangat signifikan bagi perusahaan maupun masyarakat sekitar.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Kerugian akibat dari serangan <em>O. rhinoceros </em>pada perkebunan kelapa sawit dapat terjadi baik secara langsung maupun tidak langsung. Kerugian yang secara tidak langsung yaitu dengan rusaknya pada pelepah daun yang akan mengurangi kegiatan fotosintesis tanaman yang pada akhirnya akan menurunkan produksi. Kerugian secara langsung adalah matinya tanaman kelapa sawit yang dapat mengakibatkan serangan hama ini. Sudah terbukti dapat mematikan pucuk pada tanaman kelapa sawit yang disebabkan oleh kumbang dewasa yang terbang pada malam hari. Dari pelepah daun yang belum terbuka dapat mengakibatkan pelepah pada tanaman kelapa sawit menjadi patah disebabkan oleh hama <em>O. rhinoceros</em> pada tanaman kelapa sawit</p>\r\n', '<div><strong>Cara Pencegahan:</strong><br />\r\nâ¦ Perlu dilakukan pengamatan/monitoring lanjutan terhadap serangan hama&nbsp;<em>Oryctes rhinoceros</em>&nbsp;di kebun secara berkala (maksimal 1 bulan sekali) terutama dengan memperhatikan dan mencatat jumlah tanaman yang terserang serta jumlah larva dan imago pada tempat-tempat perkembangbiakan hama&nbsp;<em>Oryctes rhinoceros</em>, yaitu di tumpukan batang kelapa sawit (<em>chipping</em>).<br />\r\nâ¦ Membersihkan tumpukan batang kelapa sawit serta tunggul &ndash; tunggul tanaman lain, dan sampah-sampah organik yang sudah melapuk, agar mengurangi kelembapan pada areal lahan perkebunan sehingga tidak menjadi tempat/sarang perkembangbiakan hama&nbsp;rhinoceros<br />\r\nâ¦ Penanaman tumbuhan <em>Mucuna bracteata</em>&nbsp;(tanaman polongan) pada area tanaman belum menghasilkan (TBM) tanaman ini dapat mengurangi pergerakan hama kumbang tanduk, di mana dengan penutupan lahan yang tebal dapat menghalangi terbangnya kumbang untuk mencari makan dan berkembang biak. keunggulan lainnya dari&nbsp;<em>Mucuna bracteata</em>&nbsp;adalah mampu menjaga kelembapan tanah dan mencegah erosi, toleran terhadap kekeringan dan relatif tahan terhadap naungan, serta tidak disukai oleh serangga hama maupun binatang ternak karena kandungan senyawa fenolik yang tinggi (serangga akan merasa panas apabila berada dibawah tanaman tersebut). Tujuan lain dari <em>Mucuna bracteata</em>&nbsp;untuk mempercepat proses pembusukan tanaman yang telah ditumbang setelah replanting, atau sebagai pengurai, karena biasanya tanaman yang sudah direplanting/ tumbang akan menjadi rumah hama tikus dan kumbang tanduk.</div>\r\n\r\n<div><br />\r\n<strong>Cara pengendalian:</strong><br />\r\nâ¦ Pemberantasan secara kimiawi dapat dilakukan dengan penyemprotan insektisida berbahan aktif karbosulfan. Penyemprotan dikhususkan pada pucuk tanaman karena bagian ini paling disukai kumbang. Aplikasi dapat dilakukan setiap 1-2 minggu.<br />\r\nâ¦ Pengendalian kultur teknis dapat juga dilakukan dengan memberikan butiran garam kasar 200 g/tanaman. Garam dikemas dalam kantong plastik yang ditusuk jarum di beberapa tempat agar saat hujan turun garam yang terkena tetesan air sedikit demi sedikit ke bagian pucuk kelapa sawit.<br />\r\nâ¦ Pengumpulan/pengutipan imago&nbsp;<em>Oryctes rhinoceros</em>&nbsp;secara manual di sekitar tanaman kelapa sawit yang terserang. Tindakan ini dilakukan tiap bulan apabila populasi imago&nbsp;Oryctes rhinoceros&nbsp;&nbsp;3 &ndash; 5 ekor/ha, setiap 2 minggu jika populasi imago&nbsp;<em>Oryctes rhinoceros</em>&nbsp; mencapai 10 ekor/ha, dan setiap hari apabila populasi atau serangan sudah sangat tinggi (eksplosif).<br />\r\nâ¦ Pembongkaran rumpukan bahan organik yang tidak terdekomposisi sempurna karena menjadi tempat makan dan sarang perkembangbiakan (<em>breeding site</em>) bagi hama&nbsp;<em>Oryctes rhinoceros</em>&nbsp;dengan cangkul dan dilakukan pengutipan ulat/larva&nbsp;<em>Oryctes rhinoceros</em> secara manual, kemudian dikumpulkan dan dimatikan.<br />\r\nâ¦ Pengendaliaan secara chemical menggunakan marshal, dengan dosis 10 gram / pokok selama sebulan, &nbsp;untuk wilayah yang sedang musim penghujan (karena ditakutkan tergerus air hujan) maka dilakukan pengendalian dengan dosis 5 gram / pokok untuk 2 minggu sekali.<br />\r\nâ¦ Pemasangan perangkap feromon berbahan aktif&nbsp;ethyl-4-methyloctanoat&nbsp;untuk memerangkap imago&nbsp;<em>Oryctes rhinoceros&nbsp;</em>&nbsp;dengan dosis 1 sachet feromon/ha. Feromon dapat bertahan selama 2 bulan di lapangan. Pemasangan perangkap feromon dilakukan berulang sampai serangan hama&nbsp;<em>Oryctes rhinoceros</em>&nbsp;menurun/terkendali. Pengamatan dilakukan maksimal setiap 1 minggu sekali dengan cara menurunkan perangkap feromon dan menghitung jumlah kumbang&nbsp;<em>Oryctes rhinoceros</em>&nbsp;&nbsp;yang terperangkap. Beberapa lokasi pemasangan perangkap feromon, yaitu:<br />\r\nâ¦ Perangkap feromon dipasang pada daerah dengan serangan hama<em>&nbsp;Oryctes rhinoceros</em>&nbsp;&nbsp;tinggi, misalnya di pinggir jalan karena imago<em>&nbsp;O. rhinoceros</em>&nbsp;sangat tertarik oleh cahaya/lampu.<br />\r\nâ¦ Perangkap feromon dipasang pada daerah perbatasan dengan kebun lain atau dengan areal pemukiman penduduk, sehingga imago&nbsp;<em>Oryctes rhinoceros</em>&nbsp;akan terperangkap.</div>\r\n', '1826537054_kumbang tanduk.png', 'hama'),
('D013', 'Rayap (Coptotermes curvignathus)', '<p style=\"text-align:justify\">Dalam meningkatkan produksi dan produktivitas tanaman kelapa sawit, masih terkendala oleh adanya serangan organisme pengganggu tumbuhan (OPT).&nbsp;&nbsp;Gangguan OPT tersebut dapat menimbulkan kerusakan berarti yang pada akhirnya menimbulkan kerugian hasil dan pendapatan petani.&nbsp;Salah satu faktor yang mempengaruhi penurunan produksi, produktivitas dan mutu kelapa sawit adalah adanya serangan Organisme Pengganggu Tumbuhan (OPT) yaitu hama rayap. Di Indonesia ada kurang lebih 200 spesies rayap tergolong pada famili&nbsp;&nbsp;Kalotermitidae, Rhinotermitidae, dan Termitidae. Ada jenis spesies rayap yang merupakan hama utama di perkebunan kelapa sawit, khususnya lahan gambut dan eks hutan yaitu&nbsp;<em>Coptotermes curvignathus</em>. &nbsp;Serangan&nbsp;<em>C. curvignathus</em>&nbsp;dapat menyebabkab kerusakan lebih dari 50% (kerusakan berat) hingga menimbulkan kematian pada tanaman kelapa sawit.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nHama rayap adalah salah satu hama pada tanaman kelapa sawit. Rayap dapat menyerang pada semua umur tanaman yang mengakibatkan kerugian yang cukup besar karena dapat menyebabkan kematian pada tanaman kelapa sawit. Kematian pada tananam kelapa sawit tersebut dapat menurunkan populasi dan akhirnya berdampak juga terhadap penurunan produksi pada tanaman menghasilkan (TM). Serangga ini bervariasi dalam ukuran, dari 2 mm sampai 12 mm. Rayap memiliki bentuk kepala yang menghadap ke depan (<em>Prognathik head</em>), memiliki antena berbentuk monoliform bersegmen 9 sampai 30. &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nRayap (<em>Coptotermes curvignathus</em>) merupakan serangga yang potensial menjadi hama tanaman perkebunan dan dapat menimbulkan permasalahan yang serius pada perkebunan kelapa sawit yang baru dibuka. Hama rayap biasanya dapat dilihat pada bagian pelepah sawit, dimana terdapat alur-alur terowongan dari tanah, berwarna coklat dan agak lembab. Hama rayap hidup pada tanaman yang biasanya dilapisi oleh tanah sedangkan pada bagian dalam nya selalu berlubang. Di dalam lubang-lubang inilah dapat dijumpai sarang rayap yang konstruksinya sangat khas, yaitu menyerupai lapisan karton yang tercampur kotorannya dan dikelilingi oleh tanah liat. Beberapa meter dari pangkal batang dapat berisi sarang bentuknya menyerupai sisir<br />\r\n&nbsp;</p>\r\n', '<p><strong>Cara pengendalian:</strong><br />\r\nâ¦ Batang dan pelepah yang terserang dirusak kemudian disemprot insektisida 1-2 liter/pohon<br />\r\nâ¦&nbsp;Siram 2 liter/pohon pada radius 30 cm di sekitar pangkal batang<br />\r\nâ¦&nbsp;6 pohon sekelilingnya diaplikasikan seperti pada nomor 2<br />\r\nâ¦&nbsp;Melakukan monitoring selama 2 minggu setelah aplikasi, apabila masih terdapat hama perlu dilakukan pengaplikasian ulang.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p><em><strong>*Pada tanaman mati</strong></em><br />\r\nâ¦ Untuk Kasus pohon yang sudah&nbsp;mati sebaiknya dibongkar dan disanitasi<br />\r\nâ¦&nbsp;Aplikasi termitisida diperlukan apabila masih terdapat lorong aktif pada batang&nbsp;&nbsp;<br />\r\nâ¦&nbsp;Lubang bongkaran disiram dengan termitisida apabila terindikasi ada rayap yang masih aktif<br />\r\n&nbsp;</p>\r\n', '1692933051_rayap.png', 'hama'),
('D014', 'Tikus (Rattus-rattus tiomanicus)', '<p style=\"text-align:justify\">Hama &nbsp;tikus (<em>Rattus-rattus tiomanicus</em>) &nbsp;merupakan &nbsp;hama &nbsp;utama &nbsp;pada &nbsp;perkebunan &nbsp;kelapa &nbsp;sawit. &nbsp;Pada &nbsp;tanaman kelapa &nbsp;sawit yang baru &nbsp;ditanam, &nbsp;hama &nbsp;tikus &nbsp;dapat &nbsp;menyebabkan &nbsp;kematian &nbsp;hingga &nbsp;20 &ndash;30 &nbsp;%, &nbsp;dan &nbsp;kerusakan yang ditimbulkan adalah pelepah sampai titik tumbuh pada tanaman muda, bunga dan buah pada tanaman yang menghasilkan (TM). Jenis tikus yang menyerang perkebunan kelapa sawit adalah&nbsp;<em>Rattus tiomanicus,&nbsp;R. argentiventer,&nbsp;R. diardii</em>&nbsp;dan&nbsp;<em>R. exulans</em>. Dominasi jenis tikus pada pertanaman kelapa sawit seringkali didasarkan pada pertumbuhan dari tanaman tersebut. Pada saat tanaman kelapa sawit baru ditanam sampai mencapai ketinggian kurang dari 2 meter, jenis tikus yang mendominasi adalah tikus sawah (<em>R. argentiventer</em>). Setelah tanaman mencapai ketinggian 2 m atau lebih, jenis tikus yang mendominasi berubah menjadi tikus pohon &nbsp;(R. tiomanicus). &nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Serangan tikus dapat menyebabkan pertumbuhan tanaman kelapa sawit menjadi terganggu dan menurunkan produksi tandah buah segar pada tanaman. Pada tanaman kelapa sawit yang baru ditanam dan tanaman yang belum menghasilkan (TBM), tikus mengerat serta memakan bagian pangkal pelepah daun, sehingga mengakibatkan pertumbuhan tanaman terhambat atau bahkan tanaman dapat mati jika keratan tikus mengenai titik tumbuhnya.Pada tanaman kelapa sawit yang sudah menghasilkan (TM), tikus memakan buah, baik yang masih muda maupun yang sudah tua.&nbsp;keseluruhan bagian (inti dan daging buah) dapat dimakan oleh tikus. Sedangkan pada buah yang sudah tua, hanya daging buahnya saja yang dimakan dengan meninggalkan serat&nbsp;</p>\r\n', '<p><strong>Cara pencegahan:</strong><br />\r\nâ¦ Pengaturan jarak tanam, bertujuan agar tajuk kelapa sawit tidak saling bersentuhan antara pohon yang satu dengan pohon yang lain, sehingga dapat menghambat pergerakan tikus antar pohon.<br />\r\nâ¦ Penanaman tumbuhan <em>Mucuna bracteata</em>&nbsp;(tanaman polongan) pada area tanaman belum menghasilkan (TBM) tanaman ini dapat mengurangi pergerakan hama seperti tikus.&nbsp;Tanaman <em>Mucuna bracteata</em>&nbsp;tidak disukai oleh serangga hama maupun binatang ternak karena kandungan senyawa fenolik yang tinggi (serangga akan merasa panas apabila berada dibawah tanaman tersebut). Tujuan lain dari Mucuna bracteata&nbsp;untuk mempercepat proses pembusukan tanaman yang telah ditumbang setelah replanting, atau sebagai pengurai, karena biasanya tanaman yang sudah direplanting/ tumbang akan menjadi rumah hama tikus dan kumbang tanduk.&nbsp;<br />\r\nâ¦ Menggunakan rambut bekas, rambut ditebar mengelilingi sekitaran batang tanaman, hal ini di nilai paling ampuh dilapangan (khususnya di Begerpang Estate, Lonsum) karena hama tikus tidak mau masuk ke dalam pelepah karene merasa takut dengan adanya rambut yang mengelilingi batang tersebut.</p>\r\n\r\n<p><br />\r\n<strong>Cara pengendalian:</strong><br />\r\nâ¦ Penggunaan predator yakni burung hantu Tyto alba, 1 pasang untuk 25 Ha area lahan kelapa sawit. Seekor burung hantu dapat memangsa 2-5 ekor tikus dalam satu malam. Hingga saat ini T. alba merupakan satu-satunya komponen agensia hayati yang paling efektif dan efisien untuk mengendalikan hama tikus pada perkebunan kelapa sawit.<br />\r\nâ¦ Membersihkan kebun dari sampah dan kotoran terutama daun-daun tua kelapa sawit, rumput liar dan alang-alang.<br />\r\nâ¦ Penggunaan umpan beracun dan fumigasi.<br />\r\nâ¦ Pemberantasan dapat dilakukan secara eposan pada sarangnya.<br />\r\n&nbsp;</p>\r\n', '1540875310_tikus.png', 'hama'),
('D015', 'Belalang (Valanga nigricornis, Locusta migratoria)', '<p style=\"text-align:justify\">Jenis hama ini kerap dijumpai menyerang daun pada tanaman muda (pembibitan) dilapangan, &nbsp;terutama pada musim kemarau panjang. Belalang jantan berukuran 42-45 mm dan yang betina 37-60 mm, beraneka warna dari hijau kelabu hingga kehitaman. Jika terdapat belalang berkelompok dilapangan harus secepatnya dikendalikan. Hama belalang menyerang bagian daun dan memakan daun bagian pinggir dengan memotong daun dalam porongan yang cukup besar, kadangkala hingga pertengahan anak daun.&nbsp;</p>\r\n', '<p><strong>Cara pengendalian:</strong><br />\r\nâ¦&nbsp;Pengendalian dapat dilakukan dengan penyemprotan menggunakan insektisida kimiawi secara selektif<br />\r\nâ¦&nbsp;Pengendalian mekanis dengan menghancurkan telur dan nimfanya, menangkap belalang menggunakan jaring serangga atau perangkap lem yang dipasang di sekitar pangkal batang untuk menghalangi betina bertelur dipangkal batang dan menangkap nimfa yang akan naik ke pohon.<br />\r\n&nbsp;</p>\r\n', '1679027518_belalang.png', 'hama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `idgejala` varchar(10) NOT NULL,
  `gejala` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`idgejala`, `gejala`) VALUES
('GJ001', 'Terlihat bercak lonjong warna kuning pada bagian daun'),
('GJ002', 'Pada bagian tengah daun berwarna kecoklatan'),
('GJ003', 'Daun tampak mengering'),
('GJ004', 'Muncul bercak kecil berbentuk bulat tersebar secara acak pada daun'),
('GJ005', 'Bercak berwarna coklat tua dan dikelilingi dengan warna jingga kekuningan'),
('GJ006', 'Bentuk daun tidak normal termasuk ukuran'),
('GJ007', 'Ada bercak-bercak kemerahan-merahan seperti karat terutama pada tanaman didekat jalan dan pelepah tua'),
('GJ008', 'Permukaan daun tampak tidak mengkilap'),
('GJ009', 'Daun berwarna hijau pucat hingga kekuning-kuningan dan pada kasus yang parah akan menggulung dan mati'),
('GJ010', 'Tulang daun/lidi dan pelepah daun berubah menjadi kuning cerah/orange'),
('GJ011', 'Pelepah tampak sengkleh'),
('GJ012', 'Pelepah melengkung ke bawah pada pertengahan pelepah'),
('GJ013', 'Daun yang tidak membuka sebagian terdapat pembusukan'),
('GJ014', 'Helai daun mulai pertengahan sampai ujung pelepah kecil-kecil, sobek, atau tidak ada sama sekali.'),
('GJ015', 'Pangkal pupus terlihat membusuk, berair dan berbau busuk'),
('GJ016', 'Pelepah menguning dan mengering'),
('GJ017', 'Daun-daun pupus, kira-kira 8 pelepah menguning, mengering dan berwarna coklat'),
('GJ018', 'Patah pada pangkal pupus'),
('GJ019', 'Terdapat bercak-bercak cokelat tua di bagian ujung dan tepi daun'),
('GJ020', 'Bercak sangat banyak dan berdekatan membuat daun terlihat menguning'),
('GJ021', 'Terdapat bercak-bercak pada daun berwarna kuning atau hijau muda'),
('GJ022', 'Terdapat koloni jamur jelaga di bagian bawah daun  atau terkadang di permukaan daun berwarna hitam berdiameter >5 mm '),
('GJ023', 'Permukaan daun tampak menghitam seperti disemprot atau seperti terkena asap hitam tebal'),
('GJ024', 'Anak-anak daun terlihat sangat pendek tampak seperti tulang ikan'),
('GJ025', 'Adanya lipatan atau kedutan kecil pada helaian daun pada permukaan daun'),
('GJ026', 'Daun tampak keriting dan berwarna hijau gelap'),
('GJ027', 'Pelepah baru tumbuh lebih pendek dan semakin pendek sehingga  puncak mahkota sawit terlihat kempis'),
('GJ028', 'Tanaman kehilangan daun hingga terlihat melidi'),
('GJ029', 'Helaian daun terlihat berlubang'),
('GJ030', 'Kerusakan pada daun di bagian bawah'),
('GJ031', 'Daun-daun tampak seperti terbakar (berwarna abu-abu)'),
('GJ032', 'Daun berlubang tampak teratur dibagian tepi atau tengah'),
('GJ033', 'Daun tampak tidak utuh dan rusak'),
('GJ034', 'Daun menguning, kering dan nekrosis'),
('GJ035', 'Daun terpotong seperti kipas huruf  V'),
('GJ036', 'Terlihat lubang bekas gerekan pada bagian pelepah'),
('GJ037', 'Pelepah-pelepah daun terlihat terpuntir'),
('GJ038', 'Adanya alur-alur tanah yang berada pada pelepah atau tandah buah'),
('GJ039', 'Pangkal bagian pelepah rusak'),
('GJ040', 'Adanya bekas keretan yang tidak teratur pada daerah sekitar umbut'),
('GJ041', 'Terlihat bagian umbut (pangkal pelepah) telah dimakan dan pelepah tua ditinggalkan'),
('GJ042', 'Terdapat bekas gigitan pada buah sawit'),
('GJ043', 'Terdapat bekas gigitan pada bagian tepi daun yang terserang'),
('GJ044', 'Ada lubang bekas gerekan pada pelepah tua, pucuk daun menjadi layu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `kode` varchar(20) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idgangguan` varchar(11) NOT NULL,
  `hasil` double NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`kode`, `iduser`, `idgangguan`, `hasil`, `waktu`) VALUES
('DA220326061941', 58, 'D001', 0.6672, '2022-03-26 11:19:45'),
('DA220326061947', 58, 'D002', 0.616, '2022-03-26 11:19:54'),
('DA220326061956', 58, 'D004', 0.8464, '2022-03-26 11:20:03'),
('DA220326062009', 58, 'D001', 0.6672, '2022-03-26 11:20:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi`
--

CREATE TABLE `kondisi` (
  `idkondisi` int(11) NOT NULL,
  `kondisi` varchar(64) NOT NULL,
  `cfuser` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kondisi`
--

INSERT INTO `kondisi` (`idkondisi`, `kondisi`, `cfuser`) VALUES
(1, 'Tidak Yakin', 0.2),
(2, 'Mungkin', 0.4),
(3, 'Kemungkinan Besar', 0.6),
(4, 'Hampir Pasti', 0.8),
(5, 'Pasti', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pakar`
--

CREATE TABLE `pakar` (
  `idpakar` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nohp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pakar`
--

INSERT INTO `pakar` (`idpakar`, `nama`, `username`, `password`, `nohp`) VALUES
(125, 'Mirza Dhika Ginta Surbakti, S.P', 'mirzadhika12@gmail.com', '12345678', '082289129912'),
(126, 'Dheandry Pratama Usman, S.S.T', 'dheandryprtm453@gmail.com', '12341234', '081299129912'),
(127, 'Pakar', 'pakar@gmail.com', '12345678', '081299128882');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `idpengetahuan` int(11) NOT NULL,
  `idgejala` varchar(10) NOT NULL,
  `idgangguan` varchar(11) NOT NULL,
  `cf` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengetahuan`
--

INSERT INTO `pengetahuan` (`idpengetahuan`, `idgejala`, `idgangguan`, `cf`) VALUES
(37, 'GJ001', 'D001', 0.8),
(38, 'GJ002', 'D001', 0.6),
(39, 'GJ003', 'D001', 0.6),
(40, 'GJ003', 'D002', 1),
(41, 'GJ004', 'D002', 1),
(42, 'GJ005', 'D002', 0.8),
(43, 'GJ006', 'D002', 0.6),
(45, 'GJ007', 'D003', 1),
(46, 'GJ008', 'D003', 0.8),
(47, 'GJ008', 'D004', 1),
(48, 'GJ009', 'D004', 1),
(49, 'GJ010', 'D004', 0.6),
(50, 'GJ011', 'D005', 0.6),
(51, 'GJ012', 'D005', 1),
(52, 'GJ013', 'D005', 0.6),
(54, 'GJ014', 'D005', 0.8),
(55, 'GJ015', 'D006', 1),
(56, 'GJ016', 'D006', 1),
(57, 'GJ017', 'D006', 1),
(58, 'GJ018', 'D006', 0.6),
(59, 'GJ019', 'D007', 1),
(60, 'GJ020', 'D007', 1),
(61, 'GJ021', 'D007', 0.8),
(62, 'GJ022', 'D008', 0.6),
(63, 'GJ023', 'D008', 0.8),
(64, 'GJ024', 'D009', 0.6),
(65, 'GJ025', 'D009', 1),
(66, 'GJ026', 'D009', 0.8),
(67, 'GJ027', 'D009', 0.8),
(68, 'GJ028', 'D010', 1),
(69, 'GJ029', 'D010', 0.8),
(70, 'GJ030', 'D010', 0.4),
(71, 'GJ031', 'D011', 1),
(72, 'GJ032', 'D011', 0.6),
(73, 'GJ033', 'D011', 0.8),
(74, 'GJ034', 'D011', 0.6),
(75, 'GJ011', 'D012', 0.8),
(76, 'GJ035', 'D012', 1),
(77, 'GJ036', 'D012', 0.6),
(78, 'GJ037', 'D012', 0.4),
(79, 'GJ038', 'D013', 0.8),
(80, 'GJ039', 'D013', 0.6),
(81, 'GJ011', 'D014', 0.6),
(82, 'GJ040', 'D014', 1),
(83, 'GJ041', 'D014', 0.6),
(84, 'GJ042', 'D014', 0.8),
(85, 'GJ043', 'D015', 1),
(86, 'GJ044', 'D015', 0.6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` varchar(14) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('nonaktif','aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama`, `nohp`, `username`, `password`, `status`) VALUES
(58, 'Beni Frandian', '082367053696', 'benifrandian459@gmail.com', '12345678', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idgejala` (`idgejala`),
  ADD KEY `kode` (`kode_diagnosa`);

--
-- Indeks untuk tabel `gangguan`
--
ALTER TABLE `gangguan`
  ADD PRIMARY KEY (`idgangguan`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`idgejala`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idpenyakit` (`idgangguan`);

--
-- Indeks untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`idkondisi`);

--
-- Indeks untuk tabel `pakar`
--
ALTER TABLE `pakar`
  ADD PRIMARY KEY (`idpakar`);

--
-- Indeks untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`idpengetahuan`),
  ADD KEY `idpenyakit` (`idgangguan`),
  ADD KEY `idgejala` (`idgejala`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `idkondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pakar`
--
ALTER TABLE `pakar`
  MODIFY `idpakar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `idpengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
