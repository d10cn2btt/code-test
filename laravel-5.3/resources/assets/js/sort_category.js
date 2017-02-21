var pL = {
    'cate25Order': "",
    'cate25Selected': "",
    'cate3Order': "",
    'cate3Selected': "",
    'cate35Selected': "",
};

Sortable.create(cate25_sortable, {
    animation: 150,
    onUpdate: function (/**Event*/evt) {
        pl.cate25Order = [];
        $.each(evt.target.children, function (index, item) {
            pl.cate25Order.push(item.getAttribute('data-id'));
        });
    },
});

Sortable.create(cate3_sortable, {
    animation: 150,
});

// when select cate25
function getCate3(l25Id, element) {
    pL.cate25Selected = l25Id;
    $('#cate25_sortable li').removeClass('selected-cate');
    element.className += ' selected-cate';

    $(".cate35 ul.list-group").html("");
    var url = $("#route-get-catel3").val() + "/" + l25Id;
    $.ajax({
        url: url
    }).done(function (response) {
        var listL3 = "";
        $.each(response, function (index, cate) {
            listL3 +=
                "<li onclick='getCate35(" + cate.id + ", this)' class='list-group-item'>" +
                cate.id + ". " + cate.name + " - " + cate.priority +
                "</li>";
        });

        $(".cate3 ul.list-group").html(listL3);
    }).error(function () {
        alert('Error Ajax');
    });
}

// when select cate3
function getCate35(l3Id, element) {
    pL.cate3Selected = l3Id;
    $('#cate3_sortable li').removeClass('selected-cate');
    element.className += ' selected-cate';

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