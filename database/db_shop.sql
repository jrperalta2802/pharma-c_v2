-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 06:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0
-- Generation Time: Feb 06, 2025 at 06:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPassword`, `level`) VALUES
(1, 'Admin', 'admin', 'admin@admin.com', '850721dea834fe36b29083291509c7ad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(6, 'Biogesic'),
(7, 'Tempra'),
(8, 'Advil'),
(9, 'Medicol'),
(10, 'Flanax'),
(12, 'Dolan FP'),
(13, 'Amoxil'),
(14, 'Zinnat'),
(15, 'Zithromax'),
(16, 'Flagyl'),
(17, 'Virlix'),
(18, 'Allerkid'),
(19, 'Claritin'),
(20, 'Benadryl'),
(21, 'Kremil-S'),
(22, 'Zantac'),
(23, 'Losec'),
(24, 'Pantoloc'),
(25, 'Imodium'),
(26, 'Diatabs'),
(27, 'Kaopectate'),
(28, 'Norvasc'),
(29, 'Lifezar'),
(30, 'Atacand'),
(31, 'Tenormin'),
(32, 'Glucophage'),
(33, 'Diamicron'),
(34, 'Humalog'),
(35, 'Lantus'),
(36, 'Zoloft'),
(37, 'Lexapro'),
(38, 'Xanax'),
(39, 'Prozac'),
(40, 'Tuseran'),
(41, 'Solmux'),
(42, 'Neozep'),
(43, 'Decolgen Forte'),
(44, 'Fern-C'),
(45, 'Cecon'),
(46, 'Centrum'),
(47, 'Enervon'),
(48, 'Caltrate'),
(49, 'Canesten'),
(50, 'Nizoral'),
(51, 'Diflucan'),
(52, 'Zovirax'),
(53, 'Tamiflu'),
(54, 'Trust Pills'),
(55, 'Depotrust'),
(56, 'Betadine'),
(57, 'Agua Oxigenada'),
(58, 'Ventolin'),
(59, 'Symbicort'),
(60, 'Singulair'),
(61, 'Visine'),
(62, 'Eye-Mo'),
(63, 'Otic Solution'),
(64, 'Locoid'),
(65, 'Bactroban'),
(66, 'Acretin'),
(67, 'Hydrite'),
(68, 'Pedialyte'),
(71, 'Engerix-B'),
(72, 'Salonpas'),
(73, 'Omega Pain Killer'),
(74, 'Thermacare'),
(75, 'Bandages'),
(76, 'Gauze'),
(77, 'Alcohol'),
(78, 'Medical tape'),
(79, 'Folart');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(11, 'Analgesics (Pain Relievers)'),
(12, 'Antipyretics (Fever Reducers)'),
(13, 'Antibiotics'),
(14, 'Antihistamines (For Allergies)'),
(15, 'Antacids and Anti-Ulcerants (For Stomach Issues)'),
(16, 'Antidiarrheals'),
(17, 'Antihypertensives (For High Blood Pressure)'),
(18, 'Antidiabetics'),
(19, 'Antidepressants and Anti-Anxiety Medications'),
(20, 'Cough and Cold Remedies'),
(21, 'Vitamins and Dietary Supplements'),
(22, 'Antifungal Medications'),
(23, 'Antiviral Medications'),
(24, 'Contraceptives and Reproductive Health'),
(25, 'Antiseptics and Wound Care'),
(26, 'Inhalers and Asthma Medications'),
(27, 'Eye Drops and Ear Drops'),
(28, 'Skin Medications'),
(29, 'Oral Rehydration Solutions (ORS)'),
(30, 'Topical Pain Relief and Liniments'),
(31, 'First-Aid and Medical Supplies'),
(32, 'Vaccines');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(2, 'Jane Doe', 'Tramo', 'Pasig', 'Philippines', '3014', '0912-345-6789', 'test@test.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(25, 'Acyclovir', 23, 52, '<p>Acyclovir is an antiviral medicine commonly used for the following conditions caused by herpes viruses.&nbsp;Genital herpes, a&nbsp;sexually transmitted disease,&nbsp;Cold sores,&nbsp;Shingles,&nbsp;Chickenpox, Herpes simplex&nbsp;encephalitis, a swelling of the brain. Acyclovir may also be used for other conditions as determined by your healthcare provider.</p>', 40.00, 'uploads/6846e337af.jpg', 1),
(26, 'Alcohol', 31, 77, '<p>For disinfection, sterilization, body massage, relief of prickly heat and insect bites, hygienic purposes or general antiseptic. For use in hospital and sick room or everyday hygiene.</p>', 61.00, 'uploads/d79e1773c7.jpg', 1),
(27, 'Alprazolam', 19, 38, '<p>Alprazolam is commonly used to treat the following conditions.&nbsp;Anxiety&nbsp;, Panic disorder&nbsp;with or without the fear of open spaces, also called&nbsp;agoraphobia. Alprazolam may also be used for other conditions as determined by your healthcare provider.</p>', 42.50, 'uploads/156092b5e0.jpg', 1),
(28, 'Aluminum Hydroxide ', 15, 21, '<p>Kremil-S Tablet provides relief for mild symptoms of hyperacidity, such as stomach pain, pangangasim, and bloating. It neutralizes stomach acid in as fast as 5 minutes and relief lasts up to 2 hours.</p>', 9.00, 'uploads/13b0d12804.jpg', 1),
(29, 'Amlodipine', 17, 28, '<p>Amlodipine is commonly used for the following conditions.</p>\r\n<ul>\r\n<li>High blood pressure (hypertension)</li>\r\n<li>Coronary artery disease, which is a type of heart disease</li>\r\n<li>Angina, which is a type of chest pain</li>\r\n</ul>\r\n<p>Amlodipine may also be used for other conditions as determined by your healthcare provider.</p>', 21.75, 'uploads/de9dcba3b4.jpg', 1),
(30, 'Amoxicillin', 13, 13, '<p>Amoxicillin is used to treat a wide variety of&nbsp;bacterial infections. This&nbsp;medication&nbsp;is a&nbsp;penicillin-type antibiotic. It works by stopping the growth of bacteria.This antibiotic treats only bacterial infections. It will not work for&nbsp;viral infections&nbsp;(such as&nbsp;common cold,&nbsp;flu). Using any antibiotic when it is not needed can cause it to not work for future infections.Amoxicillin is also used with other&nbsp;medications&nbsp;to treat&nbsp;stomach/intestinal ulcers caused by the bacteria H. pylori and to prevent the ulcers from returning.</p>', 20.25, 'uploads/08cfe9defe.jpg', 1),
(31, 'Ascorbic Acid (Vitamin C)', 21, 44, '<p>It is used for the prevention and treatment of vitamin C deficiency. It hastens wound healing and increases body resistance from infectious diseases. For healthy gums, teeth, bones, and other connective tissues.</p>', 9.25, 'uploads/f88732834c.png', 1),
(32, 'Ascorbic Acid (Vitamin C)', 21, 45, '<p>Ascorbic Acid (Cecon) helps adults treat and prevent Vitamin C deficiency, for everyday immunity and protection. It&rsquo;s a chewable, orange-flavoured tablet that easily fits into your daily routine.</p>', 10.40, 'uploads/0b3003e17a.png', 1),
(33, 'Atenolol', 17, 31, '<p>Atenolol is a beta-blocker medication that treats high blood pressure. It also prevents chest pain and further damage after a heart attack. It works by lowering your blood pressure and heart rate. This makes it easier for your heart to pump blood. The brand name of this medication is Tenormin&reg;.</p>', 6.50, 'uploads/d6900023d7.jpg', 1),
(34, 'Azithromycin', 13, 15, '<p>Azithromycin is an antibiotic medication that treats bacterial infections. It doesn&rsquo;t treat colds, the flu or viral infections. The brand name of this medication is Zithromax&reg;.</p>', 121.50, 'uploads/068f019de0.jpg', 1),
(35, 'Bandage', 31, 75, '<p>A bandage is used&nbsp;in combination with a dressing where a wound is present. A roller bandage is used to secure a dressing in place. A triangular bandage is used as an arm sling or as a pad to control bleeding.</p>', 66.00, 'uploads/8713a9df1c.jpg', 1),
(36, 'Bismuth Subsalicylate ', 16, 27, '<p>A medication used to treat various conditions in the stomach and intestines, including heartburn, upset stomach, discomfort, nausea, and diarrhea.</p>', 24.98, 'uploads/78f45b8f55.jpg', 1),
(37, 'Budesonide', 26, 59, '<p>SYMBICORT is for the treatment of asthma in patients 6 years and older whose asthma is not well-controlled with an asthma-control medicine such as an inhaled corticosteroid (ICS) or whose asthma warrants treatment with both an ICS and a long-acting beta2-adrenergic agonist (LABA).</p>', 934.50, 'uploads/de026cce57.jpg', 1),
(38, 'Calcium with Vitamin D ', 21, 48, '<p>Caltrate&nbsp;600+D3&nbsp;offers the highest level of vitamin D3&dagger;&nbsp;to help maximize calcium absorption and support healthy bones, joints and muscles, so you can live life to the fullest. Sufficient calcium &amp; vitamin D as part of a healthy diet may reduce the risk of osteoporosis.&nbsp;</p>\r\n<p>Calcium not only nourishes your bones, but also plays a role in:</p>\r\n<ul>\r\n<li>Nerves</li>\r\n<li>Hormones</li>\r\n<li>Muscles</li>\r\n<li>Teeth</li>\r\n</ul>', 8.75, 'uploads/44dbbe7412.jpg', 1),
(39, 'Candesartan', 17, 30, '<p>Candesartan is commonly used for the following conditions.</p>\r\n<ul>\r\n<li>High blood pressure (hypertension)&nbsp;</li>\r\n<li>Heart failure, to lower the risk of hospitalization and death for heart failure and heart damage&nbsp;</li>\r\n</ul>\r\n<p>Candesartan may also be used for other conditions as determined by your healthcare provider.</p>', 22.50, 'uploads/6cd3914129.png', 1),
(40, 'Capsaicin Cream ', 30, 74, '<p>Capsaicin is a medicated pain reliever cream, lotion or solution. It treats muscle and joint pain. You can apply this cream as directed on your skin near your muscle or joint that causes you pain.</p>', 120.00, 'uploads/29a66ff43c.png', 1),
(41, 'Cefuroxime', 13, 14, '<p>Cefuroxime is used to treat bacterial infections in many different parts of the body. It belongs to the class of medicines known as cephalosporin antibiotics. It works by killing bacteria or preventing their growth. However, this medicine will not work for colds, flu, or other virus infections.</p>\r\n<p>This medicine is available only with your doctor\'s prescription.</p>\r\n<p>This product is available in the following dosage forms:</p>\r\n<ul>\r\n<li>Tablet</li>\r\n<li>Powder for Suspension</li>\r\n</ul>', 76.00, 'uploads/ab0c37f907.jpg', 1),
(42, 'Cetirizine', 14, 18, '<p>Relief of symptoms associated with allergic rhinitis (hay fever) such as sneezing, runny or itchy nose, and itchy, red, watery eyes; Relief of allergic symptoms of urticaria (hives or nettle rash) such as itching and redness.</p>', 288.25, 'uploads/def5d68f46.png', 1),
(43, 'Cetirizine', 14, 17, '<p>For the relief of symptoms associated with allergic rhinitis or sneezing, runny nose, itchy nose, watery eyes, allergic conjunctivitis, urticaria and pruritus.</p>', 34.00, 'uploads/ce73b2c480.png', 1),
(44, 'Clotrimazole (Topical)', 22, 49, '<p>Known as alipunga, athlete\'s foot is a fungal skin infection caused by fungi that thrive in warm and moist environments like changing rooms, showers and public pools. Walking barefoot in these places puts you at greater risk. Athlete&rsquo;s foot usually occurs between your toes, but it can also affect the soles and sides of your feet.</p>', 394.00, 'uploads/bb7753f4a1.png', 1),
(45, 'Dextromethorphan', 20, 40, '<p>Tuseran&reg;&nbsp;Forte contains a Total Cough Relief Formula that relieves dry, non-stop cough, itchy throat (due to postnasal drip) and throat pain.</p>\r\n<p>It&rsquo;s formulated with these clinically-proven ingredients: .</p>\r\n<ul>\r\n<li>Dextromethorphan HBr &ndash; antitussive that stops non-stop cough</li>\r\n<li>Phenylpropanolamine HCl &ndash; clears obstructed air passages and nasal sinuses due to congestion. It also reduces post-nasal drip that causes itchy throat.</li>\r\n<li>Paracetamol &ndash; effective fever reducer and pain reliever</li>\r\n</ul>\r\n<p>If symptoms persist, consult your doctor.</p>', 8.00, 'uploads/59787e77e3.png', 1),
(46, 'Diphenhydramine', 14, 20, '<p>Use BENADRYL&reg; Allergy ULTRATABS&reg; Tablets with 25 mg of diphenhydramine HCI, which are antihistamine allergy tablets, for effective relief from both indoor and outdoor allergies. Reduce symptoms related to hay fever or other upper respiratory allergies including runny nose, sneezing, itchy, watery eyes, and itchy nose or throat as well as symptoms of the common cold including sneezing and runny nose.</p>', 26.88, 'uploads/b56c9bca22.jpg', 1),
(47, 'Escitalopram', 19, 37, '<p>Escitalopram&nbsp;is commonly used to treat&nbsp;depression&nbsp;and&nbsp;anxiety.</p>\r\n<p>Escitalopram may also be used for other conditions as determined by your healthcare provider.</p>', 16.74, 'uploads/89a4185f6c.jpg', 1),
(48, 'Ethinyl Estradiol with Levonorgestrel ', 24, 54, '<p>Ethinylestradiol + Levonorgestrel + Ferrous Fumarate (TRUST PILL) is&nbsp;a safe and easy to use contraceptive pill. It is also used in the treatment of menstrual disorders such as painful menstruation, menstrual cycle symptoms, and excessive uterine bleeding.</p>', 2.11, 'uploads/978bfc7107.jpg', 1),
(49, 'Fluconazole', 22, 51, '<p>FLUCONAZOLE (floo KON na zole) prevents and treats fungal or yeast infections. It belongs to a group of medications called antifungals. It will not prevent or treat colds, the flu, or infections caused by bacteria or viruses.</p>', 39.50, 'uploads/1757e61a3d.jpg', 1),
(50, 'Fluoxetine', 19, 39, '<p>Fluoxetine is commonly used for the following conditions.</p>\r\n<ul>\r\n<li>Depression</li>\r\n<li>Panic disorder</li>\r\n<li>Obsessive-compulsive disorder (OCD)</li>\r\n<li>Bulimia, which is an eating disorder</li>\r\n<li>Premenstrual dysphoric disorder (PMDD), which is a condition similar to premenstrual syndrome (PMS) but is more serious&nbsp;</li>\r\n</ul>\r\n<p>Fluoxetine may also be used for other conditions as determined by your healthcare provider.</p>', 26.80, 'uploads/83bc740bd7.jpg', 1),
(51, 'Folic Acid ', 21, 79, '<p>For the prevention and treatment of folic acid deficiencies. As supplement before and during pregnancy. As adjunct to treatment of other conditions such as anemia, gingivitis, alcoholism, and heart disease.</p>', 11.25, 'uploads/1f5ff1cf97.jpg', 1),
(52, 'Gauze', 31, 76, '<p>Sterilized rolled gauze made from absorbent cotton material used for wound protection. High-absorbent cotton material of the gauze bandage helps in absorbing blood and other secretions of a wound or injury, and also helps keep it clean from germs and infections.</p>', 7.00, 'uploads/27e859452e.jpg', 1),
(53, 'Gliclazide', 18, 33, '<p>Gliclazide (Diamicron) is an oral medication used to help control blood sugar levels in people with type 2 diabetes. It is classified as a sulfonylurea drug, which works by stimulating the pancreas to release more insulin. This helps lower blood sugar levels after meals and throughout the day.</p>', 31.00, 'uploads/9fab2cf0d0.png', 1),
(54, 'Guaifenesin', 20, 41, '<p>Guaifenesin is an expectorant commonly used to treat chest congestion associated with colds, flu, and other respiratory conditions. It helps thin and loosen mucus in the airways, making it easier to cough up and clear out.</p>', 163.53, 'uploads/307acafefe.png', 1),
(55, 'Hepatitis B Vaccine (Engerix-B) ', 32, 71, '<p>Hepatitis B Vaccine (Engerix-B) is a vaccine used to prevent infection caused by the Hepatitis B virus (HBV). It is part of a series of immunizations that helps protect individuals from developing acute or chronic hepatitis B, which can lead to liver failure, cirrhosis, and liver cancer.</p>', 803.00, 'uploads/05236adb4c.jpg', 1),
(56, 'Oral Rehydration Salts ', 29, 67, '<p>This medicine is used in the treatment of children and adults with dehydration due to diarrhea (except those with severe dehydration).<br />This medicine replaces fluid and electrolytes (body salts) lost due to diarrhea and/or vomiting.</p>', 35.00, 'uploads/6b5c873de9.png', 1),
(57, 'Hydrocortisone', 28, 64, '<p>Hydrocortisone is a medication that contains hydrocortisone, a corticosteroid used to treat various conditions involving inflammation and immune system responses. It is available in various forms, including oral tablets, topical creams, and injectable forms.</p>', 215.00, 'uploads/2ea5a2fcd3.jpg', 1),
(58, 'Hydrogen Peroxide ', 25, 57, '<p>Hydrogen Peroxide (Agua Oxigenada) is a common chemical compound with the formula H?O?, which consists of water (H?O) and an extra oxygen molecule (O). It appears as a colorless liquid and is widely used for its disinfectant, antiseptic, and bleaching properties. In Spanish-speaking regions, it&rsquo;s often referred to as \"Agua Oxigenada\".</p>', 31.50, 'uploads/0cb90a99e6.jpg', 1),
(59, 'Ibuprofen', 11, 8, '<p>Used in the relief of mild to moderate pain &amp; inflammation associated w/ dysmenorrhea, headache including migraine, post-op &amp; dental pain, musculoskeletal &amp; joint disorders eg, ankylosing spondylitis, OA &amp; RA including juvenile idiopathic arthritis. Periarticular disorders eg, bursitis &amp; tenosynovitis &amp; soft tissue disorders eg, sprains &amp; strains. Reduction of fever.</p>', 9.00, 'uploads/28f5c535f4.jpg', 1),
(60, 'Ibuprofen', 12, 9, '<p>For different types of pain like headache, migraine, toothache, dysmenorrhea, body pain or arthritis, get fast relief with Medicol&reg;,. It starts working in 5 minutes, relief in 15 minutes.</p>', 12.25, 'uploads/69babb150d.jpg', 1),
(61, 'Insulin', 18, 34, '<p>Humalog 100 units/ml KwikPen is a rapid-acting insulin designed to swiftly reduce blood glucose levels in diabetic patients. It acts faster than regular human insulin due to molecular modifications. This insulin is used when the pancreas doesn\'t produce enough insulin to regulate glucose effectively. Unlike longer-acting insulins, Humalog lasts for 2 to 5 hours and is ideally taken within 15 minutes of a meal.</p>\r\n<p>It can be prescribed alongside longer-acting insulins to maintain glucose control throughout the day. The KwikPen is a prefilled, disposable device containing 3 ml of insulin lispro (300 units at 100 units/ml). Each pen allows for doses from 1 to 60 units, displayed in a window for accuracy. It is suitable for both adults and children with diabetes, but any adjustments in insulin regimen should be overseen by a healthcare provider to ensure safety and effectiveness.</p>\r\n<p>&nbsp;</p>\r\n<p>What are the side-effects of HUMALOG KWIKPEN Insulin Lispro 100U/mL?<br />Like all medicines, this medicine can cause side effects, although not everybody gets them.<br />Systemic allergy is&nbsp;rare. The symptoms are as follows:</p>\r\n<ul>\r\n<li>rash over the whole body</li>\r\n<li>blood pressure dropping</li>\r\n<li>difficulty in breathing</li>\r\n<li>heart beating fast</li>\r\n<li>wheezing</li>\r\n<li>sweating</li>\r\n<li>If you think you are having this sort of insulin allergy with Humalog 100 units/ml KwikPen, tell your doctor at once.</li>\r\n</ul>\r\n<p>Local allergy reactions are&nbsp;common&nbsp;with insulin use such as redness, swelling, or itching around the injection site and typically resolve within a few days to weeks. It\'s important to inform your doctor if you experience these symptoms.</p>', 420.00, 'uploads/23d774eb67.png', 1),
(62, 'Insulin', 18, 35, '<p>LANTUS Insulin Glargine 100IU 10ml Solution for Injection [PRESCRIPTION REQUIRED]&nbsp;Available In Click &amp; Collect Express Only<br />Lantus is used to treat diabetes mellitus in adults,<br />adolescents and children aged 2 years and above.<br />Diabetes mellitus is a disease where your body<br />does not produce enough insulin to control the<br />level of blood sugar. Insulin glargine has a long and<br />steady blood-sugar-lowering action.</p>\r\n<p>REMINDER: A doctor?s prescription is required to purchase this product. To avoid delay in delivery or cancellation of your order (before the item is SHIPPED); please email a copy of your prescription (.jpeg or .pdf file format) to OnlinePharmacy@watsons.com.ph with your order number after Checkout. Our pharmacist will also get in touch with you to validate your prescription. Please be ready to show your original prescription upon claiming/delivery of your order.</p>', 1650.00, 'uploads/82d5dce9dc.jpg', 1),
(63, 'Loperamide', 16, 26, '<p>Used in the treatment of acute non-specific diarrhea, chronic diarrhea associated with inflammatory bowel disease. Reduction of number and vol of discharge in patients with ileostomies and colostomies.</p>', 8.50, 'uploads/fb4caa76f6.jpg', 1),
(64, 'Loperamide', 16, 25, '<p>Loperamide is used for:</p>\r\n<ul>\r\n<li>Acute diarrhea &ndash; Short-term diarrhea caused by infections, food poisoning, or dietary changes.</li>\r\n<li>Chronic diarrhea &ndash; Long-term diarrhea associated with conditions like irritable bowel syndrome (IBS) or inflammatory bowel disease (IBD).</li>\r\n<li>Traveler&rsquo;s diarrhea &ndash; Diarrhea caused by consuming contaminated food or water while traveling.</li>\r\n<li>Post-surgery diarrhea &ndash; In patients who have had intestinal surgery (e.g., ileostomy).</li>\r\n</ul>', 19.25, 'uploads/655bd9fe2b.jpg', 1),
(65, 'Loratadine', 14, 19, '<div>Loratadine is used for the relief of:</div>\r\n<ul>\r\n<li>Allergic Rhinitis (Hay Fever) &ndash; Sneezing, runny nose, itchy nose, watery eyes.</li>\r\n<li>Skin Allergies (Urticaria/Hives) &ndash; Red, itchy, swollen skin caused by allergens.</li>\r\n<li>Other Allergic Reactions &ndash; Mild reactions to insect bites, pet dander, dust, pollen, and mold.</li>\r\n<li>Chronic Idiopathic Urticaria &ndash; Long-term hives with no known cause.</li>\r\n</ul>', 38.25, 'uploads/6ae581d730.jpg', 1),
(66, 'Losartan', 17, 29, '<p>An angiotensin II receptor blocker (ARB) used primarily to treat high blood pressure (hypertension) and protect the kidneys in patients with diabetes. It helps lower blood pressure by relaxing blood vessels, making it easier for the heart to pump blood.</p>', 25.25, 'uploads/5493313a91.jpg', 1),
(67, 'Medical Tape (2.5cm x 5m)', 31, 78, '<p>Medical tapes are essential tools in healthcare, used for securing dressings, catheters, and other medical devices to the skin. In the Philippines, a variety of medical tapes are available, each designed to meet specific medical needs.</p>', 91.00, 'uploads/b198aca674.jpg', 1),
(68, 'Medroxyprogesterone', 24, 55, '<p>Medroxyprogesterone acetate, commonly known by the brand name Depo-Provera, is a hormonal contraceptive administered via injection. It provides effective birth control for approximately 12 weeks per dose.</p>', 140.25, 'uploads/ca390af7d5.png', 1),
(69, 'Metformin', 18, 32, '<p>Metformin, marketed under the brand name Glucophage, is an oral antihyperglycemic medication primarily used to manage type 2 diabetes mellitus. It helps control blood sugar levels by decreasing hepatic glucose production, reducing intestinal absorption of glucose, and enhancing insulin sensitivity.</p>', 3.50, 'uploads/85bf9d2370.jpg', 1),
(70, 'Methyl Salicylate ', 30, 73, '<p>Omega Pain Killer is a topical liniment widely used in the Philippines for the relief of various musculoskeletal discomforts. Its active ingredients include methyl salicylate, camphor, menthol, eucalyptol, and turpentine oil, which work synergistically to provide analgesic and anti-inflammatory effects</p>', 110.25, 'uploads/5ff6fd8f1a.jpg', 1),
(71, 'Methyl Salicylate ', 30, 72, '<p>Salonpas is a well-known brand offering topical analgesic products containing active ingredients like methyl salicylate and menthol. These products are designed to provide temporary relief from minor aches and pains associated with muscles and joints, such as backaches, arthritis, strains, bruises, and sprains.</p>', 63.31, 'uploads/4db08be9c3.png', 1),
(72, 'Metronidazole', 13, 16, '<p>Metronidazole, commonly known by the brand name Flagyl, is an antibiotic and antiprotozoal medication used to treat various infections, including those of the gastrointestinal tract, reproductive system, skin, and oral cavity. It is effective against anaerobic bacteria and certain parasites.</p>', 14.00, 'uploads/49b89e3fc2.png', 1),
(73, 'Montelukast', 26, 60, '<p>Montelukast, marketed under the brand name Singulair, is a medication used to prevent and manage asthma symptoms and to alleviate seasonal allergies. It works by blocking leukotrienes&mdash;chemicals in the body that cause inflammation in the airways&mdash;thereby reducing swelling and constriction in the lungs. This action helps prevent asthma attacks and eases allergy symptoms.</p>', 32.00, 'uploads/9fec9ae677.png', 1),
(74, 'Multivitamins', 21, 46, '<p>Centrum is a well-known multivitamin brand offering a range of products designed to support overall health. These multivitamins contain a comprehensive blend of essential vitamins and minerals, including Vitamin A, Vitamin C, Vitamin D, Vitamin E, B-vitamins, calcium, magnesium, and zinc, among others. They are formulated to help fill nutritional gaps and support various bodily functions, such as immune health, energy production, and bone health.</p>', 299.00, 'uploads/d63014d5b4.jpg', 1),
(75, 'Multivitamins', 21, 47, '<p>Enervon is a well-known multivitamin supplement in the Philippines, formulated to support overall health by providing essential vitamins and minerals. It contains a combination of B-complex vitamins and Vitamin C, which are vital for energy production, immune function, and overall well-being.</p>', 199.00, 'uploads/b22ceaf09c.jpg', 1),
(76, 'Mupirocin', 28, 65, '<p>Mupirocin, marketed under the brand name Bactroban, is a topical antibiotic ointment used to treat bacterial skin infections such as impetigo, folliculitis, and infected eczema. It works by inhibiting bacterial protein synthesis, effectively stopping the growth of bacteria.</p>', 452.47, 'uploads/0af5fc8996.jpg', 1),
(77, 'Naproxen', 11, 10, '<p>Flanax is a brand of naproxen sodium, a nonsteroidal anti-inflammatory drug (NSAID) used to relieve pain and reduce inflammation. It is commonly used to treat conditions such as headaches, muscle aches, back pain, menstrual cramps, and minor arthritis pain. Naproxen works by inhibiting the production of prostaglandins, chemicals in the body that promote inflammation, pain, and fever.</p>', 12.55, 'uploads/45f640b9b1.jpg', 1),
(78, 'Omeprazole', 15, 23, '<p>Losec is a brand name for omeprazole, a proton pump inhibitor (PPI) used to reduce stomach acid production. It\'s commonly prescribed for conditions such as gastroesophageal reflux disease (GERD), peptic ulcers, and Zollinger-Ellison syndrome. By inhibiting the proton pump in the stomach lining, omeprazole decreases acid secretion, promoting healing and alleviating symptoms associated with these conditions.</p>', 37.00, 'uploads/b427f598d2.png', 1),
(79, 'Oseltamivir', 23, 53, '<p>Oseltamivir, marketed under the brand name Tamiflu, is an antiviral medication used to treat and prevent influenza (flu) in individuals aged 2 weeks and older. It is most effective when administered within 48 hours of the onset of flu symptoms, helping to reduce the severity and duration of the illness.</p>', 11.75, 'uploads/badfa0f104.jpg', 1),
(80, 'Pantoprazole', 15, 24, '<p>Pantoloc is a brand name for pantoprazole, a proton pump inhibitor (PPI) used to reduce stomach acid production. It\'s commonly prescribed for conditions such as gastroesophageal reflux disease (GERD), stomach and intestinal ulcers, and other acid-related disorders. By inhibiting the proton pumps in the stomach lining, pantoprazole decreases acid secretion, promoting healing and alleviating symptoms associated with these conditions.</p>', 8.30, 'uploads/b74fe97e25.jpg', 1),
(81, 'Paracetamol', 11, 6, '<p>Paracetamol is a medicine used to treat mild to moderate pain. Paracetamol can also be used to treat fever (high temperature). It\'s dangerous to take more than the recommended dose of paracetamol. Paracetamol overdose can damage your liver and cause death.</p>', 4.25, 'uploads/e46847b025.jpg', 1),
(82, 'Paracetamol', 12, 7, '<p>Tempra is a well-known brand of paracetamol in the Philippines, commonly used to alleviate mild to moderate pain and reduce fever. It is available in various formulations to cater to different age groups and preferences.</p>', 172.50, 'uploads/861bfdf867.jpg', 1),
(83, 'Mild 30 ', 29, 68, '<p>Pedialyte is an oral rehydration solution designed to prevent and treat dehydration by replenishing fluids and electrolytes lost due to vomiting, diarrhea, excessive sweating, or other causes. It is suitable for both children and adults.</p>', 138.75, 'uploads/9cecba452b.png', 1),
(84, 'Phenylephrine', 20, 42, '<p>Neozep is a widely used over-the-counter medication in the Philippines, formulated to provide relief from common cold symptoms such as nasal congestion, runny nose, sneezing, headache, body aches, and fever. It combines multiple active ingredients to address these symptoms effectively.</p>', 6.75, 'uploads/7bc7115067.jpg', 1),
(85, 'Polymyxin B with Neomycin ', 27, 63, '<p>Polymyxin B and Neomycin otic solutions are antibiotic ear drops used to treat bacterial infections of the external ear canal. These medications work by inhibiting the growth of bacteria, thereby reducing infection and associated symptoms.</p>', 440.00, 'uploads/c912960ff6.jpg', 1),
(86, 'Povidone-Iodine ', 25, 56, '<p>Povidone-Iodine, commonly known by the brand name Betadine, is a widely used antiseptic solution effective against a broad spectrum of pathogens. It\'s primarily utilized for the prevention and treatment of infections in minor cuts, wounds, and burns.</p>', 284.25, 'uploads/fbe1af8b3e.jpg', 1),
(87, 'Pseudoephedrine', 20, 43, '<p>Decolgen&reg; Forte is a combination medication formulated to alleviate symptoms associated with the common cold, sinusitis, and other minor respiratory tract infections. It effectively addresses clogged nose, headache, body aches, fever, runny nose, sneezing, and postnasal drip.</p>', 4.65, 'uploads/0a73267a1b.jpg', 1),
(88, 'Ranitidine', 15, 22, '<p>Ranitidine, marketed under the brand name Zantac, is a medication used to reduce stomach acid production. It was commonly prescribed for conditions such as gastroesophageal reflux disease (GERD), ulcers, and Zollinger-Ellison syndrome. Ranitidine belongs to a class of drugs known as H2 blockers, which work by blocking histamine receptors in the stomach lining, thereby decreasing acid secretion.</p>', 45.00, 'uploads/b8f902b2e5.png', 1),
(89, 'Salbutamol', 26, 58, '<p>Salbutamol, commonly known by the brand name Ventolin, is a bronchodilator medication used to relieve bronchospasm associated with conditions such as asthma and chronic obstructive pulmonary disease (COPD). It works by relaxing the muscles in the airways, allowing for easier breathing.</p>', 514.50, 'uploads/d30748d730.jpg', 1),
(90, 'Sertraline', 19, 36, '<p>Sertraline, marketed under the brand name Zoloft, is a selective serotonin reuptake inhibitor (SSRI) used to treat various mental health conditions, including:</p>\r\n<ul>\r\n<li>Major Depressive Disorder (MDD): A mood disorder characterized by persistent feelings of sadness and loss of interest.</li>\r\n<li>Obsessive-Compulsive Disorder (OCD): A condition involving unwanted repetitive thoughts and behaviors.</li>\r\n<li>Panic Disorder: Characterized by sudden and repeated attacks of intense fear.</li>\r\n<li>Social Anxiety Disorder: An intense fear of social situations.</li>\r\n<li>Post-Traumatic Stress Disorder (PTSD): A mental health condition triggered by a terrifying event.</li>\r\n<li>Premenstrual Dysphoric Disorder (PMDD): A severe form of premenstrual syndrome.</li>\r\n</ul>\r\n<p>Sertraline works by increasing the levels of serotonin, a neurotransmitter in the brain that helps regulate mood, anxiety, and other functions.</p>', 13.88, 'uploads/e0ae03b750.jpg', 1),
(91, 'Tetrahydrozoline', 27, 62, '<p>Eye Mo Red Eyes Formula is an over-the-counter ophthalmic solution containing Tetrahydrozoline Hydrochloride 0.05%, designed to provide quick relief from eye redness and minor discomfort caused by irritants such as smog, swimming, dust, or smoke.</p>', 95.00, 'uploads/56fa6e3a00.png', 1),
(92, 'Tetrahydrozoline', 27, 61, '<p>Tetrahydrozoline is the active ingredient in Visine eye drops, which are used to temporarily treat eye redness and irritation. Tetrahydrozoline is a vasoconstrictor that narrows blood vessels in the eye to reduce redness</p>', 183.00, 'uploads/cb26672306.png', 1),
(93, 'Tretinoin', 28, 66, '<p>Acretin is a topical cream containing tretinoin, a derivative of vitamin A, commonly used to treat acne vulgaris. It works by promoting skin cell turnover, helping to keep pores clear and reduce the formation of acne lesions</p>', 350.00, 'uploads/0c2d2a314a.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wlist`
--

CREATE TABLE `tbl_wlist` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tbl_wlist`
--
ALTER TABLE `tbl_wlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
