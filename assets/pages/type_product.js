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
                url: `${BASE_URL}/getallcategories`,
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

            ],
            columns: [{
                data: "description",
                class: "center-align",
            },
            {
                data: "percentage_imposed",
                class: "center-align",
            },
            {
                class: "center-align",
                orderable: false,
                data: null,
                defaultContent: ``,
                render: function (data, type, row, meta) {
                    return `
                    <a class="waves-effect yellow darken-2 btn-small" onclick="update('${data.id}','${data.description}','${data.percentage_imposed}')"><i class="material-icons">create</i></a>
                    <a class="waves-effect orange darken-4 btn-small" onclick="deletar('${data.id}','${data.description}')"><i class="material-icons">delete_forever</i></a>
                    `
                }
            }
            ]
        })
    }

    $(document).ready(function () {
        $('#add').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "POST",
                url: `${BASE_URL}/savecategorie`,
                data: dados,
                dataType: 'json',
                success: function (data) {

                    $('#modalAdd').modal('close');
                    $('#imposed').val('');
                    $('#description').val('');

                    Swal.fire({
                        icon: data.data.icon,
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    })

                    requestDatas();
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    });


    function update(id, description, percentageImposed) {

        $('#idUpdate').val(id);
        $('#updateDescription').val(description);
        $('#updateImposed').val(percentageImposed);

        $('#modalUpdate').modal('open');

        $('#update').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "PUT",
                url: `${BASE_URL}/updatecategorie`,
                data: dados,
                dataType: 'json',
                success: function (data) {

                    $('#modalUpdate').modal('close');
                    $('#idUpdate').val('');
                    $('#updateDescription').val('');
                    $('#updateImposed').val('');

                    Swal.fire({
                        icon: data.data.icon,
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    })

                    requestDatas();
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    }

    function deletar(id, description) {

        $('#idDelete').val(id);
        $('#descriptionDelete').html(description);

        $('#modalDelete').modal('open');

        $('#delete').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "DELETE",
                url: `${BASE_URL}/deletecategorie`,
                data: dados,
                dataType: 'json',
                success: function (data) {

                    $('#modalDelete').modal('close');
                    $('#descriptionDelete').html('');
                    $('#idDelete').val('');

                    Swal.fire({
                        icon: data.data.icon,
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    })

                    requestDatas();
                },
                error: function (data) {
                    console.log(data);
                }
            });
            return false;
        });
    }
}