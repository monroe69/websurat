import * as getData from "../../getData";
import select2 from "./select2";
// querySelector id select-jemaat
const selectJemaat = document.getElementById("select-jemaat");

const jemaat = async () => {
    // data jemaat
    const dataJemaat = await getData.getDataJemaat();
    // isi select jemaat
    let option = '<option value="" selected>Pilih</option>';
    dataJemaat.forEach((jemaat) => {
        option += `<option value="${jemaat.id}">${jemaat.nm_jemaat}</option>`;
    });
    const isiSelectJemaat = `<label>Jemaat</label>
                                <select name="jemaat_id" id="jemaat_id" class="select2_basic selectReset" required
                                    autocomplete="off" style="width: 100%">
                                    ${option}
                                </select>`;
    // add isi select jemaat to select-jemaat
    selectJemaat.innerHTML = isiSelectJemaat;
    // select2
    select2();
};

if (selectJemaat) {
    jemaat();
}
