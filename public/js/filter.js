function clickSort() {
    var val = document.getElementById("sortChoice").value;
    // var data = <?php echo json_encode($data['products']) ?>;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "GET",
        url: '/search/sort',
        datatype: "json",
        data: {
            sort: val,
            // data: data
        },
        success: function(response) {
            if (response) {
                // console.log(response['order']);
                if (response['order'] == "asc") {
                    document.getElementById("sortUpArrow").style.opacity = 1;
                    document.getElementById("sortDownArrow").style.opacity = 0.5;
                } else if (response['order'] == "desc") {
                    document.getElementById("sortDownArrow").style.opacity = 1;
                    document.getElementById("sortUpArrow").style.opacity = 0.5;
                }

                $('#ProductView').load(response['url'] + " #ProductView");
            }
        },
    });
}

function clickUpArrow() {
    var val = document.getElementById("sortChoice").value;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "GET",
        url: '/search/order',
        datatype: "json",
        data: {
            sort: val,
            order: "asc",
        },
        success: function(response) {
            if (response) {
                console.log(response['url']);

                document.getElementById("sortUpArrow").style.opacity = 1;
                document.getElementById("sortDownArrow").style.opacity = 0.5;

                $('#ProductView').load(response['url'] + " #ProductView");
            }
        },
    });
}

function clickDownArrow() {
    var val = document.getElementById("sortChoice").value;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "GET",
        url: '/search/order',
        datatype: "json",
        data: {
            sort: val,
            order: "desc",
        },
        success: function(response) {
            if (response) {
                console.log(response['url']);

                document.getElementById("sortDownArrow").style.opacity = 1;
                document.getElementById("sortUpArrow").style.opacity = 0.5;

                $('#ProductView').load(response['url'] + " #ProductView");
            }
        },
    });
}