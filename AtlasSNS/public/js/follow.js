import axios from "axios";

const state={
    status: null,
};
const getters = {
    status: state =>state.status ? state.status: '',
};
const mutations = {
    setStatus(state,status){
        state.status = status;
    },
};
const actions = {
    async pushFollow(context, data){
        await axios.post('/follow-list',data).then(result=>{
            context.commit('setStatus',result.data);
        }).catch(error=>{
            console.log(error);
        })
    },
    async deleteFollow(context,data){
        await axios.delete('/follower-list', {data:data}).then(result=>{
            context.commit('setStatus', result.data);
        }).catch(error=>{
            console.log(error);
        })
    },
};

export default{
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}
