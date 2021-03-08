$("#division").on("change", function () {
    if (this.value != "") {
        $("#district").prop("disabled", false);
        $("#district")
            .find("option")
            .remove()
            .end()
            .append('<option value=""> </option>');

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "GET",
            url: "/checkout/getdistrict",
            datatype: "json",
            data: {
                division: this.value,
            },
            success: function (response) {
                if (response) {
                    // alert(response[0]);
                    for (i = 0; i < response.length; i++) {
                        // console.log(response[i]);
                        $("#district").append(
                            '<option value="' +
                                response[i] +
                                '">' +
                                response[i] +
                                "</option>"
                        );
                    }
                }
            },
        });
    } else {
        $("#district").prop("disabled", "disabled");
    }
});
