
    // 地図の中心を指定
    let center = {lat: 35.520315, lng: 139.369782};
    function initMap(listener) {
        // 地図を埋め込む
        map = new google.maps.Map(document.getElementById('onsen-map'), {
            center: center,
            zoom: 11 // 地図のズームを指定
        });
        //ジオコーディングのインスタンスの生成
        let geocoder = new google.maps.Geocoder();
        // マーカー毎の処理
        for (var i = 0; i < mapDataList.length; i++) {
            //情報ウィンドウの生成
            let infoWindow = new google.maps.InfoWindow({
                content: '<div class=""><a href="detail.php?id=' + mapDataList[i].id + '">' + mapDataList[i].name + '</a></div>',
                pixelOffset: new google.maps.Size(0, 5)
            });
            geocoder.geocode(
                {address: mapDataList[i].address},
                function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        //マーカーの生成
                        var marker = new google.maps.Marker({
                            position: results[0].geometry.location,
                            map: map,
                            animation: google.maps.Animation.DROP,
                            icon: {
                                url: 'images/onsen_marker.png',
                                scaledSize: new google.maps.Size(35, 35)
                            }
                        });
                        //情報ウィンドウを表示
                        marker.addListener('click', function () {
                            infoWindow.open(map, marker);
                        });
                    }else{
                        alert('失敗しました。理由: ' + status);
                    }
                }
            );
        }
    }

