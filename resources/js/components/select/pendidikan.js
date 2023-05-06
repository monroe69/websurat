import * as getData from "../../getData";
import select2 from "./select2";
// querySelector id select-pendidikan
const selectPendidikan = document.getElementById("select-pendidikan");

const pendidikan = async () => {
    // data pendidikan
    const dataPendidikan = await getData.getDataPendidikan();
    // isi select pendidikan
    let option = '<option value="" selected>Pilih</option>';
    dataPendidikan.forEach((pendidikan) => {
        option += `<option value="${pendidikan.id}">${pendidikan.jenjang} (${pendidikan.ket})</option>`;
    });
    const isiSelectPendidikan = `<label>Pendidikan</label>
                                <select name="pendidikan_id" id="pendidikan_id" class="select2_basic selectReset" required
                                    autocomplete="off" style="width: 100%">
                                    ${option}
                                </select>`;
    // add isi select pendidikan to select-pendidikan
    selectPendidikan.innerHTML = isiSelectPendidikan;
    // select2
    select2();
};

if (selectPendidikan) {
    pendidikan();
}
