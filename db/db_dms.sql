/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : db_dms

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 29/10/2024 08:42:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for abouts
-- ----------------------------
DROP TABLE IF EXISTS `abouts`;
CREATE TABLE `abouts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255)  NOT NULL,
  `desc` varchar(255)  NOT NULL,
  `image` varchar(255)  NOT NULL,
  `is_active` enum('0','1')  NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 ;

-- ----------------------------
-- Records of abouts
-- ----------------------------

-- ----------------------------
-- Table structure for authors
-- ----------------------------
DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `authors_name_unique`(`name` ASC) USING BTREE
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of authors
-- ----------------------------

-- ----------------------------
-- Table structure for bank_accounts
-- ----------------------------
DROP TABLE IF EXISTS `bank_accounts`;
CREATE TABLE `bank_accounts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `account_number` bigint UNSIGNED NOT NULL,
  `account_name` varchar(255)  NOT NULL,
  `bank_name` varchar(255)  NOT NULL,
  `is_primary` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `bank_accounts_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `bank_accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 ;

-- ----------------------------
-- Records of bank_accounts
-- ----------------------------

-- ----------------------------
-- Table structure for banks
-- ----------------------------
DROP TABLE IF EXISTS `banks`;
CREATE TABLE `banks`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sandi_bank` varchar(20)  NOT NULL,
  `nama_bank` varchar(255)  NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 146 ;

-- ----------------------------
-- Records of banks
-- ----------------------------
INSERT INTO `banks` VALUES (1, '002', 'Bank BRI');
INSERT INTO `banks` VALUES (2, '008', 'Bank Mandiri');
INSERT INTO `banks` VALUES (3, '009', 'Bank BNI');
INSERT INTO `banks` VALUES (4, '427', 'Bank Syariah Indonesia (Eks. BNI Syariah)');
INSERT INTO `banks` VALUES (5, '451', 'Bank Syariah Indonesia (Eks. Bank Syariah Mandiri, BSM)');
INSERT INTO `banks` VALUES (6, '422', 'Bank Syariah Indonesia (Eks. BRI Syariah)');
INSERT INTO `banks` VALUES (7, '200', 'Bank BTN');
INSERT INTO `banks` VALUES (8, '022', 'Bank CIMB');
INSERT INTO `banks` VALUES (9, '022', 'Bank CIMB Niaga Syariah');
INSERT INTO `banks` VALUES (10, '147', 'Bank Muamalat');
INSERT INTO `banks` VALUES (11, '213', 'Bank BTPN');
INSERT INTO `banks` VALUES (12, '547', 'Bank BTPN Syariah');
INSERT INTO `banks` VALUES (13, '213', 'Bank Jenius');
INSERT INTO `banks` VALUES (14, '013', 'Bank Permata');
INSERT INTO `banks` VALUES (15, '013', 'Bank Permata Syariah');
INSERT INTO `banks` VALUES (16, '046', 'Bank DBS Indonesia');
INSERT INTO `banks` VALUES (17, '046', 'Digibank');
INSERT INTO `banks` VALUES (18, '011', 'BANK DANAMON');
INSERT INTO `banks` VALUES (19, '016', 'BANK MAYBANK (BII)');
INSERT INTO `banks` VALUES (20, '426', 'BANK MEGA');
INSERT INTO `banks` VALUES (21, '153', 'BANK SINARMAS');
INSERT INTO `banks` VALUES (22, '950', 'BANK COMMONWEALTH');
INSERT INTO `banks` VALUES (23, '028', 'BANK OCBC NISP');
INSERT INTO `banks` VALUES (24, '441', 'BANK BUKOPIN');
INSERT INTO `banks` VALUES (25, '521', 'BANK BUKOPIN SYARIAH');
INSERT INTO `banks` VALUES (26, '536', 'BANK BCA SYARIAH');
INSERT INTO `banks` VALUES (27, '026', 'BANK LIPPO');
INSERT INTO `banks` VALUES (28, '031', 'CITIBANK');
INSERT INTO `banks` VALUES (29, '789', 'INDOSAT DOMPETKU');
INSERT INTO `banks` VALUES (30, '911', 'LINKAJA');
INSERT INTO `banks` VALUES (31, '023', 'Bank UOB Indonesia');
INSERT INTO `banks` VALUES (32, '023', 'TMRW by UOB Indonesia');
INSERT INTO `banks` VALUES (33, '542', 'Bank Jago (Bank Artos Indonesia)');
INSERT INTO `banks` VALUES (34, '490', 'Bank NEO Commerce (Akulaku)');
INSERT INTO `banks` VALUES (35, '110', 'BANK JABAR BJB (JAWA BARAT)');
INSERT INTO `banks` VALUES (36, '425', 'BANK JABAR BJB SYARIAH (JAWA BARAT)');
INSERT INTO `banks` VALUES (37, '111', 'BANK DKI JAKARTA');
INSERT INTO `banks` VALUES (38, '112', 'BPD DIY (YOGYAKARTA)');
INSERT INTO `banks` VALUES (39, '113', 'BANK JATENG (JAWA TENGAH)');
INSERT INTO `banks` VALUES (40, '114', 'BANK JATIM (JAWA TIMUR)');
INSERT INTO `banks` VALUES (41, '115', 'BANK JAMBI');
INSERT INTO `banks` VALUES (42, '116', 'BANK ACEH');
INSERT INTO `banks` VALUES (43, '116', 'BANK ACEH SYARIAH');
INSERT INTO `banks` VALUES (44, '117', 'BANK SUMUT');
INSERT INTO `banks` VALUES (45, '118', 'BANK NAGARI (BANK SUMBAR)');
INSERT INTO `banks` VALUES (46, '119', 'BANK RIAU KEPRI');
INSERT INTO `banks` VALUES (47, '120', 'BANK SUMSEL BABEL (SUMATERA SELATAN BANGKA BELITUNG)');
INSERT INTO `banks` VALUES (48, '121', 'BANK LAMPUNG');
INSERT INTO `banks` VALUES (49, '122', 'BANK KALSEL (BANK KALIMANTAN SELATAN)');
INSERT INTO `banks` VALUES (50, '123', 'BANK KALBAR (BANK KALIMANTAN BARAT)');
INSERT INTO `banks` VALUES (51, '124', 'BANK KALTIMTARA (BANK KALIMANTAN TIMUR DAN UTARA)');
INSERT INTO `banks` VALUES (52, '125', 'BANK KALTENG (BANK KALIMANTAN TENGAH)');
INSERT INTO `banks` VALUES (53, '126', 'BANK SULSELBAR (BANK SULAWESI SELATAN DAN BARAT)');
INSERT INTO `banks` VALUES (54, '127', 'BANK SULUTGO (BANK SULAWESI UTARA DAN GORONTALO)');
INSERT INTO `banks` VALUES (55, '128', 'BANK NTB');
INSERT INTO `banks` VALUES (56, '128', 'BANK NTB SYARIAH');
INSERT INTO `banks` VALUES (57, '129', 'BANK BPD BALI');
INSERT INTO `banks` VALUES (58, '130', 'BANK NTT');
INSERT INTO `banks` VALUES (59, '131', 'BANK MALUKU MALUT');
INSERT INTO `banks` VALUES (60, '132', 'BANK PAPUA');
INSERT INTO `banks` VALUES (61, '133', 'BANK BENGKULU');
INSERT INTO `banks` VALUES (62, '134', 'BANK SULTENG (BANK SULAWESI TENGAH)');
INSERT INTO `banks` VALUES (63, '135', 'BANK SULTRA (BANK SULAWESI TENGGARA)');
INSERT INTO `banks` VALUES (64, '137', 'BANK BANTEN');
INSERT INTO `banks` VALUES (65, '003', 'BANK EKSPOR INDONESIA');
INSERT INTO `banks` VALUES (66, '019', 'BANK PANIN');
INSERT INTO `banks` VALUES (67, '517', 'BANK PANIN DUBAI SYARIAH');
INSERT INTO `banks` VALUES (68, '020', 'BANK ARTA NIAGA KENCANA');
INSERT INTO `banks` VALUES (69, '030', 'AMERICAN EXPRESS BANK LTD');
INSERT INTO `banks` VALUES (70, '031', 'CITIBANK');
INSERT INTO `banks` VALUES (71, '032', 'JP. MORGAN CHASE BANK, N.A.');
INSERT INTO `banks` VALUES (72, '033', 'BANK OF AMERICA, N.A');
INSERT INTO `banks` VALUES (73, '034', 'ING INDONESIA BANK');
INSERT INTO `banks` VALUES (74, '036', 'BANK CCB INDONESIA');
INSERT INTO `banks` VALUES (75, '037', 'BANK ARTHA GRAHA INTERNASIONAL');
INSERT INTO `banks` VALUES (76, '039', 'BANK CREDIT AGRICOLE INDOSUEZ');
INSERT INTO `banks` VALUES (77, '040', 'THE BANGKOK BANK COMP. LTD');
INSERT INTO `banks` VALUES (78, '042', 'MUFG BANK');
INSERT INTO `banks` VALUES (79, '045', 'BANK SUMITOMO MITSUI INDONESIA');
INSERT INTO `banks` VALUES (80, '047', 'BANK RESONA PERDANIA');
INSERT INTO `banks` VALUES (81, '048', 'BANK MIZUHO INDONESIA');
INSERT INTO `banks` VALUES (82, '050', 'STANDARD CHARTERED BANK');
INSERT INTO `banks` VALUES (83, '052', 'BANK ABN AMRO');
INSERT INTO `banks` VALUES (84, '053', 'BANK KEPPEL TATLEE BUANA');
INSERT INTO `banks` VALUES (85, '054', 'BANK CAPITAL INDONESIA');
INSERT INTO `banks` VALUES (86, '057', 'BANK BNP PARIBAS INDONESIA');
INSERT INTO `banks` VALUES (87, '059', 'KOREA EXCHANGE BANK DANAMON');
INSERT INTO `banks` VALUES (88, '060', 'RABOBANK INTERNASIONAL INDONESIA');
INSERT INTO `banks` VALUES (89, '061', 'BANK ANZ INDONESIA');
INSERT INTO `banks` VALUES (90, '069', 'BANK OF CHINA');
INSERT INTO `banks` VALUES (91, '076', 'BANK BUMI ARTA');
INSERT INTO `banks` VALUES (92, '087', 'BANK HSBC INDONESIA');
INSERT INTO `banks` VALUES (93, '087', 'BANK EKONOMI (Lebur dengan Bank HSBC)');
INSERT INTO `banks` VALUES (94, '088', 'BANK ANTARDAERAH');
INSERT INTO `banks` VALUES (95, '089', 'BANK HAGA');
INSERT INTO `banks` VALUES (96, '093', 'BANK IFI');
INSERT INTO `banks` VALUES (97, '095', 'BANK J TRUST INDONESIA');
INSERT INTO `banks` VALUES (98, '097', 'BANK MAYAPADA');
INSERT INTO `banks` VALUES (99, '145', 'BANK NUSANTARA PARAHYANGAN');
INSERT INTO `banks` VALUES (100, '146', 'BANK SWADESI (BANK OF INDIA INDONESIA)');
INSERT INTO `banks` VALUES (101, '151', 'BANK MESTIKA');
INSERT INTO `banks` VALUES (102, '152', 'BANK SHINHAN INDONESIA (BANK METRO EXPRESS)');
INSERT INTO `banks` VALUES (103, '157', 'BANK MASPION INDONESIA');
INSERT INTO `banks` VALUES (104, '159', 'BANK HAGAKITA');
INSERT INTO `banks` VALUES (105, '161', 'BANK GANESHA');
INSERT INTO `banks` VALUES (106, '162', 'BANK WINDU KENTJANA');
INSERT INTO `banks` VALUES (107, '164', 'BANK ICBC INDONESIA (HALIM INDONESIA BANK)');
INSERT INTO `banks` VALUES (108, '166', 'BANK HARMONI INTERNATIONAL');
INSERT INTO `banks` VALUES (109, '167', 'BANK QNB INDONESIA');
INSERT INTO `banks` VALUES (110, '212', 'BANK WOORI SAUDARA');
INSERT INTO `banks` VALUES (111, '405', 'BANK VICTORIA SYARIAH');
INSERT INTO `banks` VALUES (112, '459', 'BANK BISNIS INTERNASIONAL');
INSERT INTO `banks` VALUES (113, '466', 'BANK SRI PARTHA');
INSERT INTO `banks` VALUES (114, '472', 'BANK JASA JAKARTA');
INSERT INTO `banks` VALUES (115, '484', 'BANK HANA (KEB HANA BANK)');
INSERT INTO `banks` VALUES (116, '485', 'BANK MNC');
INSERT INTO `banks` VALUES (117, '490', 'BANK YUDHA BHAKTI');
INSERT INTO `banks` VALUES (118, '491', 'BANK MITRANIAGA');
INSERT INTO `banks` VALUES (119, '494', 'BANK BRI AGRO');
INSERT INTO `banks` VALUES (120, '498', 'BANK SBI INDONESIA (BANK INDOMONEX)');
INSERT INTO `banks` VALUES (121, '501', 'BANK DIGITAL BCA (BCA DIGITAL)');
INSERT INTO `banks` VALUES (122, '503', 'BANK NATIONAL NOBU (BANK ALFINDO)');
INSERT INTO `banks` VALUES (123, '506', 'BANK MEGA SYARIAH');
INSERT INTO `banks` VALUES (124, '513', 'BANK INA PERDANA');
INSERT INTO `banks` VALUES (125, '517', 'BANK PANIN DUBAI SYARIAH');
INSERT INTO `banks` VALUES (126, '520', 'PRIMA MASTER BANK');
INSERT INTO `banks` VALUES (127, '521', 'BANK PERSYARIKATAN INDONESIA');
INSERT INTO `banks` VALUES (128, '525', 'BANK AKITA');
INSERT INTO `banks` VALUES (129, '526', 'BANK DINAR INDONESIA');
INSERT INTO `banks` VALUES (130, '531', 'ANGLOMAS INTERNASIONAL BANK');
INSERT INTO `banks` VALUES (131, '523', 'BANK SAHABAT SAMPEORNA (BANK DIPO INTERNATIONAL)');
INSERT INTO `banks` VALUES (132, '535', 'BANK KESEJAHTERAAN EKONOMI');
INSERT INTO `banks` VALUES (133, '548', 'BANK MULTIARTA SENTOSA');
INSERT INTO `banks` VALUES (134, '553', 'BANK MAYORA INDONESIA');
INSERT INTO `banks` VALUES (135, '555', 'BANK INDEX SELINDO');
INSERT INTO `banks` VALUES (136, '558', 'BANK EKSEKUTIF');
INSERT INTO `banks` VALUES (137, '559', 'CENTRATAMA NASIONAL BANK');
INSERT INTO `banks` VALUES (138, '562', 'BANK FAMA INTERNASIONAL');
INSERT INTO `banks` VALUES (139, '564', 'BANK MANDIRI TASPEN POS (BANK SINAR HARAPAN BALI)');
INSERT INTO `banks` VALUES (140, '566', 'BANK VICTORIA INTERNATIONAL');
INSERT INTO `banks` VALUES (141, '567', 'BANK HARDA INTERNASIONAL');
INSERT INTO `banks` VALUES (142, '945', 'IBK BANK INDONESIA');
INSERT INTO `banks` VALUES (143, '946', 'BANK MERINCORP');
INSERT INTO `banks` VALUES (144, '947', 'BANK MAYBANK INDOCORP');
INSERT INTO `banks` VALUES (145, '949', 'BANK CTBC INDONESIA (CHINA TRUST)');
INSERT INTO `banks` VALUES (146, '688', 'BPR KS (KARYAJATNIKA SEDAYA)');

-- ----------------------------
-- Table structure for beritas
-- ----------------------------
DROP TABLE IF EXISTS `beritas`;
CREATE TABLE `beritas`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255)  NOT NULL,
  `slug` varchar(255)  NOT NULL,
  `content` text  NOT NULL,
  `kategori_id` int NOT NULL,
  `thumbnail` varchar(255)  NOT NULL,
  `is_active` enum('0','1')  NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `beritas_title_unique`(`title` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 ;

-- ----------------------------
-- Records of beritas
-- ----------------------------
INSERT INTO `beritas` VALUES (1, 'Sukseskan SSGI 2024', 'sukseskan-ssgi-2024', 'Deputi Dujak PMPP Setwapres, Suprayoga Hadi bersama Kepala Badan Kebijakan Pembangunan Kesehatan (BKPK) Liza Munira dan Staf Khusus Menkes Bidang Tata Kelola Pemerintahan, Bambang Widianto mendampingi Wakil Menteri Kesehatan Dante Saksono Harbuwono, melaunching pelaksanaan Survei Status Gizi Indonesia (SSGI) Tahun 2024.\r\n\r\nKementerian Kesehatan melalui Badan Kebijakan Pembangunan Kesehatan kembali melaksanakan SSGI 2024, dengan tujuan untuk mendapatkan gambaran status gizi balita (stunting, wasting, underweight, dan obesitas) dan determinannya. SSGI 2024 akan dilaksanakan di 38 provinsi dan 514 kabupaten/kota di Indonesia.\r\n\r\nPelaksanaan SSGI 2024 berkolaborasi dengan BRIN, BPS, universitas dan lembaga survei swasta. Hal ini adalah terobosan baru setelah sebelumnya seluruh survei kesehatan dikelola Kementerian Kesehatan\r\n\r\n“Secara teknis SSGI 2024 ini tidak eksklusif lagi diselenggarakan hanya oleh Kementerian Kesehatan, tetapi melibatkan ada BPJS Ada BRIN, lembaga survei swasta ini diharapkan semua pemangku kepentingan,”ungkap Wamen Dante.\r\n\r\nLebih lanjut Dante, mengharapkan seluruh pemangku kepentingan memahami mekanisme pelaksanaan SSGI 2024 dan berkomitmen untuk melaksanakan survei ini sesuai pedoman. Ia mengharapkan komitmen dukungan stakeholders terkait untuk dapat mengawal pelaksanaan survei ini dan memastikan prosesnya berjalan secara lancar.\r\n\r\n“Hari ini adalah momen yang sangat penting bagi kita semua. Survei yang akan kita laksanakan bukan sekedar tugas, melainkan tanggung jawab besar yang harus kita lakukan untuk masa depan bangsa. Status gizi masyarakat adalah cerminan kesehatan dan kualitas hidup bangsa ini. Oleh karena itu hasil survei ini akan di dasar bagi kebijakan dan program-program kita di masa yang akan datang,”ucapnya.\r\n\r\n“SSGI ini adalah sebuah langkah bersama, di mana dalam setiap langkahnya adalah langkah menuju Indonesia yang lebih sehat dan lebih sejahtera. Dengan kebersamaan dan kerja keras kita, saya yakin bisa memberikan kontribusi bagi kesehatan bangsa ini untuk mewujudkan visi Indonesia emas 2045,”tambahnya\r\n\r\nSementara itu Deputi Dujak PMPP Setwapres, Dr. Ir. Suprayoga Hadi, M.S.P menggarisbawahi pentingnya data sebagai dasar menentukan kebijakan.\r\n\r\n“Informasi yang diperoleh dari mengolah data yang akurat akan sangat membantu untuk membuat rencana dan tujuan jangka panjang, merumuskan strategi serta menyusun standar dan prosedur tertentu lebih presisi, ungkap Deputi Yoga.\r\n\r\nPersiapan survei yang meliputi penyusunan protokol, penyusunan instrumen, penyusunan aplikasi, pengorganisasian lapangan telah selesai dilakukan. Kegiatan berikutnya adalah pelatihan dan pengumpulan data akan dilakukan pada bulan Agustus – November 2024.\r\n\r\nDalam rangkaian kegiatan yang dilaksanakan secara luring dan daring (zoom dan youtube), juga diisi dengan diskusi membicarakan topik-topik yang mendukung pelaksanaan SSGI 2024. Diskusi dimoderatori oleh LPM TP2S Setwapres Iing Mursalin, dengan menghadirkan pembicara : Dwi Puspasari, SKM, M.Sc. (Plt. Kepala Pusat Kebijakan Upaya Kesehatan), Dr. Kadarmanto, MA (Direktur Pengembangan Metodologi Sensus dan Survei, Badan Pusat Statistik), dr. Iwan Ariawan, MSPH (Tim Pakar SSGI 2024), Dr. Wahyu Pudji Nugraheni, M.Kes (Kepala Pusat Riset Kesehatan Masyarakat dan Gizi), dan Dr. TB. Chaerul Dwi Sapta, SH, MAP (Direktur Sinkronisasi Urusan Pemerintah Daerah III, Kemendagri)', 3, '1728814561_Sukseskan-SSGI-2024.jpg', '0', 1, '2024-09-28 12:04:24', '2024-10-13 10:16:01');
INSERT INTO `beritas` VALUES (2, 'Rapat Koordinasi Nasional Percepatan Penurunan Stunting Tahun 2024', 'laporan-akhir-pelaksanaan-program-investing-in-nutrition-and-early-years-iney-dalam-mendukung-percepatan-penurunan-stunting-2018-2023', 'Program percepatan penurunan stunting yang dilaksanakan sejak tahun 2018 telah berhasil menurunkan prevalensi stunting hingga 9,3 persen poin selama 5 tahun. Keberhasilan ini merupakan hasil kerja bersama seluruh pihak mulai dari tingkat pusat, daerah, sampai desa/kelurahan. Untuk mewujudkan Indonesia Emas 2045, program percepatan penurunan stunting harus terus dilanjutkan dengan dukungan komitmen yang kuat dan sinergi seluruh pemangku kepentingan.\r\n\r\nDalam rangka meningkatkan komitmen kepemimpinan semua pihak dan memenuhi amanat Peraturan Presiden Nomor 72 Tahun 2021 tentang Percepatan Penurunan Stunting, Sekretariat Wakil Presiden akan menyelenggarakan Rapat Koordinasi Nasional (Rakornas) Percepatan Penurunan Stunting Tahun 2024 dengan tema “Pemantapan Upaya Penuntasan dan Keberlanjutan Pencegahan dan Penanganan Stunting”. Sehubungan dengan kegiatan tersebut, kami mengundang Saudara untuk hadir pada acara Rakornas, yang akan dilaksanakan pada, hari, tanggal: Rabu s.d. Kamis, 4 s.d. 5 September 2024\r\n\r\nRakornas Percepatan Penurunan Stunting Tahun 2024 akan dibuka secara resmi oleh Bapak Wakil Presiden selaku Ketua Pengarah Tim Percepatan Penurunan Stunting (TPPS). Mengingat pentingnya acara tersebut, kami mengharapkan Bapak/Ibu dapat hadir tepat waktu dan tidak diwakilkan.', 2, '1728814643_2024_AGP_Rakernas_Thumbnail-01-copy.png', '0', 1, '2024-10-12 02:40:59', '2024-10-13 10:17:23');
INSERT INTO `beritas` VALUES (3, 'Buka Rakornas Percepatan Penurunan Stunting 2024, Wapres Harap Pemerintahan Selanjutnya Lampaui Target Lebih Baik', 'buka-rakornas-percepatan-penurunan-stunting-2024-wapres-harap-pemerintahan-selanjutnya-lampaui-target-lebih-baik', 'Jakarta, wapresri.go.id – Wakil Presiden (Wapres) K.H. Ma’ruf Amin selaku Ketua Pengarah Tim Percepatan Penurunan Stunting (TPPS) memimpin Rapat Koordinasi Nasional (Rakornas) Stunting Tahun 2024 sesuai amanat Peraturan Presiden (Perpres) Nomor 72 Tahun 2021 tentang Percepatan Penurunan Stunting, Rabu (04/09/2024). Rakornas ini akan berlangsung selama dua hari ke depan di Hotel Grand Sahid Jaya, Jakarta.\r\n\r\nRakornas Stunting sendiri merupakan pertemuan koordinasi tahunan untuk membahas program percepatan penurunan stunting pada tingkat nasional yang melibatkan peserta dari unsur pemerintah pusat, pemerintah daerah provinsi dan kabupaten/kota, mitra pembangunan, dunia usaha, lembaga swadaya masyarakat, dan perguruan tinggi, serta pemangku kepentingan lainnya.\r\n\r\nMemperhatikan 2024 sebagai tahun terakhir pelaksanaan percepatan strategi nasional pencegahan stunting yang dimulai sejak 2018 dan juga tahun terakhir implementasi Perpres Nomor 72 Tahun 2021, Rakornas kali ini akan fokus mengupas berbagai kemajuan yang telah ditunjukkan dalam upaya penurunan stunting di tanah air.\r\n\r\n“Selama pelaksanaan program percepatan penurunan stunting lima tahun terakhir, begitu banyak kemajuan yang sudah tercatatkan,” ujar Wapres mengawali arahannya.\r\n\r\n“Kita patut bersyukur bahwa angka prevalensi stunting turun dari 30,8% pada tahun 2018 menjadi 21,5% pada tahun 2023. Artinya, dalam lima tahun, kita bisa menurunkan prevalensi stunting sebesar 9,3%, atau rata-rata 1,85% per tahunnya. Penurunan ini satu setengah kali lebih cepat jika dibandingkan dengan periode tahun 2013-2018,” ungkapnya.\r\n\r\nLebih jauh, Wapres menuturkan bahwa hasil yang telah dicapai tersebut, merupakan buah dari kerja keras, kerja cerdas, dan kerja kolaboratif dari semua unsur yang terlibat. Namun demikian, ia juga mengingatkan bahwa target besar yang masih harus dicapai, yaitu membebaskan anak Indonesia dari stunting. Oleh karena itu, dirinya memberikan penekanan khusus tentang pentingnya keberlanjutan pelaksanaan program penanggulangan stunting.\r\n\r\n“Saya sangat berharap jajaran pemimpin pemerintahan baru dapat terus berkomitmen melanjutkan pelaksanaan program percepatan penurunan stunting dan menjaga hasil yang sudah dicapai sebelumnya. Akan lebih baik lagi jika dapat melampaui pencapaian pada periode sebelumnya,” harapnya.\r\n\r\n“Kepemimpinan bisa berganti dan angka stunting bisa diturunkan. Akan tetapi, kita masih memiliki pekerjaan rumah yang belum selesai, yaitu membebaskan anak Indonesia dari stunting,” imbuhnya.\r\n\r\nSebagaimana pada Rakornas Stunting 2023 lalu, pada Rakornas 2024 ini, Wapres juga menyerahkan penghargaan sebagai bentuk apresiasi atas capaian pelaksanaan percepatan penurunan stunting yang dilakukan oleh pemerintah daerah. Apresiasi berupa pemberian Dana Insentif Fiskal Tahun Berjalan 2024 kategori percepatan penurunan stunting, diberikan kepada 130 pemerintah daerah yang terdiri dari 9 provinsi, 99 kabupaten, dan 22 kota. Apresiasi juga diberikan kepada 15 desa berkinerja baik, dalam upaya percepatan penurunan stunting.\r\n\r\n“Semoga program percepatan penurunan stunting dapat terus dilanjutkan dan disempurnakan di periode-periode berikutnya, sebagai upaya menciptakan generasi unggul sesuai visi Indonesia Emas 2045,” harapnya.\r\n\r\nAdapun untuk keberlanjutan program penurunan stunting ke depan, pada kesempatan ini Wapres menitipkan beberapa arahan sebagai pedoman para pemangku kepentingan terkait. Pertama, ia meminta agar evaluasi program sebelumnya dijadikan sebagai masukan utama bagi perbaikan program ke depan.\r\n\r\n“Komitmen kepemimpinan dalam percepatan penurunan stunting di pusat dan daerah harus terus dipertahankan. Penajaman intervensi harus dilakukan agar program lebih tepat sasaran, mulai dari penyediaan data kelompok sasaran yang lebih akurat hingga pemantauan secara berkala,” pintanya.\r\n\r\nKedua, Wapres menginstruksikan agar koordinasi lintas sektor terus diperkuat baik di pusat maupun daerah melalui pembagian peran yang jelas.\r\n\r\n“Program penurunan stunting merupakan proyek nasional masif yang melibatkan 20 kementerian/lembaga, seluruh provinsi, kabupaten/kota, desa/kelurahan, serta lembaga non-pemerintah. Besarnya skala program tentunya menuntut pembagian peran yang jelas agar dapat saling melengkapi dan tidak tumpang tindih dalam mencapai target Indonesia bebas stunting,” tuturnya.\r\n\r\nKetiga, Wapres meminta diseminasi pemahaman tentang stunting yang benar kepada masyarakat terus digalakkan. Menurutnya, sebagain masyarakat saat ini masih memiliki pemahaman yang keliru terkait stunting.\r\n\r\n“Pemahaman yang benar adalah titik awal untuk melakukan intervensi yang tepat sasaran,” tegasnya.\r\n\r\nSebagaimana dilakukan setiap tahunnya, Rakornas kali ini juga akan diikuti Rapat Koordinasi Teknis (Rakortek) guna menghasilkan sejumlah rekomendasi untuk merumuskan regulasi dan strategi yang lebih baik untuk mengakselerasi pencapaian target penurunan stunting. Diharapkan keberlanjutan program percepatan penurunan stunting di era pemerintahan yang baru juga dapat meneruskan langkah baik dari keberhasilan Pemerintahan Jokowi-Ma’ruf Amin dalam menurunkan kasus stunting. (RN-BPMI Setwapres)', 1, '1728814729_Rakornas-Percepatan-Penurunan-Stunting-2024.webp', '0', 1, '2024-10-13 10:14:04', '2024-10-13 10:18:49');
INSERT INTO `beritas` VALUES (4, 'Buka Rakornas Stunting, Wapres Ungkap Keberhasilan Pemerintah Turunkan Prevalensi Lima Tahun Terakhir', 'buka-rakornas-stunting-wapres-ungkap-keberhasilan-pemerintah-turunkan-prevalensi-lima-tahun-terakhir', 'Jakarta, wapresri.go.id – Prevalensi stunting turun dari 30,8% pada tahun 2018 menjadi 21,5% pada tahun 2023. Artinya, dalam lima tahun, seluruh pihak terkait percepatan penanganan stunting berhasil menurunkan prevalensi stunting sebesar 9,3%, atau rata-rata 1,85% per tahunnya. Kendati capaian tersebut cukup signifikan, upaya menghapus stunting di Indonesia harus terus dilakukan.\r\n\r\n“Kita masih memiliki pekerjaan rumah yang belum selesai, yaitu membebaskan anak Indonesia dari stunting,” ungkap Wakil Presiden (Wapres) K.H. Ma’ruf Amin saat membuka Rapat Koordinasi Nasional (Rakornas) Stunting di Hotel Grand Sahid Jaya, Jalan Jend. Sudirman, Jakarta, pada Rabu (04/09/2024).\r\n\r\nUntuk itu, lanjut Wapres, keberlanjutan program yang telah disusun perlu diteruskan dalam upaya menurunkan angka stunting di Indonesia.\r\n\r\n“Penajaman intervensi harus dilakukan agar program lebih tepat sasaran, mulai dari penyediaan data kelompok sasaran yang lebih akurat hingga pemantauan secara berkala,” urai Wapres.\r\n\r\nLebih lanjut Wapres menuturkan, ia telah menerima laporan tentang upaya pencegahan stunting melalui intervensi serentak yang sudah dilaksanakan di seluruh kabupaten/kota. Data dari intervensi yang telah dilaksanakan tersebut harus dapat dimanfaatkan untuk program berikutnya.\r\n\r\n“Data ini harus dimanfaatkan sebaik mungkin sebagai dasar intervensi sensitif dan spesifik, agar program yang sudah disusun dapat tepat sasaran dan target prevalensi stunting segera tercapai,” pesan Wapres.\r\n\r\nSenada dengan hal tersebut, Menteri Koordinator Bidang Pembangunan Manusia dan Kebudayaan (Menko PMK) Muhadjir Effendy menyampaikan, dari prevalensi stunting 21,5% pada 2023, Indonesia ditargetkan mencapai angka prevalensi stunting 14% pada akhir 2024 ini.\r\n\r\n“Beberapa intervensi spesifik dan sensitif sudah on the track, namun perlu ada akselerasi untuk dapat mencapai target di akhri tahun 2024,” ungkap Menko Muhadjir.\r\n\r\nUntuk mencapai target 14% pada akhir 2024, maka dibutuhkan penurunan 7,5% dari angka 21,5% pada 2023. Menko Muhadjir mendorong semua pihak untuk bekerja sama meningkatkan capaian intervensi spesifik dan sensitif, terutama pada indikator-indikator yang masih rendah capaiannya.\r\n\r\n“Dari 9 indikator, terdapat intervensi spesifik yang on the track. Namun, terdapat pula beberapa indikator yang memerlukan perhatian serius, seperti ibu hamil KEK mendapat asupan gizi, anak balita dipantau pertumbuhan, balita gizi kurang mendapat Pemberian Makanan Tambahan (PMT), dan anak balita mendapat imunisasi dasar lengkap,” urai Muhadjir.\r\n\r\nDalam kesempatan ini, Wapres memberikan simbolis penghargaan insentif fiskal kepada perwakilan 20 dari 130 pemerintah daerah yang telah memiliki kinerja baik dalam upaya penurunan stunting.\r\n\r\nKedua puluh pemerintah daerah tersebut, yaitu pemerintah Provinsi Sumatra Utara, Provinsi Jambi, Provinsi Jawa Tengah, Kota Bima, Kota Depok, Kota Payakumbuh, Kota Dumai, Kota Prabumulih, Kota Banjarmasin, Kota Denpasar, Kabupaten Bintan, Kabupaten Lamongan, Kabupaten Aceh Barat Daya, Kabupaten Tanggamus, Kabupaten Sarolangun, Kabupaten Sopeng, Kabupaten Trenggalek, Kabupaten Jepara, Kabupaten Bandung Barat, dan Kabupaten Garut.\r\n\r\nSelain Menko PMK Muhadjir Effendy, turut hadir dalam acara ini, Menteri Desa, Pembangunan Daerah Tertinggal dan Transmigrasi Abdul Halim Iskandar; Kepala Staf Kepresidenan Moeldoko, Wakil Menteri Kesehatan Dante Saksono, dan Wakil Menteri Agama Saiful Rahmat Dasuki.\r\n\r\nSementara itu, Wapres hadir dengan didampingi oleh Kepala Sekretariat Wakil Presiden Ahmad Erani Yustika, Deputi Bidang Dukungan Kebijakan Pembangunan Manusia dan Pemerataan Pembangunan Suprayoga Hadi, dan Staf Khusus Wapres Masduki Baidlowi, Masykuri Abdillah, dan Robikin Emhas. (DMA/RJP, BPMI-Setwapres)', 1, '1728814807_Buka-Rakornas-Stunting-Wapres-Ungkap-Keberhasilan-Pemerintah-Turunkan-Prevalensi-Lima-Tahun-Terakhir.webp', '0', 1, '2024-10-13 10:20:07', '2024-10-13 10:20:07');
INSERT INTO `beritas` VALUES (5, 'Rakornas Percepatan Penurunan Stunting 2024 Bahas Berbagai Hal, Mulai dari Refleksi Hingga Luncurkan Layanan Digital E-Assistance for Stunting Information', 'rakornas-percepatan-penurunan-stunting-2024-bahas-berbagai-hal-mulai-dari-refleksi-hingga-luncurkan-layanan-digital-e-assistance-for-stunting-information', 'Jakarta, wapresri.go.id — Berbagai upaya dilakukan untuk mempercepat penurunan angka stunting di Tanah Air, salah dua di antaranya adalah pelaksanaan Rapat Koordinasi Nasional (Rakornas) Percepatan Penurunan Stunting serta peluncuran aplikasi bernama Digital E-Assistance for Stunting Information (DESI).\r\n\r\nRakornas Percepatan Penurunan Stunting merupakan pertemuan koordinasi tahunan tingkat nasional yang melibatkan peserta dari berbagai pemangku kepentingan, mulai dari pemerintah pusat, pemerintah daerah provinsi dan kabupaten/kota, mitra pembangunan, dunia usaha, lembaga swadaya masyarakat, hingga perguruan tinggi. Adapun tahun ini, penyelenggaraannya berlangsung pada Rabu hingga Kamis (04-05/09/2024) di Hotel Grand Sahid Jaya Jakarta, Jl. Jenderal Sudirman No. Kav. 86, Karet Tengsin, Jakarta Pusat.\r\n\r\nSebagaimana diketahui, tahun 2024 menjadi tahun terakhir pelaksanaan percepatan strategi nasional percepatan pencegahan stunting yang dimulai sejak 2018. Selain itu, tahun 2024 juga merupakan tahun terakhir implementasi Perpres Nomor 72 Tahun 2021. Oleh karenanya, Rakornas kali ini membahas banyak hal, termasuk di antaranya refleksi dalam upaya penurunan angka stunting.\r\n\r\nPada kesempatan tersebut, Sekretaris Utama Badan Kependudukan dan Keluarga Berencana Tavip Agus Rayanto menyampaikan bahwa para pemangku kepentingan, terutama di bagian daerah, perlu melaksanakan analisis penyebab fluktuasi capaian.\r\n\r\n“Ketika turun, tiba-tiba naik, atau ada yang turun terus. Kita perlu mengevaluasi diri di wilayah masing-masing,” ujarnya.\r\n\r\nIa juga mengungkapkan, berdasarkan data yang diperoleh terkait keluarga risiko stunting per provinsi, faktanya persentase pendampingan masyarakat dalam upaya mengurangi angka stunting baru mencapai 48,39%, atau 4.201.349 dari 8.682.170 jiwa.\r\n\r\n“Ini artinya, kita juga perlu introspeksi. Kadang kala kok angka stuntingnya enggak turun, kadang kala mungkin ya kita berhenti, di lapangannya enggak jalan, pendampingannya enggak jalan, dan sebagainya. Karena ini data yang juga bersamaan dengan pendataan Bapak-Ibu di lapangan,” tuturnya.\r\n\r\nLebih spesifik dalam kaitannya dengan pernikahan dan kehamilan, Tavip pun membahas Elsimil (Elektronik Siap Nikah, Siap Hamil), yang mendapatkan data tidak hanya dari aplikasi Elsimil itu sendiri, tetapi juga dari data Simkah (Sistem Informasi Manajemen Nikah) Kementerian Agama. Perolehan data dari kedua sumber itu menunjukkan beberapa hasil temuan, termasuk salah satunya adalah fakta bahwa hingga saat ini, masih ada pernikahan yang dilangsungkan oleh muda-mudi di bawah usia 20 tahun.\r\n\r\n“Datanya berapa persen sekarang yang mengisi secara nasional, [yakni] sebesar 58,9%. Tapi dari 58,9%, minimal kita tahu, ‘oh yang ternyata kawin di usia 34, ini yang di warna mayoritas hijau itu’,” paparnya.\r\n\r\n“Tapi ternyata yang perlu kita waspadai kan ada yang di bawah 20 tahun. Dan itu pun ada by name dan by address karena ada recordnya, siapa orangnya [dan] ada di mana,” imbuhnya.\r\n\r\nSementara terkait peluncuran Layanan DESI, Deputi Bidang Pembangunan Manusia dan Pemerataan Pembangunan Sekretariat Wakil Presiden Suprayoga Hadi menjelaskan, DESI merupakan inovasi untuk meningkatkan literasi masyarakat terkait stunting. Dengan menghubungi nomor WhhatsApp 088-95-123-123, lanjutnya, masyarakat dapat mengakses berbagai informasi terkait stunting yang disajikan oleh DESI.\r\n\r\n“Bahwa masih sangat kurang sebetulnya literasi masyarakat terkait dengan stunting. Oleh karena itu, kami sangat berharap DESI yang nanti akan segera kami launching itu bisa memberikan semacam masukan dan juga memberikan kemudahan tidak hanya bagi kita, para pelaku dalam hal ini, tapi juga masyarakat,” terangnya.\r\n\r\n“Karena tadi disinyalir bahwa masih banyak masyarakat yang belum paham terkait dengan stunting, [sehingga] bagaimana kita memberikan pemahamanan yang lebih jelas dan tegas,” tambahnya.\r\n\r\nDi samping itu, Yoga menyebutkan, ada tiga hal yang juga perlu diperhatikan oleh para pemangku kepentingan program Percepatan Penurunan Stuning. Pertama, saat ini Kementerian Kesehatan tengah menyiapkan pelaksanaan Survei Status Gizi Indonesia (SSGI) Tahun 2024. Untuk mewujudkan upaya ini, diperlukan dukungan Pemda mengingat hasilnya akan menjadi data yang digunakan dalam melakukan evaluasi pencapaian target yang telah ditetapkan pada tahun 2024.\r\n\r\n“Jadi Survei Status Gizi Indonesia yang saya rasa ini akan menjadi pijakan kita untuk bisa nanti mengukur angka stunting terakhir, tahun 2024 dalam hal ini,” jelasnya.\r\n\r\nKedua, penurunan stunting telah masuk menjadi salah satu prioritas dalam RPJPN Tahun 2020 sampai 2045. Dengan demikian, kata Yoga, program ini perlu terus dilanjutkan, dengan breakdown target menjadi target jangka menengah dan tahunan, sehingga ada target dan pentahapan pelaksanaannya di lapangan.\r\n\r\n“Oleh karena itu, kelanjutannya ini merupakan tanggung jawab kita bersama. Bagaimana kita bisa menindaklanjutin ini sampai dengan jangka menengah dan panjang. Jadi kalau jangka menengah nanti akan di dalam RPJM Nasional 2025-2029. Dan kemudian akan terus bergerak sampai dengan 2045,” urainya.\r\n\r\nTerakhir, Yoga menuturkan, Pengukuran dan Intervensi Serentak sudah dilakukan pada bulan Juli 2024 lalu. Hasil pengukuran dan intervensi tersebut nantinya dapat dijadikan sebagai dasar untuk melakukan intervensi yang lebih baik untuk setiap kelompok sasaran.\r\n\r\n“Ini akan menjadi semacam satu upaya kita bagaimana melakukan semacam respons cepat terkait dengan bagaimana kualitas sudah diperbaiki, kemudian data yang handal akan kita peroleh dan seterusnya dalam hal ini,” pungkasnya.\r\n\r\nTurut menjadi pembicara pada Rakornas ini Deputi Bidang Pembangunan Manusia, Masyarakat, dan Kebudayaan Kementerian PPN/Bappenas Amich Alhumami, Direktur Jenderal Kesehatan Masyarakat Kementerian Kesehatan Maria Endang Sumiwi, Direktur Sinkronisasi Urusan Pemerintahan Daerah III Ditjen Bina Pembangunan Daerah Kementerian Dalam Negeri Chaerul Dwi Sapta, Direktur Fasilitasi Pemanfaatan Dana Desa Ditjen Pembangunan Desa dan Perdesaan, Kementerian Desa PDTT Teguh Hadi Sulistyono, dan Direktur Jenderal Perimbangan Keuangan Kementerian Keuangan Luky Alfirman.\r\n\r\nSebagai informasi, selain pemaparan materi dan diskusi, pada Rakornas tahun 2024, sebagaimana juga pada Rakornas tahun 2023 yang lalu, diadakan pula penganugerahan penghargaan oleh Wakil Presiden RI kepada pemerintah daerah sebagai bentuk apresiasi atas capaian pelaksanaan percepatan penurunan stunting. Apresiasi tersebut berupa pemberian Dana Insentif Fiskal Tahun Berjalan Tahun 2024 kategori percepatan penurunan stunting.\r\n\r\nDiketahui, jumlah penerima penghargaan tahun ini adalah sebanyak 130 pemerintah daerah yang terdiri dari 9 provinsi, 99 kabupaten, dan 22 kota. Tidak hanya itu, apresiasi juga diberikan kepada 15 desa berkinerja baik, dalam upaya percepatan penurunan stunting. (HB – BPMI Setwapres)', 1, '1728814851_Rakornas-Percepatan-Penurunan-Stunting-2024-Bahas-Berbagai-Hal-Mulai-dari-Refleksi-Hingga-Luncurkan-Layanan-Digital-E-Assistance-for-Stunting-Information.webp', '0', 1, '2024-10-13 10:20:51', '2024-10-13 10:20:51');
INSERT INTO `beritas` VALUES (6, 'Apresiasi Penanganan Stunting di Daerah, Wapres Serahkan Simbolis Dana Insentif Fiskal pada 20 Kepala Daerah', 'apresiasi-penanganan-stunting-di-daerah-wapres-serahkan-simbolis-dana-insentif-fiskal-pada-20-kepala-daerah', 'Jakarta, wapresri.go.id – Wakil Presiden (Wapres) K.H. Ma’ruf Amin membuka rapat koordinasi nasional (Rakornas) Stunting di Grand Sahid Jaya, Jakarta, pada Rabu (04/09/2024) kemarin. Di hadapan sekitar 1.400 peserta yang terdiri dari unsur pemerintah pusat, pemerintah daerah provinsi dan kabupaten/kota, mitra pembangunan, dunia usaha, lembaga swadaya masyarakat, dan perguruan tinggi serta pemangku kepentingan lainnya, Wapres menyerahkan apresiasi kepada pemerintah daerah atas capaian pelaksanaan percepatan penurunan stunting yang dilakukan oleh pemerintah daerah.\r\n\r\nApresiasi berupa pemberian Dana Insentif Fiskal Tahun Berjalan Tahun 2024 kategori percepatan penurunan stunting pada tahun ini diberikan kepada 130 pemerintah daerah, yang terdiri dari 9 provinsi, 99 kabupaten, dan 22 kota. Dari 130 daerah tersebut, 20 kepala daerah yang hadir naik ke atas panggung untuk menerima simbolis Dana Insentif Fiskal langsung dari Wapres.\r\n\r\n“Saya mengucapkan selamat kepada Saudara-saudara yang telah memperoleh penghargaan dan insentif fiskal. Penghargaan inidiberikan atas kinerja, inovasi, dan kontribusinya dalam pelaksanaan program penurunan stunting,” ungkap Wapres dalam sambutannya usai menyerahkan simbolis Dana Insentif Fiskal.\r\n\r\n“Semoga program percepatan penurunan stunting dapat terus dilanjutkan dan disempurnakan di periode-periode berikutnya, sebagai upaya menciptakan generasi unggul sesuai visi Indonesia Emas 2045,” pesan Wapres.\r\n\r\nKedua puluh kepala daerah yang menerima simbolis Dana Insentif Fiskal dari Wapres berasal dari pemerintah Provinsi Sumatra Utara, Provinsi Jambi, Provinsi Jawa Tengah, Kota Bima, Kota Depok, Kota Payakumbuh, Kota Dumai, Kota Prabumulih, Kota Banjarmasin, Kota Denpasar, Kabupaten Bintan, Kabupaten Lamongan, Kabupaten Aceh Barat Daya, Kabupaten Tanggamus, Kabupaten Sarolangun, Kabupaten Sopeng, Kabupaten Trenggalek, Kabupaten Jepara, Kabupaten Bandung Barat, dan Kabupaten Garut.\r\n\r\nPemberian Dana Insentif Fiskal kepada pemerintah daerah tersebut diharapkan dapat semakin menggiatkan upaya percepatan penurunan stunting secara nasional. Pemberian Dana Insentif Fiskal tersebut berdasarkan sejumlah indikator yang dipertimbangkan oleh Kementerian Keuangan.\r\n\r\n(DMA, BPMI Setwapres)', 1, '1728814889_Apresiasi-Penanganan-Stunting-di-Daerah-Wapres-Serahkan-Simbolis-Dana-Insentif-Fiskal-pada-20-Kepala-Daerah.webp', '0', 1, '2024-10-13 10:21:29', '2024-10-13 10:21:29');

-- ----------------------------
-- Table structure for berkas_murids
-- ----------------------------
DROP TABLE IF EXISTS `berkas_murids`;
CREATE TABLE `berkas_murids`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `kartu_keluarga` varchar(255)  NULL DEFAULT NULL,
  `akte_kelahiran` varchar(255)  NULL DEFAULT NULL,
  `surat_kelakuan_baik` varchar(255)  NULL DEFAULT NULL,
  `surat_sehat` varchar(255)  NULL DEFAULT NULL,
  `surat_tidak_buta_warna` varchar(255)  NULL DEFAULT NULL,
  `rapor` varchar(255)  NULL DEFAULT NULL,
  `foto` varchar(255)  NULL DEFAULT NULL,
  `ijazah` varchar(255)  NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of berkas_murids
-- ----------------------------

-- ----------------------------
-- Table structure for bk_siswa
-- ----------------------------
DROP TABLE IF EXISTS `bk_siswa`;
CREATE TABLE `bk_siswa`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(255)  NULL DEFAULT NULL,
  `kelas` varchar(255)  NULL DEFAULT NULL,
  `bk_siswa_id` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `bk_siswa_bk_siswa_id_foreign`(`bk_siswa_id` ASC) USING BTREE,
  CONSTRAINT `bk_siswa_ibfk_1` FOREIGN KEY (`bk_siswa_id`) REFERENCES `format_bk` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 ;

-- ----------------------------
-- Records of bk_siswa
-- ----------------------------
INSERT INTO `bk_siswa` VALUES (1, 'kepsek', '', 2, '2024-10-01 06:20:17', '2024-10-01 06:20:17');
INSERT INTO `bk_siswa` VALUES (2, 'kepsek', '', 3, '2024-10-01 06:20:31', '2024-10-01 06:20:31');
INSERT INTO `bk_siswa` VALUES (3, 'kepsek', '', 5, '2024-10-01 06:48:46', '2024-10-01 06:48:46');
INSERT INTO `bk_siswa` VALUES (4, 'bambang', '', 6, '2024-10-01 15:43:33', '2024-10-01 15:43:33');

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `book_code` varchar(255)  NOT NULL,
  `name` varchar(255)  NOT NULL,
  `description` longtext  NOT NULL,
  `thumbnail` varchar(255)  NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `publisher_id` bigint UNSIGNED NOT NULL,
  `publication_year` year NOT NULL,
  `isbn` varchar(50)  NOT NULL,
  `stock` int NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `books_book_code_unique`(`book_code` ASC) USING BTREE
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of books
-- ----------------------------

-- ----------------------------
-- Table structure for borrowings
-- ----------------------------
DROP TABLE IF EXISTS `borrowings`;
CREATE TABLE `borrowings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `borrow_code` varchar(255)  NOT NULL,
  `member_id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  `lateness` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `borrowings_borrow_code_unique`(`borrow_code` ASC) USING BTREE
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of borrowings
-- ----------------------------

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `categories_name_unique`(`name` ASC) USING BTREE
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of categories
-- ----------------------------

-- ----------------------------
-- Table structure for data_jurusans
-- ----------------------------
DROP TABLE IF EXISTS `data_jurusans`;
CREATE TABLE `data_jurusans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `jurusan_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255)  NOT NULL,
  `content` text  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `data_jurusans_jurusan_id_foreign`(`jurusan_id` ASC) USING BTREE,
  CONSTRAINT `data_jurusans_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 ;

