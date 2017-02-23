var pL = {
    'cate25Order': "",
    'cate25Selected': "",
    'cate3Order': {},
    'cate3Selected': "",
    'cate35Selected': "",
};

Sortable.create(cate25_sortable, {
    animation: 150,
    onUpdate: function (/**Event*/evt) {
        pL.cate25Order = [];
        $.each(evt.target.children, function (index, item) {
            pL.cate25Order.push(item.getAttribute('data-id'));
        });
    },
});

Sortable.create(cate3_sortable, {
    animation: 150,
    onUpdate: function (/**Event*/ evt) {
        var tmp = [];
        $.each(evt.target.children, function (index, item) {
            tmp[index] = {"id": item.getAttribute('data-id'), "name": item.getAttribute('data-name')};
        });
        pL.cate3Order["cate25Id_"+pL.cate25Selected] = tmp;
    }
});

// when select cate25
function getCate3(l25Id, element) {
    pL.cate25Selected = l25Id;
    $('#cate25_sortable li').removeClass('selected-cate');
    element.className += ' selected-cate';
    $(".cate35 ul.list-group").html("");

    if (checkExistCate(3)) {
        return true;
    }

    var url = $("#route-get-catel3").val() + "/" + l25Id;
    $.ajax({
        url: url
    }).done(function (response) {
        renderHtmlCate3(response);
    }).error(function () {
        alert('Error Ajax');
    });
}

/**
 * If exist cate, will not call ajax and render cateHtml with order we dragged
 * @param leveCate
 * @returns {boolean}
 */
function checkExistCate(leveCate) {
    var result = false;
    switch (leveCate) {
        case 3:
            $.each(pL.cate3Order, function (index, cate3) {
                if (index == "cate25Id_" + pL.cate25Selected) {
                    renderHtmlCate3(cate3);
                    result = true;
                }
            });
    }
    return result;
}

function renderHtmlCate3(data) {
    var listL3 = "";
    $.each(data, function (index, cate) {
        listL3 +=
            "<li data-name='" + cate.name + "' data-id='" + cate.id + "' onclick='getCate35(" + cate.id + ", this)'" +
            " class='list-group-item'>" + cate.id + ". " + cate.name + " - " + cate.priority +
            "</li>";
    });

    $(".cate3 ul.list-group").html(listL3);
}

// when select cate3
function getCate35(l3Id, element) {
    pL.cate3Selected = l3Id;
    $('#cate3_sortable li').removeClass('selected-cate');
    element.className += ' selected-cate';

    var url = $("#route-get-catel35").val() + "/" + l3Id;
    $.ajax({
        url: url,
        data: {
            'testData': pL
        }
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