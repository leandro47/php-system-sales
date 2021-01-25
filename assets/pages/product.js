if ($('#product').length) {

    $(document).ready(function () {
        requestDatas();
        requestCategory();
    })

    function requestDatas() {
        tableArea = $(`#table_product`).DataTable({
            sPaginationType: "full_numbers",
            destroy: true,
            responsive: false,
            ajax: {
                url: `${BASE_URL}/getallproduct`,
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
                data: "price",
                class: "center-align",
            },
            {
                data: "type_product",
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
                    <a class="waves-effect yellow darken-2 btn-small" onclick="update('${data.id}','${data.description}','${data.price}','${data.id_type}')"><i class="material-icons">create</i></a>
                    <a class="waves-effect orange darken-4 btn-small" onclick="deletar('${data.id}','${data.description}')"><i class="material-icons">delete_forever</i></a>
                    `
                }
            }
            ]
        })
    }

    function requestCategory() {
        $.ajax({
            type: "GET",
            url: `${BASE_URL}/getallcategories`,
            dataType: 'json',
            success: function (data) {

                $(".typeProduct option").remove();
                $('.typeProduct').append(`<option value='' disabled selected>Tipo de Produto</option>`);

                data.map(({
                    id,
                    description
                }) => {
                    $('.typeProduct').append(`<option value='${id}'>${description}</option>`);
                });
            },
            error: function (data) {
            }
        });
    }

    $(document).ready(function () {
        $('#add').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "POST",
                url: `${BASE_URL}/saveproduct`,
                data: dados,
                dataType: 'json',
                success: function (data) {

                    $('#modalAdd').modal('close');
                    $('#description').val('');
                    $('#price').val('');
                    requestCategory();

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

    function update(id, description, price, idType) {

        $('#idUpdate').val(id);
        $('#updateDescription').val(description);
        $('#updatePrice').val(price);

        $('#updateTypeProduct option').removeAttr('selected', true);

        $('#updateTypeProduct option').each(function () {

            if ($(this).attr('value') == idType) {
                $(this).attr('selected', true);
            }
        });

        $('#modalUpdate').modal('open');

        $('#update').submit(function () {
            var dados = $(this).serialize();
            $.ajax({
                type: "PUT",
                url: `${BASE_URL}/updateproduct`,
                data: dados,
                dataType: 'json',
                success: function (data) {

                    $('#modalUpdate').modal('close');
                    $('#idUpdate').val('');
                    $('#updateDescription').val('');
                    $('#updatePrice').val('');

                    $('#updateTypeProduct option').removeAttr('selected', true);

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
                url: `${BASE_URL}/deleteproduto`,
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