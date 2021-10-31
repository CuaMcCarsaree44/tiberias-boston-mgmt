import axios from 'axios';

import { UpsertMemberFactory } from '../factory/upsert-member-factory';

interface MemberServices {

    /**
     * getAllMembers
     * 
     * A service to get All member data
     */
    getAllMembers(): Promise<any>;

    /**
     * getMemberById
     * 
     * A service to get a member data by id.
     * 
     * @param id 
     */
    getMemberById(id: number): Promise<any>;

    /**
     * createMember
     * 
     * A service to create member data.
     * 
     * @param factory 
     */
    createMember(factory: UpsertMemberFactory): Promise<any>;
}

export class MemberServicesImpl implements MemberServices {
    public getMemberById = async (id: number): Promise<any> =>
        axios.get(`/api/member/detail/${id}`);

    createMember(factory: UpsertMemberFactory): Promise<any> {
        throw new Error('Method not implemented.');
    }

    public getAllMembers = async(): Promise<any> => {
        console.log("Get All Members");

        return axios.get('/api/member');
    }

}