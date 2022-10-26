-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 26, 2022 at 05:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siapif_fix`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `Nip` varchar(45) NOT NULL,
  `Nama` varchar(45) DEFAULT NULL,
  `Kode_Wali` varchar(45) DEFAULT NULL,
  `Email_SSO` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`Nip`, `Nama`, `Kode_Wali`, `Email_SSO`) VALUES
('0000000000000001', 'M. Abyan Haris Rizal Putra', '0001', 'abyanpujiwidodo@lecturer.undip.ac.id'),
('0000000000000002', 'Eng. Andhika Wibowo', '0002', 'andhiwibowo@lecturer.undip.ac.id'),
('0000000000000003', 'Farhan Abdi Sarwoko', '0003', 'fadis@lecturer.undip.ac.id'),
('69696969', 'Paler', NULL, 'ler@undip.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_irs`
--

CREATE TABLE `tb_irs` (
  `Nim` varchar(45) NOT NULL,
  `Semester` varchar(45) NOT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Jml_SKS` varchar(45) DEFAULT NULL,
  `File_IRS` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_irs`
--

INSERT INTO `tb_irs` (`Nim`, `Semester`, `Status`, `Jml_SKS`, `File_IRS`) VALUES
('24060118150120', '9', 'Cuti', '144', NULL),
('24060119150131', '7', 'Aktif', '136', NULL),
('24060120150116', '5', 'Aktif', '90', NULL),
('24060120150120', '5', 'Cuti', '90', NULL),
('24060120150169', '5', 'Aktif', '90', NULL),
('24060121150144', '3', 'Aktif', '48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kabupaten`
--

CREATE TABLE `tb_kabupaten` (
  `Kode_Kabupaten` int(11) NOT NULL,
  `Kode_Provinsi` int(11) NOT NULL,
  `Nama_Kabupaten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kabupaten`
--

INSERT INTO `tb_kabupaten` (`Kode_Kabupaten`, `Kode_Provinsi`, `Nama_Kabupaten`) VALUES
(582, 2, 'Kabupaten Aceh Barat'),
(583, 2, 'Kabupaten Aceh Barat Daya'),
(584, 2, 'Kabupaten Aceh Besar'),
(585, 2, 'Kabupaten Aceh Jaya'),
(586, 2, 'Kabupaten Aceh Selatan'),
(587, 2, 'Kabupaten Aceh Singkil'),
(588, 2, 'Kabupaten Aceh Tamiang'),
(589, 2, 'Kabupaten Aceh Tengah'),
(590, 2, 'Kabupaten Aceh Tenggara'),
(591, 2, 'Kabupaten Aceh Timur'),
(592, 2, 'Kabupaten Aceh Utara'),
(593, 2, 'Kabupaten Bener Meriah'),
(594, 2, 'Kabupaten Bireuen'),
(595, 2, 'Kabupaten Gayo Lues'),
(596, 2, 'Kabupaten Nagan Raya'),
(597, 2, 'Kabupaten Pidie'),
(598, 2, 'Kabupaten Pidie Jaya'),
(599, 2, 'Kabupaten Simeulue'),
(600, 2, 'Kota Banda Aceh'),
(601, 2, 'Kota Langsa'),
(602, 2, 'Kota Lhokseumawe'),
(603, 2, 'Kota Sabang'),
(604, 2, 'Kota Subulussalam'),
(605, 2, ''),
(606, 2, 'Sumatera Utara (SUMUT)'),
(607, 2, 'Kabupaten Asahan'),
(608, 2, 'Kabupaten Batubara'),
(609, 2, 'Kabupaten Dairi'),
(610, 2, 'Kabupaten Deli Serdang'),
(611, 2, 'Kabupaten Humbang Hasundutan'),
(612, 2, 'Kabupaten Karo'),
(613, 2, 'Kabupaten Labuhanbatu'),
(614, 2, 'Kabupaten Labuhanbatu Selatan'),
(615, 2, 'Kabupaten Labuhanbatu Utara'),
(616, 2, 'Kabupaten Langkat'),
(617, 2, 'Kabupaten Mandailing Natal'),
(618, 2, 'Kabupaten Nias'),
(619, 2, 'Kabupaten Nias Barat'),
(620, 2, 'Kabupaten Nias Selatan'),
(621, 2, 'Kabupaten Nias Utara'),
(622, 2, 'Kabupaten Padang Lawas'),
(623, 2, 'Kabupaten Padang Lawas Utara'),
(624, 2, 'Kabupaten Pakpak Bharat'),
(625, 2, 'Kabupaten Samosir'),
(626, 2, 'Kabupaten Serdang Bedagai'),
(627, 2, 'Kabupaten Simalungun'),
(628, 2, 'Kabupaten Tapanuli Selatan'),
(629, 2, 'Kabupaten Tapanuli Tengah'),
(630, 2, 'Kabupaten Tapanuli Utara'),
(631, 2, 'Kabupaten Toba Samosir'),
(632, 2, 'Kota Binjai'),
(633, 2, 'Kota Gunungsitoli'),
(634, 2, 'Kota Medan'),
(635, 2, 'Kota Padangsidempuan'),
(636, 2, 'Kota Pematangsiantar'),
(637, 2, 'Kota Sibolga'),
(638, 2, 'Kota Tanjungbalai'),
(639, 2, 'Kota Tebing Tinggi'),
(640, 2, ''),
(641, 2, 'Sumatera Barat (SUMBAR)'),
(642, 2, 'Kabupaten Agam'),
(643, 2, 'Kabupaten Dharmasraya'),
(644, 2, 'Kabupaten Kepulauan Mentawai'),
(645, 2, 'Kabupaten Lima Puluh Kota'),
(646, 2, 'Kabupaten Padang Pariaman'),
(647, 2, 'Kabupaten Pasaman'),
(648, 2, 'Kabupaten Pasaman Barat'),
(649, 2, 'Kabupaten Pesisir Selatan'),
(650, 2, 'Kabupaten Sijunjung'),
(651, 2, 'Kabupaten Solok'),
(652, 2, 'Kabupaten Solok Selatan'),
(653, 2, 'Kabupaten Tanah Datar'),
(654, 2, 'Kota Bukittinggi'),
(655, 2, 'Kota Padang'),
(656, 2, 'Kota Padangpanjang'),
(657, 2, 'Kota Pariaman'),
(658, 2, 'Kota Payakumbuh'),
(659, 2, 'Kota Sawahlunto'),
(660, 2, 'Kota Solok'),
(661, 2, ''),
(662, 2, 'Sumatera Selatan (SUMSEL)'),
(663, 2, 'Kabupaten Banyuasin'),
(664, 2, 'Kabupaten Empat Lawang'),
(665, 2, 'Kabupaten Lahat'),
(666, 2, 'Kabupaten Muara Enim'),
(667, 2, 'Kabupaten Musi Banyuasin'),
(668, 2, 'Kabupaten Musi Rawas'),
(669, 2, 'Kabupaten Musi Rawas Utara'),
(670, 2, 'Kabupaten Ogan Ilir'),
(671, 2, 'Kabupaten Ogan Komering Ilir'),
(672, 2, 'Kabupaten Ogan Komering Ulu'),
(673, 2, 'Kabupaten Ogan Komering Ulu Selatan'),
(674, 2, 'Kabupaten Ogan Komering Ulu Timur'),
(675, 2, 'Kabupaten Penukal Abab Lematang Ilir'),
(676, 2, 'Kota Lubuklinggau'),
(677, 2, 'Kota Pagar Alam'),
(678, 2, 'Kota Palembang'),
(679, 2, 'Kota Prabumulih'),
(680, 2, ''),
(681, 2, 'Riau'),
(682, 2, 'Kabupaten Bengkalis'),
(683, 2, 'Kabupaten Indragiri Hilir'),
(684, 2, 'Kabupaten Indragiri Hulu'),
(685, 2, 'Kabupaten Kampar'),
(686, 2, 'Kabupaten Kepulauan Meranti'),
(687, 2, 'Kabupaten Kuantan Singingi'),
(688, 2, 'Kabupaten Pelalawan'),
(689, 2, 'Kabupaten Rokan Hilir'),
(690, 2, 'Kabupaten Rokan Hulu'),
(691, 2, 'Kabupaten Siak'),
(692, 2, 'Kota Dumai'),
(693, 2, 'Kota Pekanbaru'),
(694, 2, ''),
(695, 2, 'Kepulauan Riau (KEPRI)'),
(696, 2, 'Kabupaten Bintan'),
(697, 2, 'Kabupaten Karimun'),
(698, 2, 'Kabupaten Kepulauan Anambas'),
(699, 2, 'Kabupaten Lingga'),
(700, 2, 'Kabupaten Natuna'),
(701, 2, 'Kota Batam'),
(702, 2, 'Kota Tanjung Pinang'),
(703, 2, ''),
(704, 2, 'Jambi'),
(705, 2, 'Kabupaten Batanghari'),
(706, 2, 'Kabupaten Bungo'),
(707, 2, 'Kabupaten Kerinci'),
(708, 2, 'Kabupaten Merangin'),
(709, 2, 'Kabupaten Muaro Jambi'),
(710, 2, 'Kabupaten Sarolangun'),
(711, 2, 'Kabupaten Tanjung Jabung Barat'),
(712, 2, 'Kabupaten Tanjung Jabung Timur'),
(713, 2, 'Kabupaten Tebo'),
(714, 2, 'Kota Jambi'),
(715, 2, 'Kota Sungai Penuh'),
(716, 2, ''),
(717, 2, 'Bengkulu'),
(718, 2, 'Kabupaten Bengkulu Selatan'),
(719, 2, 'Kabupaten Bengkulu Tengah'),
(720, 2, 'Kabupaten Bengkulu Utara'),
(721, 2, 'Kabupaten Kaur'),
(722, 2, 'Kabupaten Kepahiang'),
(723, 2, 'Kabupaten Lebong'),
(724, 2, 'Kabupaten Mukomuko'),
(725, 2, 'Kabupaten Rejang Lebong'),
(726, 2, 'Kabupaten Seluma'),
(727, 2, 'Kota Bengkulu'),
(728, 2, ''),
(729, 2, 'Bangka Belitung (BABEL)'),
(730, 2, 'Kabupaten Bangka'),
(731, 2, 'Kabupaten Bangka Barat'),
(732, 2, 'Kabupaten Bangka Selatan'),
(733, 2, 'Kabupaten Bangka Tengah'),
(734, 2, 'Kabupaten Belitung'),
(735, 2, 'Kabupaten Belitung Timur'),
(736, 2, 'Kota Pangkal Pinang'),
(737, 2, ''),
(738, 2, 'Lampung'),
(739, 2, 'Kabupaten Lampung Tengah'),
(740, 2, 'Kabupaten Lampung Utara'),
(741, 2, 'Kabupaten Lampung Selatan'),
(742, 2, 'Kabupaten Lampung Barat'),
(743, 2, 'Kabupaten Lampung Timur'),
(744, 2, 'Kabupaten Mesuji'),
(745, 2, 'Kabupaten Pesawaran'),
(746, 2, 'Kabupaten Pesisir Barat'),
(747, 2, 'Kabupaten Pringsewu'),
(748, 2, 'Kabupaten Tulang Bawang'),
(749, 2, 'Kabupaten Tulang Bawang Barat'),
(750, 2, 'Kabupaten Tanggamus'),
(751, 2, 'Kabupaten Way Kanan'),
(752, 2, 'Kota Bandar Lampung'),
(753, 2, 'Kota Metro'),
(754, 2, ''),
(755, 2, 'Banten'),
(756, 2, 'Kabupaten Lebak'),
(757, 2, 'Kabupaten Pandeglang'),
(758, 2, 'Kabupaten Serang'),
(759, 2, 'Kabupaten Tangerang'),
(760, 2, 'Kota Cilegon'),
(761, 2, 'Kota Serang'),
(762, 2, 'Kota Tangerang'),
(763, 2, 'Kota Tangerang Selatan'),
(764, 2, ''),
(765, 2, 'Jawa Barat (JABAR)'),
(766, 2, 'Kabupaten Bandung'),
(767, 2, 'Kabupaten Bandung Barat'),
(768, 2, 'Kabupaten Bekasi'),
(769, 2, 'Kabupaten Bogor'),
(770, 2, 'Kabupaten Ciamis'),
(771, 2, 'Kabupaten Cianjur'),
(772, 2, 'Kabupaten Cirebon'),
(773, 2, 'Kabupaten Garut'),
(774, 2, 'Kabupaten Indramayu'),
(775, 2, 'Kabupaten Karawang'),
(776, 2, 'Kabupaten Kuningan'),
(777, 2, 'Kabupaten Majalengka'),
(778, 2, 'Kabupaten Pangandaran'),
(779, 2, 'Kabupaten Purwakarta'),
(780, 2, 'Kabupaten Subang'),
(781, 2, 'Kabupaten Sukabumi'),
(782, 2, 'Kabupaten Sumedang'),
(783, 2, 'Kabupaten Tasikmalaya'),
(784, 2, 'Kota Bandung'),
(785, 2, 'Kota Banjar'),
(786, 2, 'Kota Bekasi'),
(787, 2, 'Kota Bogor'),
(788, 2, 'Kota Cimahi'),
(789, 2, 'Kota Cirebon'),
(790, 2, 'Kota Depok'),
(791, 2, 'Kota Sukabumi'),
(792, 2, 'Kota Tasikmalaya'),
(793, 2, ''),
(794, 2, 'Jawa Tengah (JATENG)'),
(795, 2, 'Kabupaten Banjarnegara'),
(796, 2, 'Kabupaten Banyumas'),
(797, 2, 'Kabupaten Batang'),
(798, 2, 'Kabupaten Blora'),
(799, 2, 'Kabupaten Boyolali'),
(800, 2, 'Kabupaten Brebes'),
(801, 2, 'Kabupaten Cilacap'),
(802, 2, 'Kabupaten Demak'),
(803, 2, 'Kabupaten Grobogan'),
(804, 2, 'Kabupaten Jepara'),
(805, 2, 'Kabupaten Karanganyar'),
(806, 2, 'Kabupaten Kebumen'),
(807, 2, 'Kabupaten Kendal'),
(808, 2, 'Kabupaten Klaten'),
(809, 2, 'Kabupaten Kudus'),
(810, 2, 'Kabupaten Magelang'),
(811, 2, 'Kabupaten Pati'),
(812, 2, 'Kabupaten Pekalongan'),
(813, 2, 'Kabupaten Pemalang'),
(814, 2, 'Kabupaten Purbalingga'),
(815, 2, 'Kabupaten Purworejo'),
(816, 2, 'Kabupaten Rembang'),
(817, 2, 'Kabupaten Semarang'),
(818, 2, 'Kabupaten Sragen'),
(819, 2, 'Kabupaten Sukoharjo'),
(820, 2, 'Kabupaten Tegal'),
(821, 2, 'Kabupaten Temanggung'),
(822, 2, 'Kabupaten Wonogiri'),
(823, 2, 'Kabupaten Wonosobo'),
(824, 2, 'Kota Magelang'),
(825, 2, 'Kota Pekalongan'),
(826, 2, 'Kota Salatiga'),
(827, 2, 'Kota Semarang'),
(828, 2, 'Kota Surakarta'),
(829, 2, 'Kota Tegal'),
(830, 2, ''),
(831, 2, 'Jawa Timur (JATIM)'),
(832, 2, 'Kabupaten Bangkalan'),
(833, 2, 'Kabupaten Banyuwangi'),
(834, 2, 'Kabupaten Blitar'),
(835, 2, 'Kabupaten Bojonegoro'),
(836, 2, 'Kabupaten Bondowoso'),
(837, 2, 'Kabupaten Gresik'),
(838, 2, 'Kabupaten Jember'),
(839, 2, 'Kabupaten Jombang'),
(840, 2, 'Kabupaten Kediri'),
(841, 2, 'Kabupaten Lamongan'),
(842, 2, 'Kabupaten Lumajang'),
(843, 2, 'Kabupaten Madiun'),
(844, 2, 'Kabupaten Magetan'),
(845, 2, 'Kabupaten Malang'),
(846, 2, 'Kabupaten Mojokerto'),
(847, 2, 'Kabupaten Nganjuk'),
(848, 2, 'Kabupaten Ngawi'),
(849, 2, 'Kabupaten Pacitan'),
(850, 2, 'Kabupaten Pamekasan'),
(851, 2, 'Kabupaten Pasuruan'),
(852, 2, 'Kabupaten Ponorogo'),
(853, 2, 'Kabupaten Probolinggo'),
(854, 2, 'Kabupaten Sampang'),
(855, 2, 'Kabupaten Sidoarjo'),
(856, 2, 'Kabupaten Situbondo'),
(857, 2, 'Kabupaten Sumenep'),
(858, 2, 'Kabupaten Trenggalek'),
(859, 2, 'Kabupaten Tuban'),
(860, 2, 'Kabupaten Tulungagung'),
(861, 2, 'Kota Batu'),
(862, 2, 'Kota Blitar'),
(863, 2, 'Kota Kediri'),
(864, 2, 'Kota Madiun'),
(865, 2, 'Kota Malang'),
(866, 2, 'Kota Mojokerto'),
(867, 2, 'Kota Pasuruan'),
(868, 2, 'Kota Probolinggo'),
(869, 2, 'Kota Surabaya'),
(870, 2, ''),
(871, 2, 'DKI Jakarta'),
(872, 2, 'Kota Administrasi Jakarta Barat'),
(873, 2, 'Kota Administrasi Jakarta Pusat'),
(874, 2, 'Kota Administrasi Jakarta Selatan'),
(875, 2, 'Kota Administrasi Jakarta Timur'),
(876, 2, 'Kota Administrasi Jakarta Utara'),
(877, 2, 'Kabupaten Administrasi Kepulauan Seribu'),
(878, 2, ''),
(879, 2, 'Daerah Istimewa Yogyakarta'),
(880, 2, 'Kabupaten Bantul'),
(881, 2, 'Kabupaten Gunungkidul'),
(882, 2, 'Kabupaten Kulon Progo'),
(883, 2, 'Kabupaten Sleman'),
(884, 2, 'Kota Yogyakarta'),
(885, 2, ''),
(886, 2, 'Bali'),
(887, 2, 'Kabupaten Badung'),
(888, 2, 'Kabupaten Bangli'),
(889, 2, 'Kabupaten Buleleng'),
(890, 2, 'Kabupaten Gianyar'),
(891, 2, 'Kabupaten Jembrana'),
(892, 2, 'Kabupaten Karangasem'),
(893, 2, 'Kabupaten Klungkung'),
(894, 2, 'Kabupaten Tabanan'),
(895, 2, 'Kota Denpasar'),
(896, 2, ''),
(897, 2, 'Nusa Tenggara Barat (NTB)'),
(898, 2, 'Kabupaten Bima'),
(899, 2, 'Kabupaten Dompu'),
(900, 2, 'Kabupaten Lombok Barat'),
(901, 2, 'Kabupaten Lombok Tengah'),
(902, 2, 'Kabupaten Lombok Timur'),
(903, 2, 'Kabupaten Lombok Utara'),
(904, 2, 'Kabupaten Sumbawa'),
(905, 2, 'Kabupaten Sumbawa Barat'),
(906, 2, 'Kota Bima'),
(907, 2, 'Kota Mataram'),
(908, 2, ''),
(909, 2, 'Nusa Tenggara Timur (NTT)'),
(910, 2, 'Kabupaten Alor'),
(911, 2, 'Kabupaten Belu'),
(912, 2, 'Kabupaten Ende'),
(913, 2, 'Kabupaten Flores Timur'),
(914, 2, 'Kabupaten Kupang'),
(915, 2, 'Kabupaten Lembata'),
(916, 2, 'Kabupaten Malaka'),
(917, 2, 'Kabupaten Manggarai'),
(918, 2, 'Kabupaten Manggarai Barat'),
(919, 2, 'Kabupaten Manggarai Timur'),
(920, 2, 'Kabupaten Ngada'),
(921, 2, 'Kabupaten Nagekeo'),
(922, 2, 'Kabupaten Rote Ndao'),
(923, 2, 'Kabupaten Sabu Raijua'),
(924, 2, 'Kabupaten Sikka'),
(925, 2, 'Kabupaten Sumba Barat'),
(926, 2, 'Kabupaten Sumba Barat Daya'),
(927, 2, 'Kabupaten Sumba Tengah'),
(928, 2, 'Kabupaten Sumba Timur'),
(929, 2, 'Kabupaten Timor Tengah Selatan'),
(930, 2, 'Kabupaten Timor Tengah Utara'),
(931, 2, 'Kota Kupang'),
(932, 2, ''),
(933, 2, 'Kalimantan Barat (KALBAR)'),
(934, 2, 'Kabupaten Bengkayang'),
(935, 2, 'Kabupaten Kapuas Hulu'),
(936, 2, 'Kabupaten Kayong Utara'),
(937, 2, 'Kabupaten Ketapang'),
(938, 2, 'Kabupaten Kubu Raya'),
(939, 2, 'Kabupaten Landak'),
(940, 2, 'Kabupaten Melawi'),
(941, 2, 'Kabupaten Mempawah'),
(942, 2, 'Kabupaten Sambas'),
(943, 2, 'Kabupaten Sanggau'),
(944, 2, 'Kabupaten Sekadau'),
(945, 2, 'Kabupaten Sintang'),
(946, 2, 'Kota Pontianak'),
(947, 2, 'Kota Singkawang'),
(948, 2, ''),
(949, 2, 'Kalimantan Selatan (KALSEL)'),
(950, 2, 'Kabupaten Balangan'),
(951, 2, 'Kabupaten Banjar'),
(952, 2, 'Kabupaten Barito Kuala'),
(953, 2, 'Kabupaten Hulu Sungai Selatan'),
(954, 2, 'Kabupaten Hulu Sungai Tengah'),
(955, 2, 'Kabupaten Hulu Sungai Utara'),
(956, 2, 'Kabupaten Kotabaru'),
(957, 2, 'Kabupaten Tabalong'),
(958, 2, 'Kabupaten Tanah Bumbu'),
(959, 2, 'Kabupaten Tanah Laut'),
(960, 2, 'Kabupaten Tapin'),
(961, 2, 'Kota Banjarbaru'),
(962, 2, 'Kota Banjarmasin'),
(963, 2, ''),
(964, 2, 'Kalimantan Tengah (KALTENG)'),
(965, 2, 'Kabupaten Barito Selatan'),
(966, 2, 'Kabupaten Barito Timur'),
(967, 2, 'Kabupaten Barito Utara'),
(968, 2, 'Kabupaten Gunung Mas'),
(969, 2, 'Kabupaten Kapuas'),
(970, 2, 'Kabupaten Katingan'),
(971, 2, 'Kabupaten Kotawaringin Barat'),
(972, 2, 'Kabupaten Kotawaringin Timur'),
(973, 2, 'Kabupaten Lamandau'),
(974, 2, 'Kabupaten Murung Raya'),
(975, 2, 'Kabupaten Pulang Pisau'),
(976, 2, 'Kabupaten Sukamara'),
(977, 2, 'Kabupaten Seruyan'),
(978, 2, 'Kota Palangka Raya'),
(979, 2, ''),
(980, 2, 'Kalimantan Timur (KALTIM)'),
(981, 2, 'Kabupaten Berau'),
(982, 2, 'Kabupaten Kutai Barat'),
(983, 2, 'Kabupaten Kutai Kartanegara'),
(984, 2, 'Kabupaten Kutai Timur'),
(985, 2, 'Kabupaten Mahakam Ulu'),
(986, 2, 'Kabupaten Paser'),
(987, 2, 'Kabupaten Penajam Paser Utara'),
(988, 2, 'Kota Balikpapan'),
(989, 2, 'Kota Bontang'),
(990, 2, 'Kota Samarinda'),
(991, 2, ''),
(992, 2, 'Kalimantan Utara (KALTARA)'),
(993, 2, 'Kabupaten Bulungan'),
(994, 2, 'Kabupaten Malinau'),
(995, 2, 'Kabupaten Nunukan'),
(996, 2, 'Kabupaten Tana Tidung'),
(997, 2, 'Kota Tarakan'),
(998, 2, ''),
(999, 2, 'Gorontalo'),
(1000, 2, 'Kabupaten Boalemo'),
(1001, 2, 'Kabupaten Bone Bolango'),
(1002, 2, 'Kabupaten Gorontalo'),
(1003, 2, 'Kabupaten Gorontalo Utara'),
(1004, 2, 'Kabupaten Pohuwato'),
(1005, 2, 'Kota Gorontalo'),
(1006, 2, ''),
(1007, 2, 'Sulawesi Selatan (SULSEL)'),
(1008, 2, 'Kabupaten Bantaeng'),
(1009, 2, 'Kabupaten Barru'),
(1010, 2, 'Kabupaten Bone'),
(1011, 2, 'Kabupaten Bulukumba'),
(1012, 2, 'Kabupaten Enrekang'),
(1013, 2, 'Kabupaten Gowa'),
(1014, 2, 'Kabupaten Jeneponto'),
(1015, 2, 'Kabupaten Kepulauan Selayar'),
(1016, 2, 'Kabupaten Luwu'),
(1017, 2, 'Kabupaten Luwu Timur'),
(1018, 2, 'Kabupaten Luwu Utara'),
(1019, 2, 'Kabupaten Maros'),
(1020, 2, 'Kabupaten Pangkajene dan Kepulauan'),
(1021, 2, 'Kabupaten Pinrang'),
(1022, 2, 'Kabupaten Sidenreng Rappang'),
(1023, 2, 'Kabupaten Sinjai'),
(1024, 2, 'Kabupaten Soppeng'),
(1025, 2, 'Kabupaten Takalar'),
(1026, 2, 'Kabupaten Tana Toraja'),
(1027, 2, 'Kabupaten Toraja Utara'),
(1028, 2, 'Kabupaten Wajo'),
(1029, 2, 'Kota Makassar'),
(1030, 2, 'Kota Palopo'),
(1031, 2, 'Kota Parepare'),
(1032, 2, ''),
(1033, 2, 'Sulawesi Tenggara (SULTRA)'),
(1034, 2, 'Kabupaten Bombana'),
(1035, 2, 'Kabupaten Buton'),
(1036, 2, 'Kabupaten Buton Selatan'),
(1037, 2, 'Kabupaten Buton Tengah'),
(1038, 2, 'Kabupaten Buton Utara'),
(1039, 2, 'Kabupaten Kolaka'),
(1040, 2, 'Kabupaten Kolaka Timur'),
(1041, 2, 'Kabupaten Kolaka Utara'),
(1042, 2, 'Kabupaten Konawe'),
(1043, 2, 'Kabupaten Konawe Kepulauan'),
(1044, 2, 'Kabupaten Konawe Selatan'),
(1045, 2, 'Kabupaten Konawe Utara'),
(1046, 2, 'Kabupaten Muna'),
(1047, 2, 'Kabupaten Muna Barat'),
(1048, 2, 'Kabupaten Wakatobi'),
(1049, 2, 'Kota Bau-Bau'),
(1050, 2, 'Kota Kendari'),
(1051, 2, ''),
(1052, 2, 'Sulawesi Tengah (SULTENG)'),
(1053, 2, 'Kabupaten Banggai'),
(1054, 2, 'Kabupaten Banggai Kepulauan'),
(1055, 2, 'Kabupaten Banggai Laut'),
(1056, 2, 'Kabupaten Buol'),
(1057, 2, 'Kabupaten Donggala'),
(1058, 2, 'Kabupaten Morowali'),
(1059, 2, 'Kabupaten Morowali Utara'),
(1060, 2, 'Kabupaten Parigi Moutong'),
(1061, 2, 'Kabupaten Poso'),
(1062, 2, 'Kabupaten Sigi'),
(1063, 2, 'Kabupaten Tojo Una-Una'),
(1064, 2, 'Kabupaten Toli-Toli'),
(1065, 2, 'Kota Palu'),
(1066, 2, ''),
(1067, 2, 'Sulawesi Utara (SULUT)'),
(1068, 2, 'Kabupaten Bolaang Mongondow'),
(1069, 2, 'Kabupaten Bolaang Mongondow Selatan'),
(1070, 2, 'Kabupaten Bolaang Mongondow Timur'),
(1071, 2, 'Kabupaten Bolaang Mongondow Utara'),
(1072, 2, 'Kabupaten Kepulauan Sangihe'),
(1073, 2, 'Kabupaten Kepulauan Siau Tagulandang Biaro'),
(1074, 2, 'Kabupaten Kepulauan Talaud'),
(1075, 2, 'Kabupaten Minahasa'),
(1076, 2, 'Kabupaten Minahasa Selatan'),
(1077, 2, 'Kabupaten Minahasa Tenggara'),
(1078, 2, 'Kabupaten Minahasa Utara'),
(1079, 2, 'Kota Bitung'),
(1080, 2, 'Kota Kotamobagu'),
(1081, 2, 'Kota Manado'),
(1082, 2, 'Kota Tomohon'),
(1083, 2, ''),
(1084, 2, 'Sulawesi Barat (SULBAR)'),
(1085, 2, 'Kabupaten Majene'),
(1086, 2, 'Kabupaten Mamasa'),
(1087, 2, 'Kabupaten Mamuju'),
(1088, 2, 'Kabupaten Mamuju Tengah'),
(1089, 2, 'Kabupaten Mamuju Utara'),
(1090, 2, 'Kabupaten Polewali Mandar'),
(1091, 2, 'Kota Mamuju'),
(1092, 2, ''),
(1093, 2, 'Maluku'),
(1094, 2, 'Kabupaten Buru'),
(1095, 2, 'Kabupaten Buru Selatan'),
(1096, 2, 'Kabupaten Kepulauan Aru'),
(1097, 2, 'Kabupaten Maluku Barat Daya'),
(1098, 2, 'Kabupaten Maluku Tengah'),
(1099, 2, 'Kabupaten Maluku Tenggara'),
(1100, 2, 'Kabupaten Maluku Tenggara Barat'),
(1101, 2, 'Kabupaten Seram Bagian Barat'),
(1102, 2, 'Kabupaten Seram Bagian Timur'),
(1103, 2, 'Kota Ambon'),
(1104, 2, 'Kota Tual'),
(1105, 2, ''),
(1106, 2, 'Maluku Utara'),
(1107, 2, 'Kabupaten Halmahera Barat'),
(1108, 2, 'Kabupaten Halmahera Tengah'),
(1109, 2, 'Kabupaten Halmahera Utara'),
(1110, 2, 'Kabupaten Halmahera Selatan'),
(1111, 2, 'Kabupaten Kepulauan Sula'),
(1112, 2, 'Kabupaten Halmahera Timur'),
(1113, 2, 'Kabupaten Pulau Morotai'),
(1114, 2, 'Kabupaten Pulau Taliabu'),
(1115, 2, 'Kota Ternate'),
(1116, 2, 'Kota Tidore Kepulauan'),
(1117, 2, ''),
(1118, 2, 'Papua'),
(1119, 2, 'Kabupaten Asmat'),
(1120, 2, 'Kabupaten Biak Numfor'),
(1121, 2, 'Kabupaten Boven Digoel'),
(1122, 2, 'Kabupaten Deiyai'),
(1123, 2, 'Kabupaten Dogiyai'),
(1124, 2, 'Kabupaten Intan Jaya'),
(1125, 2, 'Kabupaten Jayapura'),
(1126, 2, 'Kabupaten Jayawijaya'),
(1127, 2, 'Kabupaten Keerom'),
(1128, 2, 'Kabupaten Kepulauan Yapen'),
(1129, 2, 'Kabupaten Lanny Jaya'),
(1130, 2, 'Kabupaten Mamberamo Raya'),
(1131, 2, 'Kabupaten Mamberamo Tengah'),
(1132, 2, 'Kabupaten Mappi'),
(1133, 2, 'Kabupaten Merauke'),
(1134, 2, 'Kabupaten Mimika'),
(1135, 2, 'Kabupaten Nabire'),
(1136, 2, 'Kabupaten Nduga'),
(1137, 2, 'Kabupaten Paniai'),
(1138, 2, 'Kabupaten Pegunungan Bintang'),
(1139, 2, 'Kabupaten Puncak'),
(1140, 2, 'Kabupaten Puncak Jaya'),
(1141, 2, 'Kabupaten Sarmi'),
(1142, 2, 'Kabupaten Supiori'),
(1143, 2, 'Kabupaten Tolikara'),
(1144, 2, 'Kabupaten Waropen'),
(1145, 2, 'Kabupaten Yahukimo'),
(1146, 2, 'Kabupaten Yalimo'),
(1147, 2, 'Kota Jayapura'),
(1148, 2, ''),
(1149, 2, 'Papua Barat'),
(1150, 2, 'Kabupaten Fakfak'),
(1151, 2, 'Kabupaten Kaimana'),
(1152, 2, 'Kabupaten Manokwari'),
(1153, 2, 'Kabupaten Manokwari Selatan'),
(1154, 2, 'Kabupaten Maybrat'),
(1155, 2, 'Kabupaten Pegunungan Arfak'),
(1156, 2, 'Kabupaten Raja Ampat'),
(1157, 2, 'Kabupaten Sorong'),
(1158, 2, 'Kabupaten Sorong Selatan'),
(1159, 2, 'Kabupaten Tambrauw'),
(1160, 2, 'Kabupaten Teluk Bintuni'),
(1161, 2, 'Kabupaten Teluk Wondama'),
(1162, 2, ''),
(1163, 3, 'Kabupaten Aceh Barat'),
(1164, 3, 'Kabupaten Aceh Barat Daya'),
(1165, 3, 'Kabupaten Aceh Besar'),
(1166, 3, 'Kabupaten Aceh Jaya'),
(1167, 3, 'Kabupaten Aceh Selatan'),
(1168, 3, 'Kabupaten Aceh Singkil'),
(1169, 3, 'Kabupaten Aceh Tamiang'),
(1170, 3, 'Kabupaten Aceh Tengah'),
(1171, 3, 'Kabupaten Aceh Tenggara'),
(1172, 3, 'Kabupaten Aceh Timur'),
(1173, 3, 'Kabupaten Aceh Utara'),
(1174, 3, 'Kabupaten Bener Meriah'),
(1175, 3, 'Kabupaten Bireuen'),
(1176, 3, 'Kabupaten Gayo Lues'),
(1177, 3, 'Kabupaten Nagan Raya'),
(1178, 3, 'Kabupaten Pidie'),
(1179, 3, 'Kabupaten Pidie Jaya'),
(1180, 3, 'Kabupaten Simeulue'),
(1181, 3, 'Kota Banda Aceh'),
(1182, 3, 'Kota Langsa'),
(1183, 3, 'Kota Lhokseumawe'),
(1184, 3, 'Kota Sabang'),
(1185, 3, 'Kota Subulussalam'),
(1186, 4, 'Kabupaten Asahan'),
(1187, 4, 'Kabupaten Batubara'),
(1188, 4, 'Kabupaten Dairi'),
(1189, 4, 'Kabupaten Deli Serdang'),
(1190, 4, 'Kabupaten Humbang Hasundutan'),
(1191, 4, 'Kabupaten Karo'),
(1192, 4, 'Kabupaten Labuhanbatu'),
(1193, 4, 'Kabupaten Labuhanbatu Selatan'),
(1194, 4, 'Kabupaten Labuhanbatu Utara'),
(1195, 4, 'Kabupaten Langkat'),
(1196, 4, 'Kabupaten Mandailing Natal'),
(1197, 4, 'Kabupaten Nias'),
(1198, 4, 'Kabupaten Nias Barat'),
(1199, 4, 'Kabupaten Nias Selatan'),
(1200, 4, 'Kabupaten Nias Utara'),
(1201, 4, 'Kabupaten Padang Lawas'),
(1202, 4, 'Kabupaten Padang Lawas Utara'),
(1203, 4, 'Kabupaten Pakpak Bharat'),
(1204, 4, 'Kabupaten Samosir'),
(1205, 4, 'Kabupaten Serdang Bedagai'),
(1206, 4, 'Kabupaten Simalungun'),
(1207, 4, 'Kabupaten Tapanuli Selatan'),
(1208, 4, 'Kabupaten Tapanuli Tengah'),
(1209, 4, 'Kabupaten Tapanuli Utara'),
(1210, 4, 'Kabupaten Toba Samosir'),
(1211, 4, 'Kota Binjai'),
(1212, 4, 'Kota Gunungsitoli'),
(1213, 4, 'Kota Medan'),
(1214, 4, 'Kota Padangsidempuan'),
(1215, 4, 'Kota Pematangsiantar'),
(1216, 4, 'Kota Sibolga'),
(1217, 4, 'Kota Tanjungbalai'),
(1218, 4, 'Kota Tebing Tinggi'),
(1219, 5, 'Kabupaten Agam'),
(1220, 5, 'Kabupaten Dharmasraya'),
(1221, 5, 'Kabupaten Kepulauan Mentawai'),
(1222, 5, 'Kabupaten Lima Puluh Kota'),
(1223, 5, 'Kabupaten Padang Pariaman'),
(1224, 5, 'Kabupaten Pasaman'),
(1225, 5, 'Kabupaten Pasaman Barat'),
(1226, 5, 'Kabupaten Pesisir Selatan'),
(1227, 5, 'Kabupaten Sijunjung'),
(1228, 5, 'Kabupaten Solok'),
(1229, 5, 'Kabupaten Solok Selatan'),
(1230, 5, 'Kabupaten Tanah Datar'),
(1231, 5, 'Kota Bukittinggi'),
(1232, 5, 'Kota Padang'),
(1233, 5, 'Kota Padangpanjang'),
(1234, 5, 'Kota Pariaman'),
(1235, 5, 'Kota Payakumbuh'),
(1236, 5, 'Kota Sawahlunto'),
(1237, 5, 'Kota Solok'),
(1238, 6, 'Kabupaten Banyuasin'),
(1239, 6, 'Kabupaten Empat Lawang'),
(1240, 6, 'Kabupaten Lahat'),
(1241, 6, 'Kabupaten Muara Enim'),
(1242, 6, 'Kabupaten Musi Banyuasin'),
(1243, 6, 'Kabupaten Musi Rawas'),
(1244, 6, 'Kabupaten Musi Rawas Utara'),
(1245, 6, 'Kabupaten Ogan Ilir'),
(1246, 6, 'Kabupaten Ogan Komering Ilir'),
(1247, 6, 'Kabupaten Ogan Komering Ulu'),
(1248, 6, 'Kabupaten Ogan Komering Ulu Selatan'),
(1249, 6, 'Kabupaten Ogan Komering Ulu Timur'),
(1250, 6, 'Kabupaten Penukal Abab Lematang Ilir'),
(1251, 6, 'Kota Lubuklinggau'),
(1252, 6, 'Kota Pagar Alam'),
(1253, 6, 'Kota Palembang'),
(1254, 6, 'Kota Prabumulih'),
(1255, 7, 'Kabupaten Bengkalis'),
(1256, 7, 'Kabupaten Indragiri Hilir'),
(1257, 7, 'Kabupaten Indragiri Hulu'),
(1258, 7, 'Kabupaten Kampar'),
(1259, 7, 'Kabupaten Kepulauan Meranti'),
(1260, 7, 'Kabupaten Kuantan Singingi'),
(1261, 7, 'Kabupaten Pelalawan'),
(1262, 7, 'Kabupaten Rokan Hilir'),
(1263, 7, 'Kabupaten Rokan Hulu'),
(1264, 7, 'Kabupaten Siak'),
(1265, 7, 'Kota Dumai'),
(1266, 7, 'Kota Pekanbaru'),
(1267, 8, 'Kabupaten Bintan'),
(1268, 8, 'Kabupaten Karimun'),
(1269, 8, 'Kabupaten Kepulauan Anambas'),
(1270, 8, 'Kabupaten Lingga'),
(1271, 8, 'Kabupaten Natuna'),
(1272, 8, 'Kota Batam'),
(1273, 8, 'Kota Tanjung Pinang'),
(1274, 9, 'Kabupaten Batanghari'),
(1275, 9, 'Kabupaten Bungo'),
(1276, 9, 'Kabupaten Kerinci'),
(1277, 9, 'Kabupaten Merangin'),
(1278, 9, 'Kabupaten Muaro Jambi'),
(1279, 9, 'Kabupaten Sarolangun'),
(1280, 9, 'Kabupaten Tanjung Jabung Barat'),
(1281, 9, 'Kabupaten Tanjung Jabung Timur'),
(1282, 9, 'Kabupaten Tebo'),
(1283, 9, 'Kota Jambi'),
(1284, 9, 'Kota Sungai Penuh'),
(1285, 10, 'Kabupaten Bengkulu Selatan'),
(1286, 10, 'Kabupaten Bengkulu Tengah'),
(1287, 10, 'Kabupaten Bengkulu Utara'),
(1288, 10, 'Kabupaten Kaur'),
(1289, 10, 'Kabupaten Kepahiang'),
(1290, 10, 'Kabupaten Lebong'),
(1291, 10, 'Kabupaten Mukomuko'),
(1292, 10, 'Kabupaten Rejang Lebong'),
(1293, 10, 'Kabupaten Seluma'),
(1294, 10, 'Kota Bengkulu'),
(1295, 11, 'Kabupaten Bangka'),
(1296, 11, 'Kabupaten Bangka Barat'),
(1297, 11, 'Kabupaten Bangka Selatan'),
(1298, 11, 'Kabupaten Bangka Tengah'),
(1299, 11, 'Kabupaten Belitung'),
(1300, 11, 'Kabupaten Belitung Timur'),
(1301, 11, 'Kota Pangkal Pinang'),
(1302, 12, 'Kabupaten Lampung Tengah'),
(1303, 12, 'Kabupaten Lampung Utara'),
(1304, 12, 'Kabupaten Lampung Selatan'),
(1305, 12, 'Kabupaten Lampung Barat'),
(1306, 12, 'Kabupaten Lampung Timur'),
(1307, 12, 'Kabupaten Mesuji'),
(1308, 12, 'Kabupaten Pesawaran'),
(1309, 12, 'Kabupaten Pesisir Barat'),
(1310, 12, 'Kabupaten Pringsewu'),
(1311, 12, 'Kabupaten Tulang Bawang'),
(1312, 12, 'Kabupaten Tulang Bawang Barat'),
(1313, 12, 'Kabupaten Tanggamus'),
(1314, 12, 'Kabupaten Way Kanan'),
(1315, 12, 'Kota Bandar Lampung'),
(1316, 12, 'Kota Metro'),
(1317, 13, 'Kabupaten Lebak'),
(1318, 13, 'Kabupaten Pandeglang'),
(1319, 13, 'Kabupaten Serang'),
(1320, 13, 'Kabupaten Tangerang'),
(1321, 13, 'Kota Cilegon'),
(1322, 13, 'Kota Serang'),
(1323, 13, 'Kota Tangerang'),
(1324, 13, 'Kota Tangerang Selatan'),
(1325, 14, 'Kabupaten Bandung'),
(1326, 14, 'Kabupaten Bandung Barat'),
(1327, 14, 'Kabupaten Bekasi'),
(1328, 14, 'Kabupaten Bogor'),
(1329, 14, 'Kabupaten Ciamis'),
(1330, 14, 'Kabupaten Cianjur'),
(1331, 14, 'Kabupaten Cirebon'),
(1332, 14, 'Kabupaten Garut'),
(1333, 14, 'Kabupaten Indramayu'),
(1334, 14, 'Kabupaten Karawang'),
(1335, 14, 'Kabupaten Kuningan'),
(1336, 14, 'Kabupaten Majalengka'),
(1337, 14, 'Kabupaten Pangandaran'),
(1338, 14, 'Kabupaten Purwakarta'),
(1339, 14, 'Kabupaten Subang'),
(1340, 14, 'Kabupaten Sukabumi'),
(1341, 14, 'Kabupaten Sumedang'),
(1342, 14, 'Kabupaten Tasikmalaya'),
(1343, 14, 'Kota Bandung'),
(1344, 14, 'Kota Banjar'),
(1345, 14, 'Kota Bekasi'),
(1346, 14, 'Kota Bogor'),
(1347, 14, 'Kota Cimahi'),
(1348, 14, 'Kota Cirebon'),
(1349, 14, 'Kota Depok'),
(1350, 14, 'Kota Sukabumi'),
(1351, 14, 'Kota Tasikmalaya'),
(1352, 15, 'Kabupaten Banjarnegara'),
(1353, 15, 'Kabupaten Banyumas'),
(1354, 15, 'Kabupaten Batang'),
(1355, 15, 'Kabupaten Blora'),
(1356, 15, 'Kabupaten Boyolali'),
(1357, 15, 'Kabupaten Brebes'),
(1358, 15, 'Kabupaten Cilacap'),
(1359, 15, 'Kabupaten Demak'),
(1360, 15, 'Kabupaten Grobogan'),
(1361, 15, 'Kabupaten Jepara'),
(1362, 15, 'Kabupaten Karanganyar'),
(1363, 15, 'Kabupaten Kebumen'),
(1364, 15, 'Kabupaten Kendal'),
(1365, 15, 'Kabupaten Klaten'),
(1366, 15, 'Kabupaten Kudus'),
(1367, 15, 'Kabupaten Magelang'),
(1368, 15, 'Kabupaten Pati'),
(1369, 15, 'Kabupaten Pekalongan'),
(1370, 15, 'Kabupaten Pemalang'),
(1371, 15, 'Kabupaten Purbalingga'),
(1372, 15, 'Kabupaten Purworejo'),
(1373, 15, 'Kabupaten Rembang'),
(1374, 15, 'Kabupaten Semarang'),
(1375, 15, 'Kabupaten Sragen'),
(1376, 15, 'Kabupaten Sukoharjo'),
(1377, 15, 'Kabupaten Tegal'),
(1378, 15, 'Kabupaten Temanggung'),
(1379, 15, 'Kabupaten Wonogiri'),
(1380, 15, 'Kabupaten Wonosobo'),
(1381, 15, 'Kota Magelang'),
(1382, 15, 'Kota Pekalongan'),
(1383, 15, 'Kota Salatiga'),
(1384, 15, 'Kota Semarang'),
(1385, 15, 'Kota Surakarta'),
(1386, 15, 'Kota Tegal'),
(1387, 16, 'Kabupaten Bangkalan'),
(1388, 16, 'Kabupaten Banyuwangi'),
(1389, 16, 'Kabupaten Blitar'),
(1390, 16, 'Kabupaten Bojonegoro'),
(1391, 16, 'Kabupaten Bondowoso'),
(1392, 16, 'Kabupaten Gresik'),
(1393, 16, 'Kabupaten Jember'),
(1394, 16, 'Kabupaten Jombang'),
(1395, 16, 'Kabupaten Kediri'),
(1396, 16, 'Kabupaten Lamongan'),
(1397, 16, 'Kabupaten Lumajang'),
(1398, 16, 'Kabupaten Madiun'),
(1399, 16, 'Kabupaten Magetan'),
(1400, 16, 'Kabupaten Malang'),
(1401, 16, 'Kabupaten Mojokerto'),
(1402, 16, 'Kabupaten Nganjuk'),
(1403, 16, 'Kabupaten Ngawi'),
(1404, 16, 'Kabupaten Pacitan'),
(1405, 16, 'Kabupaten Pamekasan'),
(1406, 16, 'Kabupaten Pasuruan'),
(1407, 16, 'Kabupaten Ponorogo'),
(1408, 16, 'Kabupaten Probolinggo'),
(1409, 16, 'Kabupaten Sampang'),
(1410, 16, 'Kabupaten Sidoarjo'),
(1411, 16, 'Kabupaten Situbondo'),
(1412, 16, 'Kabupaten Sumenep'),
(1413, 16, 'Kabupaten Trenggalek'),
(1414, 16, 'Kabupaten Tuban'),
(1415, 16, 'Kabupaten Tulungagung'),
(1416, 16, 'Kota Batu'),
(1417, 16, 'Kota Blitar'),
(1418, 16, 'Kota Kediri'),
(1419, 16, 'Kota Madiun'),
(1420, 16, 'Kota Malang'),
(1421, 16, 'Kota Mojokerto'),
(1422, 16, 'Kota Pasuruan'),
(1423, 16, 'Kota Probolinggo'),
(1424, 16, 'Kota Surabaya'),
(1425, 17, 'Kota Administrasi Jakarta Barat'),
(1426, 17, 'Kota Administrasi Jakarta Pusat'),
(1427, 17, 'Kota Administrasi Jakarta Selatan'),
(1428, 17, 'Kota Administrasi Jakarta Timur'),
(1429, 17, 'Kota Administrasi Jakarta Utara'),
(1430, 17, 'Kabupaten Administrasi Kepulauan Seribu'),
(1431, 18, 'Kabupaten Bantul'),
(1432, 18, 'Kabupaten Gunungkidul'),
(1433, 18, 'Kabupaten Kulon Progo'),
(1434, 18, 'Kabupaten Sleman'),
(1435, 18, 'Kota Yogyakarta'),
(1436, 19, 'Kabupaten Badung'),
(1437, 19, 'Kabupaten Bangli'),
(1438, 19, 'Kabupaten Buleleng'),
(1439, 19, 'Kabupaten Gianyar'),
(1440, 19, 'Kabupaten Jembrana'),
(1441, 19, 'Kabupaten Karangasem'),
(1442, 19, 'Kabupaten Klungkung'),
(1443, 19, 'Kabupaten Tabanan'),
(1444, 19, 'Kota Denpasar'),
(1445, 20, 'Kabupaten Bima'),
(1446, 20, 'Kabupaten Dompu'),
(1447, 20, 'Kabupaten Lombok Barat'),
(1448, 20, 'Kabupaten Lombok Tengah'),
(1449, 20, 'Kabupaten Lombok Timur'),
(1450, 20, 'Kabupaten Lombok Utara'),
(1451, 20, 'Kabupaten Sumbawa'),
(1452, 20, 'Kabupaten Sumbawa Barat'),
(1453, 20, 'Kota Bima'),
(1454, 20, 'Kota Mataram'),
(1455, 21, 'Kabupaten Alor'),
(1456, 21, 'Kabupaten Belu'),
(1457, 21, 'Kabupaten Ende'),
(1458, 21, 'Kabupaten Flores Timur'),
(1459, 21, 'Kabupaten Kupang'),
(1460, 21, 'Kabupaten Lembata'),
(1461, 21, 'Kabupaten Malaka'),
(1462, 21, 'Kabupaten Manggarai'),
(1463, 21, 'Kabupaten Manggarai Barat'),
(1464, 21, 'Kabupaten Manggarai Timur'),
(1465, 21, 'Kabupaten Ngada'),
(1466, 21, 'Kabupaten Nagekeo'),
(1467, 21, 'Kabupaten Rote Ndao'),
(1468, 21, 'Kabupaten Sabu Raijua'),
(1469, 21, 'Kabupaten Sikka'),
(1470, 21, 'Kabupaten Sumba Barat'),
(1471, 21, 'Kabupaten Sumba Barat Daya'),
(1472, 21, 'Kabupaten Sumba Tengah'),
(1473, 21, 'Kabupaten Sumba Timur'),
(1474, 21, 'Kabupaten Timor Tengah Selatan'),
(1475, 21, 'Kabupaten Timor Tengah Utara'),
(1476, 21, 'Kota Kupang'),
(1477, 22, 'Kabupaten Bengkayang'),
(1478, 22, 'Kabupaten Kapuas Hulu'),
(1479, 22, 'Kabupaten Kayong Utara'),
(1480, 22, 'Kabupaten Ketapang'),
(1481, 22, 'Kabupaten Kubu Raya'),
(1482, 22, 'Kabupaten Landak'),
(1483, 22, 'Kabupaten Melawi'),
(1484, 22, 'Kabupaten Mempawah'),
(1485, 22, 'Kabupaten Sambas'),
(1486, 22, 'Kabupaten Sanggau'),
(1487, 22, 'Kabupaten Sekadau'),
(1488, 22, 'Kabupaten Sintang'),
(1489, 22, 'Kota Pontianak'),
(1490, 22, 'Kota Singkawang'),
(1491, 23, 'Kabupaten Balangan'),
(1492, 23, 'Kabupaten Banjar'),
(1493, 23, 'Kabupaten Barito Kuala'),
(1494, 23, 'Kabupaten Hulu Sungai Selatan'),
(1495, 23, 'Kabupaten Hulu Sungai Tengah'),
(1496, 23, 'Kabupaten Hulu Sungai Utara'),
(1497, 23, 'Kabupaten Kotabaru'),
(1498, 23, 'Kabupaten Tabalong'),
(1499, 23, 'Kabupaten Tanah Bumbu'),
(1500, 23, 'Kabupaten Tanah Laut'),
(1501, 23, 'Kabupaten Tapin'),
(1502, 23, 'Kota Banjarbaru'),
(1503, 23, 'Kota Banjarmasin'),
(1504, 24, 'Kabupaten Barito Selatan'),
(1505, 24, 'Kabupaten Barito Timur'),
(1506, 24, 'Kabupaten Barito Utara'),
(1507, 24, 'Kabupaten Gunung Mas'),
(1508, 24, 'Kabupaten Kapuas'),
(1509, 24, 'Kabupaten Katingan'),
(1510, 24, 'Kabupaten Kotawaringin Barat'),
(1511, 24, 'Kabupaten Kotawaringin Timur'),
(1512, 24, 'Kabupaten Lamandau'),
(1513, 24, 'Kabupaten Murung Raya'),
(1514, 24, 'Kabupaten Pulang Pisau'),
(1515, 24, 'Kabupaten Sukamara'),
(1516, 24, 'Kabupaten Seruyan'),
(1517, 24, 'Kota Palangka Raya'),
(1518, 25, 'Kabupaten Berau'),
(1519, 25, 'Kabupaten Kutai Barat'),
(1520, 25, 'Kabupaten Kutai Kartanegara'),
(1521, 25, 'Kabupaten Kutai Timur'),
(1522, 25, 'Kabupaten Mahakam Ulu'),
(1523, 25, 'Kabupaten Paser'),
(1524, 25, 'Kabupaten Penajam Paser Utara'),
(1525, 25, 'Kota Balikpapan'),
(1526, 25, 'Kota Bontang'),
(1527, 25, 'Kota Samarinda'),
(1528, 26, 'Kabupaten Bulungan'),
(1529, 26, 'Kabupaten Malinau'),
(1530, 26, 'Kabupaten Nunukan'),
(1531, 26, 'Kabupaten Tana Tidung'),
(1532, 26, 'Kota Tarakan'),
(1533, 27, 'Kabupaten Boalemo'),
(1534, 27, 'Kabupaten Bone Bolango'),
(1535, 27, 'Kabupaten Gorontalo'),
(1536, 27, 'Kabupaten Gorontalo Utara'),
(1537, 27, 'Kabupaten Pohuwato'),
(1538, 27, 'Kota Gorontalo'),
(1539, 28, 'Kabupaten Bantaeng'),
(1540, 28, 'Kabupaten Barru'),
(1541, 28, 'Kabupaten Bone'),
(1542, 28, 'Kabupaten Bulukumba'),
(1543, 28, 'Kabupaten Enrekang'),
(1544, 28, 'Kabupaten Gowa'),
(1545, 28, 'Kabupaten Jeneponto'),
(1546, 28, 'Kabupaten Kepulauan Selayar'),
(1547, 28, 'Kabupaten Luwu'),
(1548, 28, 'Kabupaten Luwu Timur'),
(1549, 28, 'Kabupaten Luwu Utara'),
(1550, 28, 'Kabupaten Maros'),
(1551, 28, 'Kabupaten Pangkajene dan Kepulauan'),
(1552, 28, 'Kabupaten Pinrang'),
(1553, 28, 'Kabupaten Sidenreng Rappang'),
(1554, 28, 'Kabupaten Sinjai'),
(1555, 28, 'Kabupaten Soppeng'),
(1556, 28, 'Kabupaten Takalar'),
(1557, 28, 'Kabupaten Tana Toraja'),
(1558, 28, 'Kabupaten Toraja Utara'),
(1559, 28, 'Kabupaten Wajo'),
(1560, 28, 'Kota Makassar'),
(1561, 28, 'Kota Palopo'),
(1562, 28, 'Kota Parepare'),
(1563, 29, 'Kabupaten Bombana'),
(1564, 29, 'Kabupaten Buton'),
(1565, 29, 'Kabupaten Buton Selatan'),
(1566, 29, 'Kabupaten Buton Tengah'),
(1567, 29, 'Kabupaten Buton Utara'),
(1568, 29, 'Kabupaten Kolaka'),
(1569, 29, 'Kabupaten Kolaka Timur'),
(1570, 29, 'Kabupaten Kolaka Utara'),
(1571, 29, 'Kabupaten Konawe'),
(1572, 29, 'Kabupaten Konawe Kepulauan'),
(1573, 29, 'Kabupaten Konawe Selatan'),
(1574, 29, 'Kabupaten Konawe Utara'),
(1575, 29, 'Kabupaten Muna'),
(1576, 29, 'Kabupaten Muna Barat'),
(1577, 29, 'Kabupaten Wakatobi'),
(1578, 29, 'Kota Bau-Bau'),
(1579, 29, 'Kota Kendari'),
(1580, 30, 'Kabupaten Banggai'),
(1581, 30, 'Kabupaten Banggai Kepulauan'),
(1582, 30, 'Kabupaten Banggai Laut'),
(1583, 30, 'Kabupaten Buol'),
(1584, 30, 'Kabupaten Donggala'),
(1585, 30, 'Kabupaten Morowali'),
(1586, 30, 'Kabupaten Morowali Utara'),
(1587, 30, 'Kabupaten Parigi Moutong'),
(1588, 30, 'Kabupaten Poso'),
(1589, 30, 'Kabupaten Sigi'),
(1590, 30, 'Kabupaten Tojo Una-Una'),
(1591, 30, 'Kabupaten Toli-Toli'),
(1592, 30, 'Kota Palu'),
(1593, 31, 'Kabupaten Bolaang Mongondow'),
(1594, 31, 'Kabupaten Bolaang Mongondow Selatan'),
(1595, 31, 'Kabupaten Bolaang Mongondow Timur'),
(1596, 31, 'Kabupaten Bolaang Mongondow Utara'),
(1597, 31, 'Kabupaten Kepulauan Sangihe'),
(1598, 31, 'Kabupaten Kepulauan Siau Tagulandang Biaro'),
(1599, 31, 'Kabupaten Kepulauan Talaud'),
(1600, 31, 'Kabupaten Minahasa'),
(1601, 31, 'Kabupaten Minahasa Selatan'),
(1602, 31, 'Kabupaten Minahasa Tenggara'),
(1603, 31, 'Kabupaten Minahasa Utara'),
(1604, 31, 'Kota Bitung'),
(1605, 31, 'Kota Kotamobagu'),
(1606, 31, 'Kota Manado'),
(1607, 31, 'Kota Tomohon'),
(1608, 32, 'Kabupaten Majene'),
(1609, 32, 'Kabupaten Mamasa'),
(1610, 32, 'Kabupaten Mamuju'),
(1611, 32, 'Kabupaten Mamuju Tengah'),
(1612, 32, 'Kabupaten Mamuju Utara'),
(1613, 32, 'Kabupaten Polewali Mandar'),
(1614, 32, 'Kota Mamuju'),
(1615, 33, 'Kabupaten Buru'),
(1616, 33, 'Kabupaten Buru Selatan'),
(1617, 33, 'Kabupaten Kepulauan Aru'),
(1618, 33, 'Kabupaten Maluku Barat Daya'),
(1619, 33, 'Kabupaten Maluku Tengah'),
(1620, 33, 'Kabupaten Maluku Tenggara'),
(1621, 33, 'Kabupaten Maluku Tenggara Barat'),
(1622, 33, 'Kabupaten Seram Bagian Barat'),
(1623, 33, 'Kabupaten Seram Bagian Timur'),
(1624, 33, 'Kota Ambon'),
(1625, 33, 'Kota Tual'),
(1626, 34, 'Kabupaten Halmahera Barat'),
(1627, 34, 'Kabupaten Halmahera Tengah'),
(1628, 34, 'Kabupaten Halmahera Utara'),
(1629, 34, 'Kabupaten Halmahera Selatan'),
(1630, 34, 'Kabupaten Kepulauan Sula'),
(1631, 34, 'Kabupaten Halmahera Timur'),
(1632, 34, 'Kabupaten Pulau Morotai'),
(1633, 34, 'Kabupaten Pulau Taliabu'),
(1634, 34, 'Kota Ternate'),
(1635, 34, 'Kota Tidore Kepulauan'),
(1636, 35, 'Kabupaten Asmat'),
(1637, 35, 'Kabupaten Biak Numfor'),
(1638, 35, 'Kabupaten Boven Digoel'),
(1639, 35, 'Kabupaten Deiyai'),
(1640, 35, 'Kabupaten Dogiyai'),
(1641, 35, 'Kabupaten Intan Jaya'),
(1642, 35, 'Kabupaten Jayapura'),
(1643, 35, 'Kabupaten Jayawijaya'),
(1644, 35, 'Kabupaten Keerom'),
(1645, 35, 'Kabupaten Kepulauan Yapen'),
(1646, 35, 'Kabupaten Lanny Jaya'),
(1647, 35, 'Kabupaten Mamberamo Raya'),
(1648, 35, 'Kabupaten Mamberamo Tengah'),
(1649, 35, 'Kabupaten Mappi'),
(1650, 35, 'Kabupaten Merauke'),
(1651, 35, 'Kabupaten Mimika'),
(1652, 35, 'Kabupaten Nabire'),
(1653, 35, 'Kabupaten Nduga'),
(1654, 35, 'Kabupaten Paniai'),
(1655, 35, 'Kabupaten Pegunungan Bintang'),
(1656, 35, 'Kabupaten Puncak'),
(1657, 35, 'Kabupaten Puncak Jaya'),
(1658, 35, 'Kabupaten Sarmi'),
(1659, 35, 'Kabupaten Supiori'),
(1660, 35, 'Kabupaten Tolikara'),
(1661, 35, 'Kabupaten Waropen'),
(1662, 35, 'Kabupaten Yahukimo'),
(1663, 35, 'Kabupaten Yalimo'),
(1664, 35, 'Kota Jayapura'),
(1665, 36, 'Kabupaten Fakfak'),
(1666, 36, 'Kabupaten Kaimana'),
(1667, 36, 'Kabupaten Manokwari'),
(1668, 36, 'Kabupaten Manokwari Selatan'),
(1669, 36, 'Kabupaten Maybrat'),
(1670, 36, 'Kabupaten Pegunungan Arfak'),
(1671, 36, 'Kabupaten Raja Ampat'),
(1672, 36, 'Kabupaten Sorong'),
(1673, 36, 'Kabupaten Sorong Selatan'),
(1674, 36, 'Kabupaten Tambrauw'),
(1675, 36, 'Kabupaten Teluk Bintuni'),
(1676, 36, 'Kabupaten Teluk Wondama');

-- --------------------------------------------------------

--
-- Table structure for table `tb_khs`
--

CREATE TABLE `tb_khs` (
  `Nim` varchar(45) NOT NULL,
  `Semester` varchar(45) NOT NULL,
  `Ip` varchar(45) DEFAULT NULL,
  `Ip_Kumulatif` varchar(45) DEFAULT NULL,
  `File_KHS` varchar(45) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Jml_SKS_Kumulatif` varchar(45) DEFAULT NULL,
  `Jml_SKS_Semester` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_khs`
--

INSERT INTO `tb_khs` (`Nim`, `Semester`, `Ip`, `Ip_Kumulatif`, `File_KHS`, `Status`, `Jml_SKS_Kumulatif`, `Jml_SKS_Semester`) VALUES
('24060118150120', '9', '3.8', '3.75', NULL, 'Cuti', '144', '0'),
('24060119150131', '7', '3.71', '3.57', NULL, 'Aktif', '118', '18'),
('24060120150116', '5', '3.57', '3.71', NULL, 'Aktif', '90', '21'),
('24060120150120', '5', '3.57', '3.71', NULL, 'Cuti', '90', '18'),
('24060120150169', '5', '3.57', '3.87', NULL, 'Aktif', '90', '18'),
('24060121150144', '3', '3.87', '3.71', NULL, 'Aktif', '48', '18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `ID` int(255) NOT NULL,
  `Kode_Matkul` varchar(45) NOT NULL,
  `Nama_Matkul` varchar(50) NOT NULL,
  `SKS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`ID`, `Kode_Matkul`, `Nama_Matkul`, `SKS`) VALUES
(1, 'IF0000', 'Dasar Pemrograman', 3),
(2, 'IF0001', 'Pengembangan Perangkat Lunak', 4),
(3, 'IF0002', 'Proyek Perangkat Lunak', 3),
(4, 'IF0003', 'Sistem Informasi', 3),
(5, 'IF0004', 'Komputasi Tersebar dan Paralel', 3),
(6, 'IF0005', 'Pembelajaran Mesin', 3),
(7, 'IF0006', 'Organisasi dan Arsitektur Komputer', 3),
(8, 'IF0007', 'Algoritma dan Pemrograman', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `Nim` varchar(45) NOT NULL,
  `Nama` varchar(45) DEFAULT NULL,
  `Status` varchar(255) DEFAULT '1',
  `Angkatan` varchar(45) DEFAULT NULL,
  `Semester` varchar(255) NOT NULL,
  `tempatLahir` varchar(45) DEFAULT NULL,
  `tglLahir` date DEFAULT NULL,
  `NIK` varchar(45) DEFAULT NULL,
  `No_HP` varchar(45) DEFAULT NULL,
  `Email_SSO` varchar(45) DEFAULT NULL,
  `Email_Pribadi` varchar(45) DEFAULT NULL,
  `Alamat` text DEFAULT NULL,
  `Kode_Kabupaten` varchar(45) DEFAULT NULL,
  `Kode_Wali` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`Nim`, `Nama`, `Status`, `Angkatan`, `Semester`, `tempatLahir`, `tglLahir`, `NIK`, `No_HP`, `Email_SSO`, `Email_Pribadi`, `Alamat`, `Kode_Kabupaten`, `Kode_Wali`) VALUES
('24060118150120', 'Farrel Haris R', 'Cuti', '2018', '9', 'New York', '2002-06-02', '32712345678911213', '082234567892', 'paller@students.undip.ac.id', 'paller@gmail.com', 'Jalan Singa Utara 1', '1384', '0001'),
('24060119150131', 'Rizal Khoirul Farid', 'Aktif', '2019', '7', 'Demak', '2001-10-10', '3271234567896666', '082289745632', 'rizalkhf@students.undip.ac.id', 'rizalkhf@students.undip.ac.id', 'Jalan Teratai 5', '1361', '0002'),
('24060120150116', 'MK Arif', 'Aktif', '2020', '5', 'Rembang', '2002-10-29', '33170796560020002', '082264524881', 'mkma002@students.undip.ac.id', 'mkma002@gmail.com', 'Jalan Melati 4', '1374', '0003'),
('24060120150120', 'Lerraf ARP', 'Cuti', '2020', '5', 'Depox', '2002-06-02', '32712345678911213', '082289749595', 'lerraff@students.undip.ac.id', 'lerraff@gmail.com', 'Jalan Lobak 21', '1349', '0002'),
('24060120150169', 'Bayan Ardiyatama', 'Aktif', '2020', '5', 'Semarang', '2001-12-27', '32712345678996352', '082289746563', 'bayana@students.undip.ac.id', 'bayana@gmail.com', 'Jalan Panda Selatan 45', '1384', '0001'),
('24060121150144', 'Iday Haris R', 'Aktif', '2021', '3', 'Jepang', '2002-04-20', '331707965600232613', '082289747415', 'idayhr@students.undip.ac.id', 'idayhr@gmail.com', 'Jalan Badak 45', '1361', '0003');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `ID` int(255) NOT NULL,
  `Nim` varchar(45) NOT NULL,
  `Semester` int(255) NOT NULL,
  `Kode_Matkul` varchar(45) NOT NULL,
  `Kelas` varchar(45) NOT NULL,
  `Nilai` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`ID`, `Nim`, `Semester`, `Kode_Matkul`, `Kelas`, `Nilai`) VALUES
(1, '24060118150120', 9, 'IF0001', 'B', 'A'),
(2, '24060118150120', 9, 'IF0002', 'B', 'B'),
(3, '24060119150131', 7, 'IF0001', 'C', 'A'),
(4, '24060120150116', 5, 'IF0004', 'B', 'B'),
(5, '24060120150116', 5, 'IF0004', 'B', 'B'),
(6, '24060120150120', 5, 'IF0001', 'B', 'B'),
(7, '24060120150120', 5, 'IF0002', 'B', 'A'),
(8, '24060120150169', 5, 'IF0004', 'A', 'B'),
(9, '24060121150144', 3, 'IF0007', 'A', 'B'),
(10, '24060121150144', 3, 'IF0006', 'A', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pkl`
--

CREATE TABLE `tb_pkl` (
  `Nim` varchar(45) NOT NULL,
  `Semester` varchar(45) DEFAULT NULL,
  `Tempat` varchar(45) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `File_PKL` varchar(45) DEFAULT NULL,
  `Kode_Pemb_P` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pkl`
--

INSERT INTO `tb_pkl` (`Nim`, `Semester`, `Tempat`, `Status`, `File_PKL`, `Kode_Pemb_P`) VALUES
('24060118150120', '9', 'Indihome', 'Sudah Ambil', NULL, '0001'),
('24060119150131', '7', 'Bukalapak', 'Sedang Mengambil', NULL, '0001'),
('24060120150116', '5', 'Tokopedia', 'Sedang Mengambil', NULL, '0001'),
('24060120150120', '5', 'AkuLaku', 'Belum Mengambil', NULL, NULL),
('24060120150169', '5', 'Gojek', 'Sedang Mengambil', NULL, '0002'),
('24060121150144', '3', 'Jenius', 'Belum Ambil', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `Kode_Provinsi` int(11) NOT NULL,
  `Nama_Provinsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`Kode_Provinsi`, `Nama_Provinsi`) VALUES
(2, 'NAD Aceh '),
(3, 'NAD Aceh '),
(4, 'Sumatera Utara (SUMUT)'),
(5, 'Sumatera Barat (SUMBAR)'),
(6, 'Sumatera Selatan (SUMSEL)'),
(7, 'Riau'),
(8, 'Kepulauan Riau (KEPRI)'),
(9, 'Jambi'),
(10, 'Bengkulu'),
(11, 'Bangka Belitung (BABEL)'),
(12, 'Lampung'),
(13, 'Banten'),
(14, 'Jawa Barat (JABAR)'),
(15, 'Jawa Tengah (JATENG)'),
(16, 'Jawa Timur (JATIM)'),
(17, 'DKI Jakarta'),
(18, 'Daerah Istimewa Yogyakarta'),
(19, 'Bali'),
(20, 'Nusa Tenggara Barat (NTB)'),
(21, 'Nusa Tenggara Timur (NTT)'),
(22, 'Kalimantan Barat (KALBAR)'),
(23, 'Kalimantan Selatan (KALSEL)'),
(24, 'Kalimantan Tengah (KALTENG)'),
(25, 'Kalimantan Timur (KALTIM)'),
(26, 'Kalimantan Utara (KALTARA)'),
(27, 'Gorontalo'),
(28, 'Sulawesi Selatan (SULSEL)'),
(29, 'Sulawesi Tenggara (SULTRA)'),
(30, 'Sulawesi Tengah (SULTENG)'),
(31, 'Sulawesi Utara (SULUT)'),
(32, 'Sulawesi Barat (SULBAR)'),
(33, 'Maluku'),
(34, 'Maluku Utara'),
(35, 'Papua'),
(36, 'Papua Barat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_skripsi`
--

CREATE TABLE `tb_skripsi` (
  `Nim` varchar(45) NOT NULL,
  `Semester` varchar(45) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Kode_Pemb_S` varchar(45) DEFAULT NULL,
  `Tgl_Lulus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_skripsi`
--

INSERT INTO `tb_skripsi` (`Nim`, `Semester`, `Status`, `Kode_Pemb_S`, `Tgl_Lulus`) VALUES
('24060118150120', '9', 'Sudah Ambil', '0001', '26 Oktober 2022'),
('24060119150131', '7', 'Sedang Mengambil', '0002', NULL),
('24060120150116', '5', 'Belum Ambil', NULL, NULL),
('24060120150120', '5', 'Belum Ambil', NULL, NULL),
('24060120150169', '5', 'Belum Ambil', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `Nim_Nip` varchar(45) NOT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`Nim_Nip`, `Username`, `Password`, `Role`) VALUES
('0000000000000001', 'doswal', 'doswal', '2'),
('0000000000000002', 'doswal2', 'doswal2', '2'),
('0000000000000003', 'dept', 'dept', '4'),
('0000000000000069', 'op', 'op', '3'),
('24060118150120', 'mhs1', 'mhs1', '1'),
('24060119150131', 'mhs', 'mhs', '1'),
('24060120150116', 'mhs2', 'mhs2', '1'),
('24060120150120', 'mhs3', 'mhs3', '1'),
('24060120150169', 'mhs4', 'mhs4', '1'),
('24060121150144', 'mhs5', 'mhs5', '1'),
('69696969', 'paleer', '123456', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`Nip`);

--
-- Indexes for table `tb_irs`
--
ALTER TABLE `tb_irs`
  ADD PRIMARY KEY (`Nim`,`Semester`);

--
-- Indexes for table `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  ADD PRIMARY KEY (`Kode_Kabupaten`),
  ADD KEY `id_provinsi` (`Kode_Provinsi`);

--
-- Indexes for table `tb_khs`
--
ALTER TABLE `tb_khs`
  ADD PRIMARY KEY (`Nim`,`Semester`);

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`Nim`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_pkl`
--
ALTER TABLE `tb_pkl`
  ADD PRIMARY KEY (`Nim`);

--
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`Kode_Provinsi`);

--
-- Indexes for table `tb_skripsi`
--
ALTER TABLE `tb_skripsi`
  ADD PRIMARY KEY (`Nim`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`Nim_Nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  MODIFY `Kode_Kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1677;

--
-- AUTO_INCREMENT for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  MODIFY `Kode_Provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_irs`
--
ALTER TABLE `tb_irs`
  ADD CONSTRAINT `FK_NIM_IRS` FOREIGN KEY (`Nim`) REFERENCES `tb_mhs` (`Nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
