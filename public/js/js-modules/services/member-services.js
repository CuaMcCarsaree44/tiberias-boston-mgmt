class MemberServicesImpl {
    getMemberById = async (id) => axios.get(`/api/member/detail/${id}`);

    createMember(factory) {
        throw new Error('Method not implemented.');
    }

    getAllMembers = async(name = '', region_id = null) => axios.get(`/api/member?name=${name}&region_id=${region_id}`);

}