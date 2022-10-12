var total = 0;
function calcularTotal() {
    total = 0;
    calculo_monto_honorario = parseFloat($('.calculo_monto_honorario').val().replace(",", "."));
    calculo_monto_honorario = (isNaN(calculo_monto_honorario)) ? 0 : calculo_monto_honorario;
    if (calculo_monto_honorario == 0) {
        $('.calculo_monto_honorario').val(0);
    }
    calculo_monto_iva = parseFloat($('.calculo_monto_iva').val().replace(",", "."));
    calculo_monto_iva = (isNaN(calculo_monto_iva)) ? 0 : calculo_monto_iva;
    if (calculo_monto_iva == 0) {
        $('.calculo_monto_iva').val(0);
    }
    calculo_monto_aporte = parseFloat($('.calculo_monto_aporte').val().replace(",", "."));
    calculo_monto_aporte = (isNaN(calculo_monto_aporte)) ? 0 : calculo_monto_aporte;
    if (calculo_monto_aporte == 0) {
        $('.calculo_monto_aporte').val(0);
    }
    total = calculo_monto_honorario + calculo_monto_iva + calculo_monto_aporte;
    $('.calculo_total').val(total.toString().replace(".", ","));
}
$(".calculo_monto_honorario").change(function() {
    calcularTotal();
});
$(".calculo_monto_iva").change(function() {
    calcularTotal();
});
$(".calculo_monto_aporte").change(function() {
    calcularTotal();
});