-- ----------------------------
-- Records of data_jurusans
-- ----------------------------

-- ----------------------------
-- Table structure for data_kelas
-- ----------------------------
DROP TABLE IF EXISTS `data_kelas`;
CREATE TABLE `data_kelas`  (
  `id` int NOT NULL,
  `kelas` varchar(255)  NULL DEFAULT NULL,
  `periode` varchar(255)  NULL DEFAULT NULL,
  `status` varchar(255)  NULL DEFAULT NULL,
  `deleted` enum('true','false')  NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB;

-- ----------------------------
-- Records of data_kelas
-- ----------------------------

-- ----------------------------
-- Table structure for data_kelompokbelajar
-- ----------------------------
DROP TABLE IF EXISTS `data_kelompokbelajar`;
CREATE TABLE `data_kelompokbelajar`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kelompokbelajar` varchar(255)  NULL DEFAULT NULL,
  `status` enum('active','inactive')  NULL DEFAULT 'active',
  `deleted` enum('false','true')  NULL DEFAULT 'false',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2;

-- ----------------------------
-- Records of data_kelompokbelajar
-- ----------------------------
INSERT INTO `data_kelompokbelajar` VALUES (1, 'Kelompok A', 'active', 'false', NULL, NULL);
INSERT INTO `data_kelompokbelajar` VALUES (2, 'Kelompok B', 'active', 'false', NULL, NULL);

-- ----------------------------
-- Table structure for data_murids
-- ----------------------------
DROP TABLE IF EXISTS `data_murids`;
CREATE TABLE `data_murids`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `nis` bigint NULL DEFAULT NULL,
  `nisn` bigint NULL DEFAULT NULL,
  `name` varchar(255)  NULL DEFAULT NULL,
  `nama_panggilan` varchar(255)  NULL DEFAULT NULL,
  `tempat_lahir` varchar(255)  NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `agama` enum('Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha','Konghucu')  NULL DEFAULT NULL,
  `telp` varchar(255)  NULL DEFAULT NULL,
  `whatsapp` varchar(255)  NULL DEFAULT NULL,
  `alamat` text  NULL,
  `asal_sekolah` varchar(255)  NULL DEFAULT NULL,
  `proses` enum('Pendaftaran','Berkas','Murid','Ditolak')  NOT NULL DEFAULT 'Pendaftaran',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 ;

-- ----------------------------
-- Records of data_murids
-- ----------------------------
INSERT INTO `data_murids` VALUES (1, 8, NULL, NULL, 'bambang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pendaftaran', '2024-10-01 15:31:11', '2024-10-01 15:31:11');
INSERT INTO `data_murids` VALUES (2, 9, NULL, NULL, 'Alesheea Farzana Nayyara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pendaftaran', '2024-10-04 23:40:23', '2024-10-04 23:40:23');

-- ----------------------------
-- Table structure for data_orang_tuas
-- ----------------------------
DROP TABLE IF EXISTS `data_orang_tuas`;
CREATE TABLE `data_orang_tuas`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `nama_ayah` varchar(255)  NULL DEFAULT NULL,
  `pendidikan_ayah` enum('SD','SMP','SMA/SMK','S1','S2','S3')  NULL DEFAULT NULL,
  `telp_ayah` varchar(255)  NULL DEFAULT NULL,
  `pekerjaan_ayah` enum('Wiraswasta','Wirausaha','ASN','Buruh')  NULL DEFAULT NULL,
  `alamat_ayah` varchar(255)  NULL DEFAULT NULL,
  `nama_ibu` varchar(255)  NULL DEFAULT NULL,
  `pendidikan_ibu` enum('SD','SMP','SMA/SMK','S1','S2','S3')  NULL DEFAULT NULL,
  `telp_ibu` varchar(255)  NULL DEFAULT NULL,
  `pekerjaan_ibu` enum('Ibu Rumah Tangga','Wiraswasta','Wirausaha','ASN','Buruh')  NULL DEFAULT NULL,
  `alamat_ibu` varchar(255)  NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of data_orang_tuas
-- ----------------------------

-- ----------------------------
-- Table structure for data_rkas
-- ----------------------------
DROP TABLE IF EXISTS `data_rkas`;
CREATE TABLE `data_rkas`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `document_rka` varchar(255)  NOT NULL,
  `title` varchar(255)  NULL DEFAULT NULL,
  `desc` varchar(255)  NULL DEFAULT NULL,
  `jenis` enum('Program Perubahan Perilaku','Program Intervensi Spesifik')  NULL DEFAULT 'Program Perubahan Perilaku',
  `urutan` int NOT NULL,
  `status` enum('Awaiting Processing','Under Review','Reject','Revisions','Approval')  NULL DEFAULT 'Awaiting Processing',
  `is_active` enum('0','1')  NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of data_rkas
-- ----------------------------
INSERT INTO `data_rkas` VALUES (1, 10, '1727592273_1_new.jpg', NULL, NULL, 'Program Perubahan Perilaku', 0, 'Awaiting Processing', '1', '2024-09-28 11:46:19', '2024-09-29 06:44:33');
INSERT INTO `data_rkas` VALUES (2, 10, '1727592280_2_new.jpg', NULL, NULL, 'Program Perubahan Perilaku', 1, 'Under Review', '1', '2024-09-28 11:46:32', '2024-09-29 06:44:40');
INSERT INTO `data_rkas` VALUES (3, 10, '1728707493_4395-Article Text-19660-1-10-20210401.pdf', 'qwerty', 'qwerty', 'Program Perubahan Perilaku', 1, 'Reject', '1', '2024-10-12 04:31:33', '2024-10-12 04:31:33');
INSERT INTO `data_rkas` VALUES (4, 10, '1728707561_4395-Article Text-19660-1-10-20210401.pdf', 'UUU', 'IIII', 'Program Intervensi Spesifik', 1, 'Approval', '0', '2024-10-12 04:32:41', '2024-10-22 07:42:51');
INSERT INTO `data_rkas` VALUES (5, 10, '1728708517_2015 Singapore Salary Guide.pdf', 'ddd', 'ddd', 'Program Perubahan Perilaku', 1, 'Approval', '0', '2024-10-12 04:48:37', '2024-10-12 04:48:37');

-- ----------------------------
-- Table structure for data_semester
-- ----------------------------
DROP TABLE IF EXISTS `data_semester`;
CREATE TABLE `data_semester`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `semester` varchar(255)  NULL DEFAULT NULL,
  `status` enum('active','inactive')  NULL DEFAULT 'active',
  `deleted` enum('false','true')  NULL DEFAULT 'false',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2;

-- ----------------------------
-- Records of data_semester
-- ----------------------------
INSERT INTO `data_semester` VALUES (1, 'Ganjil', 'active', 'false', NULL, NULL);
INSERT INTO `data_semester` VALUES (2, 'Genap', 'active', 'false', NULL, NULL);

-- ----------------------------
-- Table structure for data_tahunajaran
-- ----------------------------
DROP TABLE IF EXISTS `data_tahunajaran`;
CREATE TABLE `data_tahunajaran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tahunajaran` varchar(255)  NULL DEFAULT NULL,
  `status` enum('active','inactive')  NULL DEFAULT 'active',
  `deleted` enum('false','true')  NULL DEFAULT 'false',
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3;

-- ----------------------------
-- Records of data_tahunajaran
-- ----------------------------
INSERT INTO `data_tahunajaran` VALUES (1, '2022-2023', 'active', 'false', NULL, NULL);
INSERT INTO `data_tahunajaran` VALUES (2, '2023-2024', 'active', 'false', NULL, NULL);
INSERT INTO `data_tahunajaran` VALUES (3, '2024-2025', 'active', 'false', NULL, NULL);

-- ----------------------------
-- Table structure for detail_payment_spps
-- ----------------------------
DROP TABLE IF EXISTS `detail_payment_spps`;
CREATE TABLE `detail_payment_spps`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `sender` varchar(255)  NULL DEFAULT NULL,
  `bank_sender` varchar(255)  NULL DEFAULT NULL,
  `destination_bank` varchar(255)  NULL DEFAULT NULL,
  `month` varchar(255)  NOT NULL,
  `amount` bigint NOT NULL,
  `status` enum('paid','unpaid')  NOT NULL,
  `file` varchar(255)  NULL DEFAULT NULL,
  `date_file` date NULL DEFAULT NULL,
  `approve_by` bigint UNSIGNED NULL DEFAULT NULL,
  `approve_date` date NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `detail_payment_spps_user_id_foreign`(`user_id` ASC) USING BTREE,
  INDEX `detail_payment_spps_payment_id_foreign`(`payment_id` ASC) USING BTREE,
  CONSTRAINT `detail_payment_spps_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment_spps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_payment_spps_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 ;

-- ----------------------------
-- Records of detail_payment_spps
-- ----------------------------

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255)  NOT NULL,
  `desc` text  NOT NULL,
  `slug` varchar(255)  NOT NULL,
  `content` varchar(255)  NOT NULL,
  `thumbnail` varchar(255)  NOT NULL,
  `acara` datetime NOT NULL,
  `lokasi` varchar(255)  NOT NULL,
  `is_active` enum('0','1')  NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `events_title_unique`(`title` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 ;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO `events` VALUES (1, 'Hari Cuci Tangan Pakai Sabun Sedunia', 'Hari Cuci Tangan Pakai Sabun Sedunia', 'event-penyuluhan', 'Hari Cuci Tangan Pakai Sabun Sedunia', '1728640394_VIRTUAL BACKGROUND PESERTA.jpg', '2024-10-15 17:32:00', 'Dunia', '0', '2024-10-11 09:53:15', '2024-10-13 10:33:12');
INSERT INTO `events` VALUES (2, 'Hari Pangan Sedunia', 'Hari Pangan Sedunia', 'Hari-Pangan-Sedunia', 'Hari Pangan Sedunia', 'noimage.jpg', '2024-10-16 17:34:12', 'Dunia', '0', NULL, NULL);
INSERT INTO `events` VALUES (3, 'Hari Menopause Sedunia', 'Hari Menopause Sedunia', 'Hari-Menopause-Sedunia', 'Hari Menopause Sedunia', 'noimage.jpg', '2024-10-18 17:35:03', 'Dunia', '0', NULL, NULL);
INSERT INTO `events` VALUES (4, 'Hari Osteoporosis', 'Hari Osteoporosis', 'Hari-Osteoporosis', 'Hari Osteoporosis', 'noimage.jpg', '2024-10-20 17:35:48', 'Dunia', '0', NULL, NULL);
INSERT INTO `events` VALUES (5, 'Hari Dokter Nasional', 'Hari Dokter Nasional', 'Hari-Dokter-Nasional', 'Hari Dokter Nasional', 'noimage.jpg', '2024-10-24 17:36:28', 'Dunia', '0', NULL, NULL);
INSERT INTO `events` VALUES (6, 'Hari Stroke Sedunia', 'Hari Stroke Sedunia', 'Hari-Stroke-Sedunia', 'Hari Stroke Sedunia', 'noimage.jpg', '2024-10-29 17:36:43', 'Dunia', '0', NULL, NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255)  NOT NULL,
  `connection` text  NOT NULL,
  `queue` text  NOT NULL,
  `payload` longtext  NOT NULL,
  `exception` longtext  NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for footers
-- ----------------------------
DROP TABLE IF EXISTS `footers`;
CREATE TABLE `footers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255)  NOT NULL,
  `instagram` varchar(255)  NOT NULL,
  `twitter` varchar(255)  NOT NULL,
  `youtube` varchar(255)  NOT NULL,
  `logo` varchar(255)  NOT NULL,
  `telp` varchar(255)  NOT NULL,
  `whatsapp` varchar(255)  NOT NULL,
  `email` varchar(255)  NOT NULL,
  `desc` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 ;

-- ----------------------------
-- Records of footers
-- ----------------------------

-- ----------------------------
-- Table structure for format_bk
-- ----------------------------
DROP TABLE IF EXISTS `format_bk`;
CREATE TABLE `format_bk`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomor_bk` varchar(255)  NULL DEFAULT NULL,
  `judul_bk` varchar(255)  NULL DEFAULT NULL,
  `pokok_pembahasan` text  NULL,
  `judul_tanggapan` varchar(255)  NULL DEFAULT NULL,
  `tanggapan` text  NULL,
  `status` enum('Sudah Ditanggapi','Belum Ditanggapi')  NOT NULL,
  `jenis` enum('Konseling Pribadi','Konseling Kelompok','Bimbingan Konseling Karir','Bimbingan Konseling Kelompok')  NOT NULL,
  `tanggapan_guru_id` bigint UNSIGNED NULL DEFAULT NULL,
  `dibuat_oleh_id` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `format_bk_tanggapan_guru_id_foreign`(`tanggapan_guru_id` ASC) USING BTREE,
  INDEX `format_bk_dibuat_oleh_id_foreign`(`dibuat_oleh_id` ASC) USING BTREE,
  CONSTRAINT `format_bk_ibfk_1` FOREIGN KEY (`dibuat_oleh_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `format_bk_ibfk_2` FOREIGN KEY (`tanggapan_guru_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 ;

-- ----------------------------
-- Records of format_bk
-- ----------------------------
INSERT INTO `format_bk` VALUES (1, 'BK/241001/KARIR/QZ4V', 'qwerty', 'qwerty', 'coba menganggapi', 'asik kan', 'Sudah Ditanggapi', 'Bimbingan Konseling Karir', 7, 1, '2024-10-01 06:19:26', '2024-10-01 15:09:18');
INSERT INTO `format_bk` VALUES (2, 'BK/241001/KARIR/CFS3', 'qwerty', 'qwerty', NULL, NULL, 'Belum Ditanggapi', 'Bimbingan Konseling Karir', NULL, 1, '2024-10-01 06:20:17', '2024-10-01 06:20:17');
INSERT INTO `format_bk` VALUES (3, 'BK/241001/KARIR/WWZC', 'qwerty', 'qwerty', NULL, NULL, 'Belum Ditanggapi', 'Bimbingan Konseling Karir', NULL, 1, '2024-10-01 06:20:31', '2024-10-01 06:20:31');
INSERT INTO `format_bk` VALUES (4, 'BK/241001/PRIBADI/TISX', 'qwerty', 'qwerty', NULL, NULL, 'Belum Ditanggapi', 'Konseling Pribadi', NULL, 1, '2024-10-01 06:48:00', '2024-10-01 06:48:00');
INSERT INTO `format_bk` VALUES (5, 'BK/241001/PRIBADI/UQMK', 'qwerty', 'qwerty', 'ddddddd', 'dddddddd', 'Sudah Ditanggapi', 'Konseling Pribadi', 7, 1, '2024-10-01 06:48:46', '2024-10-01 15:15:36');
INSERT INTO `format_bk` VALUES (6, 'BK/241001/PRIBADI/ZWWS', 'tanyak tentang kerja', 'saya ada permasalahan di kantor tentang boss dan leader', 'coba menganggapi', 'tetap sabar dan semangat saka', 'Sudah Ditanggapi', 'Konseling Pribadi', 7, 8, '2024-10-01 15:43:33', '2024-10-01 15:44:25');

-- ----------------------------
-- Table structure for image_sliders
-- ----------------------------
DROP TABLE IF EXISTS `image_sliders`;
CREATE TABLE `image_sliders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(255)  NOT NULL,
  `title` varchar(255)  NULL DEFAULT NULL,
  `desc` varchar(255)  NULL DEFAULT NULL,
  `urutan` int NOT NULL,
  `is_active` enum('0','1')  NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 ;

-- ----------------------------
-- Records of image_sliders
-- ----------------------------
INSERT INTO `image_sliders` VALUES (1, '1727592273_1_new.jpg', NULL, NULL, 0, '0', '2024-09-28 11:46:19', '2024-09-29 06:44:33');
INSERT INTO `image_sliders` VALUES (2, '1727592280_2_new.jpg', NULL, NULL, 1, '0', '2024-09-28 11:46:32', '2024-09-29 06:44:40');

-- ----------------------------
-- Table structure for image_sliders_copy1
-- ----------------------------
DROP TABLE IF EXISTS `image_sliders_copy1`;
CREATE TABLE `image_sliders_copy1`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(255)  NOT NULL,
  `title` varchar(255)  NULL DEFAULT NULL,
  `desc` varchar(255)  NULL DEFAULT NULL,
  `urutan` int NOT NULL,
  `is_active` enum('0','1')  NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 ;

-- ----------------------------
-- Records of image_sliders_copy1
-- ----------------------------
INSERT INTO `image_sliders_copy1` VALUES (1, '1727592273_1_new.jpg', NULL, NULL, 0, '0', '2024-09-28 11:46:19', '2024-09-29 06:44:33');
INSERT INTO `image_sliders_copy1` VALUES (2, '1727592280_2_new.jpg', NULL, NULL, 1, '0', '2024-09-28 11:46:32', '2024-09-29 06:44:40');

-- ----------------------------
-- Table structure for jurusans
-- ----------------------------
DROP TABLE IF EXISTS `jurusans`;
CREATE TABLE `jurusans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255)  NOT NULL,
  `singkatan` varchar(255)  NULL DEFAULT NULL,
  `slug` varchar(255)  NOT NULL,
  `is_active` enum('0','1')  NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `jurusans_nama_unique`(`nama` ASC) USING BTREE,
  UNIQUE INDEX `jurusans_slug_unique`(`slug` ASC) USING BTREE,
  UNIQUE INDEX `jurusans_singkatan_unique`(`singkatan` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 ;

-- ----------------------------
-- Records of jurusans
-- ----------------------------

-- ----------------------------
-- Table structure for kategori_beritas
-- ----------------------------
DROP TABLE IF EXISTS `kategori_beritas`;
CREATE TABLE `kategori_beritas`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255)  NOT NULL,
  `is_active` enum('0','1')  NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kategori_beritas_nama_unique`(`nama` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 ;

-- ----------------------------
-- Records of kategori_beritas
-- ----------------------------
INSERT INTO `kategori_beritas` VALUES (1, 'Pemerintah', '0', '2024-09-28 12:00:55', '2024-10-12 02:44:11');
INSERT INTO `kategori_beritas` VALUES (2, 'Kesehatan', '0', '2024-09-28 12:01:03', '2024-10-12 02:44:20');
INSERT INTO `kategori_beritas` VALUES (3, 'Stunting', '0', '2024-09-28 12:01:58', '2024-10-12 02:44:29');

-- ----------------------------
-- Table structure for kegiatans
-- ----------------------------
DROP TABLE IF EXISTS `kegiatans`;
CREATE TABLE `kegiatans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255)  NOT NULL,
  `slug` varchar(255)  NOT NULL,
  `image` varchar(255)  NULL DEFAULT NULL,
  `imagas` varchar(255)  NULL DEFAULT NULL,
  `content` text  NOT NULL,
  `is_active` enum('0','1')  NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kegiatans_nama_unique`(`nama` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 ;

-- ----------------------------
-- Records of kegiatans
-- ----------------------------
INSERT INTO `kegiatans` VALUES (1, 'test kegiatan', 'test-kegiatan', NULL, NULL, 'coba kegiatan', '0', '2024-10-11 09:52:13', '2024-10-11 09:52:13');

-- ----------------------------
-- Table structure for laporan_akademik
-- ----------------------------
DROP TABLE IF EXISTS `laporan_akademik`;
CREATE TABLE `laporan_akademik`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_murid` int NOT NULL,
  `id_guru` varchar(255)  NULL DEFAULT NULL,
  `id_kelompokbelajar` varchar(255)  NULL DEFAULT NULL,
  `id_semester` varchar(255)  NULL DEFAULT NULL,
  `id_tahunajaran` varchar(255)  NULL DEFAULT NULL,
  `file` varchar(255)  NOT NULL,
  `title` varchar(255)  NULL DEFAULT NULL,
  `desc` text  NULL,
  `moral` text  NULL,
  `fisik_motorik` text  NULL,
  `kognitif` text  NULL,
  `bahasa` text  NULL,
  `sosial_emosional` text  NULL,
  `seni` text  NULL,
  `rekomendasi_orangtua` text  NULL,
  `is_active` enum('0','1')  NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 ;

