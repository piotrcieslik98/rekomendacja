-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Kwi 2024, 19:02
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `laravel`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `country`
--

CREATE TABLE `country` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `weather` varchar(255) NOT NULL,
  `tourist_attractions` text NOT NULL,
  `recommended_activities` text NOT NULL,
  `prices` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `country`
--

INSERT INTO `country` (`id`, `country_name`, `weather`, `tourist_attractions`, `recommended_activities`, `prices`, `created_at`, `updated_at`) VALUES
(1, 'Francja', 'Lato (20°C)', 'Wieże Eiffla, Luwr', 'Zwiedzanie muzeów, spacery po bulwarach', 'Średnie', NULL, NULL),
(2, 'Japonia', 'Wiosna (15°C)', 'Świątynia Kinkaku-ji, Tokio Disneyland', 'Zwiedzanie świątyń, festiwale kwiatów', 'Wysokie', NULL, NULL),
(3, 'Nowa Zelandia', 'Jesień (10°C)', 'Milford Sound, Park Narodowy Tongariro', 'Wędrówki po parkach narodowych, wycieczki krajoznawcze', 'Wysokie', NULL, NULL),
(4, 'Brazylia', 'Lato (25°C)', 'Rio de Janeiro, Wodospady Iguazu', 'Plażowanie, zwiedzanie zabytków', 'Średnie', NULL, NULL),
(5, 'Kanada', 'Zima (-5°C)', 'Banff National Park, CN Tower', 'Narciarstwo, wspinaczka, zwiedzanie parków narodowych', 'Wysokie', NULL, NULL),
(6, 'Niemcy', 'Lato (22°C)', 'Brama Brandenburska, Zamek Neuschwanstein', 'Zwiedzanie zabytków, wycieczki piesze', 'Średnie', NULL, NULL),
(7, 'Australia', 'Lato (25°C)', 'Opera w Sydney, Wielka Rafa Koralowa', 'Nurkowanie, plażowanie', 'Wysokie', NULL, NULL),
(8, 'Włochy', 'Lato (28°C)', 'Koloseum, Wieża w Pizie', 'Degustacja kuchni włoskiej, zwiedzanie zabytków', 'Średnie', NULL, NULL),
(9, 'Chiny', 'Lato (30°C)', 'Wielki Mur Chiński, Zakazane Miasto', 'Wycieczki po zabytkach, wspinaczka', 'Wysokie', NULL, NULL),
(10, 'Indie', 'Lato (35°C)', 'Tadź Mahal, Świątynia w Khajuraho', 'Zwiedzanie świątyń, eksploracja kultury', 'Średnie', NULL, NULL),
(11, 'Hiszpania', 'Lato (25°C)', 'Bazylika Sagrada Familia, Pałac Alhambra', 'Zwiedzanie zabytków, plażowanie', 'Średnie', NULL, NULL),
(12, 'Stany Zjednoczone', 'Lato (30°C)', 'Statua Wolności, Wielki Kanion', 'Zwiedzanie parków narodowych, wycieczki miejskie', 'Wysokie', NULL, NULL),
(13, 'Wielka Brytania', 'Lato (20°C)', 'Buckingham Palace, Tower of London', 'Zwiedzanie muzeów, puby', 'Średnie', NULL, NULL),
(14, 'Egipt', 'Lato (35°C)', 'Piramidy w Gizie, Luksor', 'Zwiedzanie zabytków, rejs po Nilu', 'Średnie', NULL, NULL),
(15, 'Argentyna', 'Lato (25°C)', 'Iguazu Falls, Buenos Aires', 'Tango, zwiedzanie miast', 'Średnie', NULL, NULL),
(16, 'Turcja', 'Lato (30°C)', 'Hagia Sophia, Pamukkale', 'Zwiedzanie zabytków, relaks w termach', 'Średnie', NULL, NULL),
(17, 'Grecja', 'Lato (30°C)', 'Akropol Ateński, Santorini', 'Zwiedzanie zabytków, relaks na plaży', 'Średnie', NULL, NULL),
(18, 'Portugalia', 'Lato (25°C)', 'Most Vasco da Gama, Lizbona', 'Zwiedzanie miast, plażowanie Algarve', 'Średnie', NULL, NULL),
(19, 'Meksyk', 'Lato (25°C)', 'Chichen Itza, Tulum', 'Zwiedzanie zabytków, plażowanie w Cancun', 'Średnie', NULL, NULL),
(20, 'Norwegia', 'Lato (15°C)', 'Fiordy Norweskie, Biegun Północny', 'Wędrówki po górach, safari lodowe', 'Wysokie', NULL, NULL),
(21, 'Szwajcaria', 'Lato (20°C)', 'Matterhorn, Jezioro Genewskie', 'Narciarstwo, wspinaczka, jazda na rowerze', 'Wysokie', NULL, NULL),
(22, 'Szwecja', 'Lato (18°C)', 'Sztokholm, Laponia', 'Nurkowanie, spacery po lesie', 'Średnie', NULL, NULL),
(23, 'Holandia', 'Lato (22°C)', 'Kanały w Amsterdamie, Młyny wiatrowe', 'Wycieczki rowerowe, degustacja serów', 'Średnie', NULL, NULL),
(24, 'Dania', 'Lato (20°C)', 'Kopenhaga, Legoland', 'Zwiedzanie zamków, jazda na rowerze', 'Średnie', NULL, NULL),
(25, 'Austria', 'Lato (22°C)', 'Wiedeń, Tyrol', 'Narciarstwo, wspinaczka, degustacja piwa', 'Wysokie', NULL, NULL),
(26, 'Belgia', 'Lato (20°C)', 'Bruksela, Brugia', 'Degustacja czekolady, zwiedzanie zabytków', 'Średnie', NULL, NULL),
(27, 'Finlandia', 'Lato (20°C)', 'Santa Claus Village, Archipelag Finlandii', 'Saunowanie, safari na nartach śnieżnych', 'Wysokie', NULL, NULL),
(28, 'Irlandia', 'Lato (18°C)', 'Klify Moher, Dublin', 'Wycieczki po zamkach', 'Średnie', NULL, NULL),
(29, 'Singapur', 'Lato (30°C)', 'Marina Bay Sands, Ogrody botaniczne', 'Zakupy, gastronomia', 'Wysokie', NULL, NULL),
(30, 'Malezja', 'Lato (30°C)', 'Petronas Towers, Park Narodowy Taman Negara', 'Nurkowanie, trekking w dżungli', 'Średnie', NULL, NULL),
(31, 'Wietnam', 'Lato (30°C)', 'Zatoka Ha Long, Hanoi', 'Wycieczki po zabytkach, trekking w górach', 'Średnie', NULL, NULL),
(32, 'Thailand', 'Lato (30°C)', 'Bangkok, Phuket', 'Relaks na plaży, wizyty w świątyniach', 'Średnie', NULL, NULL),
(33, 'Indonezja', 'Lato (30°C)', 'Bali, Dżakarta', 'Surfowanie, wędrówki po dżungli', 'Średnie', NULL, NULL),
(34, 'Ekwador', 'Lato (25°C)', 'Galapagos Islands, Quito', 'Nurkowanie, trekking w górach', 'Średnie', NULL, NULL),
(35, 'Kolumbia', 'Lato (30°C)', 'Cartagena, Medellin', 'Zwiedzanie miast, trekking w dżungli', 'Średnie', NULL, NULL),
(36, 'Peru', 'Lato (25°C)', 'Machu Picchu, Lima', 'Trekking w górach, degustacja kuchni peruwiańskiej', 'Średnie', NULL, NULL),
(37, 'Chile', 'Lato (25°C)', 'Dolina Dolcay, Santiago', 'Wędrówki po parkach narodowych, degustacja wina', 'Średnie', NULL, NULL),
(38, 'Maroko', 'Lato (25°C)', 'Marrakesz, Sahara', 'Wycieczki po bazarch, safari w pustyni', 'Średnie', NULL, NULL),
(39, 'Tunezja', 'Lato (30°C)', 'Kartagina, Saharńska Oaza', 'Zwiedzanie zabytków, relaks na plaży', 'Średnie', NULL, NULL),
(40, 'Wietnam', 'Lato (30°C)', 'Zatoka Ha Long, Hanoi', 'Wycieczki po zabytkach, trekking w górach', 'Niskie', NULL, NULL),
(41, 'Tunezja', 'Lato (30°C)', 'Kartagina, Saharńska Oaza', 'Zwiedzanie zabytków, relaks na plaży', 'Niskie', NULL, NULL),
(42, 'Kenia', 'Lato (35°C)', 'Safari, plaże', 'Wycieczki safari, nurkowanie', 'Niskie', NULL, NULL),
(43, 'Nepal', 'Lato (25°C)', 'Everest, Katmandu', 'Trekking w Himalajach, zwiedzanie świątyń', 'Niskie', NULL, NULL),
(44, 'Boliwia', 'Lato (20°C)', 'Salar de Uyuni, La Paz', 'Wędrówki po solnych płaskowyżach, zwiedzanie miast', 'Niskie', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(6, '2024_04_09_185717_create_country_table', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeksy dla tabeli `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeksy dla tabeli `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
