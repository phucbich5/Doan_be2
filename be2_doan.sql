-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 11, 2019 lúc 01:30 PM
-- Phiên bản máy phục vụ: 5.7.26
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `be2_doan`
--
CREATE DATABASE IF NOT EXISTS `be2_doan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `be2_doan`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `parent_id`) VALUES
(1, 'Piano', 0),
(2, 'Đàn Guitar', 0),
(3, 'Sáo', 0),
(4, 'Sáo Trúc', 3),
(5, 'Yamaha', 1),
(6, 'Kawai', 1),
(7, 'aucoutic', 2),
(8, 'Guitar cũ', 2),
(9, 'Sáo Dài', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_product`
--

DROP TABLE IF EXISTS `category_product`;
CREATE TABLE IF NOT EXISTS `category_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_product`
--

INSERT INTO `category_product` (`product_id`, `category_id`) VALUES
(1, 1),
(1, 6),
(2, 1),
(2, 5),
(3, 1),
(3, 6),
(4, 1),
(4, 6),
(5, 1),
(5, 6),
(6, 1),
(7, 1),
(7, 5),
(8, 1),
(8, 5),
(9, 2),
(10, 2),
(10, 7),
(11, 2),
(11, 7),
(12, 2),
(12, 7),
(13, 2),
(14, 2),
(15, 3),
(16, 3),
(17, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `created_at`, `updated_at`, `comment_content`, `product_id`) VALUES
(1, NULL, NULL, 'a', 1),
(2, NULL, NULL, 'b', 2),
(3, '2019-11-23 01:49:22', '2019-11-23 01:49:22', 'dr gjhjte', 2),
(4, '2019-11-27 10:47:18', '2019-11-27 10:47:18', 'nguyen phuc bich dz', 5),
(5, '2019-11-28 16:46:04', '2019-11-28 16:46:04', 'l', 1),
(6, '2019-11-28 21:44:28', '2019-11-28 21:44:28', 'dan dep qua', 3),
(7, '2019-11-29 11:43:07', '2019-11-29 11:43:07', 'rất tốt', 3),
(8, '2019-12-04 06:50:08', '2019-12-04 06:50:08', 'san pha rat  tot', 2),
(9, '2019-12-10 20:52:22', '2019-12-10 20:52:22', 'nguyen phuc bich', 5),
(10, '2019-12-10 23:32:06', '2019-12-10 23:32:06', 'fgncv', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_image`, `product_price`) VALUES
(1, 'Đàn Piano Kawai GS50', 'Đàn piano Kawai GS50_ Đây là cây đàn piano cũ có chất lượng âm thanh tốt, thiết kế sang trọng dạng grand piano. Đàn thích hợp giải trí tại nhà.', 'dan-piano-kawai-gs50.jpg', '135000000'),
(2, 'Đàn Piano Yamaha UX', 'Đàn Piano Yamaha UX có thiết kế khá sang trọng, khung đàn hình chữ X, âm thanh mang lại trong và sáng, thích hợp cho việc học và biểu diễn của bạn. Mua đàn piano Yamaha UX giá sốc ngày hôm nay (29/05/2019) 67.700.000 vnd >> 59.900.000 vnd', 'dan-piano-yamaha-ux-cu-01.jpg', '59900000'),
(3, 'Đàn piano Kawai KS1F', 'Đàn piano Kawai KS1F cũ với chất lượng tốt của Nhật Bản thích hợp cho những ai mới bắt đầu học đàn piano sở hữu cây đàn piano cơ để học tập cách tốt nhất, giá thành rẻ cạnh tranh.', 'dan-piano-kawai-ks1f.jpg', '11500000'),
(4, 'Đàn Piano Kawai BL31', 'Đàn piano cũ secondhand kawai bl31 là dòng sản phẩm đàn piano phù hợp cho học tập và giải trí, với mức giá rẻ cạnh tranh cho những ai mới học đàn piano.', 'dan-piano-secondhand-kawai-bl31.jpg', '34500000'),
(5, 'Đàn Piano Kawai BL51', 'Bán Đàn piano cũ kawai bl51 nhập trực tiếp từ Nhật Bản, đàn còn mới 80%, âm thanh dày, màu sắc đẹp, giá thành rẻ tại TPHCM.', 'dan-piano-kawai-bl51-cu-01.jpg', '36500000'),
(6, 'Đàn piano Yamaha U1A', 'Bán đàn piano Yamaha U1A Nhật Bản, giá rẻ tại TPHCM. Đàn yamaha U1A là dòng đàn phù hợp cho việc học tập và giải trí của trẻ em, người mới học nhạc.', 'dan-piano-yamaha-u1a-01.jpg', '15500000'),
(7, 'Đàn piano Yamaha U3A', 'Bán đàn piano cũ Yamaha U3A giá rẻ được công ty nhập trực tiếp từ Nhật Bản. Piano Yamaha U3A có âm thanh hay, thiết kế đẹp phù hợp với nhu cầu học tập và giải trí tại nhà.', 'dan-piano-dien-gp-500.jpg', '69500000'),
(8, 'Đàn Piano Yamaha W101', 'Đàn Piano Yamaha W101, có thiết kế khá hiện đại, với nét cổ điển Châu Âu. Cộng với âm thanh chuẩn piano Yamaha và điểm nhấn giá để nhạc tôn lên cho cây đàn vẻ sang trọng và quý phái.', 'dan-piano-cu-yamaha-w101.jpg', '83000000'),
(9, 'Giá :3.960.000 đTại sao mua hàng tại Gold MusicĐàn guitar Acoustic TangleWood TWCR-D E', 'Đánh giá :     Đánh giá (0)\r\nMô tả sản phẩm :\r\nGuitars Dreadnought thuộc dòng TWCRDE Highlights\r\n\r\nKiểu electro-acoustic\r\nMặt trước : Spruce \r\nMặt sau và bên hông: Mahogany \r\nCần đàn: Rosewood \r\nHệ thống Tanglewood TEQ-3BT EQ\r\nKho hàng:\r\nCòn hàng\r\nBảo hành :\r\n1 Năm\r\n\r\nGiao hàng :\r\nGiao hàng toàn quốc - Miễn phí nội thành', 'TangleWood-TWCR-D E-1-500x500.jpg', 'Giá :3.960.000 đ'),
(10, 'Đàn guitar Acoustic Tanglewood TWR D II', 'Đánh giá :     Đánh giá (0)\r\nMô tả sản phẩm :\r\nKiểu dáng: Dreadnought\r\nMặt trước : Cedar\r\nMặt sau: Mahogany\r\nMặt hông: Mahogany\r\nDây đàn: Phosphor Bronze 12-53 Gauge\r\nKho hàng:\r\nCòn hàng\r\nBảo hành :\r\n1 Năm\r\n\r\nGiao hàng :\r\nGiao hàng toàn quốc - Miễn phí nội thành', 'Tanglewood twrd 2-1-500x500.jpg', 'Giá gốc:3.540.000 đ- 10%3.200.000 đ'),
(11, 'Đàn guitar Acoustic TangleWood TWU-D', 'Đánh giá :     Đánh giá (0)\r\nMô tả sản phẩm :\r\nĐàn guitar Acoustic TangleWood TWU-D là một trong những cây đàn được ưa chuộng nhất của hãng TangeWood đến từ nước Anh, được thiết kế theo kiểu Dreadnought và gỗ Mahogany  cho âm thanh tươi sáng nhưng đầy ngọt ngào\r\n\r\nKho hàng:\r\nCòn hàng\r\nBảo hành :\r\n1 Năm\r\n\r\nGiao hàng :\r\nGiao hàng toàn quốc - Miễn phí nội thành', 'TangleWood-TWU-D-500x500.jpg', 'Giá gốc:4.390.000 đ'),
(12, 'Đàn guitar Acoustic Tanglewood TWU-DCE', 'Đánh giá :     Đánh giá (0)\r\nMô tả sản phẩm :\r\nKiểu dáng: Dreadnought cutaway\r\nMặt trước : Solid Mahogany\r\nMặt sau và bên hông: Mahogany\r\nPickup Tanglewood TEQ EX4\r\nKho hàng:\r\nCòn hàng\r\nBảo hành :\r\n1 Năm\r\n\r\nGiao hàng :\r\nGiao hàng toàn quốc - Miễn phí nội thành', 'tanglewood twudce-2-500x500.jpg', 'Giá gốc:5.100.000 đ- 4%4.900.000 đ'),
(13, 'Đàn Guitar Caravan HS4140 TBS', 'Đánh giá :     Đánh giá (1)\r\nMô tả sản phẩm :\r\nThiết kế bắt mắt, trẻ trung, năng động, hướng tới đối tượng học sinh, sinh viên\r\nDành cho người mới tập, dùng để đệm hát\r\nGỗ làm đàn được xử lý chống cong vênh tối đa, cho âm thanh đanh\r\nĐược xem là sản phẩm tốt nhất trong tầm giá tiền\r\nKho hàng:\r\nCòn hàng\r\nBảo hành :\r\n6 Tháng\r\n\r\nGiao hàng :\r\nGiao hàng toàn quốc - Miễn phí nội thành', 'HS4140TBS1-500x500.jpg', 'Giá gốc:1.300.000 đ'),
(14, 'Đàn Guitar Classic Cordoba C4CE', 'Đánh giá :     Đánh giá (0)\r\nMô tả sản phẩm :\r\nKiểu dáng: Cutaway Single\r\nMặt đàn: Solid African Mahogany (Gỗ Gụ Châu Phi)\r\nMặt sau và mặt bên: African Mahogany (Gỗ Gụ Châu Phi)\r\nCần đàn: African Mahogany (Gỗ Gụ Châu Phi)\r\nEqualizer: Fishman 2-band\r\nKho hàng:\r\nCòn hàng\r\nBảo hành :\r\n1 Năm\r\n\r\nGiao hàng :\r\nGiao hàng toàn quốc - Miễn phí nội thành', 'Cordoba-C4-CE-600x600.jpg\r\n', 'Giá :7.200.000 đ'),
(15, 'Bộ sáo Chuyên nghiệp HD3 VIP', 'Mô tả: Bộ gồm 10 cây hd3 đủ tone (F, G, G#, A, Bb, B, C, C#, D, E)', 'plugin_ckeditor_upload.upload.b5df286b092dfb77.36333041383932372e6a7067.jpg', '4.000.000 Vnđ/ 1 bộ'),
(16, 'Dizi gỗ giáng hương', 'Mô tả: Sản phẩm chế tác từ gỗ giáng hương Độ hoàn thiện cao', 'product.avatar.b8a59a359d5cc12b.44534346373232312e4a5047.jpg', '800.000 Vnđ/ 1 cái'),
(17, '\r\nMèo đơn nam', 'Mô tả: HD4 là tem quy định chất lượng ứng với mức giá 400.000đ. Nó đủ tất cả các tone Đô, Rê, Mi, Fa, Sol, La, Si, Sib, ...', 'product.avatar.ba7fbc6aebc2e2ad.44534346313133362e4a5047.jpg', '500.000 Vnđ'),
(18, 'Sáo Bầu mạ Đồng', 'Mô tả: Sản phẩm có tone đô (F), tone la (D), và tone sol (C) Khách hàng chọn tone ở phần lời nhắn lúc đặt hàng.', 'product.avatar.beb5a558cf46f67a.44534346303033342e4a5047.jpg', '400.000 Vnđ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'nam', 'phucbich4@gmail.com', NULL, '$2y$10$tkqTDDmJEdhBm/wH5Bs8kud5YQzpwWX.Ja3pKkBNCuJkDOfBDjsnG', NULL, '2019-12-10 20:47:34', '2019-12-10 20:47:34', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
