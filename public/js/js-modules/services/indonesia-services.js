class IndonesiaServicesImpl {
 
    getUsedRegions = async() => axios.get(`/api/indonesia/used-region`);

    getRegencyByProvinceId = async (id) => axios.get(`/api/indonesia/regencies/${id}`);

    getDistrictByRegencyId = async (id) => axios.get(`/api/indonesia/districts/${id}`);

    loadRegionInformation = async (id) => axios.get(`/api/indonesia/information/${id}`);
}