import * as getData from "../../getData";
import select2 from "./select2";
// querySelector id select-keluarga
const selectKeluarga = document.getElementById("select-keluarga");

const keluarga = async () => {
    // data keluarga
    const dataKeluarga = await getData.getDataKeluarga();
    // isi select keluarga
    let option = '<option value="" selected>Pilih</option>';
    dataKeluarga.forEach((keluarga) => {
        option += `<option value="${keluarga.id}">${keluarga.no_kk}</option>`;
    });
    const isiSelectKeluarga = `<label>No. KK</label>
                                <select name="keluarga_id" id="keluarga_id" class="select2_basic selectReset" required
                                    autocomplete="off" style="width: 100%">
                                    ${option}
                                </select>`;
    // add isi select keluarga to select-keluarga
    selectKeluarga.innerHTML = isiSelectKeluarga;
    // select2
    select2();
};

if (selectKeluarga) {
    keluarga();
}
