var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
import { MemberServicesImpl } from "../services/member-services.js";
export class MemberViewModel {
    constructor() {
        this.fetchDataList = () => __awaiter(this, void 0, void 0, function* () {
            const datalist = document.getElementById('datalist');
            console.log(datalist);
            if (datalist !== null) {
                const impl = new MemberServicesImpl();
                const resultSet = yield impl.getAllMembers();
                let html = "";
                resultSet.data.data.array.forEach((e) => {
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
        });
    }
}
new MemberViewModel().fetchDataList();
