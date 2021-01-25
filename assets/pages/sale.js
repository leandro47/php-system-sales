if ($('#sale').length) {

    var itenSaleImpo = 0;
    var itenSalePrice = 0;
    var itenTable = null;

    $(document).ready(function () {
        requestType();

    })

    function requestType() {
        $.ajax({
            type: "GET",
            url: `${BASE_URL}/getallcategories`,
            dataType: 'json',
            success: function (data) {

                $(".typeProductSale option").remove();
                $('.typeProductSale').append(`<option value='' disabled selected>Tipo de Produto</option>`);

                data.map(({
                    id,
                    description
                }) => {
                    $('.typeProductSale').append(`<option value='${id}'>${description}</option>`);
                });
            },
            error: function (data) {
            }
        });
    }

    function requestProduct() {

        let idType = $('#typeProduct option:selected').val();

        $.ajax({
            type: "GET",
            url: `${BASE_URL}/getproductbytype/${idType}`,
            dataType: 'json',
            success: function (data) {

                $(".product option").remove();
                $('.product').append(`<option value='' disabled selected>Produto</option>`);

                data.map(({
                    id,
                    description
                }) => {
                    $('.product').append(`<option value='${id}'>${description}</option>`);
                });
            },
            error: function (data) {
            }
        });
    }

    function datasItem() {
        let product = $('#product option:selected').val();
        let qtd = $('#qtd').val();

        $.ajax({
            type: "GET",
            url: `${BASE_URL}/getproductbyid/${product}`,
            dataType: 'json',
            success: function (data) {
                fillItem(data[0].price, data[0].imposed, qtd);
                itenTable = data[0];
            },
            error: function (data) {
                console.error(data);
            }
        });
        $('#btnAdd').removeClass('disabled')
        $('#qtd').removeAttr("disabled", true)
    }

    function fillItem(price, imposed, qtd) {

        let pric = realDecimal(price);
        let imp = imposed / 100;
        let impUni = pric * imp;
        let total = ((pric * qtd) * (imp + 1));

        $('#priceUnid').val(`R$ ${(pric).trim()}`);
        $('#imposedUnid').val(decimalReal(impUni));
        $('#totalIten').val(decimalReal(total));

        itenSaleImpo = impUni * qtd;
        itenSalePrice = pric;
    }

    function addItem() {

        //qtd
        let atualQtd = $('#totalQtdItens').val();
        let newQtd = $('#qtd').val();

        //imposed
        let atualImposed = parseFloat(realDecimal($('#totalImposed').val()));
        let newImposed = itenSaleImpo;

        //vlrSale
        let atualSale = parseFloat(realDecimal($('#totalSale').val()));
        let newSale = itenSalePrice * newQtd;

        // //TotalPay
        let atualPay = parseFloat(realDecimal($('#totalPay').val()));
        let newPay = sum(atualImposed, newImposed) + sum(atualSale, newSale);

        let total = decimalReal(sum(atualImposed, newImposed) + sum(atualSale, newSale))

        $('#totalQtdItens').val(sum(atualQtd, newQtd));
        $('#totalImposed').val(decimalReal(sum(atualImposed, newImposed)));
        $('#totalSale').val(decimalReal(sum(atualSale, newSale)));
        $('#totalPay').val(total);

        //addTable
        filltable();

        $('#qtd').val(1);
        $('#priceUnid').val(`R$ 0,00`);
        $('#imposedUnid').val(`R$ 0,00`);
        $('#totalIten').val(`R$ 0,00`);

        $(".product option").remove();
        $('.product').append(`<option value='' disabled selected>Produto</option>`);

        requestType();
        $('#btnAdd').addClass('disabled')
        $('#qtd').attr("disabled", true)
    }

    function saveSale() {

        let items = [];

        $('#tableItens').find("tbody tr").each(function () {
            items.push({
                id_product: $(this).find("td:eq(0)").html(),
                description: $(this).find("td:eq(1)").html(),
                price_uni: realDecimal($(this).find("td:eq(2)").html()),
                amount: $(this).find("td:eq(3)").html(),
                percentage_imposed: $(this).find("td:eq(4)").html(),
                total_pay: realDecimal($(this).find("td:eq(5)").html())
            })
        })

        const dataSale = {
            total_imposed: (realDecimal($('#totalImposed').val())).trim(),
            total_sale: (realDecimal($('#totalSale').val())).trim(),
            total_pay: (realDecimal($('#totalPay').val())).trim(),
            items: items
        };

        $.ajax({
            type: "POST",
            url: `${BASE_URL}/savesale`,
            data: dataSale,
            dataType: 'json',
            success: function (data) {

                Swal.fire({
                    icon: data.data.icon,
                    title: data.message,
                    showConfirmButton: false,
                    timer: 2000
                })

                emptyFields();
            },
            error: function (data) {
                console.log(data);
            }
        });

    }

    function filltable() {
        let qtd = $('#qtd').val();
        let pri = realDecimal(itenTable.price);
        let imposed = (itenTable.imposed / 100) + 1;
        let ttl = (pri * qtd) * imposed;
        strItem = `
        <tr  class="">
            <td>${itenTable.id_product}</td>
            <td>${itenTable.description}</td>
            <td>${itenTable.price}</td>
            <td>${qtd}</td>
            <td>${itenTable.imposed}</td>
            <td>${decimalReal(ttl)}</td>
        </tr>`

        $('#tableItens tbody').append(strItem);
        $('#btnSave').removeClass('disabled');
    }

    function emptyFields() {

        $('#tableItens tbody').empty()
        $('#totalImposed').val(`0,00`)
        $('#totalSale').val(`0,00`)
        $('#totalPay').val(`0,00`)
        $('#totalQtdItens').val(`0`)

        $('#qtd').val(1);
        $('#priceUnid').val(`R$ 0,00`);
        $('#imposedUnid').val(`R$ 0,00`);
        $('#totalIten').val(`R$ 0,00`);

        $(".product option").remove();
        $('.product').append(`<option value='' disabled selected>Produto</option>`);

        requestType();
        $('#btnAdd').addClass('disabled')
        $('#qtd').attr("disabled", true)
    }



}