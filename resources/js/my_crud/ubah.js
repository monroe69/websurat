const tools = require("./tools");

import { removeFile } from "./tambah";

function dataForm(data) {
    // Jika route surat
    if (tools.route === "surat") {
        $("#id").val(data.id);
        $("#no_surat").val(data.no_surat);
        $("#tgl_surat").val(data.tgl_surat);
        $("#perihal").val(data.perihal);
        removeFile();
        $(".tampilModal").modal("show");
        $("#judul").html("Silahkan Merubah Data");
        $("#tombolForm").html("Ubah Data");
    }
    // Jika route surat_masuk
    if (tools.route === "surat_masuk") {
        $("#id").val(data.id);
        $("#no_surat").val(data.surat.no_surat);
        $("#tgl_surat").val(data.surat.tgl_surat);
        $("#perihal").val(data.surat.perihal);
        $("#asal_surat").val(data.asal_surat);
        $("#tgl_masuk").val(data.tgl_masuk);
        removeFile();
        $(".tampilModal").modal("show");
        $("#judul").html("Silahkan Merubah Data");
        $("#tombolForm").html("Ubah Data");
    }
    // Jika route surat_keluar
    if (tools.route === "surat_keluar") {
        $("#id").val(data.id);
        $("#no_surat").val(data.surat.no_surat);
        $("#tgl_surat").val(data.surat.tgl_surat);
        $("#perihal").val(data.surat.perihal);
        $("#tujuan_surat").val(data.tujuan_surat);
        $("#tgl_keluar").val(data.tgl_keluar);
        removeFile();
        $(".tampilModal").modal("show");
        $("#judul").html("Silahkan Merubah Data");
        $("#tombolForm").html("Ubah Data");
    }
}

$("body").on("click", ".btnUbah", function (e) {
    e.preventDefault();
    let href = $(this).data("id");
    tools.save_method = "Ubah";
    $.ajax({
        url: `${tools.uri}/${href}/edit`,
        type: "GET",
        dataType: "JSON",
        beforeSend: function () {
            // lakukan sesuatu sebelum data dikirim
        },
        success: function (data) {
            // return console.log(data);
            dataForm(data);
        },
    });
});
