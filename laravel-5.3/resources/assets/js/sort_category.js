function getCate3(l25Id) {
    $(".cate35 ul.list-group").html("");
    var url = $("#route-get-catel3").val() + "/" + l25Id;
    $.ajax({
        url: url
    }).done(function (response) {
        var listL3 = "";
        $.each(response, function (index, cate) {
            listL3 +=
                "<li onclick='getCate35(" + cate.id + ")' class='list-group-item'>" +
                cate.id + ". " + cate.name + " - " + cate.priority +
                "</li>";
        });

        $(".cate3 ul.list-group").html(listL3);
    }).error(function () {
        alert('Error Ajax');
    });
}

function getCate35(l3Id) {
    var url = $("#route-get-catel35").val() + "/" + l3Id;
    $.ajax({
        url: url
    }).done(function (response) {
        var listL35 = "";
        $.each(response, function (index, cate) {
            listL35 +=
                "<li class='list-group-item'>" +
                cate.id + ". " + cate.name + " - " + cate.priority +
                "</li>";
        });

        $(".cate35 ul.list-group").html(listL35);
    }).error(function () {
        alert('Error Ajax');
    });
}