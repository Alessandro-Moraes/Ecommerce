//Função Data Real
function dataHoje() {
    let dia = new Date();
    return diaHoje = `${("0" + dia.getDate()).slice(-2)}/${("0" + (dia.getMonth()+1)).slice(-2)}/${dia.getFullYear()}`;
}

//Função Hora Real
function horario() {
    let data = new Date();
    return hora = `${("0" + data.getHours()).slice(-2)}:${("0" + data.getMinutes()).slice(-2)}:${("0" + data.getSeconds()).slice(-2)}`;
}

//Comando p atualizar hora e data em tempo real
let atualiza = setInterval(function () {
    timer1.innerHTML = dataHoje();
    timer2.innerHTML = horario();
}, 500);
