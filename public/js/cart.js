function addToCart(id, event) {
    event.preventDefault();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "GET",
        url: "/cart/create",
        datatype: "json",
        data: {
            id: id,
        },
        success: function (response) {
            if (response) {
                $("#topbar").load(response + " #topbar");
            }
        },
    });
}
