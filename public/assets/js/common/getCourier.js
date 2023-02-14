$(function () {
    $("#address").change(function (e) {
        var value = e.target.value;
        var courierEl = $("#courier");
        axios
            .get(route("courier.by.city", { city_id: value }))
            .then(function (res) {
                courierEl.empty();
                courierEl.append(
                    `<option value="" selected>--Pilih Kurir--</option>`
                );
                $.each(res.data.couriers, function (idx, courier) {
                    courierEl.append(
                        `<option value="${courier.code}">${courier.title}</option>`
                    );
                });
            });
    });
});
