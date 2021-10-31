import { MemberServicesImpl } from "../services/member-services.js";

export class MemberViewModel {

    public fetchDataList = async(): Promise<void> => {

        const datalist: HTMLElement | null = document.getElementById('datalist');

        console.log(datalist);

        if(datalist !== null){

            const impl = new MemberServicesImpl();

            const resultSet = await impl.getAllMembers();

            let html: string = "";

            resultSet.data.data.array.forEach((e: any) => {
                html += `
                <div class="row block block-rounded block-fx-shadow pb-3">
                    <div class="block-content">
                        <div class="col-12 col-md-8">
                            <p class="lead">
                                <strong class="text-uppercase">${e.name}</strong>
                            </p>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <i class="fa fa-globe"></i> <strong>Bekasi</strong>
                                </div>
                                <div class="col-12">
                                    <i class="fa ${e.kk_flag === 1 ? 'fa-check text-success' : 'fa-minus text-danger'}"></i> <strong>KK</strong> 
                                </div>
                                <div class="col-12">
                                    <i class="fa ${e.akte_baptis_flag === 1 ? 'fa-check text-success' : 'fa-minus text-danger'}"></i> <strong>Akte Baptis</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
            });

            datalist.innerHTML = html;

        }

    } 

}

new MemberViewModel().fetchDataList();