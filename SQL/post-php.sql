-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 06, 2024 at 04:31 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `post-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_pass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `created_at`) VALUES
(1, 'Admin', 'admin@admin.com', 'QJIsuUAAI/bO+86OVjYqWQ==', '2024-06-06 09:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `file_downloads`
--

CREATE TABLE `file_downloads` (
  `id` int NOT NULL,
  `file_id` int NOT NULL,
  `download_count` int DEFAULT '0',
  `last_downloaded` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `file_downloads`
--

INSERT INTO `file_downloads` (`id`, `file_id`, `download_count`, `last_downloaded`) VALUES
(1, 137, 3, '2024-09-06 15:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `file_views`
--

CREATE TABLE `file_views` (
  `id` int NOT NULL,
  `file_id` int NOT NULL,
  `view_count` int DEFAULT '0',
  `last_view` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `file_views`
--

INSERT INTO `file_views` (`id`, `file_id`, `view_count`, `last_view`) VALUES
(1, 137, 2, '2024-09-06 16:04:15'),
(2, 136, 1, '2024-09-06 16:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `user_org` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_name`, `ip`, `user_org`, `created_at`) VALUES
(2, 'Banglalink', '127.0.0.1', 17, '2024-09-05 17:32:27'),
(3, 'Banglalink', '127.0.0.1', 17, '2024-09-06 04:40:50'),
(4, 'Banglalink', '127.0.0.1', 17, '2024-09-06 08:30:49'),
(5, 'Airtel', '127.0.0.1', 16, '2024-09-06 14:34:43'),
(6, 'qurugijo', '127.0.0.1', 16, '2024-09-06 14:37:47'),
(7, 'wamamixe', '127.0.0.1', 17, '2024-09-06 14:45:02'),
(8, 'wopivy', '127.0.0.1', 17, '2024-09-06 14:49:34'),
(9, 'hejucoxedo', '127.0.0.1', 17, '2024-09-06 14:50:08'),
(10, 'qibukulir', '127.0.0.1', 17, '2024-09-06 14:50:35'),
(11, 'qurugijo', '127.0.0.1', 16, '2024-09-06 15:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `org_id` int NOT NULL,
  `org_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `org_address` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `org_about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `org_phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`org_id`, `org_name`, `org_address`, `org_about`, `org_phone`, `created_at`) VALUES
(16, 'Airtel', 'Dhaka', '', '', '2024-06-12 15:51:09'),
(17, 'Banglalink', 'Dhaka', '', '', '2024-06-12 15:51:17'),
(18, 'Dnet', '4/8 Humayun Road, Block-B, Mohammadpur, Dhaka 1207', 'Dnet, a social enterprise, started its journey with the aim of empowering the marginalized communities of Bangladesh through the access to technology and information. Through fostering the fusion of social and technological innovations, Dnet has been implementing its developmental objectives at a national, constitutional and international level.', '+880 9606003638', '2024-06-12 15:51:22'),
(19, 'Oxfam', 'Block K, 1213, House 23 Road 28, Dhaka 1213', 'Oxfam is a British-founded confederation of 21 independent non-governmental organizations, focusing on the alleviation of global poverty, founded in 1942 and led by Oxfam International', '+254 722 200417', '2024-06-25 17:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int NOT NULL,
  `project_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `post_details` varchar(5000) COLLATE utf8mb4_general_ci NOT NULL,
  `post_by` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_status` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `project_name`, `post_details`, `post_by`, `created_at`, `post_status`) VALUES
(98, 'Air', 'Air pollution has become the leading cause of death in Bangladesh, outpacing fatalities from high blood pressure, poor diet and tobacco use, found a new study.\r\n\r\nIn 2021, at least 236,000 lives were lost in Bangladesh due to air pollution, according to the fifth edition of the State of Global Air report, which was released yesterday.\r\n\r\nIn contrast, there were 200,000 deaths linked to high blood pressure, 130,100 deaths linked to tobacco use and 130,400 deaths linked to poor diet.\r\n\r\nChildren in Bangladesh are particularly vulnerable to air pollution: the country ranked fifth globally in 2021 in the total number of deaths among children under the age of five due to air pollution.\r\n\r\nAs many as 19,000 children under five years old died due to air pollution, said the report, which was produced by the State of Global Air Initiative, a collaboration between the Health Effects Institute (HEI) and the Institute for Health Metrics and Evaluation&#039;s Global Burden of Disease project in partnership with Unicef.\r\n\r\nIndia tops the list with 169,000 deaths in children under 5, followed by Nigeria (114,000), Pakistan (68,000) and Ethiopia (31,000).\r\n\r\n&quot;In the last 20 years, we have talked a lot about air pollution but when it comes to action, we rarely see any action -- even the interventions that we saw are very insignificant,&quot; said Abdus Salam, one of the reviewers of the study.\r\n\r\nThe study focuses on the danger of both indoor and outdoor pollution and the vulnerability of children due to indoor air pollution in Bangladesh, said Salam, a professor of chemistry at Dhaka University.\r\n\r\nAs much as 36 percent of preterm births in Bangladesh in 2021 were linked to exposure to air pollution.\r\n\r\nAir pollution impacts children&#039;s health in many ways -- from pregnancy through early childhood -- through impacts on newborns including preterm birth, as well as through lower respiratory infections and asthma in children,said Pallavi Pant, head of global health at HEI.\r\n\r\nThe study found South Asia to be the most polluted region in the world in terms of air: about 18 percent of the total deaths in the region are linked to air pollution.\r\n\r\nBangladesh also featured in the top 20 countries with the highest outdoor PM2.5 exposures.\r\n\r\nMore than 92 percent of the country&#039;s population live in areas that exceed the least stringent interim target for PM2.5 (35 µg/m3) from the World Health Organisation, the report said.\r\n\r\nExposure to household air pollution caused by the use of solid fuels for cooking is also linked to the development of cataracts, a debilitating disease that affects many across South Asia, Pant told The Daily Star.\r\n\r\nAcross South Asia, residential solid fuel use continues to be an important contributor to outdoor PM2.5, together with energy, industry, agriculture and transportation sectors.\r\n\r\n&quot;It is promising to see progress including reductions in PM2.5 levels and exposure to household air pollution over the last few years. However, exposures to various pollutants remain high in much of South Asia, and the data brings into focus the need for sustained and science-based local and regional action to improve air quality,&quot; said Pant, who oversaw the report&#039;s release.\r\n\r\nWhile there is a silver lining with the stabilisation and even reduction of annual average PM2.5 levels of air pollutants at the national level, another threat looms large: ozone pollution, according to the report.\r\n\r\nFor the first time, this year&#039;s report includes exposure levels and related health effects of nitrogen dioxide (NO2), including the impact of NO2 exposures on the development of childhood asthma.\r\n\r\nSince 2000, deaths linked to exposure to ozone have more than doubled, with 15,000 deaths in 2021 compared with 6,200 deaths in 2000.\r\n\r\nTraffic exhaust is a major source of NO2, which means densely populated urban areas, particularly in high-income countries, often see the highest levels of NO2 exposure and health impacts.', 18, '2024-06-19 14:07:19', 1),
(99, 'Rain', 'The country may experience continual rainfall across the country, including Dhaka, for the next five days commencing 9:00am today, said Bangladesh Meteorological Department (BMD).\r\n\r\n&quot;Light to moderate rain or thundershowers accompanied by temporary gusty winds are likely to occur in most places across Rangpur, Rajshahi, Dhaka, Mymensingh, Khulna, Barishal, Chattogram, and Sylhet divisions, with moderately heavy to very heavy falls in some areas,&quot; said a Met office bulletin.\r\n\r\nThe country&#039;s highest 153 mm rainfall was recorded at Tetulia in the past 24 hours. Meanwhile, the highest temperature reached 36.4 degrees Celsius in Chuadanga, and the lowest was 22 degrees Celsius in Bandarban.\r\n\r\nDay and night temperatures may rise slightly in the Chattogram division, while a slight drop is expected elsewhere in the country, it added.\r\n\r\nAdditionally, the monsoon remains active over Bangladesh and is moderate to strong over the North Bay.', 18, '2024-06-07 08:08:18', 1),
(100, 'Maritime', 'Maritime ports of Chattogram, Cox&#039;s Bazar, Mongla and Payra have been advised to hoist local cautionary signal no three as deep convection is taking place over the North Bay due to strong monsoon.\r\n\r\nAll fishing boats and trawlers over the North Bay have been advised to come close to the coast and proceed with caution till further notice, said a special bulletin of the Bangladesh Meteorological Department.', 18, '2024-06-04 09:10:37', 1),
(101, 'Nvidia', 'Nvidia became the world&#039;s most valuable company on Tuesday, dethroning tech heavyweight Microsoft as its high-end processors play a central role in a scramble to dominate artificial intelligence technology.\r\n\r\nShares of the chipmaker climbed 3.5% to $135.58, lifting its market capitalization to $3.335 trillion, just days after overtaking iPhone maker Apple to become the second most valuable company.\r\n\r\nMicrosoft&#039;s stock market value was $3.317 trillion as its shares dipped 0.45%.\r\n\r\nApple&#039;s stock slipped over 1%, leaving its value at $3.286 trillion.', 16, '2024-06-04 20:11:30', 1),
(102, 'AI', 'Ilya Sutskever, co-founder and former chief scientist at OpenAI, has recently announced that he is launching his own AI company. He officially departed from OpenAI, the company behind ChatGPT, last month. \r\n\r\nThe company is focused on creating a safe AI environment at a time when some of the biggest tech companies are looking to dominate the generative AI boom. It is called Safe Superintelligence and is described on its website as an American firm with offices in Palo Alto and Tel Aviv. Sutskever made the announcement revealing that he was starting the company in a post on X.\r\n\r\n&quot;Our singular focus means no distraction by management overhead or product cycles, and our business model means safety, security, and progress are all insulated from short-term commercial pressures,&quot; the post says.\r\n\r\nSutskever is joined by former OpenAI researcher Daniel Levy and Daniel Gross, co-founder of Cue and a former AI lead at Apple as co-founders of Safe Superintelligence. He left Microsoft-backed OpenAI in May after playing a key role in CEO Sam Altman&#039;s dramatic firing and rehiring in November last year. Sutskever was removed from the company&#039;s board after Altman returned.', 16, '2024-06-20 16:12:10', 1),
(103, 'MFS ', 'Rangpur has the highest number of mobile financial services (MFS) accounts among the eight divisions of Bangladesh, with 28.10 percent of its population utilising these services. Barisal follows closely, with 24.26 percent of its residents holding MFS accounts, according to the report on Socio-Economic and Demographic Survey 2023, recently published by the Bangladesh Bureau of Statistics (BBS).\r\n\r\nThe BBS survey examines financial data for individuals aged 10 years and above, revealing that 47.43 percent of the Bangladeshi population have financial accounts with bank, non-banking financial institution, mobile banking account, insurance, micro-credit institution, post office, cooperative society, capital market, department of National Savings, and accounts in multiple institutions. Meanwhile, 52.57 percent of the population still remains without any type of financial accounts.\r\n\r\nWhile Rangpur leads in MFS account ownership, Chittagong lags behind with only 18.11 percent of its residents holding such accounts, closely followed by Dhaka at 18.13 percent. The survey also details the financial account statistics for other divisions: Sylhet (18.92 percent), Khulna (20.52 percent), Rajshahi (22.57 percent), and Mymensingh (24.20 percent).\r\n\r\nNationally, 20.80 percent of people have MFS accounts, with a higher prevalence in rural areas which is 21.82 percent compared to urban areas which is 18.75 percent. Among the total percentage 28.83 percent are males and 13.43 percent are females.', 16, '2024-06-02 02:12:42', 1),
(104, 'Intel', 'Intel Corp is halting plans for a $25 billion factory in Israel, as per Calcalist, an Israel-based financial news website. According to Reuters, Intel has yet to make an official statement regarding this development.\r\n\r\nThe US-based chipmaker company, when asked about the report, cited the need to adapt big projects to changing timelines, without directly referring to the project. \r\n\r\n&quot;Israel continues to be one of our key global manufacturing and R&amp;D sites and we remain fully committed to the region,&quot; Intel said in a statement. &quot;Managing large-scale projects, especially in our industry, often involves adapting to changing timelines. Our decisions are based on business conditions, market dynamics and responsible capital management,&quot; it said.\r\n\r\nIsrael&#039;s government in December agreed to give Intel a $3.2-billion grant to build the $25-billion chip plant in southern Israel. Intel has previously said that the factory proposed for its Kiryat Gat site, where it has an existing chip plant, was an &quot;important part of Intel&#039;s efforts to foster a more resilient global supply chain&quot; alongside the company&#039;s investments in Europe and the United States.\r\n\r\nIntel operates four development and production sites in Israel, including its manufacturing plant in Kiryat Gat called Fab 28. The factory produces Intel 7 technology, or 10-nanometer chips.\r\n\r\nThe planned Fab 38 plant was due to open in 2028 and operate through 2035. Intel employs nearly 12,000 people in Israel.', 16, '2024-06-12 11:15:16', 1),
(105, 'State enterprises', 'The government needs to provide guarantees against an increasing amount of loans of state-owned enterprises every fiscal year, especially for power generation, fertiliser and fuel imports, and aircraft purchases.\r\n\r\nThe government provides these &quot;sovereign guarantees&quot; against loans negotiated by various state-owned financial and non-financial enterprises, states the finance ministry&#039;s Medium-term Macroeconomic Policy Statement for 2024-25 to 2026-27.\r\n\r\nMeant to aid the implementation of public policies and programmes, the sovereign guarantees are mostly issued to entities operating in commercial aviation, power and public commodity sectors, and fertiliser plants, according to the statement.\r\n\r\nIf the entities fail to repay their loans on time, the guarantees could be invoked and the liabilities would be passed on to the government, which inevitably would have future fiscal implications, it added.\r\n\r\nAs of the current fiscal year of 2023-24, sovereign guarantees were backing Tk 117,094 crore in loans, according to budget documents of the finance ministry.\r\n\r\nIn the last fiscal year of 2022-23, it was Tk 98,591 crore whereas it was Tk 92,601 crore in fiscal year 2021-22.\r\n\r\nThe amount has been increasing by around 19 percent on average every year.\r\n\r\nState-owned power agencies now have the highest amount of loans -- Tk 53,596.26 crore.\r\n\r\nBangladesh Agricultural Development Corporation accounted for Tk 18,985.48 crore, all availed for importing fertilisers.\r\n\r\nBesides, the loan against Ghorashal-Palash Urea Fertiliser Factory, which was inaugurated in Narsingdi in November last year, stands at Tk 10,113 crore.\r\n\r\nBiman Bangladesh Airlines had loans to the tune of Tk 8,543.45 crore, the energy sector Tk 7,660.18 crore and the Trading Corporation of Bangladesh Tk 2,432.11 crore.\r\n\r\nOne of the ways in which state-owned enterprises were correlated with the government&#039;s fiscal position, as per a partial analysis, was that their loans exposed the state to potential financial loss, said the finance ministry statement.\r\n\r\nMoreover, the government has had to inject additional capital to keep many of the enterprises afloat, it said.\r\n\r\nEconomists suggest privatising loss-making entities instead of running them by spending taxpayer money.\r\n\r\nAs of February, 30 state-owned enterprises had Tk 65,089.48 crore in debt with state-owned commercial banks, read the Bangladesh Economic Review 2024.\r\n\r\nOf the amount, Tk 183.62 crore has been classified.\r\n\r\nUp until now there has been no default of loans backed by sovereign guarantees, said the finance ministry statement.\r\n\r\nHowever, the government plans to amend the existing guidelines to streamline the process and further strengthen the debt repayment capacity of the state-owned enterprises, it said.\r\n\r\nLoan default of state-owned enterprises is a serious issue in terms of preserving the confidence and image of the country as it generally does not happen anywhere in the world, said M Masrur Reaz, chairman of Policy Exchange of Bangladesh.\r\n\r\nWhen state-owned enterprises default on loans, the impact falls on the private sector and raises questions about the capability of the government, he said.\r\n\r\nMost public enterprises are incurring losses, but the government does not shut those down on political grounds, said Ahsan H Mansur, executive director of the Policy Research Institute.\r\n\r\nInstead, the government continues to run these enterprises by providing subsidies and repaying their loans by spending taxpayer money, he said.\r\n\r\nAccording to him, the ultimate solution is to privatise the state-owned enterprises to avoid the liabilities of debt for years on end.', 17, '2024-06-12 16:15:56', 1),
(106, 'High inflation', 'Inflation staying persistently high at over 9 percent for the past two years will lead to a lower number of animals being slaughtered this Eid-ul-Azha, the peak season for collecting rawhides, according to Bangladesh Tanners Association (BTA). \r\n\r\nGiven the scenario, traders have lowered their target for rawhide purchase.\r\n\r\nThe BTA has set a target to procure 80 lakh pieces of rawhide this year, 10 lakh lower than that in the year prior, said Shaheen Ahamed, chairman of the association.\r\n\r\n&quot;Due to high inflation, the number of sacrificial animals will be 15 to 20 percent lower than during the last Eid-ul-Azha,&quot; Ahamed said in an interview with The Daily Star.\r\n\r\n&quot;Animal prices are also high. Because common people do not have as much money this year, a target to collect 80 lakh pieces of rawhides has been set,&quot; he said.\r\n\r\nThe modest target was set despite a record number of sacrificial animals being put up for sale this Eid-ul-Azha due to a surplus in supply as many were left unsold during last year&#039;s Eid, he said.\r\n\r\nThere were over 1.25 crore sacrificial animals in 2023, but the number has crossed 1.29 crore this year, as per data from the Department of Livestock Services.\r\n\r\nAhamed added that sales of leather products had decreased considerably in the local market due to high inflation. The same applied to the international market, he said.\r\n\r\n&quot;These are fashionable products. Given the situation, people will buy fashionable products only after buying essential products. That&#039;s normal. Because of this, both buyers and traders are in a tight situation,&quot; he said.\r\n\r\nThe economic situation of countries which collect leather from Bangladesh is also not good. They are also going through high inflationary pressure and various economic crises. So, they have reduced order quantities, he said.\r\n\r\nDue to these reasons, the target of rawhide collection has been reduced this year, he added.\r\n\r\nDuring the July-May period of the current fiscal year, exports of leather goods totalled $961 million, marking a decline of 14.17 percent compared to the corresponding period in the previous fiscal year.\r\n\r\nOn June 3, the government set the price of salt-cured cowhides at Tk 55-60 per square foot (sqft) in the capital and Tk 50-55 per sqft outside the capital.\r\n\r\nLast year, the price was Tk 50-55 per sqft in Dhaka and Tk 47-52 per sqft outside the capital.\r\n\r\n&quot;Even three to four years ago, we did not buy so many rawhides. But it was found that middlemen make profits of over Tk 300 per piece, which affects the market,&quot; Ahamed said, adding that tannery owners were interested in buying rawhides in order to keep the market stable.\r\n\r\n&quot;We now directly contact madrasas and orphanages in advance. Later we give them the price of the rawhides according to the market price,&quot; he said.\r\n\r\nTanners will get about Tk 270 crore in loans from banks to procure and preserve rawhides during the upcoming Eid-ul-Adha.\r\n\r\nLast year, traders sought loans of around Tk 500 crore but received Tk 259 crore. ', 17, '2024-06-04 16:16:33', 1),
(107, 'Govt trims food', 'The government has cut distribution plans for food grains for the upcoming fiscal year of 2024-25, which economists say is an illogical decision since food inflation has soared above 10 percent in the past two months.\r\n\r\nFor FY25, the government plans to distribute 30.3 lakh tonnes of rice and wheat among poor and low-income people through cash and non-cash programmes apart from distribution among public sector employees.\r\n\r\nThe quantity of the planned distribution is 10 percent lower than the revised distribution plan of 33.56 lakh tonnes for the outgoing fiscal year of 2023-24.\r\n\r\nThe food distribution plan is also below the original allocation for the outgoing fiscal year, according to the finance ministry.\r\n\r\n&quot;This is unwarranted given the persistent high prices of essentials, particularly of food,&quot; said the Centre for Policy Dialogue (CPD) in its analysis of the proposed budgetary measures for FY25.\r\n\r\nInflation has remained persistently high, hovering over 9 percent for two years, while the Consumer Price Index rose to 9.89 percent in May from 9.74 percent in April.\r\n\r\nThe think-tank said the total allocation for food support-related social safety net programmes has decreased nearly one percent to Tk 17,363 crore in FY25 from the revised allocation of Tk 17,483 crore in FY24.\r\n\r\nFor instance, the government has reduced allocations for the Open Market Sales (OMS) and Food Friendly Programme (FFW) by 4 percent to Tk 5,362 crore in FY25 compared to the revised allocation of Tk 5,491 crore of this fiscal year, according to the CPD.\r\n\r\nThe CPD said the food subsidy has been cut drastically by 20 percent for the next fiscal year starting from July.\r\n\r\nQuazi Shahabuddin, a former director-general of the Bangladesh Institute of Development Studies (BIDS), said the government should expand food distribution as prices are high.\r\n\r\n&quot;The reduction of the food distribution target does not seem logical. Instead of cutting it, the government should expand food distribution programmes like OMS to cushion poor people from high food inflation,&quot; he said.\r\n\r\nMohammad Yunus, research director of BIDS, said the government should provide cash support to the poor and vulnerable which is equivalent to at least the distribution cut.\r\n\r\nMohammad Jahangir Alam, a professor of agribusiness and marketing at Bangladesh Agricultural University, said it has been seen in the past that the government&#039;s food distribution increases in the revised budget.\r\n\r\n&quot;So, I think we will see higher food distribution later,&quot; he said.\r\n\r\nMd Habibur Rahman Hosaini, additional secretary to the procurement &amp; supply wing at the food ministry, also said allocations for food distribution for the current fiscal year were lower than this year&#039;s revised budget.\r\n\r\n&quot;If needed, we will increase allocations,&quot; he added.', 17, '2024-06-12 05:16:56', 1),
(108, 'Garment ', 'Almost all garment and textile factories cleared salary payments for their workers and provided festival bonuses marking Eid-ul-Azha yesterday, said Industrial Police.\r\n\r\nAlso, workers have already started off on their journeys to their village homes as factories are following the government&#039;s rules for allocating holidays.\r\n\r\nIt is true that almost all the factories have paid the salaries and bonuses as of yesterday, but a very small number of factories made a partial salary payment, said Nazma Akter, president of Sammilito Garment Sramik Federation.\r\n\r\nMd Towhidur Rahman, president of Bangladesh Garment Workers Federation, echoed Akter&#039;s sentiments.\r\nRahman added that no worker has been laid off ahead of Eid-ul-Azha this year.\r\n\r\nMd Nasir Uddin, vice-president of the Bangladesh Garment Manufacturers and Exporters Association, said the factories paid salaries and bonuses timely. He added that there was no untoward incident till yesterday.\r\n\r\nIn a statement, Industrial Police also said no untoward incident was reported as factory owners paid the salaries and bonuses timely.', 17, '2024-06-18 12:17:28', 1),
(113, 'BD', 'Laila Kaniz Lucky is the upazila parishad chairman of Narsingdi&#039;s Raipura and a retired teacher of a government college.\r\n\r\nIt has now emerged that the former Bangla literature teacher has, in her name, a huge amount of properties, which do not match with her known source of income, indicating someone may have used her wallet as a safe place to stash wealth.\r\n\r\nLucky is the wife of Dr Matiur Rahman, a member of the National Board of Revenue, who came under the spotlight after his son posted on social media a photo of a sacrificial goat that he claimed to have bought for Tk 12 lakh.\r\n\r\nMatiur is now president of the NBR&#039;s Customs, Excise and VAT Appellate Tribunal, a grade-1 job, with a basic monthly salary of Tk 78,000.\r\n\r\nMedia reports, NBR sources and a number of documents seen by The Daily Star suggest that the highly-connected NBR official and his close and distant family members have great wealth, including significant stakes in various companies.\r\n\r\nMatiur did not respond to this newspaper&#039;s calls, but denied any wrongdoing while talking to other media outlets.\r\n\r\nLucky&#039;s tax files submitted to the Election Commission before this year&#039;s Narsingdi upazila pollsclaim she is worth Tk 10.31 crore, but a closer look indicates she may have understated her wealth by dozens of times.\r\n\r\nAccording to her wealth statement, she owns more than eight acres of mostly non-agricultural land and five flats in Dhaka, but the combined value of all this was shown at only Tk 5.19 crore.\r\n\r\nThis innocuous-looking list does not even mention her palace-like home in Raipura upazila&#039;s Marjal village -- an omission that raises eyebrows due to the opulence of the residence.\r\n\r\nThe much-talked-about, high-walled compound and two-storey bleached white mansion sits beside neighbours who live in small one-storey homes or huts made of corrugated tin sheets.\r\n\r\nThe Laila Kaniz Lucky Road, named after her, leads to her mansion.\r\n\r\nShamim Iqbal Munna, of Raipura&#039;s upazila engineering office, said that the 123-metre road was built in 2014 at a cost of Tk 14 lakh.\r\n\r\nMultiple teachers at the nearby Md Bashir High School, all requesting anonymity, said the land acquisition for that road was done using the school fund, and not with Lucky&#039;s money. They said she used her influence to have the road named after her. \r\n\r\nLucky retired as an associate professor of Bangla at Government Titumir College in the capital four years ago, and according to her tax filings, she gets a pension of only Tk 4.65 lakh per year.\r\n\r\nThe affidavit also does not mention that she is one of the co-owners of Wonder Park and Eco Resort, a sprawling green expanse with a lake, and lakeside cottages.\r\n\r\nThis newspaper contacted the eco resort and they confirmed that Lucky&#039;s children Ahmed Taufiqur Rahman and Farzana Rahman Ipshita are co-owners.\r\n\r\nThe eco resort took over certain sections of land from a community graveyard that lies adjacent to it, Altaf Hossain, a local union parishad member, told The Daily Star.', 16, '2024-06-23 10:30:45', 1),
(114, 'All file type', 'Lorem', 16, '2024-06-23 15:06:37', 1),
(118, '30 garment factories in Ashulia closed amid protests', 'They gathered in front of various factories along these routes, demanding employment and proportional hiring of men and women at the garment factories, among other demands.\r\n\r\nAt one point, the protesting workers erected barricades at various points on the two roads and started throwing stones at different factories.\r\n\r\n', 19, '2024-09-02 17:14:56', 1),
(119, 'Oxfam warns against trend in using aid for political &amp; military purposes', 'Since 2001 there has been a growing trend of aid being used to win “hearts and minds” in conflicts. Unfortunately, this aid is often poorly conceived, ineffective, and in some cases has turned beneficiaries and aid workers into targets for attack, Oxfam said. This type of aid often by-passes the poorest people and dangerously blurs the line between civilian and military activity.\r\n\r\nThe report says that while aid flows rose towards meeting wealthy donors&#039; international aid commitments between 2001 and 2008, more than 40 per cent of this increase in aid was spent in just two countries, Afghanistan and Iraq. The remainder, Oxfam said, was shared between 150 other poor countries.\r\n\r\nAs national budgets are being reviewed and with more people in need of aid than ever before, Oxfam says that a new approach is needed to maximize the impact of aid based on long-term objectives rather than short-term political or military interests.\r\n', 19, '2024-09-04 09:07:55', 1),
(120, 'FIles', 'sdfasd', 17, '2024-09-06 15:07:00', 1),
(121, 'Check', 'Lorem', 16, '2024-09-06 20:36:36', 1),
(122, 'CheckFileUPload', 'Lorem ', 16, '2024-09-06 21:09:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_files`
--

CREATE TABLE `post_files` (
  `post_files_id` int NOT NULL,
  `post_files_names` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `post_id` int NOT NULL,
  `privacy` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_files`
--

INSERT INTO `post_files` (`post_files_id`, `post_files_names`, `post_id`, `privacy`, `created_at`) VALUES
(95, 'Air_6673ff572efa1_Screenshot 2024-05-02 093055.png', 98, 0, '2024-06-20 16:07:19'),
(96, 'Rain_6673ff9200bb8_Screenshot 2024-05-02 093055.png', 99, 0, '2024-06-20 16:08:18'),
(97, 'Nvidia_667400521d127_CV of Saifur Rahman Shihab.doc', 101, 0, '2024-06-20 16:11:30'),
(98, 'Nvidia_667400521dbeb_Screenshot 2024-05-02 093055.png', 101, 0, '2024-06-20 16:11:30'),
(99, 'MFS _6674009adb279_CV of Saifur Rahman Shihab.doc', 103, 0, '2024-06-20 16:12:42'),
(100, 'MFS _6674009adbbc5_Screenshot 2024-04-22 093248.png', 103, 0, '2024-06-20 16:12:42'),
(101, 'MFS _6674009adc55f_Resume-of-Saifur-Rahman-Shihab.pdf', 103, 0, '2024-06-20 16:12:42'),
(102, 'Intel_6674013464742_Screenshot 2024-04-22 093248.png', 104, 1, '2024-06-20 16:15:16'),
(103, 'High inflation_66740181422f7_Resume-of-Saifur-Rahman-Shihab.pdf', 106, 0, '2024-06-20 16:16:33'),
(104, 'High inflation_667401814316c_Screenshot 2024-04-22 093248.png', 106, 0, '2024-06-20 16:16:33'),
(105, 'High inflation_667401814437b_Screenshot 2024-05-02 093055.png', 106, 0, '2024-06-20 16:16:33'),
(106, 'Garment _667401b82d077_Resume-of-Saifur-Rahman-Shihab.pdf', 108, 0, '2024-06-20 16:17:28'),
(107, 'Garment _667401b82e56a_Screenshot 2024-05-02 093055.png', 108, 0, '2024-06-20 16:17:28'),
(117, 'BD_6677a4f5ee44d_Screenshot 2024-04-22 093248.png', 113, 0, '2024-06-23 10:30:45'),
(118, 'BD_6677a4f5eed95_Resume-of-Saifur-Rahman-Shihab.pdf', 113, 0, '2024-06-23 10:30:45'),
(119, 'All file type_6677e59d6e3c0_CV of Saifur Rahman Shihab.doc', 114, 0, '2024-06-23 15:06:37'),
(120, 'All file type_6677e59d711c7_New Microsoft Excel Worksheet.xlsx', 114, 0, '2024-06-23 15:06:37'),
(121, 'All file type_6677e59d74600_New Microsoft PowerPoint Presentation.pptx', 114, 0, '2024-06-23 15:06:37'),
(122, 'All file type_6677e59d772e8_Resume-of-Saifur-Rahman-Shihab.pdf', 114, 0, '2024-06-23 15:06:37'),
(123, 'All file type_6677e59d78d5f_Screenshot 2024-04-22 093248.png', 114, 0, '2024-06-23 15:06:37'),
(124, 'All file type_6677e59d7b7e4_Screenshot 2024-05-02 093055.jpg', 114, 0, '2024-06-23 15:06:37'),
(128, '30 garment f_66d59e3066c92_correct Content Management.xlsx', 118, 0, '2024-09-02 17:14:56'),
(129, '30 garment f_66d59e30674ff_Never-Split-the-Difference.pdf', 118, 0, '2024-09-02 17:14:56'),
(130, 'Oxfam warns _66d7cf0b6fdf4_Permanent Member List.xlsx', 119, 0, '2024-09-04 09:07:55'),
(131, 'Oxfam warns _66d7cf0b70d5d_Never-Split-the-Difference.pdf', 119, 0, '2024-09-04 09:07:55'),
(133, 'Oxfam warns _66d7cf0b72360_unnamed.png', 119, 0, '2024-09-04 09:07:55'),
(134, 'BD_66d7eeec6dd5c_dhaka-university-campus-230824-03-1724555077.jpg', 113, 0, '2024-09-04 11:23:56'),
(135, 'FIles_66dac634e6452_1808973670477740.jpg', 120, 0, '2024-09-06 15:07:00'),
(136, 'Check_66db1374ba971_dhaka-university-campus-230824-03-1724555077.jpg', 121, 0, '2024-09-06 20:36:36'),
(137, 'CheckFileUPl_66db1b3def2c0_livelihood-middle-class-1.jpg', 122, 0, '2024-09-06 21:09:49'),
(138, 'CheckFileUPl_66db1b3defffc_Never-Split-the-Difference.pdf', 122, 0, '2024-09-06 21:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_org` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_active` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_org`, `user_active`, `created_at`) VALUES
(35, 'Airtel', 'air@air.com', 'RpkdzCxrH1fpfq3hWRi9vw==', '16', 1, '2024-06-12 15:53:06'),
(36, 'Shihab', 'shihab@dnet.org', 'SuqRIUVjgCkoyFkxxd+Xmw==', '18', 1, '2024-06-12 15:53:20'),
(37, 'Banglalink', 'bl@bl.com', '2hsCBpzSySnAYtvjPLqk0A==', '17', 1, '2024-06-12 15:53:34'),
(38, 'Din Islam', 'din@dnet.org', 'sBglhnaceQ48M3m4NOwibQ==', '18', 1, '2024-06-20 09:57:17'),
(42, 'wamamixe', 'qetuninax@mailinator.com', 'fTCOEMC0BG6JQJzMA3pAWw==', '17', 1, '2024-06-24 17:47:24'),
(43, 'vomat', 'coqizucyh@mailinator.com', 'i8g12DCcVA8U3S8WoStRag==', '17', 1, '2024-06-25 15:54:26'),
(44, 'ladusybij', 'qucukano@mailinator.com', 'Ljl6lt6L/Y2VbLHt2k47XQ==', '18', 1, '2024-06-25 15:54:30'),
(45, 'zirujatesy', 'qydexeroz@mailinator.com', 'f+/nK+3Zv/s8yAJ8Zg58xg==', '18', 1, '2024-06-25 15:54:33'),
(46, 'wopivy', 'folyxovaza@mailinator.com', 'YYYf+d1ysU+Qa/xYj0RRuw==', '17', 1, '2024-06-25 15:54:37'),
(47, 'qurugijo', 'sygol@mailinator.com', 'NGpVEb2G1Ve5HXm1HO+WZw==', '16', 1, '2024-06-25 15:54:40'),
(48, 'hejucoxedo', 'myzu@mailinator.com', '8AAC+/t9Yi5xdVVfwUJWYQ==', '17', 1, '2024-06-25 15:54:43'),
(49, 'cibija', 'meqexona@mailinator.com', 'Z7/anFJLVfV4iCT0VyE2tw==', '16', 1, '2024-06-25 15:54:46'),
(50, 'pasetyh', 'zybupeheh@mailinator.com', 'rH3hY+dDRSim/cFOsE8kig==', '18', 1, '2024-06-25 15:54:49'),
(51, 'lotomisoxu', 'kaxanen@mailinator.com', 'sICgcwtdx8rXsPlM0KVpFg==', '18', 1, '2024-06-25 15:54:52'),
(52, 'qibukulir', 'badifalo@mailinator.com', 'H04yd0EoJu2fIbLdGoF7Sg==', '17', 1, '2024-06-25 15:54:55'),
(53, 'Saifur', 'saifur@oxfam.com', '/NOAXXWxqu1QSh0OxhcEbQ==', '19', 1, '2024-06-25 17:48:53'),
(54, 'new user', 'new@gmail.com', '3KA1LXmYHiLQyr8tY4Cq4A==', '16', 1, '2024-09-04 09:56:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `file_downloads`
--
ALTER TABLE `file_downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_views`
--
ALTER TABLE `file_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_files`
--
ALTER TABLE `post_files`
  ADD PRIMARY KEY (`post_files_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `file_downloads`
--
ALTER TABLE `file_downloads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `file_views`
--
ALTER TABLE `file_views`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `org_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `post_files`
--
ALTER TABLE `post_files`
  MODIFY `post_files_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
