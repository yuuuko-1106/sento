-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- ホスト: mysql143.phy.lolipop.lan
-- 生成日時: 2020 年 7 月 09 日 10:45
-- サーバのバージョン: 5.6.23-log
-- PHP のバージョン: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `LAA1141172-m27ep6`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `sento_master`
--

CREATE TABLE IF NOT EXISTS `sento_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(50) NOT NULL COMMENT '店名',
  `zip` int(7) DEFAULT NULL COMMENT '郵便番号',
  `address` varchar(50) NOT NULL COMMENT '住所',
  `access` varchar(50) NOT NULL COMMENT 'アクセス',
  `tell` varchar(30) NOT NULL COMMENT '電話番号',
  `holiday` varchar(7) NOT NULL COMMENT '定休日',
  `open_time` time NOT NULL COMMENT '営業時間（開始）',
  `close_time` time NOT NULL COMMENT '営業時間（終了）',
  `url` varchar(100) NOT NULL COMMENT '公式ページ',
  `memo` text NOT NULL COMMENT 'メモ',
  `search_sauna` tinyint(1) NOT NULL COMMENT 'チェック検索用項目(サウナ)',
  `search_coldspa` tinyint(1) NOT NULL COMMENT 'チェック検索用項目(水風呂)',
  `search_openspa` tinyint(1) NOT NULL COMMENT 'チェック検索用項目(露天風呂)',
  `search_sodaspa` tinyint(1) NOT NULL COMMENT 'チェック検索用項目（炭酸泉）',
  `search_parking` tinyint(1) NOT NULL COMMENT 'チェック検索用項目（駐車場）',
  `search_restaurant` tinyint(1) NOT NULL COMMENT 'チェック検索項目（お食事処）',
  `search_restroom` tinyint(1) NOT NULL COMMENT 'チェック検索項目（休憩処）',
  `search_comic` tinyint(1) NOT NULL COMMENT 'チェック検索項目（漫画コーナー）',
  `search_salon` tinyint(1) NOT NULL COMMENT 'チェック検索項目（アカスリ・エステ）',
  `search_wifi` tinyint(1) NOT NULL COMMENT 'チェック検索項目（Wi-Fiフリー）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- テーブルのデータのダンプ `sento_master`
--

INSERT INTO `sento_master` (`id`, `name`, `zip`, `address`, `access`, `tell`, `holiday`, `open_time`, `close_time`, `url`, `memo`, `search_sauna`, `search_coldspa`, `search_openspa`, `search_sodaspa`, `search_parking`, `search_restaurant`, `search_restroom`, `search_comic`, `search_salon`, `search_wifi`) VALUES
(1, '相模・下九沢温泉 湯楽の里', 2520134, '神奈川県相模原市緑区下九沢2385-1', '橋本駅より、バスで約15分　橋本駅南口2番乗り場から「上大島行き」8つめの「北公園入口」下車、目の前', '042-764-2626', '0000000', '09:00:00', '24:00:00', 'http://www.yurakirari.com/yura/sagamihara/', 'この温泉の魅力は良質の天然温泉が堪能できるところ。この温泉の泉質はナトリウム－塩化物・炭酸水素塩泉（低張性・アルカリ性・低温泉）です。 塩化物泉は旧称食塩泉と言われていた泉質で、肌についた食塩成分が被膜を作り、皮膚からの水の蒸発を抑えるため湯冷めしにくく、別名「熱の湯」とも呼ばれるなど、保温効果にとても優れています。露天風呂には、贅沢なかけ流し浴槽があり、じっくりと温泉の良さを体感できます。 その他、人工高濃度炭酸泉は冷え性、むくみ、やけど、切り傷、肩こり、関節痛、高血圧でお悩みの方におすすめのお風呂です。\r\nお風呂以外にも、マンガや雑誌を読みながらくつろげる休憩所やお食事処があり、浴後ものんびりとくつろぐことができます。', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, '相模浴場', 2290032, '神奈川県相模原市中央区矢部1-4-15', 'JR横浜線「相模原駅」から徒歩10分 JR横浜線「矢部駅」から徒歩10分', '042-752-7264', '1000000', '15:00:00', '23:00:00', 'http://www.sagamihara-sentou.com/index.html', '相模浴場は相模原市にある昔ながらの銭湯で、地域の皆様に愛され続けております。\r\n相模浴場のお湯は地下天然水から汲みあげた水を使用し、肌にとても優しいです。お湯は毎日交換され、衛生面もしっかり管理されているので安心してご入浴いただけます。', 1, 1, 0, 0, 1, 0, 0, 0, 0, 0),
(3, '並木湯', 2520228, '相模原市中央区並木1-10-7', 'JR淵野辺駅よりバス、「千代田」バス停より歩いて数分', '042-758-5636', '0000100', '15:00:00', '22:30:00', 'https://k-o-i.jp/koten/namikiyu/', '並木場は相模原市にある昔ながらの銭湯です。休憩室にはテレビ、新聞・雑誌が置いてあり、5～6人座れるソファでゆっくりとくつろげます。', 0, 0, 0, 0, 1, 0, 1, 0, 0, 0),
(4, 'ＪＮファミリー相模原', 2520231, '神奈川県相模原市中央区相模原７丁目１−２０', 'JR横浜線・JR相模原駅を下車、駅前通りを国道16号線方向へ徒歩約7分', '0120-307-326', '0000000', '06:00:00', '28:00:00', 'http://www.jn-family.com/', '相模原で人気の大型スーパー銭湯です。地上10階建ての施設で、5～9階にはホテルがあるので宿泊可能です。1～4階がスーパー銭湯施設、最上階の10階は展望露天になっています。\r\n24時間営業で、男女別のリクライニングルームを備え宿泊も可能。料金は高めの設定ですが、館内着・タオルが込みで1日のんびりと過ごせる健康ランド系の施設です。\r\n\r\nお風呂も充実していて、珍しいのが「プールバス」。水中ウォーキングが出来たり、小さなお子様は浮き輪を持参OKで進めたら。\r\nその他、無料で使えるフィットネスやマンガコーナー、ゲームコーナー、お食事処など楽しみ方がいっぱいあります。', 1, 1, 1, 0, 1, 1, 1, 0, 1, 0),
(5, 'さがみ湖温泉うるり', 2520175, '神奈川県相模原市緑区若柳1634番地', '新宿から車で約50分。電車は、JR中央本線「相模湖駅」からバスで約8分。', '0570-037-353', '0000000', '11:00:00', '20:00:00', 'https://www.sagamiko-resort.jp/spa/', '「さがみ湖温泉 うるり」は、相模湖の森に囲まれた高台に建つ日帰り温浴施設で、体験型アウトドア複合リゾート「さがみ湖リゾート」内に位置します。\r\n木々に囲まれた開放的な露天風呂からは、ハイキングコースで有名な石老山を眺めることができます。また、相模湖駅からバスで8分と、大自然に囲まれた温浴施設としてはアクセスも良く、新宿から約1時間で入浴と森林浴の二重の癒しを味わうことができます。\r\n', 1, 1, 1, 1, 1, 1, 1, 0, 1, 0),
(7, '藤野やまなみ温泉', 2520186, '神奈川県相模原市緑区牧野4225-1', '藤野駅からバス「やまなみ温泉入口」下車徒歩2分。', '042-686-8073', '0010000', '10:00:00', '21:00:00', 'http://yamanami-onsen.jp/', '藤野やまなみ温泉は、当初津久井郡の藤野町営日帰り温泉として営業を平成９年に開始、その後、平成１９年に藤野町が相模原市に合併することとなり、当施設に指定管理者制度が導入されました。源泉水１００％使用で一切水を加えず、良質成分が豊富に含まれていますので、体の芯から温まり湯冷めしません。また、小高い丘にございますので見晴らしは格別です。ぜひ一度、御堪能下さい。', 0, 1, 1, 0, 1, 1, 1, 0, 0, 0),
(8, 'おふろの王様　高座渋谷駅前店', 2420023, '神奈川県大和市渋谷五丁目22番地　IKOZA5F', '小田急江の島線「高座渋谷」駅下車西口駅前', '046-201-0126', '0000000', '10:00:00', '24:00:00', 'https://www.ousama2603.com/shop/kouzashibuya/', '天気のいい日は露天風呂から富士山が眺められます。天然温泉の泉質を忠実に再現した人工温泉がシーズンごとに変わり、日本全国の名湯を楽しむことができます。\r\nその他、人気の炭酸泉や絹の湯、各種アトラクションバス、2種類のサウナを備えており、湯巡りするのも楽しいです。\r\n時間無制限の岩盤浴も人気。\r\n5種類の岩盤浴をこころゆくまで満喫できます。\r\nまた、休憩スペースが充実。リクライニングチェアやキャンブ場をイメージしたスペースでのんびりと過ごすことができます。漫画が読み放題で、さらにホットコーヒー、水素水、炭酸水が飲み放題となっていて、至れり尽くせり。\r\n丸1日快適に過ごせる空間となっています。', 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
(9, '湯乃泉 相模健康センター', 2520004, '神奈川県座間市東原3丁目23-1', '相鉄線さがみ野駅北口より徒歩6分', '046-253-4126', '0000000', '10:00:00', '24:30:00', 'http://www.yunoizumi.com/sagami/', 'ここの一押し風呂は、8種類の漢方生薬を独自配合し作り上げた「効仙薬湯」。かなりやばいです。効き目抜群。下手な天然温泉よりはるかに素晴らしい効能があります。この薬湯は1日に数回「湯もみ」を行っており、常に一定の濃度と鮮度を保たせている徹底ぶり。\r\n\r\n草津温泉を再現した「露天草津温泉」も人気で、硫黄の匂いがしっかりあって気持ちイイ湯です。他にも、高濃度炭酸泉やアイテムバス、サウナなどが揃っています。', 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
(10, 'おふろの王様　町田店', 2520301, '神奈川県相模原市南区鵜野森1-24-9', '町田駅「町田バスセンター」より神奈中バス利用 「鵜野森一丁目」下車徒歩5分', '042-767-2603', '0000000', '09:00:00', '24:00:00', 'https://www.ousama2603.com/shop/machida/', '黒色の天然温泉露天風呂と大き目の高濃度炭酸泉が魅力の施設です。その他、大型ドライサウナの他、低温塩サウナと溶岩浴の効能を併せ持つ富士山溶岩蒸風呂（日本初）など12種類のバラエティ豊かなお風呂・サウナが楽しめます。\r\n\r\nまた、お食事処やお休み処、マッサージなど付帯施設も充実していて、のんびりとくつろげるのも嬉しいです。', 1, 1, 1, 1, 1, 1, 1, 0, 1, 0),
(11, '日栄湯', 2520312, '神奈川県相模原市南区相南4丁目1-25', '小田急相模原駅南口から徒歩3分。', '042-742-2876', '1000000', '15:00:00', '22:00:00', 'https://k-o-i.jp/koten/nichiei/', '完全フロント形式。日曜日は朝10時から朝風呂をやっています。漢方薬湯、遠赤外線サウナは大好評。駐車場（8台）完備。コインランドリー併設。近隣に飲食店も数多くあります。\r\n\r\n2019年1月より、終了時間が22時になりました。', 0, 1, 0, 0, 1, 0, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;