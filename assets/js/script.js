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