-- ----------------------------
-- Records of laporan_akademik
-- ----------------------------
INSERT INTO `laporan_akademik` VALUES (16, 1, '7', '1', '1', '3', '1728091295_PROJECT MAGANG.pdf', 'ASik', 'fdf', 'dfdf', 'df', 'df', 'df', 'df', 'df', NULL, '0', '2024-10-04 08:32:33', '2024-10-05 01:21:35');
INSERT INTO `laporan_akademik` VALUES (17, 2, '7', '1', '1', '3', '1728088361_PROJECT MAGANG.pdf', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', NULL, '0', '2024-10-05 00:32:41', '2024-10-05 00:32:41');

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_code` varchar(255)  NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `members_member_code_unique`(`member_code` ASC) USING BTREE,
  UNIQUE INDEX `members_user_id_unique`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of members
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255)  NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 45 ;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_08_08_100000_create_banks_tables', 1);
INSERT INTO `migrations` VALUES (6, '2022_03_20_132856_create_jurusans_table', 1);
INSERT INTO `migrations` VALUES (7, '2022_03_20_133244_create_data_jurusans_table', 1);
INSERT INTO `migrations` VALUES (8, '2022_03_22_182953_create_kegiatans_table', 1);
INSERT INTO `migrations` VALUES (9, '2022_03_23_040838_create_image_sliders_table', 1);
INSERT INTO `migrations` VALUES (10, '2022_03_23_052723_add_field_to_image_sliders_table', 1);
INSERT INTO `migrations` VALUES (11, '2022_03_23_065335_create_abouts_table', 1);
INSERT INTO `migrations` VALUES (12, '2022_03_23_074809_create_videos_table', 1);
INSERT INTO `migrations` VALUES (13, '2022_03_24_075737_create_kategori_beritas_table', 1);
INSERT INTO `migrations` VALUES (14, '2022_03_24_075900_create_beritas_table', 1);
INSERT INTO `migrations` VALUES (15, '2022_03_24_105758_create_events_table', 1);
INSERT INTO `migrations` VALUES (16, '2022_03_24_201826_add_field_to_events_table', 1);
INSERT INTO `migrations` VALUES (17, '2022_03_24_204322_create_footers_table', 1);
INSERT INTO `migrations` VALUES (18, '2022_03_25_102915_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (19, '2022_03_27_074151_create_users_details_table', 1);
INSERT INTO `migrations` VALUES (20, '2022_03_27_094236_create_data_murids_table', 1);
INSERT INTO `migrations` VALUES (21, '2022_03_28_154339_create_profile_sekolahs_table', 1);
INSERT INTO `migrations` VALUES (22, '2022_03_28_161701_create_visimisis_table', 1);
INSERT INTO `migrations` VALUES (23, '2022_03_30_084531_create_data_orang_tuas_table', 1);
INSERT INTO `migrations` VALUES (24, '2022_03_30_172737_add_value_role_in_users_table', 1);
INSERT INTO `migrations` VALUES (25, '2022_03_30_194727_add_value_role_in_users_details_table', 1);
INSERT INTO `migrations` VALUES (26, '2022_04_01_190600_add_field_to_data_murids', 1);
INSERT INTO `migrations` VALUES (27, '2022_04_01_191038_create_berkas_murids_table', 1);
INSERT INTO `migrations` VALUES (28, '2022_05_20_062053_create_authors_table', 1);
INSERT INTO `migrations` VALUES (29, '2022_05_20_062103_create_publishers_table', 1);
INSERT INTO `migrations` VALUES (30, '2022_05_20_062130_create_categories_table', 1);
INSERT INTO `migrations` VALUES (31, '2022_05_20_062140_create_books_table', 1);
INSERT INTO `migrations` VALUES (32, '2022_05_20_062219_create_members_table', 1);
INSERT INTO `migrations` VALUES (33, '2022_05_20_062236_create_borrowings_table', 1);
INSERT INTO `migrations` VALUES (34, '2022_07_16_094123_create_bank_accounts_table', 1);
INSERT INTO `migrations` VALUES (35, '2022_07_16_094821_create_payment_spps_table', 1);
INSERT INTO `migrations` VALUES (36, '2022_07_16_100447_create_detail_payment_spps_table', 1);
INSERT INTO `migrations` VALUES (37, '2022_07_16_145332_add_value_role_bendahara_in_users_table', 1);
INSERT INTO `migrations` VALUES (38, '2022_07_16_145418_add_value_role_bendahara_in_users_details_table', 1);
INSERT INTO `migrations` VALUES (39, '2022_07_29_072220_add_column_account_name_in_bank_accounts_table', 1);
INSERT INTO `migrations` VALUES (40, '2022_07_29_081354_add_column_in_detail_payment_spps_table', 1);
INSERT INTO `migrations` VALUES (41, '2022_08_01_080614_create_settings_table', 1);
INSERT INTO `migrations` VALUES (42, '2024_02_13_122740_create_table_spp_setting', 1);
INSERT INTO `migrations` VALUES (43, '2024_09_30_082032_create_services_table', 2);
INSERT INTO `migrations` VALUES (44, '2024_09_30_082051_create_subservices_table', 2);
INSERT INTO `migrations` VALUES (45, '2024_09_30_090212_create_tabel_bk_siswa', 3);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255)  NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255)  NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 2);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 3);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 4);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 5);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 6);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 7);
INSERT INTO `model_has_roles` VALUES (4, 'App\\Models\\User', 8);
INSERT INTO `model_has_roles` VALUES (7, 'App\\Models\\User', 9);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 10);
INSERT INTO `model_has_roles` VALUES (12, 'App\\Models\\User', 14);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255)  NOT NULL,
  `token` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for payment_spps
-- ----------------------------
DROP TABLE IF EXISTS `payment_spps`;
CREATE TABLE `payment_spps`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `year` bigint NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `January` enum('paid','unpaid','free')  NOT NULL DEFAULT 'unpaid',
  `February` enum('paid','unpaid','free')  NOT NULL DEFAULT 'unpaid',
  `March` enum('paid','unpaid','free')  NOT NULL DEFAULT 'unpaid',
  `April` enum('paid','unpaid','free')  NOT NULL DEFAULT 'unpaid',
  `May` enum('paid','unpaid','free')  NOT NULL DEFAULT 'unpaid',
  `June` enum('paid','unpaid','free')  NOT NULL DEFAULT 'unpaid',
  `July` enum('paid','unpaid','free')  NOT NULL DEFAULT 'unpaid',
  `August` enum('paid','unpaid','free')  NOT NULL DEFAULT 'unpaid',
  `September` enum('paid','unpaid','free')  NOT NULL DEFAULT 'unpaid',
  `October` enum('paid','unpaid','free')  NOT NULL DEFAULT 'unpaid',
  `November` enum('paid','unpaid','free')  NOT NULL DEFAULT 'unpaid',
  `December` enum('paid','unpaid','free')  NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `payment_spps_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `payment_spps_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 ;

-- ----------------------------
-- Records of payment_spps
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255)  NOT NULL,
  `guard_name` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255)  NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `token` varchar(64)  NOT NULL,
  `abilities` text  NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for photos
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255)  NOT NULL,
  `description` text  NULL,
  `image` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 ;

-- ----------------------------
-- Records of photos
-- ----------------------------
INSERT INTO `photos` VALUES (1, '1', '1', '1.jpg', '2024-10-02 14:28:31', '2024-10-02 14:28:31');
INSERT INTO `photos` VALUES (2, '2', '2', '2.jpg', '2024-10-02 14:32:02', '2024-10-02 14:32:02');
INSERT INTO `photos` VALUES (3, '3', '3', '3.jpg', NULL, NULL);
INSERT INTO `photos` VALUES (4, '4', '4', '4.jpg', NULL, NULL);
INSERT INTO `photos` VALUES (5, '5', '5', '5.jpg', NULL, NULL);
INSERT INTO `photos` VALUES (6, '6', '6', '6.jpg', NULL, NULL);
INSERT INTO `photos` VALUES (7, '7', '7', '7.jpg', NULL, NULL);
INSERT INTO `photos` VALUES (8, '8', '8', '8.jpg', NULL, NULL);

-- ----------------------------
-- Table structure for pilar_program
-- ----------------------------
DROP TABLE IF EXISTS `pilar_program`;
CREATE TABLE `pilar_program`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255)  NOT NULL,
  `content` text  NOT NULL,
  `image` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 ;

-- ----------------------------
-- Records of pilar_program
-- ----------------------------
INSERT INTO `pilar_program` VALUES (1, 'TIM PERCEPATAN PENURUNAN STUNTING/TPPS', 'Tim Percepatan Penurunan Stunting/TPPS\r\n \r\n\r\nTPPS atau Tim Percepatan Penurunan Stunting dibentuk untuk mendukung pelaksanaan Strategi Nasional Percepatan Penurunan Stunting di bawah koordinasi Kedeputian Bidang Dukungan Kebijakan Pembangunan Manusia, Sekretariat Wakil Presiden (Setwapres) Republik Indonesia.\r\n\r\nTP2AK bertugas memastikan sinkronisasi program-program nasional, lokal dan masyarakat dengan pendekatan multisektor melalui konvergensi program di semua tingkatan yang didasari oleh Lima Pilar Pencegahan Stunting, yaitu:\r\n\r\nPilar 1: Komitmen dan visi kepemimpinan tertinggi Negara\r\n\r\nPilar 2: Kampanye nasional dan komunikasi perubahan perilaku\r\n\r\nPilar 3: Konvergensi, koordinasi, dan konsolidasi program pusat, daerah dan desa\r\n\r\nPilar 4: Gizi dan ketahanan pangan\r\n\r\nPilar 5: Pemantauan dan evaluasi\r\n\r\nLima Pilar Pencegahan Stunting merupakan dasar dari Strategi Nasional Percepatan Penurunan Stunting atau dikenal sebagai Stranas Stunting.\r\n\r\n \r\n\r\nTugas TPPS\r\nDi bawah koordinasi Setwapres, TPPS bekerja dengan 23 kementerian/lembaga untuk mendorong sinkronisasi dan konvergensi seluruh perencanaan, implementasi, termasuk pemantauan dan evaluasi pada semua program yang mendukung Stranas Stunting.\r\nPelaksanaan percepatan pencegahan stunting dilakukan Setwapres dengan dukungan TPPS melalui berbagai kegiatan yang dilaksanakan oleh 4 tim kelompok ahli:\r\nUnit Kelembagaan, yang melakukan penguatan kapasitas kementerian/lembaga yang mendukung upaya percepatan pencegahan stunting, berikut mendorong konvergensi program/kegiatan antar kementerian/lembaga.\r\nUnit ini memfasilitasi pengembangan kapasitas Organisasi Pemerintah Daerah (OPD) hingga aparatur desa serta stakeholder daerah agar mampu melakukan konvergensi dalam perencanaan, implementasi, pemantauan dan evaluasi atas program yang mendukung implementasi Stranas Stunting.\r\nUnit Knowledge Management & Communications mendukung kampanye yang terkoordinasi di tingkat nasional hingga tingkat kabupaten/kota bahkan desa. Unit ini juga membangun kemitraan Pemerintah dengan para aktor non pemerintah, seperti kelompok swasta, LSM, organisasi masyarakat, donor, akademisi, dan kelompok-kelompok lain untuk mendukung percepatan pencegahan stunting.. Pengelolaan pengetahuan atas berbagai upaya pencegahan stunting dilakukan juga sebagai referensi pengetahuan dalam mendorong konvergensi program/kegiatan.\r\nUnit Result Monitoring memantau proses berbagai kegiatan yang dilakukan seluruh kementerian/lembaga terkait upaya pencegahan stunting. Unit ini melakukan pemantauan terpadu satu pintu dengan menyiapkan dashboard pemantauan dimana interface dan variable didalamnya berdasarkan theory of change (TOC) yang dikembangkan.\r\nUnit Evaluasi melakukan berbagai kegiatan evaluasi terhadap program/kegiatan yang dilakukan oleh kementrian/lembaga. Berbagai studi dan evaluasi dampak akan dirancang dan dilaporkan sebagai masukan terhadap pengelolaan program di masa mendatang. Selain itu, unit ini memberikan dukungan terhadap pengelolaan data terkait stunting yang dikelola oleh BPS dan Kementerian Kesehatan.', '1727523263_9403541.jpg', '2024-09-28 11:34:23', '2024-10-12 02:11:02');

-- ----------------------------
-- Table structure for profile_sekolahs
-- ----------------------------
DROP TABLE IF EXISTS `profile_sekolahs`;
CREATE TABLE `profile_sekolahs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255)  NOT NULL,
  `content` text  NOT NULL,
  `image` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 ;

