$(function () {
//パララックス
    var target1 = $("#para1");
    var targetPosOT1 = target1.offset().top;
    var target2 = $("#para2");
    var targetPosOT2 = target2.offset().top;
    var targetFactor = 0.5;
    var windowH = $(window).height();
    var scrollYStart1 = targetPosOT1 - windowH;
    var scrollYStart2 = targetPosOT2 - windowH;
    $(window).on('scroll', function () {
        var scrollY = $(this).scrollTop();
        if (scrollY > scrollYStart1) {
            target1.css('background-position-y', (scrollY - targetPosOT1) * targetFactor + 'px');
        } else {
            target1.css('background-position', 'center top');
        }
        if (scrollY > scrollYStart2) {
            target2.css('background-position-y', (scrollY - targetPosOT2) * targetFactor + 'px');
        } else {
            target2.css('background-position', 'center top');
        }
    });

});
