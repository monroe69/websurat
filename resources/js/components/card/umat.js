import * as getData from "../../getData";

// selector #umat_card
const umatCard = document.querySelector("#umat_card");

const filterData = async (search = "") => {
    const dataUmat = await getData.getDataJemaat();
    // filter data jemaat by search
    const filteredItems = dataUmat.filter((item) => {
        // search by nm_jemaat
        const regex = new RegExp(search, "gi");
        return item.nm_jemaat.match(regex);
    });
    console.log(filteredItems.length);

    let htmlCard = "";
    filteredItems.forEach((umat) => {
        // format date
        const date = new Date(umat.tgl_lahir);
        const day = date.getDate();
        const month = date.getMonth() + 1;
        const year = date.getFullYear();

        htmlCard += `
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="single-blog-item" data-wow-offset="0">
                <div class="img-holder">
                    <img src="${umat.foto}" alt="Awesome Image">
                    <div class="post-date">
                        <h5>${day}/${month} ${year}</h5>
                    </div>
                </div>
                <div class="text-holder">
                    <ul class="meta-info">
                        <li>${umat.jk}</li>
                        <li>${umat.nm_jemaat}</li>
                    </ul>
                    <div class="text">
                        <p>${umat.alamat}, ${umat.kelurahan.nm_kelurahan}-${umat.kelurahan.distrik.nm_distrik}</p>
                    </div>
                </div>
            </div>
        </div>
        `;
    });
    umatCard.innerHTML = htmlCard;
};

if (umatCard) {
    filterData();
    // selector #cari_umat
    const cari_umat = document.getElementById("cari_umat");
    // event change cari umat
    cari_umat.addEventListener("keyup", (e) => {
        const search = e.target.value;
        filterData(search);
    });
}