-- ----------------------------
-- Records of profile_sekolahs
-- ----------------------------
INSERT INTO `profile_sekolahs` VALUES (1, 'Pilar Program', 'Pencegahan stunting menyasar berbagai penyebab langsung dan tidak langsung yang memerlukan kerjasama dan koordinasi lintas sektor di seluruh tingkatan pemerintah, swasta dan dunia usaha serta masyarakat. Oleh karena itu, diperlukan dokumen acuan yang dapat digunakan untuk memastikan koordinasi tersebut terlaksana secara konvergen untuk seluruh intervensi. Strategi Nasional Percepatan Pencegahan Stunting diharapkan dapat menjadi acuan bagi seluruh pemangku kepentingan dalam mendukung komitmen para pimpinan nasional baik di pusat maupun daerah.', '1727523263_9403541.jpg', '2024-09-28 11:34:23', '2024-10-12 02:11:02');

-- ----------------------------
-- Table structure for publishers
-- ----------------------------
DROP TABLE IF EXISTS `publishers`;
CREATE TABLE `publishers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255)  NOT NULL,
  `address` varchar(255)  NULL DEFAULT NULL,
  `phone` varchar(255)  NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `publishers_name_unique`(`name` ASC) USING BTREE
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of publishers
-- ----------------------------

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB ;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255)  NOT NULL,
  `guard_name` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 ;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', 'web', '2024-09-28 11:17:55', '2024-09-28 11:17:55');
INSERT INTO `roles` VALUES (2, 'Guru', 'web', '2024-09-28 11:17:55', '2024-09-28 11:17:55');
INSERT INTO `roles` VALUES (3, 'Staf', 'web', '2024-09-28 11:17:55', '2024-09-28 11:17:55');
INSERT INTO `roles` VALUES (4, 'Murid', 'web', '2024-09-28 11:17:55', '2024-09-28 11:17:55');
INSERT INTO `roles` VALUES (5, 'Orang Tua', 'web', '2024-09-28 11:17:55', '2024-09-28 11:17:55');
INSERT INTO `roles` VALUES (6, 'Alumni', 'web', '2024-09-28 11:17:55', '2024-09-28 11:17:55');
INSERT INTO `roles` VALUES (7, 'Guest', 'web', '2024-09-28 11:17:55', '2024-09-28 11:17:55');
INSERT INTO `roles` VALUES (8, 'Perpustakaan', 'web', '2024-09-28 11:17:55', '2024-09-28 11:17:55');
INSERT INTO `roles` VALUES (9, 'PPDB', 'web', '2024-09-28 11:17:55', '2024-09-28 11:17:55');
INSERT INTO `roles` VALUES (10, 'Bendahara', 'web', '2024-09-28 11:17:55', '2024-09-28 11:17:55');
INSERT INTO `roles` VALUES (11, 'tpps', 'web', NULL, NULL);
INSERT INTO `roles` VALUES (12, 'stakeholder', 'web', NULL, NULL);

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `isEmail` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255)  NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `settings_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 ;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 0, NULL, 1, '2024-09-28 11:17:55', '2024-09-28 11:17:55');

