import * as getData from "../../getData";
import select2 from "./select2";
// querySelector id select-distrik
const selectDistrik = document.getElementById("select-distrik");

const distrik = async () => {
    // data distrik
    const dataDistrik = await getData.getDataDistrik();
    // isi select distrik
    let option = '<option value="" selected>Pilih</option>';
    dataDistrik.forEach((distrik) => {
        option += `<option value="${distrik.id}">${distrik.nm_distrik}</option>`;
    });
    const isiSelectDistrik = `<label>Distrik</label>
                                <select name="distrik_id" id="distrik_id" class="select2_basic selectReset" required
                                    autocomplete="off" style="width: 100%">
                                    ${option}
                                </select>`;
    // add isi select distrik to select-distrik
    selectDistrik.innerHTML = isiSelectDistrik;
    // select2
    select2();
};

if (selectDistrik) {
    distrik();
}
