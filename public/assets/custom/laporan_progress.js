var uptd = $("#uptd").val();
const today = new Date();
$("#date").val(today.toISOString().slice(0, 10));
$("#status").text("Status : " + $("#date").val());

$("#date").change(() => {
    $("#status").text("Status : " + $("#date").val());
    $("tbody").empty();
    render();
});

$("#uptd").change(() => {
    uptd = $("#uptd").val();
    if (uptd == "all") {
        $("#unor").text(
            "SEMUA UNIT PELAKSANA TEKNIS DINAS (UPTD) WILAYAH PELAYANAN"
        );
    } else {
        $("#unor").text(
            "UNIT PELAKSANA TEKNIS DINAS (UPTD) WILAYAH PELAYANAN  - " +
                convertNumbertoRomawi(uptd - 1)
        );
    }
    $("tbody").empty();
    $("body").addClass("loading");
    render();
});
$(document).ready(() => {
    $("body").removeClass("loading");
    $("#unor").text(
        "UNIT PELAKSANA TEKNIS DINAS (UPTD) WILAYAH PELAYANAN  - " +
            convertNumbertoRomawi(uptd - 1)
    );
    render();
});
async function render() {
    console.log($("#date").val());
    $.post(apiUrl, { uptd: uptd }, (res) => {
        const data = res.data;
        let no = 1;
        var tenagaAhli = "";
        for (let i = 0; i < data.length; i++) {
            let minggu = diffDate(data[i].tgl_spmk, $("#date").val());
            data[i].detail.tenaga_ahli.map((item) => {
                tenagaAhli += `
                <span style="font-size:12px;">${item.jabatan}</span> <br>
                <p>${item.nama_tenaga_ahli}</p>
            `;
            });
            const rencana =
                data[i].laporan_konsultan.at(-1) == undefined
                    ? 0
                    : data[i].laporan_konsultan.at(-1).rencana;
            const realisasi =
                data[i].laporan_konsultan.at(-1) == undefined
                    ? 0
                    : data[i].laporan_konsultan.at(-1).realisasi;

            const deviasi = rencana - realisasi;
            const deviasiText =
                deviasi < 0
                    ? `<span class="text-danger">${deviasi.toFixed(3)}</span>`
                    : `<span class="text-success">${deviasi.toFixed(3)}</span>`;

            $("tbody").append(
                "<tr>" +
                    "<td>" +
                    no +
                    "</td>" +
                    '<td style="text-align:left;">' +
                    data[i].nm_paket +
                    "</td>" +
                    '<td style="text-align:left;">' +
                    tenagaAhli +
                    "</td>" +
                    "<td>" +
                    data[i].detail.panjang_km +
                    "</td>" +
                    '<td style="text-align:left;">' +
                    data[i].detail.kontraktor.nama +
                    "</td>" +
                    "<td>" +
                    data[i].tgl_spmk +
                    "<br/>" +
                    new Date(data[i].tgl_spmk)
                        .addDays(data[i].detail.lama_waktu - 1)
                        .toISOString()
                        .substring(0, 10) +
                    "</td>" +
                    "<td>" +
                    data[i].detail.lama_waktu +
                    "</td>" +
                    '<td style="text-align:left;">1. ' +
                    data[i].detail.nilai_kontrak +
                    "<br/>2. " +
                    data[i].tgl_kontrak +
                    "<br/>3.<br/>4. </td>" +
                    '<td style="text-align:left;">' +
                    data[i].detail.konsultan.nama +
                    "</td>" +
                    "<td>" +
                    minggu +
                    "</td>" +
                    "<td>" +
                    rencana +
                    "</td>" +
                    "<td>" +
                    realisasi +
                    "</td>" +
                    "<td>" +
                    deviasiText +
                    "</td></tr>"
            );
            tenagaAhli = "";
            no++;
        }
        $("body").removeClass("loading");
    });
}

function convertNumbertoRomawi(number) {
    var romawi = ["I", "II", "III", "IV", "V", "VI"];

    return romawi[number];
}
Date.prototype.addDays = function (days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date;
};
function diffDate(tglSpmk, now) {
    const date1 = new Date(tglSpmk);
    const date2 = new Date(now);
    const result = Math.abs(date1 - date2);
    const day = Math.ceil(result / (1000 * 60 * 60 * 24));
    return parseInt(day / 7) + 1;
}
