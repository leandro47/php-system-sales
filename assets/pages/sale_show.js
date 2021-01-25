if ($('#sale_show').length) {

    $(document).ready(function () {
        requestDatas();
    })

    function showItens(id){
        console.log(id)
        $.ajax({
            type: "GET",
            url: `${BASE_URL}/getitens/${id}`,
            dataType: 'json',
            success: function (data) {
              console.log(data)
            },
            error: function (data) {
            }
        });
    }

    function del(id){
        $.ajax({
            type: "DELETE",
            url: `${BASE_URL}/deletesale/${id}`,
            dataType: 'json',
            success: function (data) {

                requestDatas()

                Swal.fire({
                    icon: data.data.icon,
                    title: data.message,
                    showConfirmButton: false,
                    timer: 2000
                })
            },
            error: function (data) {
            }
        });
    }

    function requestDatas() {
        tableArea = $(`#table_show`).DataTable({
            sPaginationType: "full_numbers",
            destroy: true,
            responsive: false,
            ajax: {
                url: `${BASE_URL}/getallsale`,
                dataType: "json",
                cache: false,
                dataSrc: (data) => {
                    return data || []
                },
                error: (e) => {
                },
                beforeSend: () => {
                },
                complete: () => {
                }
            },
            order: [

            ],
            columns: [{
                data: "id",
                class: "center-align",
            },
            {
                data: "imposed",
                class: "center-align",
            },
            {
                data: "sale",
                class: "center-align",
            },
            {
                data: "pay",
                class: "center-align",
            },
            {
                data: "dateRegister",
                class: "center-align",
            },
            {
                class: "center-align",
                orderable: false,
                data: null,
                defaultContent: ``,
                render: function (data, type, row, meta) {
                    return `
                    <a class="waves-effect blue btn" onclick="showItens(${data.id})"><i class="material-icons">remove_red_eye</i></a>
                    <a class="waves-effect red btn" onclick="del(${data.id})"><i class="material-icons">delete_forever</i></a>
                    `
                }
            }
            ]
        })
    }
}