-- ----------------------------
-- Table structure for spp_setting
-- ----------------------------
DROP TABLE IF EXISTS `spp_setting`;
CREATE TABLE `spp_setting`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `amount` int NOT NULL DEFAULT 0,
  `update_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `spp_setting_update_by_foreign`(`update_by` ASC) USING BTREE,
  CONSTRAINT `spp_setting_ibfk_1` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 ;

-- ----------------------------
-- Records of spp_setting
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255)  NOT NULL,
  `username` varchar(255)  NOT NULL,
  `email` varchar(255)  NOT NULL,
  `role` enum('Admin','Guru','Staf','Murid','Orang Tua','Alumni','Guest','Perpustakaan','PPDB','Bendahara','tpps','stakeholder')  NULL DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif')  NOT NULL,
  `foto_profile` varchar(255)  NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255)  NOT NULL,
  `remember_token` varchar(100)  NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username` ASC) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 ;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Superadmin', 'superadmin', 'superadmin@gmail.com', 'Admin', 'Aktif', NULL, NULL, '$2y$10$lMbJsSjtwpljarNvTTkO1umdwKsXI9spIUsGqzi//HyZ9.FkXT8i.', NULL, '2024-09-28 11:17:55', '2024-09-28 11:17:55');
INSERT INTO `users` VALUES (2, 'Chosyiatun, S.Ag', 'chosyiatun,23', 'Chosyiatun@gmail.com', 'Guru', 'Aktif', '1727523623_9842877.jpg', NULL, '$2y$10$f3IrGbBKPlNl/xuVxnZxI.xUCr93jS/ClHDSZOicpkEIYSie.YNm2', NULL, '2024-09-28 11:40:23', '2024-09-28 11:40:23');
INSERT INTO `users` VALUES (3, 'Umik Hanik, S.Pd', 'umik20', 'umik@gmail.com', 'Guru', 'Aktif', '1727523680_9842877.jpg', NULL, '$2y$10$4V8SedSxzFqKFr8JPyjmX.dT1wEE176qLK1adpSq9LgTff6Q7BdHW', NULL, '2024-09-28 11:41:20', '2024-09-28 11:41:20');
INSERT INTO `users` VALUES (4, 'Kristin Zuliawati, S.Pd', 'kristin54', 'Kristin@gmail.com', 'Guru', 'Aktif', '1727523714_9842877.jpg', NULL, '$2y$10$m9ifu0N8m/vUK8k2xapnoutFD0MejWogK8hrTrabAuJOpsLIatELW', NULL, '2024-09-28 11:41:54', '2024-09-28 11:41:54');
INSERT INTO `users` VALUES (5, 'Chusnul Chotimah, S.Pd', 'chusnul34', 'Chusnul@gmail.com', 'Guru', 'Aktif', '1727523754_9842877.jpg', NULL, '$2y$10$pftKrxs5CC2ECA73bwZcOueWrtmbwTnmiDk0Ty75VW7BKi45DEp9W', NULL, '2024-09-28 11:42:34', '2024-09-28 11:42:34');
INSERT INTO `users` VALUES (6, 'Nur Azizah', 'nur06', 'azizah@gmail.com', 'Guru', 'Aktif', '1727523786_9842877.jpg', NULL, '$2y$10$8cN5aqyVA4rGPG31IIPKO.1K1.rWV9e5q4HE8Hw.fo7G7vZCADpu6', NULL, '2024-09-28 11:43:06', '2024-09-28 11:43:06');
INSERT INTO `users` VALUES (7, 'guru', 'guru30', 'guru@gmail.com', 'Guru', 'Aktif', '1727771550_user.png', NULL, '$2y$10$8DRk7Uvxlqahse5MxjFgU.dXUOvxPnfmBMvjK9hmh4BOg9GFfoEli', NULL, '2024-10-01 08:32:30', '2024-10-01 08:32:30');
INSERT INTO `users` VALUES (8, 'bambang avicenna RA', 'bambang', 'suryoatmojo@uwp.ac.id', 'Murid', 'Aktif', '1728093234_imagenotavailable.png', NULL, '$2y$10$zfk1cYrgNORwRMezBoppRuKIX9RIYiic66HtSkEYlXLM0dWSHCGF.', NULL, '2024-10-01 15:31:11', '2024-10-05 01:53:55');
INSERT INTO `users` VALUES (9, 'Alesheea Farzana Nayyara', 'Alesheea', 'suryoatm@gmail.com', 'Guest', 'Aktif', '1728085223_imagenotavailable.png', NULL, '$2y$10$tuZ9ZJlbnorXxFUvdsqKq.GfaZUMhqynA5c4PUaiJ/wJWipb8to52', NULL, '2024-10-04 23:40:23', '2024-10-04 23:40:23');
INSERT INTO `users` VALUES (10, 'tpps', 'tpps44', 'tpps@gmail.com', 'tpps', 'Aktif', '1729570303_imagenotavailable.png', NULL, '$2y$10$rcT6e7rHi0OJadZiekLHpes7eGLTWk/lCMsQEwYJt8/q7gbiqrgGC', NULL, '2024-10-22 04:11:44', '2024-10-22 04:11:44');
INSERT INTO `users` VALUES (14, 'Stakeholder', 'stakeholder27', 'stakeholder@gmail.com', 'stakeholder', 'Aktif', '1729571247_imagenotavailable.png', NULL, '$2y$10$lXxZyEVbdFfz3UoMf9WbHe87w7yD8LZGpDOlBsp3IJ1wjjuxqxkT6', NULL, '2024-10-22 04:27:27', '2024-10-22 04:27:27');

