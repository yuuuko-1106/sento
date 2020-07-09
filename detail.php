<?php
require_once 'DBManager.php';
require_once 'function.php';

$sento = null;
$id = $_GET['id'] ?? '';
//var_dump($id);

//データ取得
$db = new DBManager();
$data = $db->getSentosDetail($id);
$sento = $data[0];
$images = array_column($data, 'image_name');

//データがなかった場合の処理を追加する
if(isset($id)){

}else{
    header('Location: index.php');
}
//    $tm = $db ->query(
//        'SELECT
//                id,
//                TIME_FORMAT(open_time, "%H:%i") AS open_time,
//                TIME_FORMAT(close_time, "%H:%i") AS close_time
//                FROM sento_master'
//    );
//    $times = $tm->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
//    $sento = $data[0];
//    $images = array_column($data, 'image_name');
    //var_dump($sento);
    //var_dump($images);
//}else{
//    header('Location: index.php');
//}
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
        <div id="detail-sec" class="container">
            <?php
                $zip = substr($sento['zip'], 0, 3) . "-" . substr($sento['zip'], 3);
                $holiday = toHoliday($sento['holiday']);
            ?>
            <div class="text-center mb-3">
                <div class="d-inline-block">
                    <h2 class="detail-ttl"><?= $sento['name'] ?></h2>
                </div>
                <div class="d-inline-block" style="vertical-align: text-bottom;">
                    <?= sentoStatus($holiday,$sento['open_time'],$sento['close_time']); ?>
                </div>
            </div>
            <div class='row'>
                <div class='col-12 text-center'>
                    <div id="image-carousel" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($images as $image): ?>
                                <?php if($images[0] == $image){ $addclass = "active"; }else{ $addclass = "";} ?>
                                <div class='carousel-item <?= $addclass ?>' >
                                    <img src='images/<?= $image ?>.png' class='m-2' style='width: 400px;'>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#image-carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#image-carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <p><?= $sento['memo'] ?></p>
                </div>
                <div class='col-12 col-sm-12 col-md-6'>
                    <table class='index-table'>
                        <tbody>
                        <tr><th>住所</th><td>〒<?= $zip ?><br><?= $sento['address'] ?></td></tr>
                        <tr><th>アクセス</th><td><?= $sento['access'] ?></td></tr>
                        <tr><th>電話番号</th><td><?= $sento['tell'] ?></td></tr>
                        <tr><th>休日</th><td><?= $holiday ?></td></tr>
                        <tr><th>営業時間</th><td><?= $sento['open_time'] ?> ～ <?= $sento['close_time']  ?></td></tr>
                        <tr><th>HP</th><td><a href="<?= $sento['url'] ?>"><?= $sento['url'] ?></a></td></tr>
                        </tbody>
                    </table>
                    <?php
                        $html = null;
                        $html = facilityLinks($sento);
                        echo $html;
                    ?>
                </div>
            </div>
            <div class="page-sec">
                <a onclick="history.back();" type="button" class="m-btn m-btn-primary">前に戻る</a>
            </div>
        </div>
    </div>
    <div id="site-footer">
        <p>銭湯MAP</p>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script type="text/javascript">
    $('#image-carousel').carousel({
        interval: 2000
    });
</script>

</body>
</html>
