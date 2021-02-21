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

function updateCart(cartId, event) {
    // event.preventDefault();
    var quantity = document.getElementById("quantity" + cartId).value;
    // alert("ID:"+cartId+"  Quantity:"+quantity);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "GET",
        url: "/cart/update",
        datatype: "json",
        data: {
            cartId: cartId,
            quantity: quantity,
        },
        success: function (response) {
            if (response) {
                setTimeout(() => {
                    $("#cart-view").load(response + " #cart-view");
                    $("#cart-topbar").load(response + " #cart-topbar");
                    $("#topbar").load(response + " #topbar");
                }, 500);

                // $("#cart-view").load(response + " #cart-view");
            }
        },
    });
}

function removeFromCart(cartId, event) {
    // event.preventDefault();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "GET",
        url: "/cart/delete",
        datatype: "json",
        data: {
            cartId: cartId,
        },
        success: function (response) {
            if (response) {
                $("#cart-view").load(response + " #cart-view");
                $("#cart-topbar").load(response + " #cart-topbar");
                $("#topbar").load(response + " #topbar");
            }
        },
    });
}