-- ----------------------------
-- Table structure for users_details
-- ----------------------------
DROP TABLE IF EXISTS `users_details`;
CREATE TABLE `users_details`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `role` enum('Admin','Guru','Staf','Murid','Orang Tua','Alumni','Guest','Perpustakaan','PPDB','Bendahara','tpps','stakeholder')  NULL DEFAULT NULL,
  `mengajar` varchar(255)  NULL DEFAULT NULL,
  `nip` bigint NULL DEFAULT NULL,
  `email` varchar(255)  NULL DEFAULT NULL,
  `linkidln` varchar(255)  NULL DEFAULT NULL,
  `instagram` varchar(255)  NULL DEFAULT NULL,
  `twitter` varchar(255)  NULL DEFAULT NULL,
  `facebook` varchar(255)  NULL DEFAULT NULL,
  `youtube` varchar(255)  NULL DEFAULT NULL,
  `website` varchar(255)  NULL DEFAULT NULL,
  `is_active` enum('0','1')  NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 ;

-- ----------------------------
-- Records of users_details
-- ----------------------------
INSERT INTO `users_details` VALUES (1, 2, 'Guru', 'Matematika', 123456789, 'Chosyiatun@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2024-09-28 11:40:23', '2024-09-28 11:40:23');
INSERT INTO `users_details` VALUES (2, 3, 'Guru', 'Matematika', 456789123, 'umik@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2024-09-28 11:41:20', '2024-09-28 11:41:20');
INSERT INTO `users_details` VALUES (3, 4, 'Guru', 'Matematika', 789456132, 'Kristin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2024-09-28 11:41:54', '2024-09-28 11:41:54');
INSERT INTO `users_details` VALUES (4, 5, 'Guru', 'Matematika', 456123789, 'Chusnul@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2024-09-28 11:42:34', '2024-09-28 11:42:34');
INSERT INTO `users_details` VALUES (5, 6, 'Guru', 'Matematika', 987654321, 'azizah@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2024-09-28 11:43:06', '2024-09-28 11:43:06');
INSERT INTO `users_details` VALUES (6, 7, 'Guru', 'Matematika', 7, 'guru@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2024-10-01 08:32:30', '2024-10-01 08:32:30');
INSERT INTO `users_details` VALUES (7, 10, 'Guru', NULL, NULL, 'tpps@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2024-10-22 04:11:44', '2024-10-22 04:11:44');
INSERT INTO `users_details` VALUES (9, 14, 'stakeholder', NULL, NULL, 'stakeholder@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2024-10-22 04:27:27', '2024-10-22 04:27:27');

