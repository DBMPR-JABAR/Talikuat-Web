let massPopChart;
async function nonAdendum(res) {
    let dataUmum = res.data_umum;
    let spmk = new Date(dataUmum.tgl_spmk);
    let weeks = sortDateAsWeek(getTermin(dataUmum.detail.lama_waktu), spmk);
    let jadualAwal = await sortJadual(res.curva, weeks);
    render(jadualAwal, [], "", weeks);
    jadualAwal = [];
}

function render(sumJadual, laporan, jadualAdendum, jmlMinggu) {
    $("body").removeClass("loading");
    const minggu = [];
    for (let i = 0; i < jmlMinggu.length; i++) {
        minggu.push("Minggu Ke " + [i + 1]);
    }
    let chart = $("#chartCurva");
    const datasets = [
        {
            label: "Rencana",
            data: sumJadual,
            fill: false,
            borderColor: "#005eff",
            tension: 0.1,
        },
    ];

    massPopChart = new Chart(chart, {
        type: "line",
        data: {
            labels: minggu,
            datasets,
        },
        options: {},
    });
    $(jmlMinggu).each((i, v) => {
        $("#dataJadual").append(`
        <div class="col-sm-1">
        <div class="border">
        <ins> Minggu ${i + 1}</ins> <br />
           ${sumJadual[i]}
        </div>
    </div>`);
    });
}

const sortJadual = async (jadual, weeks) => {
    const dataJadual = [];
    const arr = Object.values(jadual);
    const sortedJadual = [];
    const sumJadual = [];

    $(arr).each((i, v) => {
        $(v).each((index, value) => {
            dataJadual.push(value);
        });
    });
    for (let i = 0; i < weeks.length; i++) {
        const tesData = dataJadual.filter((v) => {
            return (
                v.tanggal >= convertDate(weeks[i]).toISOString().slice(0, 10) &&
                v.tanggal <=
                    convertDate(weeks[i]).addDays(6).toISOString().slice(0, 10)
            );
        });
        sortedJadual.push(tesData);
    }
    $(sortedJadual).each((i, v) => {
        sumJadual.push(v.sum("nilai"));
    });

    const sumCumulative = sumJadual.map(cumulativeSum);
    for (let i = 0; i < sumCumulative.length; i++) {
        sumCumulative[i] = parseFloat(sumCumulative[i]).toFixed(3);
    }
    return sumCumulative;
};

// get minggu
function getTermin(hari) {
    let minggu = hari / 7;
    return Number.isInteger(minggu) ? minggu : parseInt(minggu + 1);
}
// get date from weeks
function sortDateAsWeek(week, spmk) {
    let u = 0;
    let tglWeek = [];
    for (let i = 0; i < week; i++) {
        if (tglWeek.length == 0) {
            tglWeek.push(spmk.toISOString().slice(0, 10));
            //tglWeek.push(date.addDays(8).toISOString().slice(0, 10));
        } else {
            tglWeek.push(
                convertDate(tglWeek[u]).addDays(7).toISOString().slice(0, 10)
            );
            u++;
        }
    }
    return tglWeek;
}
Date.prototype.addDays = function (days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date;
};
function convertDate(date) {
    return new Date(date);
}
const cumulativeSum = (
    (sum) => (value) =>
        (sum += value)
)(0);
const tes = (
    (sum) => (value) =>
        (sum += value)
)(0);
const laporanSum = (
    (sum) => (value) =>
        (sum += value)
)(0);
Array.prototype.sum = function (prop) {
    var total = 0;
    for (var i = 0, _len = this.length; i < _len; i++) {
        total += parseFloat(this[i][prop], 0);
    }

    return total;
};
// function createVariables(jmlAdendum) {
//   var adendum = [];

//   for (var i = 0; i < jmlAdendum; ++i) {
//     adendum[i] = [];
//   }

//   return adendum;
// }
function getRandomColor() {
    var color = [
        "#f6ff00",
        "#00ff08",
        "#ff00e6",
        "#ff9100",
        "#7a7a7a",
        "#00ffb7",
        "#de691b",
    ];
    return color;
}
