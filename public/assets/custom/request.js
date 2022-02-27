$(document).ready(() => {
    $("#request").DataTable({
        responsive: true,
        columns: [
            { responsivePriority: 4 },
            { responsivePriority: 3 },
            { responsivePriority: 2 },
            { responsivePriority: 1 },
            { responsivePriority: 5 },
            { responsivePriority: 6 },
            { responsivePriority: 7 },
            { responsivePriority: 8 },
        ],
    });
});
$("#exampleModal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var recipient = button.data("whatever");
    var modal = $(this);
    modal.find(".modal-title").text("New message to " + recipient);
    modal.find(".modal-body input").val(recipient);
});

function rederModalCatatan(el) {
    var fileDirlap = $(el).data("img-dirlap");
    var filePPK = $(el).data("img-ppk");
    var catatanDirlap = $(el).data("dirlap") ?? "Tidak ada catatan";
    var catatanPPK = $(el).data("ppk") ?? "Tidak ada catatan";
    $("#filePPK").attr("src", filePPK);
    $("#fileDirlap").attr("src", fileDirlap);
    $("#catatanPPK").val(catatanPPK);
    $("#catatanDirlap").val(catatanDirlap);
}

function rederModalDetail(el) {
    $.get("/admin/request-api/" + $(el).data("id")).done((res) => {
        var bahan = res.detail_bahan;
        var jmf = res.detail_bahan_j_m_f;
        var peralatan = res.detail_peralatan;
        var tenagaKerja = res.detail_tenaga_kerja;
        $("#kegiatan").val($(el).data("paket"));
        $("#diajukan_tgl").val(res.tgl_request);
        $("#lokasi_sta").val(res.lokasi_sta);
        $("#jenis_pekerjaan").val(res.jadual.nmp + " " + res.jadual.uraian);
        $("#perkiraan_volume").val(res.volume);
        $("#pelaksanaan_tgl").val(res.tgl_dikerjakan);
        $("#shopDrawing").attr(
            "src",
            "/admin/file-request/" + res.file_shopdrawing
        );

        if (!bahan) {
        } else {
            $("#tableBahan")
                .find("tbody")
                .html(
                    "<tr><td colspan='3' class='text-center'>Tidak ada bahan material</td></tr>"
                );
        }

        if (!jmf) {
        } else {
            $("#tableJmf")
                .find("tbody")
                .html(
                    "<tr><td colspan='3' class='text-center'>Tidak ada bahan material jmf</td></tr>"
                );
        }

        if (!peralatan) {
        } else {
            $("#tablePeralatan")
                .find("tbody")
                .html(
                    "<tr><td colspan='3' class='text-center'>Tidak ada perlatan</td></tr>"
                );
        }

        if (!tenagaKerja) {
        } else {
            $("#tableTenagaKerja")
                .find("tbody")
                .html(
                    "<tr><td colspan='2' class='text-center'>Tidak ada tenaga kerja</td></tr>"
                );
        }
    });
}