-- ----------------------------
-- Table structure for videos
-- ----------------------------
DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255)  NOT NULL,
  `desc` varchar(255)  NOT NULL,
  `url` varchar(255)  NOT NULL,
  `is_active` enum('0','1')  NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 ;

-- ----------------------------
-- Records of videos
-- ----------------------------
INSERT INTO `videos` VALUES (1, 'profile', 'profile', 'https://www.youtube.com/watch?v=XLZQ8LiXrKo', '0', '2024-09-28 11:49:29', '2024-09-28 11:49:29');

-- ----------------------------
-- Table structure for visimisis
-- ----------------------------
DROP TABLE IF EXISTS `visimisis`;
CREATE TABLE `visimisis`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `visi` text  NOT NULL,
  `misi` text  NOT NULL,
  `image` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 ;

-- ----------------------------
-- Records of visimisis
-- ----------------------------
INSERT INTO `visimisis` VALUES (1, 'Dengan adanya keberadaan PPT DAHLIA, diharapkan dapat memberikan kontribusi dalam mencerdaskan anak bangsa di wilayah Kec. Benowo, Kota Surabaya.', 'Dengan adanya keberadaan PPT DAHLIA, diharapkan dapat memberikan kontribusi dalam mencerdaskan anak bangsa di wilayah Kec. Benowo, Kota Surabaya.', '1727523358_9403541.jpg', '2024-09-28 11:35:58', '2024-09-28 11:35:58');

SET FOREIGN_KEY_CHECKS = 1;
