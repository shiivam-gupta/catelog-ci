-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 17, 2020 at 01:26 PM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.31-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `buying_supplier_order`
--

CREATE TABLE `buying_supplier_order` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `order_total` double(10,2) DEFAULT '0.00',
  `paid` double(10,2) DEFAULT '0.00',
  `own` double(10,2) DEFAULT '0.00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buying_supplier_order`
--

INSERT INTO `buying_supplier_order` (`id`, `buyer_id`, `supplier_id`, `order_total`, `paid`, `own`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 10.00, 2.00, 8.00, '2019-11-28 11:43:57', '2019-11-28 11:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `buying_supplier_products`
--

CREATE TABLE `buying_supplier_products` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `ktav` varchar(255) DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `ktav_size` varchar(255) DEFAULT NULL,
  `line_size` varchar(255) DEFAULT NULL,
  `sku_label` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `ktav_price` double(10,2) DEFAULT '0.00',
  `tyug_price` double(10,2) DEFAULT '0.00',
  `klaf_price` double(10,2) DEFAULT '0.00',
  `hgha_price` double(10,2) DEFAULT '0.00',
  `cost_price_subtotal` double(10,2) DEFAULT '0.00',
  `cost_price_total` double(10,2) DEFAULT '0.00',
  `priceindollar` double(10,2) DEFAULT '0.00',
  `order_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buying_supplier_products`
--

INSERT INTO `buying_supplier_products` (`id`, `category`, `ktav`, `product_type`, `ktav_size`, `line_size`, `sku_label`, `quantity`, `ktav_price`, `tyug_price`, `klaf_price`, `hgha_price`, `cost_price_subtotal`, `cost_price_total`, `priceindollar`, `order_id`, `buyer_id`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, 'Mezuza', 'BeitYosef', 'Rashi', '12', '10', 'P00101', 2, 5.00, 0.00, 0.00, 0.00, 5.00, 0.00, 10.00, 1, 1, 11, '2019-11-28 11:43:57', '2019-11-28 11:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countrycode` char(3) NOT NULL,
  `countryname` varchar(200) NOT NULL,
  `code` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countrycode`, `countryname`, `code`) VALUES
('ABW', 'Aruba', 'AW'),
('AFG', 'Afghanistan', 'AF'),
('AGO', 'Angola', 'AO'),
('AIA', 'Anguilla', 'AI'),
('ALA', 'Åland', 'AX'),
('ALB', 'Albania', 'AL'),
('AND', 'Andorra', 'AD'),
('ARE', 'United Arab Emirates', 'AE'),
('ARG', 'Argentina', 'AR'),
('ARM', 'Armenia', 'AM'),
('ASM', 'American Samoa', 'AS'),
('ATA', 'Antarctica', 'AQ'),
('ATF', 'French Southern Territories', 'TF'),
('ATG', 'Antigua and Barbuda', 'AG'),
('AUS', 'Australia', 'AU'),
('AUT', 'Austria', 'AT'),
('AZE', 'Azerbaijan', 'AZ'),
('BDI', 'Burundi', 'BI'),
('BEL', 'Belgium', 'BE'),
('BEN', 'Benin', 'BJ'),
('BES', 'Bonaire', 'BQ'),
('BFA', 'Burkina Faso', 'BF'),
('BGD', 'Bangladesh', 'BD'),
('BGR', 'Bulgaria', 'BG'),
('BHR', 'Bahrain', 'BH'),
('BHS', 'Bahamas', 'BS'),
('BIH', 'Bosnia and Herzegovina', 'BA'),
('BLM', 'Saint Barthélemy', 'BL'),
('BLR', 'Belarus', 'BY'),
('BLZ', 'Belize', 'BZ'),
('BMU', 'Bermuda', 'BM'),
('BOL', 'Bolivia', 'BO'),
('BRA', 'Brazil', 'BR'),
('BRB', 'Barbados', 'BB'),
('BRN', 'Brunei', 'BN'),
('BTN', 'Bhutan', 'BT'),
('BVT', 'Bouvet Island', 'BV'),
('BWA', 'Botswana', 'BW'),
('CAF', 'Central African Republic', 'CF'),
('CAN', 'Canada', 'CA'),
('CCK', 'Cocos [Keeling] Islands', 'CC'),
('CHE', 'Switzerland', 'CH'),
('CHL', 'Chile', 'CL'),
('CHN', 'China', 'CN'),
('CIV', 'Ivory Coast', 'CI'),
('CMR', 'Cameroon', 'CM'),
('COD', 'Democratic Republic of the Congo', 'CD'),
('COG', 'Republic of the Congo', 'CG'),
('COK', 'Cook Islands', 'CK'),
('COL', 'Colombia', 'CO'),
('COM', 'Comoros', 'KM'),
('CPV', 'Cape Verde', 'CV'),
('CRI', 'Costa Rica', 'CR'),
('CUB', 'Cuba', 'CU'),
('CUW', 'Curacao', 'CW'),
('CXR', 'Christmas Island', 'CX'),
('CYM', 'Cayman Islands', 'KY'),
('CYP', 'Cyprus', 'CY'),
('CZE', 'Czech Republic', 'CZ'),
('DEU', 'Germany', 'DE'),
('DJI', 'Djibouti', 'DJ'),
('DMA', 'Dominica', 'DM'),
('DNK', 'Denmark', 'DK'),
('DOM', 'Dominican Republic', 'DO'),
('DZA', 'Algeria', 'DZ'),
('ECU', 'Ecuador', 'EC'),
('EGY', 'Egypt', 'EG'),
('ERI', 'Eritrea', 'ER'),
('ESH', 'Western Sahara', 'EH'),
('ESP', 'Spain', 'ES'),
('EST', 'Estonia', 'EE'),
('ETH', 'Ethiopia', 'ET'),
('FIN', 'Finland', 'FI'),
('FJI', 'Fiji', 'FJ'),
('FLK', 'Falkland Islands', 'FK'),
('FRA', 'France', 'FR'),
('FRO', 'Faroe Islands', 'FO'),
('FSM', 'Micronesia', 'FM'),
('GAB', 'Gabon', 'GA'),
('GBR', 'United Kingdom', 'GB'),
('GEO', 'Georgia', 'GE'),
('GGY', 'Guernsey', 'GG'),
('GHA', 'Ghana', 'GH'),
('GIB', 'Gibraltar', 'GI'),
('GIN', 'Guinea', 'GN'),
('GLP', 'Guadeloupe', 'GP'),
('GMB', 'Gambia', 'GM'),
('GNB', 'Guinea-Bissau', 'GW'),
('GNQ', 'Equatorial Guinea', 'GQ'),
('GRC', 'Greece', 'GR'),
('GRD', 'Grenada', 'GD'),
('GRL', 'Greenland', 'GL'),
('GTM', 'Guatemala', 'GT'),
('GUF', 'French Guiana', 'GF'),
('GUM', 'Guam', 'GU'),
('GUY', 'Guyana', 'GY'),
('HKG', 'Hong Kong', 'HK'),
('HMD', 'Heard Island and McDonald Islands', 'HM'),
('HND', 'Honduras', 'HN'),
('HRV', 'Croatia', 'HR'),
('HTI', 'Haiti', 'HT'),
('HUN', 'Hungary', 'HU'),
('IDN', 'Indonesia', 'ID'),
('IMN', 'Isle of Man', 'IM'),
('IND', 'India', 'IN'),
('IOT', 'British Indian Ocean Territory', 'IO'),
('IRL', 'Ireland', 'IE'),
('IRN', 'Iran', 'IR'),
('IRQ', 'Iraq', 'IQ'),
('ISL', 'Iceland', 'IS'),
('ISR', 'Israel', 'IL'),
('ITA', 'Italy', 'IT'),
('JAM', 'Jamaica', 'JM'),
('JEY', 'Jersey', 'JE'),
('JOR', 'Jordan', 'JO'),
('JPN', 'Japan', 'JP'),
('KAZ', 'Kazakhstan', 'KZ'),
('KEN', 'Kenya', 'KE'),
('KGZ', 'Kyrgyzstan', 'KG'),
('KHM', 'Cambodia', 'KH'),
('KIR', 'Kiribati', 'KI'),
('KNA', 'Saint Kitts and Nevis', 'KN'),
('KOR', 'South Korea', 'KR'),
('KWT', 'Kuwait', 'KW'),
('LAO', 'Laos', 'LA'),
('LBN', 'Lebanon', 'LB'),
('LBR', 'Liberia', 'LR'),
('LBY', 'Libya', 'LY'),
('LCA', 'Saint Lucia', 'LC'),
('LIE', 'Liechtenstein', 'LI'),
('LKA', 'Sri Lanka', 'LK'),
('LSO', 'Lesotho', 'LS'),
('LTU', 'Lithuania', 'LT'),
('LUX', 'Luxembourg', 'LU'),
('LVA', 'Latvia', 'LV'),
('MAC', 'Macao', 'MO'),
('MAF', 'Saint Martin', 'MF'),
('MAR', 'Morocco', 'MA'),
('MCO', 'Monaco', 'MC'),
('MDA', 'Moldova', 'MD'),
('MDG', 'Madagascar', 'MG'),
('MDV', 'Maldives', 'MV'),
('MEX', 'Mexico', 'MX'),
('MHL', 'Marshall Islands', 'MH'),
('MKD', 'Macedonia', 'MK'),
('MLI', 'Mali', 'ML'),
('MLT', 'Malta', 'MT'),
('MMR', 'Myanmar [Burma]', 'MM'),
('MNE', 'Montenegro', 'ME'),
('MNG', 'Mongolia', 'MN'),
('MNP', 'Northern Mariana Islands', 'MP'),
('MOZ', 'Mozambique', 'MZ'),
('MRT', 'Mauritania', 'MR'),
('MSR', 'Montserrat', 'MS'),
('MTQ', 'Martinique', 'MQ'),
('MUS', 'Mauritius', 'MU'),
('MWI', 'Malawi', 'MW'),
('MYS', 'Malaysia', 'MY'),
('MYT', 'Mayotte', 'YT'),
('NAM', 'Namibia', 'NA'),
('NCL', 'New Caledonia', 'NC'),
('NER', 'Niger', 'NE'),
('NFK', 'Norfolk Island', 'NF'),
('NGA', 'Nigeria', 'NG'),
('NIC', 'Nicaragua', 'NI'),
('NIU', 'Niue', 'NU'),
('NLD', 'Netherlands', 'NL'),
('NOR', 'Norway', 'NO'),
('NPL', 'Nepal', 'NP'),
('NRU', 'Nauru', 'NR'),
('NZL', 'New Zealand', 'NZ'),
('OMN', 'Oman', 'OM'),
('PAK', 'Pakistan', 'PK'),
('PAN', 'Panama', 'PA'),
('PCN', 'Pitcairn Islands', 'PN'),
('PER', 'Peru', 'PE'),
('PHL', 'Philippines', 'PH'),
('PLW', 'Palau', 'PW'),
('PNG', 'Papua New Guinea', 'PG'),
('POL', 'Poland', 'PL'),
('PRI', 'Puerto Rico', 'PR'),
('PRK', 'North Korea', 'KP'),
('PRT', 'Portugal', 'PT'),
('PRY', 'Paraguay', 'PY'),
('PSE', 'Palestine', 'PS'),
('PYF', 'French Polynesia', 'PF'),
('QAT', 'Qatar', 'QA'),
('REU', 'Réunion', 'RE'),
('ROU', 'Romania', 'RO'),
('RUS', 'Russia', 'RU'),
('RWA', 'Rwanda', 'RW'),
('SAU', 'Saudi Arabia', 'SA'),
('SDN', 'Sudan', 'SD'),
('SEN', 'Senegal', 'SN'),
('SGP', 'Singapore', 'SG'),
('SGS', 'South Georgia and the South Sandwich Islands', 'GS'),
('SHN', 'Saint Helena', 'SH'),
('SJM', 'Svalbard and Jan Mayen', 'SJ'),
('SLB', 'Solomon Islands', 'SB'),
('SLE', 'Sierra Leone', 'SL'),
('SLV', 'El Salvador', 'SV'),
('SMR', 'San Marino', 'SM'),
('SOM', 'Somalia', 'SO'),
('SPM', 'Saint Pierre and Miquelon', 'PM'),
('SRB', 'Serbia', 'RS'),
('SSD', 'South Sudan', 'SS'),
('STP', 'São Tomé and Príncipe', 'ST'),
('SUR', 'Suriname', 'SR'),
('SVK', 'Slovakia', 'SK'),
('SVN', 'Slovenia', 'SI'),
('SWE', 'Sweden', 'SE'),
('SWZ', 'Swaziland', 'SZ'),
('SXM', 'Sint Maarten', 'SX'),
('SYC', 'Seychelles', 'SC'),
('SYR', 'Syria', 'SY'),
('TCA', 'Turks and Caicos Islands', 'TC'),
('TCD', 'Chad', 'TD'),
('TGO', 'Togo', 'TG'),
('THA', 'Thailand', 'TH'),
('TJK', 'Tajikistan', 'TJ'),
('TKL', 'Tokelau', 'TK'),
('TKM', 'Turkmenistan', 'TM'),
('TLS', 'East Timor', 'TL'),
('TON', 'Tonga', 'TO'),
('TTO', 'Trinidad and Tobago', 'TT'),
('TUN', 'Tunisia', 'TN'),
('TUR', 'Turkey', 'TR'),
('TUV', 'Tuvalu', 'TV'),
('TWN', 'Taiwan', 'TW'),
('TZA', 'Tanzania', 'TZ'),
('UGA', 'Uganda', 'UG'),
('UKR', 'Ukraine', 'UA'),
('UMI', 'U.S. Minor Outlying Islands', 'UM'),
('URY', 'Uruguay', 'UY'),
('USA', 'United States', 'US'),
('UZB', 'Uzbekistan', 'UZ'),
('VAT', 'Vatican City', 'VA'),
('VCT', 'Saint Vincent and the Grenadines', 'VC'),
('VEN', 'Venezuela', 'VE'),
('VGB', 'British Virgin Islands', 'VG'),
('VIR', 'U.S. Virgin Islands', 'VI'),
('VNM', 'Vietnam', 'VN'),
('VUT', 'Vanuatu', 'VU'),
('WLF', 'Wallis and Futuna', 'WF'),
('WSM', 'Samoa', 'WS'),
('XKX', 'Kosovo', 'XK'),
('YEM', 'Yemen', 'YE'),
('ZAF', 'South Africa', 'ZA'),
('ZMB', 'Zambia', 'ZM'),
('ZWE', 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `currency_rates`
--

CREATE TABLE `currency_rates` (
  `id` int(11) NOT NULL,
  `base` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abbr` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` double(10,6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency_rates`
--

INSERT INTO `currency_rates` (`id`, `base`, `abbr`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'USD', 'AED', 3.673281, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(2, 'USD', 'AFN', 75.299454, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(3, 'USD', 'ALL', 108.850000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(4, 'USD', 'AMD', 485.397985, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(5, 'USD', 'ANG', 1.771847, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(6, 'USD', 'AOA', 310.283000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(7, 'USD', 'ARS', 37.479000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(8, 'USD', 'AUD', 1.396029, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(9, 'USD', 'AWG', 1.801418, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(10, 'USD', 'AZN', 1.702500, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(11, 'USD', 'BAM', 1.715900, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(12, 'USD', 'BBD', 2.000000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(13, 'USD', 'BDT', 83.925000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(14, 'USD', 'BGN', 1.716403, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(15, 'USD', 'BHD', 0.377006, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(16, 'USD', 'BIF', 1790.930664, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(17, 'USD', 'BMD', 1.000000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(18, 'USD', 'BND', 1.575733, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(19, 'USD', 'BOB', 6.914950, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(20, 'USD', 'BRL', 3.736550, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(21, 'USD', 'BSD', 1.000000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(22, 'USD', 'BTC', 0.000278, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(23, 'USD', 'BTN', 71.121937, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(24, 'USD', 'BWP', 10.486000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(25, 'USD', 'BYN', 2.153205, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(26, 'USD', 'BZD', 2.006452, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(27, 'USD', 'CAD', 1.328183, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(28, 'USD', 'CDF', 1643.151672, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(29, 'USD', 'CHF', 0.992359, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(30, 'USD', 'CLF', 0.024214, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(31, 'USD', 'CLP', 668.963448, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(32, 'USD', 'CNH', 6.777150, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(33, 'USD', 'CNY', 6.769078, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(34, 'USD', 'COP', 3137.475359, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(35, 'USD', 'CRC', 600.697203, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(36, 'USD', 'CUC', 1.000000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(37, 'USD', 'CUP', 25.750000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(38, 'USD', 'CVE', 96.840500, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(39, 'USD', 'CZK', 22.426479, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(40, 'USD', 'DJF', 178.000000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(41, 'USD', 'DKK', 6.551784, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(42, 'USD', 'DOP', 50.485000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(43, 'USD', 'DZD', 118.493333, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(44, 'USD', 'EGP', 17.911000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(45, 'USD', 'ERN', 14.997930, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(46, 'USD', 'ETB', 28.211571, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(47, 'USD', 'EUR', 0.877678, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(48, 'USD', 'FJD', 2.116503, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(49, 'USD', 'FKP', 0.776374, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(50, 'USD', 'GBP', 0.776374, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(51, 'USD', 'GEL', 2.665000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(52, 'USD', 'GGP', 0.776374, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(53, 'USD', 'GHS', 4.898800, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(54, 'USD', 'GIP', 0.776374, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(55, 'USD', 'GMD', 49.555000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(56, 'USD', 'GNF', 9106.520479, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(57, 'USD', 'GTQ', 7.719046, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(58, 'USD', 'GYD', 208.524784, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(59, 'USD', 'HKD', 7.844450, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(60, 'USD', 'HNL', 24.351120, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(61, 'USD', 'HRK', 6.519000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(62, 'USD', 'HTG', 78.247221, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(63, 'USD', 'HUF', 282.110000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(64, 'USD', 'IDR', 9999.999999, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(65, 'USD', 'ILS', 3.690142, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(66, 'USD', 'IMP', 0.776374, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(67, 'USD', 'INR', 71.184755, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(68, 'USD', 'IQD', 1191.153512, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(69, 'USD', 'IRR', 9999.999999, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(70, 'USD', 'ISK', 121.364152, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(71, 'USD', 'JEP', 0.776374, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(72, 'USD', 'JMD', 129.920000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(73, 'USD', 'JOD', 0.709603, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(74, 'USD', 'JPY', 108.738500, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(75, 'USD', 'KES', 101.660000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(76, 'USD', 'KGS', 68.708287, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(77, 'USD', 'KHR', 4014.532969, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(78, 'USD', 'KMF', 431.627578, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(79, 'USD', 'KPW', 900.000000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(80, 'USD', 'KRW', 1123.200000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(81, 'USD', 'KWD', 0.303226, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(82, 'USD', 'KYD', 0.831974, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(83, 'USD', 'KZT', 378.217500, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(84, 'USD', 'LAK', 8545.876188, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(85, 'USD', 'LBP', 1507.550000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(86, 'USD', 'LKR', 181.760000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(87, 'USD', 'LRD', 159.500052, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(88, 'USD', 'LSL', 13.710894, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(89, 'USD', 'LYD', 1.380392, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(90, 'USD', 'MAD', 9.545900, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(91, 'USD', 'MDL', 17.183699, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(92, 'USD', 'MGA', 3653.555445, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(93, 'USD', 'MKD', 53.945000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(94, 'USD', 'MMK', 1523.305728, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(95, 'USD', 'MNT', 2453.750000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(96, 'USD', 'MOP', 8.065424, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(97, 'USD', 'MRO', 357.000000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(98, 'USD', 'MRU', 36.250000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(99, 'USD', 'MUR', 34.325478, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(100, 'USD', 'MVR', 15.524984, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(101, 'USD', 'MWK', 728.433063, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(102, 'USD', 'MXN', 18.957230, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(103, 'USD', 'MYR', 4.111337, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(104, 'USD', 'MZN', 61.676612, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(105, 'USD', 'NAD', 13.880000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(106, 'USD', 'NGN', 362.368859, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(107, 'USD', 'NIO', 32.438608, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(108, 'USD', 'NOK', 8.563690, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(109, 'USD', 'NPR', 113.790183, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(110, 'USD', 'NZD', 1.483834, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(111, 'USD', 'OMR', 0.384953, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(112, 'USD', 'PAB', 1.000000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(113, 'USD', 'PEN', 3.329740, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(114, 'USD', 'PGK', 3.363891, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(115, 'USD', 'PHP', 52.402167, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(116, 'USD', 'PKR', 139.880000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(117, 'USD', 'PLN', 3.762140, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(118, 'USD', 'PYG', 6033.344072, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(119, 'USD', 'QAR', 3.640999, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(120, 'USD', 'RON', 4.116247, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(121, 'USD', 'RSD', 103.878751, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(122, 'USD', 'RUB', 66.541900, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(123, 'USD', 'RWF', 893.210269, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(124, 'USD', 'SAR', 3.750816, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(125, 'USD', 'SBD', 8.103662, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(126, 'USD', 'SCR', 13.643969, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(127, 'USD', 'SDG', 47.535417, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(128, 'USD', 'SEK', 9.027340, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(129, 'USD', 'SGD', 1.356171, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(130, 'USD', 'SHP', 0.776374, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(131, 'USD', 'SLL', 8390.000000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(132, 'USD', 'SOS', 577.456867, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(133, 'USD', 'SRD', 7.458000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(134, 'USD', 'SSP', 130.263400, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(135, 'USD', 'STD', 9999.999999, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(136, 'USD', 'STN', 21.500000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(137, 'USD', 'SVC', 8.735648, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(138, 'USD', 'SYP', 515.016520, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(139, 'USD', 'SZL', 13.705534, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(140, 'USD', 'THB', 31.732940, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(141, 'USD', 'TJS', 9.413867, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(142, 'USD', 'TMT', 3.499986, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(143, 'USD', 'TND', 2.961883, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(144, 'USD', 'TOP', 2.257667, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(145, 'USD', 'TRY', 5.364327, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(146, 'USD', 'TTD', 6.792850, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(147, 'USD', 'TWD', 30.855751, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(148, 'USD', 'TZS', 2301.710031, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(149, 'USD', 'UAH', 28.071250, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(150, 'USD', 'UGX', 3693.562666, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(151, 'USD', 'USD', 1.000000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(152, 'USD', 'UYU', 32.687450, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(153, 'USD', 'UZS', 8332.053329, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(154, 'USD', 'VEF', 9999.999999, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(155, 'USD', 'VES', 948.592686, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(156, 'USD', 'VND', 9999.999999, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(157, 'USD', 'VUV', 111.089399, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(158, 'USD', 'WST', 2.604948, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(159, 'USD', 'XAF', 575.719039, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(160, 'USD', 'XAG', 0.064224, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(161, 'USD', 'XAU', 0.000773, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(162, 'USD', 'XCD', 2.702550, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(163, 'USD', 'XDR', 0.715343, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(164, 'USD', 'XOF', 575.719039, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(165, 'USD', 'XPD', 0.000720, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(166, 'USD', 'XPF', 104.734847, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(167, 'USD', 'XPT', 0.001242, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(168, 'USD', 'YER', 250.350747, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(169, 'USD', 'ZAR', 13.732453, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(170, 'USD', 'ZMW', 11.903000, '2019-01-17 11:38:04', '2019-01-17 11:38:04'),
(171, 'USD', 'ZWL', 322.355011, '2019-01-17 11:38:04', '2019-01-17 11:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mobileNumber` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `landMark` text COLLATE utf8_unicode_ci,
  `townCity` text COLLATE utf8_unicode_ci,
  `addressType` enum('office','home','commercial') COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `status` enum('new','in progress','complete','deleted','delivered','canceled') COLLATE utf8_unicode_ci DEFAULT 'new',
  `orderDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `mobileNumber`, `landMark`, `townCity`, `addressType`, `remark`, `status`, `orderDate`) VALUES
(9, 12, NULL, NULL, NULL, NULL, '', 'new', '2019-02-24 01:17:25'),
(10, 12, NULL, NULL, NULL, NULL, '', 'new', '2019-02-24 01:17:41'),
(11, 12, NULL, NULL, NULL, NULL, '', 'new', '2019-02-24 01:21:14'),
(12, 12, NULL, NULL, NULL, NULL, 'ת', 'new', '2019-02-24 01:21:34'),
(13, 12, NULL, NULL, NULL, NULL, '', 'in progress', '2019-02-24 01:23:33'),
(14, 12, NULL, NULL, NULL, NULL, '', 'in progress', '2019-03-02 20:43:34'),
(15, 9, NULL, NULL, NULL, NULL, 'מתוייג ומחשב', 'delivered', '2019-03-02 21:34:27'),
(16, 9, NULL, NULL, NULL, NULL, '', 'new', '2019-03-02 21:41:13'),
(17, 19, NULL, NULL, NULL, NULL, '', 'new', '2019-03-04 22:42:19'),
(18, 12, NULL, NULL, NULL, NULL, '', 'new', '2019-03-10 21:19:25'),
(19, 12, NULL, NULL, NULL, NULL, '', 'new', '2019-03-10 21:56:44'),
(20, 19, NULL, NULL, NULL, NULL, '', 'new', '2019-11-12 14:06:41'),
(21, 19, NULL, NULL, NULL, NULL, '', 'new', '2019-11-12 14:08:21'),
(22, 19, NULL, NULL, NULL, NULL, 'gjgjhg gh gjgjhgj gjgjgj', 'new', '2019-11-12 14:10:45'),
(23, 22, NULL, NULL, NULL, NULL, 'מהררר', 'new', '2019-11-12 20:43:27'),
(24, 12, NULL, NULL, NULL, NULL, '', 'new', '2019-11-12 20:51:49'),
(25, 12, NULL, NULL, NULL, NULL, '', 'new', '2019-11-12 20:56:28'),
(26, 12, NULL, NULL, NULL, NULL, '', 'new', '2019-11-12 20:57:39'),
(27, 12, NULL, NULL, NULL, NULL, '', 'new', '2019-11-12 20:58:36'),
(28, 12, NULL, NULL, NULL, NULL, 'יוסי', 'new', '2019-11-12 22:22:19'),
(29, 22, NULL, NULL, NULL, NULL, '', 'new', '2019-11-13 06:37:51'),
(30, 22, NULL, NULL, NULL, NULL, '', 'new', '2019-11-13 06:38:21'),
(31, 22, NULL, NULL, NULL, NULL, '', 'new', '2019-11-13 06:39:51'),
(34, 24, NULL, NULL, NULL, NULL, 'AShivam Sir', 'new', '2019-11-13 12:43:13'),
(35, 24, NULL, NULL, NULL, NULL, 'Tushar', 'new', '2019-11-13 13:09:26'),
(36, 24, NULL, NULL, NULL, NULL, 'Nirala', 'new', '2019-11-13 13:15:59'),
(37, 24, NULL, NULL, NULL, NULL, 'heroko', 'new', '2019-11-13 13:27:31'),
(38, 12, NULL, NULL, NULL, NULL, 'test', 'new', '2019-11-20 11:05:03'),
(39, 12, NULL, NULL, NULL, NULL, 'Good', 'new', '2019-11-20 13:30:28'),
(40, 12, NULL, NULL, NULL, NULL, 'tytytytytytytyty', 'new', '2019-11-20 13:35:40'),
(41, 24, NULL, NULL, NULL, NULL, 'Ajj Din H Bhut Kharab', 'new', '2019-11-21 14:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `price` double(10,2) DEFAULT NULL,
  `totalPrice` double(10,2) DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'USD',
  `productData` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `supplier_id`, `product_id`, `quantity`, `price`, `totalPrice`, `currency`, `productData`) VALUES
(11, 13, 10, 15, 1, 110.00, 110.00, 'USD', '{\"id\":\"15\",\"sku\":\"P001015\",\"user_id\":\"10\",\"name\":null,\"category\":\"Mezuza\",\"ktav\":\"Ari\",\"product_type\":\"\",\"ktav_size\":\"\",\"plines\":\"\",\"line_size\":\"\",\"product_photo\":\"uploads\\/products_img\\/IMG-20181003-WA0024-1JPG-1550957197.jpg\",\"priceindollar\":\"29.81\",\"priceinshekel\":\"110.00\",\"mezuzot\":\"0\",\"parshiot\":\"0\",\"amudim\":\"0\",\"quantity\":\"5\",\"finishDate\":\"1970-01-01\",\"klaf_included\":\"Yes\",\"tag_included\":\"Yes\",\"remark\":\"\",\"status\":\"active\",\"supplier_id\":\"10\",\"firstname\":\"\\u05d7\\u05d9\\u05d9\\u05dd\",\"lastname\":\"\\u05e9\\u05db\\u05d8\\u05e8\",\"fullname\":\"\\u05d7\\u05d9\\u05d9\\u05dd \\u05e9\\u05db\\u05d8\\u05e8\"}'),
(12, 14, 10, 15, 2, 110.00, 220.00, 'USD', '{\"id\":\"15\",\"sku\":\"P001015\",\"user_id\":\"10\",\"name\":null,\"category\":\"Mezuza\",\"ktav\":\"Ari\",\"product_type\":\"\",\"ktav_size\":\"12\",\"plines\":\"\",\"line_size\":\"\",\"product_photo\":\"uploads\\/products_img\\/IMG-20181003-WA0024-1JPG-1550957197.jpg\",\"priceindollar\":\"29.81\",\"priceinshekel\":\"110.00\",\"mezuzot\":\"0\",\"parshiot\":\"0\",\"amudim\":\"0\",\"quantity\":\"4\",\"finishDate\":\"1970-01-01\",\"klaf_included\":\"Yes\",\"tag_included\":\"Yes\",\"remark\":\"\",\"status\":\"active\",\"supplier_id\":\"10\",\"firstname\":\"\\u05d7\\u05d9\\u05d9\\u05dd\",\"lastname\":\"\\u05e9\\u05db\\u05d8\\u05e8\",\"fullname\":\"\\u05d7\\u05d9\\u05d9\\u05dd \\u05e9\\u05db\\u05d8\\u05e8\"}'),
(13, 15, 10, 15, 2, 110.00, 2200.00, 'USD', '{\"id\":\"15\",\"sku\":\"P001015\",\"user_id\":\"10\",\"name\":null,\"category\":\"Mezuza\",\"ktav\":\"Ari\",\"product_type\":\"\",\"ktav_size\":\"12\",\"plines\":\"\",\"line_size\":\"\",\"product_photo\":\"uploads\\/products_img\\/IMG-20181003-WA0024-1JPG-1550957197.jpg\",\"priceindollar\":\"29.81\",\"priceinshekel\":\"110.00\",\"mezuzot\":\"0\",\"parshiot\":\"0\",\"amudim\":\"0\",\"quantity\":\"2\",\"finishDate\":\"1970-01-01\",\"klaf_included\":\"Yes\",\"tag_included\":\"Yes\",\"remark\":\"\",\"status\":\"active\",\"supplier_id\":\"10\",\"firstname\":\"\\u05d7\\u05d9\\u05d9\\u05dd\",\"lastname\":\"\\u05e9\\u05db\\u05d8\\u05e8\",\"fullname\":\"\\u05d7\\u05d9\\u05d9\\u05dd \\u05e9\\u05db\\u05d8\\u05e8\"}'),
(14, 25, 14, 17, 3, 184.51, 553.53, 'USD', '{\"id\":\"17\",\"sku\":\"P001017\",\"user_id\":\"14\",\"name\":null,\"category\":\"Mezuza\",\"ktav\":\"Ari\",\"product_type\":\"\",\"ktav_size\":\"15\",\"plines\":\"\",\"line_size\":\"\",\"product_photo\":\"uploads\\/products_img\\/20171112231146JPG-1551047322.jpg\",\"priceindollar\":\"50.00\",\"priceinshekel\":\"184.51\",\"mezuzot\":\"3\",\"parshiot\":\"0\",\"amudim\":\"0\",\"quantity\":\"10\",\"finishDate\":\"1970-01-01\",\"klaf_included\":\"Yes\",\"tag_included\":\"Yes\",\"remark\":\"\",\"status\":\"active\",\"supplier_id\":\"14\",\"firstname\":\"\\u05d4\\u05e2\\u05e8\\u05e9\\u05d9 \",\"lastname\":\"\\u05d5\\u05d9\\u05d9\\u05e1\\u05e4\\u05dc\\u05d3\",\"fullname\":\"\\u05d4\\u05e2\\u05e8\\u05e9\\u05d9  \\u05d5\\u05d9\\u05d9\\u05e1\\u05e4\\u05dc\\u05d3\"}'),
(15, 26, 14, 17, 3, 184.51, 553.53, 'USD', '{\"id\":\"17\",\"sku\":\"P001017\",\"user_id\":\"14\",\"name\":null,\"category\":\"Mezuza\",\"ktav\":\"Ari\",\"product_type\":\"\",\"ktav_size\":\"15\",\"plines\":\"\",\"line_size\":\"\",\"product_photo\":\"uploads\\/products_img\\/20171112231146JPG-1551047322.jpg\",\"priceindollar\":\"50.00\",\"priceinshekel\":\"184.51\",\"mezuzot\":\"3\",\"parshiot\":\"0\",\"amudim\":\"0\",\"quantity\":\"7\",\"finishDate\":\"1970-01-01\",\"klaf_included\":\"Yes\",\"tag_included\":\"Yes\",\"remark\":\"\",\"status\":\"active\",\"supplier_id\":\"14\",\"firstname\":\"\\u05d4\\u05e2\\u05e8\\u05e9\\u05d9 \",\"lastname\":\"\\u05d5\\u05d9\\u05d9\\u05e1\\u05e4\\u05dc\\u05d3\",\"fullname\":\"\\u05d4\\u05e2\\u05e8\\u05e9\\u05d9  \\u05d5\\u05d9\\u05d9\\u05e1\\u05e4\\u05dc\\u05d3\"}'),
(16, 27, 14, 17, 3, 184.51, 553.53, 'USD', '{\"id\":\"17\",\"sku\":\"P001017\",\"user_id\":\"14\",\"name\":null,\"category\":\"Mezuza\",\"ktav\":\"Ari\",\"product_type\":\"\",\"ktav_size\":\"15\",\"plines\":\"\",\"line_size\":\"\",\"product_photo\":\"uploads\\/products_img\\/20171112231146JPG-1551047322.jpg\",\"priceindollar\":\"50.00\",\"priceinshekel\":\"184.51\",\"mezuzot\":\"3\",\"parshiot\":\"0\",\"amudim\":\"0\",\"quantity\":\"4\",\"finishDate\":\"1970-01-01\",\"klaf_included\":\"Yes\",\"tag_included\":\"Yes\",\"remark\":\"\",\"status\":\"active\",\"supplier_id\":\"14\",\"firstname\":\"\\u05d4\\u05e2\\u05e8\\u05e9\\u05d9 \",\"lastname\":\"\\u05d5\\u05d9\\u05d9\\u05e1\\u05e4\\u05dc\\u05d3\",\"fullname\":\"\\u05d4\\u05e2\\u05e8\\u05e9\\u05d9  \\u05d5\\u05d9\\u05d9\\u05e1\\u05e4\\u05dc\\u05d3\"}'),
(17, 28, 14, 17, 1, 184.51, 553.53, 'USD', '{\"id\":\"17\",\"sku\":\"P001017\",\"user_id\":\"14\",\"name\":null,\"category\":\"Mezuza\",\"ktav\":\"Ari\",\"product_type\":\"\",\"ktav_size\":\"15\",\"plines\":\"\",\"line_size\":\"\",\"product_photo\":\"uploads\\/products_img\\/20171112231146JPG-1551047322.jpg\",\"priceindollar\":\"50.00\",\"priceinshekel\":\"184.51\",\"mezuzot\":\"3\",\"parshiot\":\"0\",\"amudim\":\"0\",\"quantity\":\"1\",\"finishDate\":\"1970-01-01\",\"klaf_included\":\"Yes\",\"tag_included\":\"Yes\",\"remark\":\"\",\"status\":\"active\",\"supplier_id\":\"14\",\"firstname\":\"\\u05d4\\u05e2\\u05e8\\u05e9\\u05d9 \",\"lastname\":\"\\u05d5\\u05d9\\u05d9\\u05e1\\u05e4\\u05dc\\u05d3\",\"fullname\":\"\\u05d4\\u05e2\\u05e8\\u05e9\\u05d9  \\u05d5\\u05d9\\u05d9\\u05e1\\u05e4\\u05dc\\u05d3\"}'),
(18, 35, 11, 16, 0, 24.39, 121.95, 'USD', '{\"id\":\"16\",\"sku\":\"P001016\",\"user_id\":\"11\",\"name\":null,\"category\":\"Mezuza\",\"ktav\":\"Ari\",\"product_type\":\"\",\"ktav_size\":\"10\",\"plines\":\"\",\"line_size\":\"\",\"product_photo\":\"uploads\\/products_img\\/20180923135732JPG-1550970710.jpg\",\"priceindollar\":\"24.39\",\"priceinshekel\":\"90.00\",\"mezuzot\":\"0\",\"parshiot\":\"0\",\"amudim\":\"0\",\"quantity\":\"0\",\"finishDate\":\"1970-01-01\",\"klaf_included\":\"Yes\",\"tag_included\":\"Yes\",\"remark\":\"\",\"status\":\"active\",\"supplier_id\":\"11\",\"firstname\":\"\\u05e6\\u05d1\\u05d9\\u05e7\\u05d4\",\"lastname\":\"\\u05e7\\u05d5\\u05e1\\u05d8\\u05d9\\u05e0\\u05e8\",\"fullname\":\"\\u05e6\\u05d1\\u05d9\\u05e7\\u05d4 \\u05e7\\u05d5\\u05e1\\u05d8\\u05d9\\u05e0\\u05e8\"}'),
(19, 36, 10, 15, 0, 110.00, 440.00, 'USD', '{\"id\":\"15\",\"sku\":\"P001015\",\"user_id\":\"10\",\"name\":null,\"category\":\"Mezuza\",\"ktav\":\"Ari\",\"product_type\":\"\",\"ktav_size\":\"12\",\"plines\":\"\",\"line_size\":\"\",\"product_photo\":\"uploads\\/products_img\\/IMG-20181003-WA0024-1JPG-1550957197.jpg\",\"priceindollar\":\"29.81\",\"priceinshekel\":\"110.00\",\"mezuzot\":\"0\",\"parshiot\":\"0\",\"amudim\":\"0\",\"quantity\":\"0\",\"finishDate\":\"1970-01-01\",\"klaf_included\":null,\"tag_included\":null,\"remark\":\"\",\"status\":\"active\",\"supplier_id\":\"10\",\"firstname\":\"\\u05d7\\u05d9\\u05d9\\u05dd\",\"lastname\":\"\\u05e9\\u05db\\u05d8\\u05e8\",\"fullname\":\"\\u05d7\\u05d9\\u05d9\\u05dd \\u05e9\\u05db\\u05d8\\u05e8\"}'),
(20, 37, 8, 20, 0, 2583.10, 7749.30, 'USD', '{\"id\":\"20\",\"sku\":\"P001020\",\"user_id\":\"8\",\"name\":null,\"category\":\"Megila\",\"ktav\":\"Ari\",\"product_type\":\"\",\"ktav_size\":\"\",\"plines\":\"28\",\"line_size\":\"10\",\"product_photo\":null,\"priceindollar\":\"700.00\",\"priceinshekel\":\"2583.10\",\"mezuzot\":\"0\",\"parshiot\":\"0\",\"amudim\":\"2\",\"quantity\":\"0\",\"finishDate\":\"1970-01-01\",\"klaf_included\":\"No\",\"tag_included\":\"Yes\",\"remark\":\"\",\"status\":\"active\",\"supplier_id\":\"8\",\"firstname\":\"\\u05d9\\u05e2\\u05e7\\u05d1 \\u05de\\u05e9\\u05d4 \",\"lastname\":\"\\u05e9\\u05db\\u05d8\\u05e8\",\"fullname\":\"\\u05d9\\u05e2\\u05e7\\u05d1 \\u05de\\u05e9\\u05d4  \\u05e9\\u05db\\u05d8\\u05e8\"}'),
(21, 38, 8, 85, 0, 27.10, 135.50, 'USD', '{\"id\":\"85\",\"sku\":\"P001085\",\"user_id\":\"8\",\"name\":null,\"category\":\"Mezuza\",\"ktav\":\"Sfaradi\",\"product_type\":\"Rashi\",\"ktav_size\":\"10\",\"plines\":\"11\",\"line_size\":\"5\",\"product_photo\":null,\"priceindollar\":\"27.10\",\"priceinshekel\":\"100.00\",\"mezuzot\":\"0\",\"parshiot\":\"0\",\"amudim\":\"0\",\"quantity\":\"0\",\"finishDate\":\"1970-01-01\",\"klaf_included\":\"Yes\",\"tag_included\":\"Yes\",\"remark\":\"\",\"status\":\"active\",\"supplier_id\":\"8\",\"firstname\":\"\\u05d9\\u05e2\\u05e7\\u05d1 \\u05de\\u05e9\\u05d4 \",\"lastname\":\"\\u05e9\\u05db\\u05d8\\u05e8\",\"fullname\":\"\\u05d9\\u05e2\\u05e7\\u05d1 \\u05de\\u05e9\\u05d4  \\u05e9\\u05db\\u05d8\\u05e8\"}'),
(22, 39, 8, 85, 0, 27.10, 81.30, 'USD', '{\"id\":\"85\",\"sku\":\"P001085\",\"user_id\":\"8\",\"name\":null,\"category\":\"Mezuza\",\"ktav\":\"Sfaradi\",\"product_type\":\"Rashi\",\"ktav_size\":\"10\",\"plines\":\"11\",\"line_size\":\"5\",\"product_photo\":null,\"priceindollar\":\"27.10\",\"priceinshekel\":\"100.00\",\"mezuzot\":\"0\",\"parshiot\":\"0\",\"amudim\":\"0\",\"quantity\":\"0\",\"finishDate\":\"1970-01-01\",\"klaf_included\":\"Yes\",\"tag_included\":\"Yes\",\"remark\":\"\",\"status\":\"active\",\"supplier_id\":\"8\",\"firstname\":\"\\u05d9\\u05e2\\u05e7\\u05d1 \\u05de\\u05e9\\u05d4 \",\"lastname\":\"\\u05e9\\u05db\\u05d8\\u05e8\",\"fullname\":\"\\u05d9\\u05e2\\u05e7\\u05d1 \\u05de\\u05e9\\u05d4  \\u05e9\\u05db\\u05d8\\u05e8\"}'),
(23, 40, 14, 18, 0, 750.00, 1500.00, 'USD', '{\"id\":\"18\",\"sku\":\"P001018\",\"user_id\":\"14\",\"name\":null,\"category\":\"Megila\",\"ktav\":\"Ari\",\"product_type\":\"\",\"ktav_size\":\"\",\"plines\":\"28\",\"line_size\":\"10\",\"product_photo\":\"uploads\\/products_img\\/IMG-20190219-WA0021JPG-1551047458.jpg\",\"priceindollar\":\"750.00\",\"priceinshekel\":\"2767.61\",\"mezuzot\":\"0\",\"parshiot\":\"0\",\"amudim\":\"3\",\"quantity\":\"0\",\"finishDate\":\"1970-01-01\",\"klaf_included\":\"No\",\"tag_included\":\"Yes\",\"remark\":\"\",\"status\":\"active\",\"supplier_id\":\"14\",\"firstname\":\"\\u05d4\\u05e2\\u05e8\\u05e9\\u05d9 \",\"lastname\":\"\\u05d5\\u05d9\\u05d9\\u05e1\\u05e4\\u05dc\\u05d3\",\"fullname\":\"\\u05d4\\u05e2\\u05e8\\u05e9\\u05d9  \\u05d5\\u05d9\\u05d9\\u05e1\\u05e4\\u05dc\\u05d3\"}'),
(24, 41, 8, 86, 3, 2.71, 8.13, 'USD', '{\"id\":\"86\",\"sku\":\"P001086\",\"user_id\":\"8\",\"name\":null,\"category\":\"Mezuza\",\"ktav\":\"Sfaradi\",\"product_type\":\"Rashi\",\"ktav_size\":\"10\",\"plines\":\"11\",\"line_size\":\"5\",\"product_photo\":null,\"priceindollar\":\"2.71\",\"priceinshekel\":\"10.00\",\"mezuzot\":\"0\",\"parshiot\":\"0\",\"amudim\":\"0\",\"quantity\":\"7\",\"finishDate\":\"1970-01-01\",\"klaf_included\":null,\"tag_included\":null,\"remark\":\"good\",\"status\":\"active\",\"supplier_id\":\"8\",\"firstname\":\"\\u05d9\\u05e2\\u05e7\\u05d1 \\u05de\\u05e9\\u05d4 \",\"lastname\":\"\\u05e9\\u05db\\u05d8\\u05e8\",\"fullname\":\"\\u05d9\\u05e2\\u05e7\\u05d1 \\u05de\\u05e9\\u05d4  \\u05e9\\u05db\\u05d8\\u05e8\"}');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sku` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ktav` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_type` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ktav_size` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plines` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `line_size` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_photo` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `priceindollar` double(10,2) DEFAULT NULL,
  `priceinshekel` double(10,2) DEFAULT NULL,
  `mezuzot` int(11) DEFAULT NULL,
  `parshiot` int(11) DEFAULT NULL,
  `amudim` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `finishDate` date DEFAULT NULL,
  `klaf_included` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tag_included` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `user_id`, `name`, `category`, `ktav`, `product_type`, `ktav_size`, `plines`, `line_size`, `product_photo`, `priceindollar`, `priceinshekel`, `mezuzot`, `parshiot`, `amudim`, `quantity`, `finishDate`, `klaf_included`, `tag_included`, `remark`, `status`) VALUES
(15, 'P001015', 10, NULL, 'Mezuza', 'Ari', '', '12', '', '', 'uploads/products_img/IMG-20181003-WA0024-1JPG-1550957197.jpg', 29.81, 110.00, 0, 0, 0, 0, '1970-01-01', NULL, NULL, '', 'active'),
(16, 'P001016', 11, NULL, 'Mezuza', 'Ari', '', '10', '', '', 'uploads/products_img/20180923135732JPG-1550970710.jpg', 24.39, 90.00, 0, 0, 0, 0, '1970-01-01', 'Yes', 'Yes', '', 'active'),
(17, 'P001017', 14, NULL, 'Mezuza', 'Ari', '', '15', '', '', 'uploads/products_img/20171112231146JPG-1551047322.jpg', 50.00, 184.51, 3, 0, 0, 0, '1970-01-01', 'Yes', 'Yes', '', 'active'),
(18, 'P001018', 14, NULL, 'Megila', 'Ari', '', '', '28', '10', 'uploads/products_img/IMG-20190219-WA0021JPG-1551047458.jpg', 750.00, 2767.61, 0, 0, 3, 0, '1970-01-01', 'No', 'Yes', '', 'active'),
(19, 'P001019', 8, NULL, 'Mezuza', 'BeitYosef', '', '15', '', '', 'uploads/products_img/IMG-20180809-WA0083JPG-1551048054.jpg', 54.20, 200.00, 2, 0, 0, 0, '1970-01-01', 'Yes', 'Yes', '', 'active'),
(20, 'P001020', 8, NULL, 'Megila', 'Ari', '', '', '28', '10', NULL, 700.00, 2583.10, 0, 0, 2, 0, '1970-01-01', 'No', 'Yes', '', 'active'),
(21, 'P001021', 15, NULL, 'Mezuza', 'Ari', '', '12', '', '', 'uploads/products_img/20170717010138-1JPG-1551120918.jpg', 27.10, 100.00, 0, 0, 0, 0, '1970-01-01', 'Yes', 'Yes', '', 'active'),
(22, 'P001022', 15, NULL, 'Tefilin', 'Ari', 'Rashi', '', '', '', 'uploads/products_img/20161005143514JPG-1551120979.jpg', 135.50, 500.00, 0, 0, 0, 0, '1970-01-01', 'Yes', 'No', '', 'active'),
(23, 'P001023', 16, NULL, 'Tefilin', 'Ari', 'Rashi', '', '', '', 'uploads/products_img/20181203142719JPG-1551208746.jpg', 159.89, 590.00, 0, 0, 0, 0, '1970-01-01', 'Yes', 'Yes', '', 'active'),
(24, 'P001024', 17, NULL, 'Tefilin', 'Ari', 'Rashi', '', '', '', 'uploads/products_img/IMG-20190228-WA0148JPEG-1551559204.jpeg', 149.05, 550.00, 0, 1, 0, 0, '1970-01-01', 'Yes', 'No', '', 'active'),
(25, 'P001025', 18, NULL, 'Mezuza', 'Ari', '', '10', '', '', 'uploads/products_img/20180921160404-2JPG-1551569169.jpg', 21.68, 80.00, 0, 0, 0, 0, '1970-01-01', 'Yes', 'No', 'אעחע עיעעי', 'active'),
(26, 'P001026', 18, NULL, 'Mezuza', 'Ari', '', '12', '', '', 'uploads/products_img/20180718144414-1JPG-1551569222.jpg', 0.00, 0.00, 0, 0, 0, 0, '1970-01-01', 'Yes', 'No', '', 'active'),
(27, 'P001027', 20, NULL, 'Tefilin', 'Ari', 'Rashi', '', '', '', 'uploads/products_img/20180525100316JPG-1551739235.jpg', 257.44, 950.00, 0, 0, 0, 0, '1970-01-01', 'Yes', 'Yes', '', 'active'),
(28, 'P001028', 20, NULL, 'Tefilin', 'Ari', 'Rashi', '', '', '', 'uploads/products_img/15735926615657779952062048208156JPG-1573592698.jpg', 100.00, 369.01, 0, 0, 0, 0, '1970-01-01', 'Yes', 'Yes', '', 'active'),
(29, 'P001029', 10, NULL, 'Tefilin', 'Sfaradi', 'Rashi', '15', '11', '8', 'uploads/products_img/DOWNLOADJPG-1573887050.jpg', 2.71, 10.00, 2, 1, 2, 12, '2019-11-23', 'Yes', 'Yes', 'good', 'active'),
(30, '', 11, NULL, 'Mezuza', 'Sfaradi', 'Rtam', '10', '11', '8', NULL, 0.00, 0.00, 3, 1, 1, 12, '2019-11-16', 'No', 'Yes', 'csfsf', 'active'),
(31, '', 8, NULL, 'Torah', 'Ari', 'Rtam', '15', '21', '10', NULL, 2.71, 10.00, 2, 1, 4, 12, '2019-11-26', 'Yes', 'No', 'qwer', 'active'),
(32, '', 8, NULL, 'Torah', 'Ari', 'Rtam', '15', '21', '10', NULL, 2.71, 10.00, 2, 1, 4, 12, '2019-11-26', 'Yes', 'No', 'qwer', 'active'),
(33, '', 8, NULL, 'Torah', 'Ari', 'Rtam', '15', '21', '10', NULL, 2.71, 10.00, 2, 1, 4, 12, '2019-11-26', 'Yes', 'No', 'qwer', 'active'),
(34, '', 8, NULL, 'Torah', 'Ari', 'Rtam', '15', '21', '10', NULL, 2.71, 10.00, 2, 1, 4, 12, '2019-11-26', 'Yes', 'No', 'qwer', 'active'),
(35, '', 8, NULL, 'Torah', 'Ari', 'Rtam', '15', '21', '10', NULL, 2.71, 10.00, 2, 1, 4, 12, '2019-11-26', 'Yes', 'No', 'qwer', 'active'),
(36, '', 8, NULL, 'Torah', 'Ari', 'Rtam', '15', '21', '10', NULL, 2.71, 10.00, 2, 1, 4, 12, '2019-11-26', 'Yes', 'No', 'qwer', 'active'),
(37, '', 8, NULL, 'Torah', 'Ari', 'Rtam', '15', '21', '10', NULL, 2.71, 10.00, 2, 1, 4, 12, '2019-11-26', 'Yes', 'No', 'qwer', 'active'),
(38, 'P001038', 8, NULL, 'Torah', 'Ari', 'Rtam', '15', '21', '10', NULL, 2.71, 10.00, 2, 1, 4, 12, '2019-11-26', 'Yes', 'No', 'qwer', 'active'),
(39, 'P001039', 8, NULL, 'Torah', 'Ari', 'Rtam', '15', '21', '5', NULL, 0.00, 0.00, 2, 1, 2, 120, '2019-11-16', 'Yes', 'Yes', 'fdgfd', 'active'),
(40, 'P001040', 8, NULL, 'Torah', 'Chabad', 'Rtam', '15', '11', '5', NULL, 2.71, 10.00, 3, 1, 2, 7, '2019-11-22', 'Yes', 'Yes', 'qqwq', 'active'),
(41, 'P001041', 8, NULL, 'Tefilin', 'Sfaradi', 'Rashi', '15', '28', '8', NULL, 0.00, 0.00, 1, 1, 2, 12, '2019-11-29', 'Yes', 'No', 'sdwqdqdw', 'active'),
(42, 'P001042', 11, NULL, 'Mezuza', 'Ari', 'Rashi', '12', '21', '8', NULL, 0.00, 0.00, 6, 1, 2, 12, '2019-11-19', 'Yes', 'No', 'rrete', 'active'),
(43, 'P001043', 10, NULL, 'Tefilin', 'Ari', 'Rashi', '15', '21', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'Yes', 'ewqw', 'active'),
(44, 'P001044', 10, NULL, 'Tefilin', 'Sfaradi', 'Rashi', '12', '11', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '1970-01-01', 'Yes', 'No', 'ss', 'active'),
(45, 'P001045', 10, NULL, 'Mezuza', 'BeitYosef', 'Rashi', '12', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 7, '1970-01-01', 'No', 'Yes', 'w', 'active'),
(46, 'P001046', 10, NULL, 'Tefilin', 'Ari', 'Rtam', '12', '21', '5', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'Yes', 'we', 'active'),
(47, 'P001047', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '21', '5', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'No', 'Yes', 'qqe', 'active'),
(48, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(49, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(50, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(51, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(52, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(53, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(54, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(55, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(56, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(57, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(58, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(59, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(60, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(61, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(62, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(63, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(64, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(65, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(66, '', 10, NULL, 'Tefilin', 'Sfaradi', 'Rtam', '15', '42', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-20', 'Yes', 'No', 'dfd', 'active'),
(67, '', 10, NULL, 'Tefilin', 'Ari', 'Rtam', '15', '28', '8', NULL, 0.00, 0.00, 0, 0, 0, 7, '2019-11-20', 'No', 'Yes', 'adsd', 'active'),
(68, 'P001068', 10, NULL, 'Tefilin', 'Ari', 'Rtam', '15', '28', '8', NULL, 0.00, 0.00, 0, 0, 0, 7, '2019-11-20', 'No', 'Yes', 'adsd', 'active'),
(69, 'P001069', 10, NULL, 'Tefilin', 'Ari', 'Rtam', '12', '11', '8', NULL, 0.00, 0.00, 0, 0, 0, 12, '2019-11-19', 'Yes', 'No', 'rtr', 'active'),
(70, 'P001070', 8, NULL, 'Mezuza', 'Ari', 'Rashi', '10', '11', '5', NULL, 0.00, 0.00, 2, 1, 1, 11, '2019-11-20', 'Yes', 'No', 'good', 'active'),
(71, 'P001071', 8, NULL, 'Mezuza', 'Sfaradi', 'Rashi', '15', '11', '5', NULL, 3.25, 12.00, 2, 1, 2, 12, '1970-01-01', 'Yes', 'No', 'vfv', 'active'),
(72, '', 8, NULL, 'Tefilin', 'Sfaradi', 'Rashi', '12', '11', '5', NULL, 0.00, 0.00, 2, 0, 0, 1, '2019-11-20', 'Yes', 'Yes', 'good', 'active'),
(73, '', 8, NULL, 'Tefilin', 'Sfaradi', 'Rashi', '12', '11', '5', NULL, 0.00, 0.00, 2, 0, 0, 1, '2019-11-20', 'Yes', 'Yes', 'good', 'active'),
(74, '', 8, NULL, 'Tefilin', 'Sfaradi', 'Rashi', '12', '11', '5', NULL, 0.00, 0.00, 2, 0, 0, 1, '2019-11-20', 'Yes', 'Yes', 'good', 'active'),
(75, '', 8, NULL, 'Tefilin', 'Sfaradi', 'Rashi', '12', '11', '5', NULL, 0.00, 0.00, 2, 0, 0, 1, '2019-11-20', 'Yes', 'Yes', 'good', 'active'),
(76, '', 8, NULL, 'Tefilin', 'Sfaradi', 'Rashi', '12', '11', '5', NULL, 0.00, 0.00, 2, 0, 0, 1, '2019-11-20', 'Yes', 'Yes', 'good', 'active'),
(77, '', 8, NULL, 'Tefilin', 'Sfaradi', 'Rashi', '12', '11', '5', NULL, 0.00, 0.00, 2, 0, 0, 1, '2019-11-20', 'Yes', 'Yes', 'good', 'active'),
(78, '', 8, NULL, 'Tefilin', 'Sfaradi', 'Rashi', '12', '11', '5', NULL, 0.00, 0.00, 2, 0, 0, 1, '2019-11-20', 'Yes', 'Yes', 'good', 'active'),
(79, 'P001079', 8, NULL, 'Mezuza', 'Sfaradi', 'Rashi', '15', '11', '5', NULL, 0.00, 0.00, 0, 0, 0, 11, '2019-11-20', 'Yes', 'Yes', 'qwe', 'active'),
(80, 'P001080', 8, NULL, 'Tefilin', 'Ari', 'Rashi', '15', '11', '5', NULL, 0.00, 0.00, 1, 1, 0, 2, '2019-11-20', 'Yes', 'Yes', 'qwertyu', 'active'),
(81, 'P001081', 8, NULL, 'Mezuza', 'Ari', 'Rashi', '12', '11', '5', NULL, 0.00, 0.00, 0, 0, 0, 11, '2019-11-20', 'Yes', 'Yes', 'fhrthrt', 'active'),
(82, 'P001082', 8, NULL, 'Tefilin', 'Sfaradi', 'Rashi', '12', '21', '5', NULL, 0.00, 0.00, 0, 0, 0, 8, '2019-11-20', 'Yes', 'Yes', 'fgdfgd', 'active'),
(84, 'P001084', 8, NULL, 'Mezuza', 'Ari', 'Rashi', '12', '11', '5', NULL, 0.00, 0.00, 1, 1, 1, 11, '1970-01-01', 'Yes', 'No', 'good is Good', 'active'),
(85, 'P001085', 8, NULL, 'Mezuza', 'Sfaradi', 'Rashi', '10', '11', '5', NULL, 27.10, 100.00, 0, 0, 0, 0, '1970-01-01', 'Yes', 'Yes', '', 'active'),
(86, 'P001086', 8, NULL, 'Mezuza', 'Sfaradi', 'Rashi', '10', '11', '5', NULL, 2.71, 10.00, 0, 0, 0, 4, '1970-01-01', NULL, NULL, 'good', 'active'),
(87, 'P001087', 8, NULL, 'Mezuza', 'Sfaradi', 'Rashi', '12', '11', '', NULL, 2.71, 10.00, 0, 0, 0, 12, '2019-11-21', NULL, NULL, 'good', 'active'),
(88, 'P001088', 8, NULL, '', 'Ari', '', '', '', '', NULL, 0.00, 0.00, 0, 0, 0, 2, '1970-01-01', NULL, NULL, '', 'active'),
(89, 'P00101', 11, NULL, 'Mezuza', 'BeitYosef', 'Rashi', '12', '11', '10', NULL, 5.50, 20.30, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `img_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_img`, `type`, `img_date`, `status`) VALUES
(6, 84, 'uploads/products_img/0.19311800 1574234892.jpg', 'image', '2019-11-20 07:28:12', 'active'),
(8, 84, 'uploads/products_img/0.57263500 1574235996.mp4', 'video', '2019-11-20 07:46:36', 'active'),
(11, 85, 'uploads/products_img/0.06951800 1574243854.jpg', 'image', '2019-11-20 09:57:34', 'active'),
(12, 85, 'uploads/products_img/0.07023900 1574243854.mp4', 'video', '2019-11-20 09:57:34', 'active'),
(14, 86, 'uploads/products_img/0.12683600 1574314689.jpg', 'image', '2019-11-21 05:38:09', 'active'),
(15, 86, 'uploads/products_img/0.72562000 1574331707.jpg', 'image', '2019-11-21 10:21:47', 'active'),
(16, 86, 'uploads/products_img/0.72603900 1574331707.jpg', 'image', '2019-11-21 10:21:47', 'active'),
(17, 86, 'uploads/products_img/0.72639200 1574331707.jpg', 'image', '2019-11-21 10:21:47', 'active'),
(18, 87, 'uploads/products_img/0.98384700 1574340367.mp4', 'video', '2019-11-21 12:46:08', 'active'),
(19, 88, 'uploads/products_img/0.17878800 1574415130.jpg', 'image', '2019-11-22 09:32:10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `selling_to_customer`
--

CREATE TABLE `selling_to_customer` (
  `id` int(11) NOT NULL,
  `final_total_usd` float DEFAULT NULL,
  `final_total_isr` float DEFAULT NULL,
  `paid_usd` float DEFAULT NULL,
  `paid_isr` float DEFAULT NULL,
  `own_usd` float DEFAULT NULL,
  `own_isr` float DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selling_to_customer`
--

INSERT INTO `selling_to_customer` (`id`, `final_total_usd`, `final_total_isr`, `paid_usd`, `paid_isr`, `own_usd`, `own_isr`, `order_id`, `buyer_id`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, 420.05, 1550, 200, 738.03, 220.05, 812.02, NULL, 8, 1, '2019-11-28 06:39:19', '2019-11-28 06:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `selling_to_customer_products`
--

CREATE TABLE `selling_to_customer_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sell_price_usd` float DEFAULT NULL,
  `sell_price_isr` float DEFAULT NULL,
  `sub_total_usd` float DEFAULT NULL,
  `sub_total_isr` float DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selling_to_customer_products`
--

INSERT INTO `selling_to_customer_products` (`id`, `product_id`, `quantity`, `sell_price_usd`, `sell_price_isr`, `sub_total_usd`, `sub_total_isr`, `order_id`, `buyer_id`, `supplier_id`, `created_at`, `updated_at`) VALUES
(1, 15, 10, 29.81, 110, 298.1, 1100, 1, 8, 1, '2019-11-28 06:39:19', '2019-11-28 06:39:19'),
(2, 16, 2, 24.39, 90, 48.78, 180, 1, 8, 1, '2019-11-28 06:39:19', '2019-11-28 06:39:19'),
(3, 16, 3, 24.39, 90, 73.17, 270, 1, 8, 1, '2019-11-28 06:39:19', '2019-11-28 06:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('rn5kvq04tpm98m76g9g31oh88bj5jujc', '::1', 1574926736, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343932363733363b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d666c6173685f6d6573736167657c4e3b63757272656e7455726c7c733a34353a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f73656c6c696e672d746f2d6275796572223b),
('9u8c7um8pponl0115hcah1sbffv3e8re', '::1', 1574927058, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343932373035383b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d666c6173685f6d6573736167657c4e3b63757272656e7455726c7c733a35333a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f726563697074732d66726f6d2d6275796572223b),
('3nsnut0hun98jtof9heu2rur70n05r7p', '::1', 1574927450, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343932373435303b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d666c6173685f6d6573736167657c4e3b63757272656e7455726c7c733a35333a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f726563697074732d66726f6d2d6275796572223b),
('rqaq2md2f8nbohtg86m04fsf3kecd5da', '::1', 1574927756, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343932373735363b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d666c6173685f6d6573736167657c4e3b63757272656e7455726c7c733a35333a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f726563697074732d66726f6d2d6275796572223b),
('3u16ta0c0uebsne5fauhgcvct54auoce', '::1', 1574928099, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343932383039393b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d666c6173685f6d6573736167657c4e3b63757272656e7455726c7c733a35333a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f726563697074732d66726f6d2d6275796572223b),
('0rf0db6thbofkbkot6lfj8p4unvja73d', '::1', 1574928759, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343932383735393b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d666c6173685f6d6573736167657c4e3b63757272656e7455726c7c733a35383a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f73656c6c696e672d746f2d637573746f6d65722f616464223b),
('tvjkdb96l7ddn0jsi7dvgdptg0nu9e70', '::1', 1574929152, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343932393135323b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d666c6173685f6d6573736167657c4e3b63757272656e7455726c7c733a35383a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f73656c6c696e672d746f2d637573746f6d65722f616464223b),
('j20gqvl6209o7co5pu7815tq1s85qbla', '::1', 1574933065, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343933333036353b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d666c6173685f6d6573736167657c4e3b63757272656e7455726c7c733a35333a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f726563697074732d66726f6d2d6275796572223b5f5f63695f766172737c613a313a7b733a31333a22666c6173685f6d657373616765223b733a333a226e6577223b7d),
('s6dv25897osus52tqvao2hrf74deivgm', '::1', 1574933484, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343933333438343b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a35383a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f726563697074732d66726f6d2d62757965722f6c697374223b666c6173685f6d6573736167657c4e3b),
('ud5dblv86pvvjm95h72di6fc7v82vsok', '::1', 1574933979, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343933333937393b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a35383a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f726563697074732d66726f6d2d62757965722f6c697374223b666c6173685f6d6573736167657c4e3b),
('qg752e53k6b1qiaglisv2j8548e4e8fo', '::1', 1574934361, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343933343336313b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a35383a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f726563697074732d66726f6d2d62757965722f6c697374223b666c6173685f6d6573736167657c4e3b),
('r1p790o9nb06endv7rr0je0g5atmtobc', '::1', 1574936320, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343933363332303b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a35383a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f726563697074732d66726f6d2d62757965722f6c697374223b666c6173685f6d6573736167657c4e3b),
('l5a4urtlvq6u76c6e1ian6m989hoalso', '::1', 1574936692, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343933363639323b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a35383a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f726563697074732d66726f6d2d62757965722f6c697374223b666c6173685f6d6573736167657c4e3b),
('89ajpbmlfl96qjjlh8qu39pjc6obedu2', '::1', 1574937011, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343933373031313b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a35383a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f726563697074732d66726f6d2d62757965722f6c697374223b666c6173685f6d6573736167657c4e3b),
('dk5q1nruu6u7au5o4050a2apl3ob0tkv', '::1', 1574937702, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343933373730323b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a35383a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f726563697074732d66726f6d2d62757965722f6c697374223b666c6173685f6d6573736167657c4e3b),
('qdt1g1tqgfp7d0rhbo7g0b6a7jminkb2', '::1', 1574938021, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343933383032313b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a34383a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f70726f64756374732f6c697374223b666c6173685f6d6573736167657c4e3b),
('jcs9q6tjncfsrhgc502m9c8ohbk51qpg', '::1', 1574938414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343933383431343b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a34383a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f70726f64756374732f6c697374223b666c6173685f6d6573736167657c4e3b),
('tdcf6dv7jrdj4ang5sa0gp3o7nsla9gu', '::1', 1574939119, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343933393131393b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a34313a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f7265706f7274223b666c6173685f6d6573736167657c4e3b),
('9avsp9ugsk5oc9u6ig21fjcfsqkrv322', '::1', 1574939427, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343933393432373b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a34313a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f7265706f7274223b666c6173685f6d6573736167657c4e3b),
('rv9ov1gn03pjs4g7uamj88du3anpe1p6', '::1', 1574940594, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343934303539343b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a34313a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f7265706f7274223b666c6173685f6d6573736167657c4e3b),
('9fn73biponbfsppvvomqqoeii5lt3869', '::1', 1574941060, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343934313036303b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a34313a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f7265706f7274223b666c6173685f6d6573736167657c4e3b),
('kqvvlhnukkqt33rog95snn9vn9bddsv9', '::1', 1574941375, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343934313337353b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a34313a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f7265706f7274223b666c6173685f6d6573736167657c4e3b),
('brm6uspt735drg721h3jut7533ee341m', '::1', 1574942521, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343934323532313b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a34313a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f7265706f7274223b666c6173685f6d6573736167657c4e3b),
('pnt56eo4inkgqjvhksqv0q6qlej9i0f9', '::1', 1574942530, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343934323532313b61646d696e446174617c613a31383a7b733a323a226964223b733a313a2231223b733a393a2266697273746e616d65223b733a31303a22d799d7a9d7a8d790d79c223b733a383a226c6173746e616d65223b733a323a22d7a9223b733a353a22656d61696c223b733a31393a2269737261656c407368616b65642d672e636f6d223b733a383a2270617373776f7264223b733a33323a226531306164633339343962613539616262653536653035376632306638383365223b733a353a2270686f6e65223b733a303a22223b733a363a226d6f62696c65223b733a303a22223b733a373a2261646472657373223b733a303a22223b733a343a2263697479223b733a303a22223b733a373a22636f756e747279223b733a363a2249737261656c223b733a31313a2275736572696d6770617468223b733a34363a2275706c6f6164732f737570706c696572735f696d672f49535241454c4a50472d313534393534313134362e6a7067223b733a363a2272656d61726b223b733a303a22223b733a353a2273636f7065223b733a353a2241646d696e223b733a31313a226365727469666963617465223b4e3b733a353a2276616c6964223b4e3b733a32303a22636572746966696361746570686f746f70617468223b733a303a22223b733a363a22737461747573223b733a363a22616374697665223b733a393a22736974655f6c616e67223b733a323a22656e223b7d63757272656e7455726c7c733a34313a22687474703a2f2f6c6f63616c686f73742f66696c65735f6e657777312f61646d696e2f7265706f7274223b666c6173685f6d6573736167657c4e3b),
('i8bv9g3okkis4te79j7e9opjsss39934', '::1', 1574951600, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343935313630303b),
('vfosceh6e4ag9ruedlel3vkr0kla8rff', '::1', 1574952018, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343935323031383b),
('rorfpo7tr2oi26r2kpo3gr4b3j5k6qkb', '::1', 1574952130, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343935323031383b);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `variable_name` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `value` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `variable_name`, `label`, `value`) VALUES
(1, 'temp_login', 'TEMP_LOGIN_LABEL', 'No'),
(2, 'show_product_price', 'SHOW_PRODUCT_PRICE', 'Yes'),
(3, 'percent_cost_price', 'PERCENT_COST_PRICE', '10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userimgpath` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scope` enum('Customer','Supplier','Admin') COLLATE utf8_unicode_ci DEFAULT NULL,
  `certificate` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valid` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `certificatephotopath` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `phone`, `mobile`, `address`, `city`, `country`, `userimgpath`, `remark`, `scope`, `certificate`, `valid`, `certificatephotopath`, `status`) VALUES
(1, 'ישראל', 'ש', 'israel@shaked-g.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', 'Israel', 'uploads/suppliers_img/ISRAELJPG-1549541146.jpg', '', 'Admin', NULL, NULL, '', 'active'),
(4, 'יוסי', 'פישר', 'a0527611867@gmail.com', 'a3948ea37fb0036d05ca4c6ad78ebcb7', '', '0527611867', '', '', '', 'uploads/suppliers_img/IMG-20190203-WA0011JPG-1573592863.jpg', '', 'Admin', NULL, NULL, NULL, 'active'),
(8, 'יעקב משה ', 'שכטר', '', NULL, '', '', '', '', '', NULL, '', 'Supplier', 'Yes', 'No', NULL, 'active'),
(9, 'יצחק', 'רסקין', 'rabbiraskin@machonstam.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '+17189157092', '', '', 'Zimbabwe', 'uploads/suppliers_img/IMG-20190207-WA0046-1JPG-1550970001.jpg', '', 'Customer', NULL, NULL, NULL, 'active'),
(10, 'חיים', 'שכטר', '', NULL, '', '0547847883', '', '', '', NULL, '', 'Supplier', 'No', 'No', NULL, 'active'),
(11, 'צביקה', 'קוסטינר', '', NULL, '', '0504035241', '', '', '', NULL, '', 'Supplier', 'No', 'No', NULL, 'active'),
(12, 'מרים', 'פישר‬‎', 'miri2800@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '0527632234', '', '', '', NULL, '', 'Customer', NULL, NULL, NULL, 'active'),
(13, 'מיכאל ', 'שמחון', '', NULL, '', '0506730585', '', 'אשדוד', '', NULL, '', 'Admin', 'Yes', 'No', NULL, 'active'),
(14, 'הערשי ', 'וייספלד', '', NULL, '', '0527690523', '', '', '', NULL, '', 'Supplier', 'Yes', 'Yes', 'uploads/suppliers_img/IMG-20190220-WA0031JPG-1551047176.jpg', 'active'),
(15, 'משה', 'חזיזה', 'a1234@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '0527149495', '', 'מודיעין', '', NULL, '', 'Supplier', NULL, NULL, NULL, 'active'),
(16, 'שמואל', 'הררי', '', NULL, '', '0547633172', '', '', '', NULL, '', 'Supplier', 'No', 'No', NULL, 'active'),
(17, 'אופיר', 'קמיסה', '', NULL, '', '0549491600', '', 'אשדוד', 'Israel', NULL, '', 'Supplier', 'No', 'No', NULL, 'active'),
(18, 'אהרון', 'קוסטינר ', '', NULL, '', '', '', '', '', NULL, '', 'Supplier', 'No', 'No', NULL, 'active'),
(19, 'יחזקאל', 'פישר', 'a88888208@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '0528888208', '', '', '', NULL, '', 'Customer', NULL, NULL, NULL, 'active'),
(20, 'יונתן ', 'והדי', '', NULL, '', '0527686036', '', 'אשדוד', '', NULL, '', 'Supplier', 'Yes', 'Yes', NULL, 'active'),
(21, 'יוסלה', 'קליין', 'yf2800@gmail.com', NULL, '', '', '', '', '', NULL, '', 'Supplier', NULL, NULL, NULL, 'active'),
(22, 'מירי', 'בקנרוט', 'bb150720@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '', NULL, '', 'Customer', NULL, NULL, NULL, 'active'),
(23, 'מישה', 'קליין', '', NULL, '', '', '', '', '', NULL, '', 'Supplier', NULL, NULL, NULL, 'active'),
(24, 'Tushar', 'Vashishth', 'tushar.vashishth@newrise.in', '3e95963e00e9f790ab0a9edf9b28b8a3', NULL, '7737474427', NULL, NULL, NULL, NULL, NULL, 'Customer', NULL, NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_own_amount`
--

CREATE TABLE `user_own_amount` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` double(10,2) NOT NULL DEFAULT '0.00',
  `type` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_own_amount`
--

INSERT INTO `user_own_amount` (`id`, `user_id`, `amount`, `type`, `created_at`, `updated_by`) VALUES
(1, 11, 10.00, 'recipts', '2019-11-28 13:53:05', '2019-11-28 13:53:05'),
(2, 11, 10.00, 'recipts', '2019-11-28 14:58:24', '2019-11-28 14:58:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buying_supplier_order`
--
ALTER TABLE `buying_supplier_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buying_supplier_products`
--
ALTER TABLE `buying_supplier_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countrycode`);

--
-- Indexes for table `currency_rates`
--
ALTER TABLE `currency_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selling_to_customer`
--
ALTER TABLE `selling_to_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selling_to_customer_products`
--
ALTER TABLE `selling_to_customer_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_own_amount`
--
ALTER TABLE `user_own_amount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buying_supplier_order`
--
ALTER TABLE `buying_supplier_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buying_supplier_products`
--
ALTER TABLE `buying_supplier_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currency_rates`
--
ALTER TABLE `currency_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `selling_to_customer`
--
ALTER TABLE `selling_to_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `selling_to_customer_products`
--
ALTER TABLE `selling_to_customer_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_own_amount`
--
ALTER TABLE `user_own_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
