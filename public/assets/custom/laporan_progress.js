var uptd = $("#uptd").val();
const today = new Date();
$("#date").val(today.toISOString().slice(0, 10));
$("#status").text("Status : " + $("#date").val());

$("#date").change(() => {
    uptd = $("#uptd").val();
    $("#unor").text("UNIT PELAKSANA TEKNIS DINAS - " + uptd);
    $("tbody").empty();
    $("body").addClass("loading");
    $("#status").text("Status : " + $("#date").val());
    render();
});

$("#uptd").change(() => {
    uptd = $("#uptd").val();
    $("#unor").text("UNIT PELAKSANA TEKNIS DINAS - " + uptd);
    $("tbody").empty();
    $("body").addClass("loading");
    render();
});
$(document).ready(() => {
    $("body").removeClass("loading");
    $("#unor").text("UNIT PELAKSANA TEKNIS DINAS - " + uptd);
    render();
});
function render() {
    $.post(
        "https://tk.temanjabar.net/api/curva/progress",
        { unor: uptd, date: $("#date").val() },
        (res) => {
            const dataJadual = res.jadual;
            const dataLaporan = res.laporan;
            const dataUmum = res.data_umum;
            const obj = [];
            for (let i = 0; i < dataJadual.length; i++) {
                obj.push({
                    ...dataUmum[i],
                    jadual: sumJadual(dataJadual[i]),
                    laporan: sumLap(dataLaporan[i]),
                });
            }
            let no = 1;
            for (let i = 0; i < obj.length; i++) {
                $("tbody").append(
                    "<tr>" +
                        "<td>" +
                        no +
                        "</td>" +
                        '<td style="text-align:left;">' +
                        obj[i].nm_paket +
                        "</td>" +
                        '<td style="text-align:left;">' +
                        obj[i].nm_se +
                        "</br>(SE)" +
                        "</td>" +
                        "<td>" +
                        obj[i].panjang_km +
                        "</td>" +
                        '<td style="text-align:left;">' +
                        obj[i].penyedia +
                        "</td>" +
                        "<td>" +
                        obj[i].tgl_spmk +
                        "<br/>" +
                        new Date(obj[i].tgl_spmk)
                            .addDays(obj[i].lama_waktu - 1)
                            .toISOString()
                            .substring(0, 10) +
                        "</td>" +
                        "<td>" +
                        obj[i].lama_waktu +
                        "</td>" +
                        '<td style="text-align:left;">1. ' +
                        formatRupiah(
                            String(obj[i].nilai_kontrak).slice(0, -3),
                            "Rp. "
                        ) +
                        String(obj[i].nilai_kontrak)
                            .slice(-3)
                            .replace(".", ",") +
                        "<br/>2. " +
                        obj[i].tgl_kontrak +
                        "<br/>3.<br/>4. </td>" +
                        '<td style="text-align:left;">' +
                        obj[i].konsultan +
                        "</td>" +
                        "<td>" +
                        diffDate(obj[i].tgl_spmk, $("#date").val()) +
                        "</td>" +
                        "<td>" +
                        obj[i].jadual +
                        "</td>" +
                        "<td>" +
                        obj[i].laporan +
                        "</td>" +
                        "<td>" +
                        deviasi(obj[i].jadual, obj[i].laporan) +
                        "</td></tr>"
                );
                no++;
            }
            $("body").removeClass("loading");
        }
    );
}

function diffDate(tglSpmk, now) {
    const date1 = new Date(tglSpmk);
    const date2 = new Date(now);
    const result = Math.abs(date1 - date2);
    const day = Math.ceil(result / (1000 * 60 * 60 * 24));
    return parseInt(day / 7) + 1;
}
function sumJadual(arr) {
    let value = 0;
    for (let i = 0; i < arr.length; i++) {
        value += parseFloat(arr[i].nilai);
    }
    return value.toFixed(3);
}
function sumLap(arr) {
    let value = 0;
    for (let i = 0; i < arr.length; i++) {
        value += parseFloat(arr[i].bobot);
    }
    return value.toFixed(3);
}
Date.prototype.addDays = function (days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date;
};
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }
    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

function deviasi(jadual, laporan) {
    const j = parseFloat(jadual);
    const l = parseFloat(laporan);

    if (j > l) {
        var val = j - l;
        return `<div style="color:red;">${pos_to_neg(val).toFixed(3)}</div>`;
    } else {
        var val = l - j;
        return val.toFixed(3);
    }
}
function pos_to_neg(num) {
    return -Math.abs(num);
}
