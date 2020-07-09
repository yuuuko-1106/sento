<?php


class DBManager
{
    //DB接続用定数
    private const DSN = 'mysql:host=localhost;dbname=sento';
    private const USER = 'root';
    private const PASS = 'root';
//    private const DSN = 'mysql:host=mysqlXXX.phy.lolipop.lan;dbname=XXXXXXXXXXXX';
//    private const USER = 'LAAXXXXXXXXXx';
//    private const PASS = 'xxxxxxxxxxx';

    private $db = null;

    public function __construct(){
        $this->db = new PDO(self::DSN, self::USER, self::PASS);
    }

    //データ取得(index.php)
    public function getAllSentos() :array {
        $st = $this->db->query(
            'SELECT
                t1.id,
                t1.name,
                t1.zip,
                t2.image_name,
                t1.address,
                t1.access,
                t1.tell,
                t1.holiday,
                t1.open_time,
                t1.close_time,
                t1.search_sauna,
                t1.search_coldspa,
                t1.search_openspa,
                t1.search_sodaspa,
                t1.search_parking,
                t1.search_restaurant,
                t1.search_restroom,
                t1.search_comic,
                t1.search_salon,
                t1.search_wifi,
                TIME_FORMAT(t1.open_time, "%H:%i") AS open_time,
                TIME_FORMAT(t1.close_time, "%H:%i") AS close_time
                FROM sento_master AS t1
                LEFT JOIN image_master AS t2
                ON t1.id = t2.sento_id'
        );
        return $st->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_ASSOC);
    }

    //データ取得(detail.php)
    public function getSentosDetail(int $id) :array {
        $where = null;
        $where = " t1.id = :id";
        $st = self::getSentoStatement($where);
        $st->bindParam(':id', $id);
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    //データ取得(result.php)
    public function getSentosResult(array $params) :array {
        $where = null;
        $searchItem = null;
        $cnt = count($params['search-items']);
        if($cnt > 0 ) {
            for ($i = 1; $i <= $cnt; $i++) {
                $searchItem = "search_" . $params['search-items'][$i-1] . " = 1";
                if ($cnt == 1 OR ($cnt > 1 AND $i == $cnt) ) {
                    $where .= "{$searchItem}";
                } else {
                    $where .= "{$searchItem}"." AND ";
                }
            }
        }
        //$searchKeyword = $params['search-keyword'] ?? null;
        if (isset($params['search-keyword'])) {
            $where .= ($params['search-items'] ? ' AND ': '').
                "(name LIKE :searchText OR address LIKE :searchText
            OR access LIKE :searchText OR memo LIKE :searchText )";
        }
        $st = self::getSentoStatement($where);
        $st->bindValue(':searchText', "%{$params['search-keyword']}%");
        $st->execute();
        return $st->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_ASSOC);
    }
    //ステートメント取得(result.php、detail.php)
    private function getSentoStatement(string $where) :PDOStatement {
        $st = $this->db->prepare(
            'SELECT
                t1.id,
                t1.name,
                t1.zip,
                t2.image_name,
                t1.address,
                t1.access,
                t1.tell,
                t1.holiday,
                t1.open_time,
                t1.close_time,
                t1.url,
                t1.memo,
                t1.search_sauna,
                t1.search_coldspa,
                t1.search_openspa,
                t1.search_sodaspa,
                t1.search_parking,
                t1.search_restaurant,
                t1.search_restroom,
                t1.search_comic,
                t1.search_salon,
                t1.search_wifi,
                TIME_FORMAT(t1.open_time, "%H:%i") AS open_time,
                TIME_FORMAT(t1.close_time, "%H:%i") AS close_time
                FROM sento_master AS t1
                LEFT JOIN image_master AS t2
                ON t1.id = t2.sento_id'
            . ($where ? ' WHERE ' . $where : '')
        );
        return $st;
    }
}