import ApexCharts from "apexcharts";
const axios = require("axios");

// get id="surat-masuk"
const suratMasuk = document.getElementById("surat-masuk");
// get id="surat-keluar"
const suratKeluar = document.getElementById("surat-keluar");

let totalMasuk = 0;
axios.get("/api/surat_masuk").then((res) => {
    totalMasuk = res.data.length;
    // chage data-target="surat-masuk"
    suratMasuk.setAttribute("data-target", totalMasuk);
    suratMasuk.innerHTML = totalMasuk;
    console.log(totalMasuk);
});

let totalKeluar = 0;
axios.get("/api/surat_keluar").then((res) => {
    totalKeluar = res.data.length;
    suratKeluar.setAttribute("data-target", totalKeluar);
    suratKeluar.innerHTML = totalKeluar;
    console.log(totalKeluar);
});
