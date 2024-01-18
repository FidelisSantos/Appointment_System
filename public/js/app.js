function getAge(data) {
    var d = new Date,
        ano_atual = d.getUTCFullYear(),
        mes_atual = d.getUTCMonth(),
        dia_atual = d.getUTCDate(),
        data_americana = new Date(data),
        vAno = data_americana.getUTCFullYear(),
        vMes = data_americana.getUTCMonth() + 1,
        vDia = data_americana.getUTCDate(),
        ano_aniversario = +vAno,
        mes_aniversario = +vMes,
        dia_aniversario = +vDia,
        quantos_anos = ano_atual - ano_aniversario;
    if (mes_atual < mes_aniversario || mes_atual == mes_aniversario && dia_atual < dia_aniversario) {
        quantos_anos--;
    }
    return quantos_anos;
}
