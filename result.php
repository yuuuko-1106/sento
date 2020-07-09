<?php
require_once 'DBManager.php';
require_once 'function.php';
//ページングの定数
const SHOWMAX = 5;

//データ取得
$params = $_GET ?? '';
if (isset($params)) {
    $db = new DBManager();
    $get_data = $db->getSentosResult($params);
}

//ページング処理
$sentos_num = count($get_data);//トータルデータ件数
$max_page = ceil($sentos_num / SHOWMAX);//トータルページ数
if(!isset($_GET['page_id'])){ //渡された現在のページ数
    $now = 1; // 設定されてない場合は1ページ目にする
}else{
    $now = $_GET['page_id'];
}
$start_no = ($now - 1) * SHOWMAX; // 配列の何番目から取得すればよいか
$sentos = array_slice($get_data, $start_no, SHOWMAX, true);
//$db = new PDO(DSN, USER, PASS);
//$st = $db->prepare(
//    'SELECT *
//                FROM sento_master AS t1
//                LEFT JOIN image_master AS t2
//                ON t1.id = t2.sento_id'
//    . ($where ? ' WHERE ' . $where : '')
//);
//$tm = $db ->query(
//    'SELECT
//                id,
//                TIME_FORMAT(open_time, "%H:%i") AS open_time,
//                TIME_FORMAT(close_time, "%H:%i") AS close_time
//                FROM sento_master'
//);
////var_dump($st);
//$st->bindValue(':searchText', "%{$searchText}%");
//$st->execute();
//$sentos = $sentos->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_ASSOC);
//$times = $tm->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
?>
<!doctype html>
<html lang="ja" xmlns:vertical-align="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
          integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>検索結果｜銭湯MAP</title>
</head>
<body>
<div id="wrapper">
    <div id="site-header">
        <div id="header-logo"><a href="top.php"><img src="images/logo.png" alt="温泉MAP" class="site-logo"></a></div>
        <div id="site-nav">
            <ul>
                <li><a href="top.php#search-sec"><i class="fas fa-search hvr-icon"></i>条件で探す</a></li>
                <li>|</li>
                <li><a href="top.php#map-sec"><i class="fas fa-map-marked-alt"></i>地図から探す</a></li>
            </ul>
        </div>
    </div>
    <div id="main-contents">
        <div id="result-sec" class="container">
            <h2 class="result-ttl"><i class="fas fa-search"></i> 検索結果</h2>
            <p class="result-read">「<?= $params['search-keyword'] ?>
            <?php
            //var_dump($sentos);
                $val=[];
                foreach($params['search-items'] as $item){
                    switch ($item){
                        case "sauna":
                            echo "サウナ";
                            break;
                        case "coldspa":
                            echo "水風呂";
                            break;
                        case "openspa":
                            echo "露天風呂";
                            break;
                        case "sodaspa":
                            echo "炭酸泉";
                            break;
                        case "parking":
                            echo "駐車場";
                            break;
                        case "restaurant":
                            echo "お食事処";
                            break;
                        case "restroom":
                            echo "休憩処";
                            break;
                        case "comic":
                            echo "漫画コーナー";
                            break;
                        case "salon":
                            echo "アカスリ/エステ";
                            break;
                        case "wifi":
                            echo "Wi-Fiフリー";
                            break;
                    }
                    echo " ";
                }
            ?>
            」で検索</p>
            <?php if(empty($sentos)) echo "<p style=\"text-align: center\">条件に合う銭湯は見つかりませんでした。</p>" ?>
            <?php foreach ($sentos as $sentoId => $row) : ?>
            <div class='row'>
                <?php
                    //var_dump($sentos);
                    $sento = $row[0];
                    $zip = substr($sento['zip'], 0, 3) . "-" . substr($sento['zip'], 3);
                    $holiday = toHoliday($sento['holiday']);
                ?>
                <div class='col-12 col-sm-12 col-md-6 image-sec'>
                    <img src='images/<?= $sento['image_name'] ?>.png' class="index-img">
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <a href="detail.php?id=<?= $sentoId ?>">
                        <div class="pt-3">
                            <div class="d-inline-block">
                                <h5 class="name-link"><?= $sento['name'] ?>　</h5>
                            </div>
                            <div class="d-inline-block" style="vertical-align: text-bottom;">
                                <?= sentoStatus($holiday,$sento['open_time'],$sento['close_time']); ?>
                            </div>
                        </div>
                        <table class='index-table'>
                            <tbody>
                            <tr><th>住所</th><td>〒<?= $zip ?><br><?= $sento['address'] ?></td></tr>
                            <tr><th>アクセス</th><td><?= $sento['access'] ?></td></tr>
                            <tr><th>電話番号</th><td><?= $sento['tell'] ?></td></tr>
                            <tr><th>休日</th><td><?= $holiday ?></td></tr>
                            <tr><th>営業時間</th><td><?=$sento['open_time'] ?> ～ <?= $sento['close_time']  ?></td></tr>
                            </tbody>
                        </table>
                    </a>
                    <?php
                        $html = null;
                        $html = facilityLinks($sento);
                        echo $html;
                    ?>
                </div>
            </div>
            <hr>
            <?php endforeach; ?>
            <div class="page-sec">
                <?php
                    //検索情報の引継ぎ
                    if(isset($params['search-keyword'])){
                        $url .= 'search-keyword='.$params['search-keyword'];
                    }
                    if(isset($params['search-items'])) {
                        for($i=0,$cnt=count($params['search-items']); $i<$cnt; $i++) {
                            $url .= $url ? "&": "";
                            $url .= 'search-items[]='.$params['search-items'][$i];
                        }
                    }
                    //ページリンク作成
                    for($i = 1; $i <= $max_page; $i++){ // 最大ページ数分リンクを作成
                        if ($i == $now) { // 現在表示中のページ数の場合はリンクを貼らない
                            echo '<a class="page-btn-now">'. $now. '</a>　';
                        }else {
                            echo '<a href="result.php?'.$url.'&page_id='.$i.'" class="page-btn">'. $i. '</a>　';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <div id="site-footer">
        <p>銭湯MAP</p>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>
</html>
