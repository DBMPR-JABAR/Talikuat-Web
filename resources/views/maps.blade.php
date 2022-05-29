<html>
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="initial-scale=1, maximum-scale=1, user-scalable=no"
        />
        <title>Pembangunan</title>
        <link
            rel="stylesheet"
            href="https://js.arcgis.com/4.23/esri/themes/light/main.css"
        />
        <script src="https://js.arcgis.com/4.23/"></script>
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"
        ></script>

        <style>
            html,
            body,
            #viewDiv {
                padding: 0;
                margin: 0;
                height: 100%;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <input
            type="hidden"
            id="url"
            value="{{ route('get-data-pembangunan') }}"
        />
        <div id="viewDiv"></div>

        <script>
            var url = $("#url").val();
            var data;
            $(document).ready(async () => {
                await $.get(url).then(function (response) {
                    data = response.data;
                    initMap();
                });
            });
            function sum(arr, prop) {
                let total = 0;
                for (let i = 0, _len = arr.length; i < _len; i++) {
                    total += parseFloat(arr[i][prop], 0);
                }
                return total;
            }
        </script>
        <script>
            function initMap() {
                require([
                    "esri/config",
                    "esri/Map",
                    "esri/views/MapView",
                    "esri/widgets/BasemapToggle",
                    "esri/widgets/BasemapGallery",
                    "esri/Graphic",
                    "esri/layers/GraphicsLayer",
                ], function (
                    esriConfig,
                    Map,
                    MapView,
                    BasemapToggle,
                    BasemapGallery,
                    Graphic,
                    GraphicsLayer
                ) {
                    esriConfig.apiKey =
                        "AAPK2021e3c0ade243ac91fc03c5cc16af553UoLz7PP3cuznJsJw2hQOU6G-m47W2PWSfHujOs9JYI-UmZOtUw7TvgwWHUSIDPI";

                    const map = new Map({
                        basemap: "arcgis-imagery", // Basemap layer service
                    });
                    const dbmpr = [107.61, -6.921];
                    const view = new MapView({
                        map: map,
                        center: [107.619125, -6.917464], // Longitude, latitude
                        zoom: 10,
                        container: "viewDiv", // Div element
                    });
                    const basemapToggle = new BasemapToggle({
                        view: view,
                        nextBasemap: "hybrid",
                    });
                    view.ui.add(basemapToggle, "bottom-right");
                    // INIT END
                    view.when(function () {
                        view.goTo({
                            target: dbmpr,
                            zoom: 10,
                            tilt: 60,
                        });
                    });
                    const graphicsLayer = new GraphicsLayer();
                    map.add(graphicsLayer);
                    const dataMapsAwal = data.map((item) => {
                        return item.detail.ruas.map((ruas) => {
                            return {
                                lat: ruas.lat_awal,
                                long: ruas.long_awal,
                                attributes: {
                                    noKontrak: item.no_kontrak,
                                    kegiatan: item.nm_paket,
                                    uptd: item.uptd.nama,
                                    kontraktor: item.detail.kontraktor.nama,
                                    konsultan: item.detail.konsultan.nama,
                                    ppk: item.detail.ppk_detail.user.name,
                                    realisasi:
                                        sum(item.laporan_approved, "volume") +
                                        "%",
                                },
                            };
                        });
                    });

                    const dataMapsAkhir = data.map((item) => {
                        return item.detail.ruas.map((ruas) => {
                            return {
                                lat: ruas.lat_akhir,
                                long: ruas.long_akhir,
                                attributes: {
                                    noKontrak: item.no_kontrak,
                                    kegiatan: item.nm_paket,
                                    uptd: item.uptd.nama,
                                    kontraktor: item.detail.kontraktor.nama,
                                    konsultan: item.detail.konsultan.nama,
                                    ppk: item.detail.ppk_detail.user.name,
                                    realisasi:
                                        sum(item.laporan_approved, "volume") +
                                        "%",
                                },
                            };
                        });
                    });

                    const dataMapsFlattenAwal = [].concat(...dataMapsAwal);
                    const dataMapsFlattenAkhir = [].concat(...dataMapsAkhir);

                    const arrGraphics = dataMapsFlattenAwal.map((item) => {
                        return new Graphic({
                            geometry: {
                                type: "point",
                                longitude: parseFloat(item.long),
                                latitude: parseFloat(item.lat),
                            },
                            symbol: {
                                type: "simple-marker",
                                color: [255, 0, 0],
                                outline: {
                                    color: [255, 255, 255],
                                    width: 1,
                                },
                            },
                            popupTemplate: {
                                title:
                                    item.attributes.kegiatan + " | Titik Awal",
                                content: `<div>
                                        <p>No Kontrak: ${item.attributes.noKontrak}</p>
                                        <p>Uptd: ${item.attributes.uptd}</p>
                                        <p>Kontraktor: ${item.attributes.kontraktor}</p>
                                        <p>Konsultan: ${item.attributes.konsultan}</p>
                                        <p>PPK: ${item.attributes.ppk}</p>
                                        <p>Realisasi: ${item.attributes.realisasi}</p>
                                        </div>`,
                            },
                        });
                    });
                    dataMapsFlattenAkhir.map((item) => {
                        var graph = new Graphic({
                            geometry: {
                                type: "point",
                                longitude: parseFloat(item.long),
                                latitude: parseFloat(item.lat),
                            },
                            symbol: {
                                type: "simple-marker",
                                color: [0, 255, 0],
                                outline: {
                                    color: [255, 255, 255],
                                    width: 1,
                                },
                            },
                            popupTemplate: {
                                title:
                                    item.attributes.kegiatan + " | Titik Akhir",
                                content: `<div>
                                        <p>No Kontrak: ${item.attributes.noKontrak}</p>
                                        <p>Uptd: ${item.attributes.uptd}</p>
                                        <p>Kontraktor: ${item.attributes.kontraktor}</p>
                                        <p>Konsultan: ${item.attributes.konsultan}</p>
                                        <p>PPK: ${item.attributes.ppk}</p>
                                        <p>Realisasi: ${item.attributes.realisasi}</p>
                                        </div>`,
                            },
                        });
                        arrGraphics.push(graph);
                    });

                    graphicsLayer.addMany(arrGraphics);
                });
            }
        </script>
    </body>
</html>
