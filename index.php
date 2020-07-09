<?php
require_once 'DBManager.php';
require_once 'function.php';

//ページングの定数
const SHOWMAX = 5;

//データ取得
$db = new DBManager();
$get_data = $db->getAllSentos();

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
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>温泉MAP</title>
</head>
<body>
<div id="wrapper">
    <div id="site-header">
        <div id="header-logo"><a href="index.php"><img src="images/logo.png" alt="温泉MAP" class="site-logo"></a></div>
        <div id="site-nav">
            <ul>
                <li><a href="index.php#search-sec"><i class="fas fa-search hvr-icon"></i>条件で探す</a></li>
                <li>|</li>
                <li><a href="index.php#map-sec"><i class="fas fa-map-marked-alt"></i>地図から探す</a></li>
            </ul>
        </div>
    </div>
    <div id="main-contents">
        <div id="para1">
            <div class="lead-sec">
                <p class="lead">疲れた時は銭湯！</p>
                <p class="lead">日頃の疲れを癒して</p>
                <p class="lead">心身ともに</p>
                <p class="lead">リフレッシュしませんか？</p>
            </div>
            <div id="search-sec">
                <h2 class="contents-ttl seach-ttl"><i class="fas fa-search"></i> 条件で探す</h2>
                <form action="result.php" method="GET" class="seach-form" name="sform">
                    <div class="form-row pb-3">
                        <div class="col">
                            <input type="text" class="form-control form-control-lg input-field" name="search-keyword"
                                   placeholder="銭湯名、住所、キーワードを入力">
                        </div>
                    </div>
                    <div class="check-field">
                        <div class="form-row  pb-3 form-check form-check-inline">
                            <div class="col-6 col-sm-4">
                                <input class="check-input" type="checkbox" name="search-items[]" value="sauna"
                                       id="check-sauna">
                                <label class="check-label" for="defaultCheck1">サウナ</label>
                            </div>
                            <div class="col-6 col-sm-4">
                                <input class="check-input" type="checkbox" name="search-items[]" value="coldspa"
                                       id="check-coldspa">
                                <label class="check-label" for="defaultCheck1">水風呂</label>
                            </div>
                            <div class="col-6 col-sm-4">
                                <input class="check-input" type="checkbox" name="search-items[]" value="openspa"
                                       id="check-openspa">
                                <label class="check-label" for="defaultCheck1">露天風呂</label>
                            </div>
                            <div class="col-6 col-sm-4">
                                <input class="check-input" type="checkbox" name="search-items[]" value="sodaspa"
                                       id="check-sodaspa">
                                <label class="check-label" for="defaultCheck1">炭酸泉</label>
                            </div>
                            <div class="col-6 col-sm-4">
                                <input class="check-input" type="checkbox" name="search-items[]" value="parking"
                                       id="check-parking">
                                <label class="check-label" for="defaultCheck1">駐車場</label>
                            </div>
                            <div class="col-6 col-sm-4">
                                <input class="check-input" type="checkbox" name="search-items[]" value="restaurant"
                                       id="check-restaurant">
                                <label class="check-label" for="defaultCheck1">お食事処</label>
                            </div>
                            <div class="col-6 col-sm-4">
                                <input class="check-input" type="checkbox" name="search-items[]" value="restroom"
                                       id="check-restroom">
                                <label class="check-label" for="defaultCheck1">休憩処</label>
                            </div>
                            <div class="col-6 col-sm-4">
                                <input class="check-input" type="checkbox" name="search-items[]" value="comic"
                                       id="check-comic">
                                <label class="check-label" for="defaultCheck1">漫画コーナー</label>
                            </div>
                            <div class="col-6 col-sm-4">
                                <input class="check-input" type="checkbox" name="search-items[]" value="salon"
                                       id="check-salon">
                                <label class="check-label" for="defaultCheck1">アカスリ/エステ</label>
                            </div>
                            <div class="col-6 col-sm-4">
                                <input class="check-input" type="checkbox" name="search-items[]" value="wifi"
                                       id="check-wifi">
                                <label class="check-label" for="defaultCheck1">Wi-Fiフリー</label>
                            </div>
                        </div>
                    </div>
                    <div class="btn-field">
                        <a  onclick="document.forms.sform.submit()" class="m-btn m-btn-primary"><i
                                    class="fas fa-search"></i>検索</a>
                    </div>
                </form>
            </div>
        </div>
        <div id="map-sec" style="background-color: white;position: relative;padding-top: 100px;">
            <h2 class="contents-ttl map-ttl"><i class="fas fa-map-marked-alt"></i> 地図で探す</h2>
            <div id="onsen-map">

            </div>
        </div>
        <div id="para2">
        </div>
        <div id="index-sec">
            <h2 class="contents-ttl index-ttl"><img style="width: 50px;" src="images/onsen.png" alt="銭湯一覧">銭湯一覧</h2>
                <?php foreach ($sentos as $sentoId => $row) : ?>
                    <div class='row'>
                        <?php
                            $sento = $row[0];
                            $zip = substr($sento['zip'], 0, 3) . "-" . substr($sento['zip'], 3);
                            $holiday = toHoliday($sento['holiday']);
                        ?>
                        <div class='col-12 col-sm-12 col-md-6 image-sec'>
                            <a href="detail.php?id=<?= $sentoId ?>" class="name-link">
                                <img src='images/<?= $sento['image_name'] ?>.png' class="index-img">
                            </a>
                        </div>
                        <div class='col-12 col-sm-12 col-md-6'>
                            <a href="detail.php?id=<?= $sentoId ?>">
                                <div class="pt-3">
                                    <div class="d-inline-block">
                                        <h5 class="sento-name name-link"><?= $sento['name'] ?>　</h5>
                                    </div>
                                    <div class="d-inline-block" style="vertical-align: text-bottom;">
                                        <?= sentoStatus($holiday,$sento['open_time'],$sento['close_time']); ?>
                                    </div>
                                </div>
                                <table class='index-table'>
                                    <tbody>
                                    <tr>
                                        <th>住所</th>
                                        <td class="sento-address">〒<?= $zip ?><br><?= $sento['address'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>アクセス</th>
                                        <td><?= $sento['access'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>電話番号</th>
                                        <td><?= $sento['tell'] ?></td>
                                    </tr>
                                    <tr><th>休日</th><td><?= $holiday ?></td></tr>
                                    <tr><th>営業時間</th><td><?= $sento['open_time'] ?> ～ <?= $sento['close_time']  ?></td></tr>
                                    </tbody>
                                </table>
                            </a>
                            <?= facilityLinks($sento); ?>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <div class="page-sec">
                <?php
                    for($i = 1; $i <= $max_page; $i++){ // 最大ページ数分リンクを作成
                        if ($i == $now) { // 現在表示中のページ数の場合はリンクを貼らない
                            echo '<a class="page-btn-now">'. $now. '</a>'. '　';
                        }else {
                            echo '<a href="index.php?page_id='. $i.'#index-sec" class="page-btn">'. $i. '</a>'. '　';
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
<!--    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"-->
<!--            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"-->
<!--            crossorigin="anonymous"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script>
    <?php
    foreach ($get_data as $sentoId => $row) {
        $DataList[] = array(
            'id' => $sentoId,
            'name' => $row[0]['name'],
            'address' => $row[0]['address']
        );
    }
    $mapDataList = json_encode($DataList);
    ?>
    var mapDataList = <?= $mapDataList ?>;
</script>
<script type="text/javascript" src="js/map.js"></script>
<script type="text/javascript" src="js/onsen.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpXnJnT7uttZCC5wY7dvVgRhUTAKK0dbE&callback=initMap"></script>
</body>
</html>
