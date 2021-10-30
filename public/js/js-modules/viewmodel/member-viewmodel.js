
class MemberViewModel {

    fetchMemberList = async() => {

        const datalist = document.getElementById('datalist');
        const search_textbox = document.getElementById('search');
        const region_select = document.getElementById('region_id');

        if(datalist !== null){

            loaderOn();

            const impl = new MemberServicesImpl();

            const resultSet = await impl.getAllMembers(
                search_textbox === null ? '' : search_textbox.value,
                region_select === '' ? null : region_select.value
            );

            let html = "";

            if(resultSet.data.data.length === 0){
                html += `
                    <div class="row block block-rounded block-fx-shadow pb-3 bg-primary text-white">
                        <div class="block-content">
                            <div class="col-12">
                                <p class="text-center">
                                    <strong> Hasil pencarian tidak ditemukan. Silahkan coba kata kunci lain.</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    `;
            }else{
                resultSet.data.data.forEach((e) => {
                    html += `
                    <div onclick="location.href = '/crm/member/update?id=${e.id}';" class="row block block-rounded block-fx-shadow pb-3 bg-primary text-white">
                        <div class="block-content">
                            <div class="col-12 col-md-8">
                                <p class="lead">
                                    <strong class="text-uppercase">${e.name}</strong>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-12">
                                        <i class="fa fa-globe"></i> <strong>${e.district === null ? 'ENTITY_NOT_FOUND' : e.district.name }</strong>
                                    </div>
                                    <div class="col-12">
                                        <i class="fa ${e.kk_flag === 1 ? 'fa-check-circle text-white' : 'fa-minus-circle text-danger'}"></i> <strong>KK</strong> 
                                    </div>
                                    <div class="col-12">
                                        <i class="fa ${e.akte_baptis_flag === 1 ? 'fa-check-circle text-white' : 'fa-minus-circle text-danger'}"></i> <strong>Akte Baptis</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                });
            }



            datalist.innerHTML = html;

            loaderOff();
        }

    } 

    fetchDropdowns = (dropdown, resultSet) => {
        let html = "";

        resultSet.data.data.forEach((e) => {
            html += `
            <option value="${e.id}">${e.name}</option>
            `;
        });

        dropdown.innerHTML += html;
    }

    fetchUsedRegionList = async() => {
        const datalist = document.getElementById('region_id');

        if(datalist !== null){

            loaderOn();

            const impl = new IndonesiaServicesImpl();

            const resultSet = await impl.getUsedRegions();

            this.fetchDropdowns(datalist, resultSet);

            loaderOff();
        }
    }

    fetchRegencyData = async () => {
        const datalist = document.getElementById('province-jemaat');
        const dropdown = document.getElementById('regency-jemaat');

        if(datalist.value === "") {
            dropdown.innerHTML = '<option selected value="">-Pilih Kabupaten-</option>';
            return;
        }

        dropdown.innerHTML = '<option selected value="">-Pilih Kabupaten-</option>';

        if(datalist !== null){

            loaderOn();

            const impl = new IndonesiaServicesImpl();

            const resultSet = await impl.getRegencyByProvinceId(datalist.value);

            this.fetchDropdowns(dropdown, resultSet);

            loaderOff();
        }
    }

    fetchRegionData = async () => {
        const datalist = document.getElementById('regency-jemaat');
        const dropdown = document.getElementById('district-jemaat');

        if(datalist.value === "") {
            dropdown.innerHTML = '<option selected value="">-Pilih Region-</option>';
            return;
        }


        dropdown.innerHTML = '<option selected value="">-Pilih Region-</option>';
        
        if(datalist !== null){

            loaderOn();

            const impl = new IndonesiaServicesImpl();

            const resultSet = await impl.getDistrictByRegencyId(datalist.value);

            this.fetchDropdowns(dropdown, resultSet);

            loaderOff();
        }
    }

    fetchRegionInformation = async (districtId) => {
        const impl = new IndonesiaServicesImpl();
        const info = await impl.loadRegionInformation(districtId);

        const regencies = await impl.getRegencyByProvinceId(info.data.data.province.id);
        const districts = await impl.getDistrictByRegencyId(info.data.data.regency.id);

        const regencyDropdown = document.getElementById('regency-jemaat');
        const districtDropdown = document.getElementById('district-jemaat');

        regencyDropdown.innerHTML = '<option selected value="">-Pilih Kabupaten-</option>';
        districtDropdown.innerHTML = '<option selected value="">-Pilih Region-</option>';

        this.fetchDropdowns(regencyDropdown, regencies);
        this.fetchDropdowns(districtDropdown, districts);


        document.getElementById('province-jemaat').value = info.data.data.province.id;
        regencyDropdown.value = info.data.data.regency.id;
        districtDropdown.value = info.data.data.district.id;
        
    }
}
