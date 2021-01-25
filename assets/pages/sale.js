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

        $('#priceUnid').val(`R$ ${decimalReal(price)}`);
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

    function filltable() {
        let qtd = $('#qtd').val();
        let pri = realDecimal(itenTable.price);
        let imposed = (itenTable.imposed / 100) + 1;
        let ttl = (pri * qtd) * imposed;
        strItem = `
        <tr>
            <td>${itenTable.idProduct}</td>
            <td>${itenTable.description}</td>
            <td>${qtd}</td>
            <td>${itenTable.imposed}</td>
            <td>${decimalReal(ttl)}</td>
        </tr>`

        $('#tableItens').append(strItem)
    }

}