// import axios
const axios = require("axios");

// get data distrik with axios
const getDataDistrik = async () => {
    const response = await axios.get("/api/distrik");
    const { data } = response;
    return data;
};

// get data keluarga with axios
const getDataKeluarga = async () => {
    const response = await axios.get("/api/keluarga");
    const { data } = response;
    return data;
};

// get data kelurahan with axios
const getDataKelurahan = async () => {
    const response = await axios.get("/api/kelurahan");
    const { data } = response;
    return data;
};

// get data pendidikan with axios
const getDataPendidikan = async () => {
    const response = await axios.get("/api/pendidikan");
    const { data } = response;
    return data;
};

// get data jemaat with axios
const getDataJemaat = async () => {
    const response = await axios.get("/api/jemaat");
    const { data } = response;
    return data;
};

export {
    getDataDistrik,
    getDataKeluarga,
    getDataKelurahan,
    getDataPendidikan,
    getDataJemaat,
};
