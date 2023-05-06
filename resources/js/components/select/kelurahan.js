import * as getData from "../../getData";
import select2 from "./select2";
// querySelector id select-kelurahan
const selectKelurahan = document.getElementById("select-kelurahan");

const kelurahan = async () => {
    // data kelurahan
    const dataKelurahan = await getData.getDataKelurahan();
    // isi select kelurahan
    let option = '<option value="" selected>Pilih</option>';
    dataKelurahan.forEach((kelurahan) => {
        option += `<option value="${kelurahan.id}">${kelurahan.nm_kelurahan}</option>`;
    });
    const isiSelectKelurahan = `<label>Kelurahan</label>
                                <select name="kelurahan_id" id="kelurahan_id" class="select2_basic selectReset" required
                                    autocomplete="off" style="width: 100%">
                                    ${option}
                                </select>`;
    // add isi select kelurahan to select-kelurahan
    selectKelurahan.innerHTML = isiSelectKelurahan;
    // select2
    select2();
};

if (selectKelurahan) {
    kelurahan();
}
