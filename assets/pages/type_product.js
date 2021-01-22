if ($('#type_product').length) {

    $(document).ready(function () {
        requestDatas();
    })

    function requestDatas() {
        tableArea = $(`#table_type_product`).DataTable({
            sPaginationType: "full_numbers",
            destroy: true,
            responsive: false,
            ajax: {
                url: `${BASE_URL}/getAllCategories`,
                dataType: "json",
                cache: false,
                dataSrc: (data) => {
                    return data || []
                },
                error: (e) => {
                    $("#btnNew").removeClass("disabled")
                },
                beforeSend: () => {
                    $("#btnNew").addClass("disabled", true)
                },
                complete: () => {
                    $("#btnNew").removeClass("disabled")
                }
            },
            order: [
                [0, 'desc']
            ],
            columns: [{
                data: "description",
                class: "center-align",
            },
            {
                data: "percentageImposed",
                class: "center-align",
            },
            {
                class: "center-align",
                orderable: false,
                data: null,
                defaultContent: ``,
                render: function (data, type, row, meta) {
                    return `
                    <a class="waves-effect yellow darken-2 btn-small"><i class="material-icons">create</i></a>
                    <a class="waves-effect orange darken-4 btn-small"><i class="material-icons">delete_forever</i></a>
                    `
                }
            }
            ]
        })
    }
}