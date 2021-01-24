//Float button
$(document).ready(function () {
    $('.fixed-action-btn').floatingActionButton();
});

//Tooltips
$(document).ready(function () {
    $('.tooltipped').tooltip();
});

//Modals
$(document).ready(function () {
    $('.modal').modal();
});

//Mask
$('.imposed').mask('##0.00', { reverse: true });
$('.price').mask('#.##0,00', { reverse: true });

//Active inputs
$(document).ready(function () {
    M.updateTextFields();
});

//Select 
$(document).ready(function () {
    $('select').formSelect();
});

//Real for decimal
const realDecimal = (v) => {
    value = v.replace('.', '');
    value = value.replace('R$', '');
    return value = value.replace(',', '.');
}

//Decimal for real
function decimalReal(v) {
    return v.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
}

function sum(a, b) {
    let vlrA = a * 1;
    let vlrB = b * 1;
    return vlrA + vlrB;
}