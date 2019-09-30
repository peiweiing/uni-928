import Vue from 'vue'
import Vuex from 'vuex'


Vue.use(Vuex)
const store = new Vuex.Store({
	state:{
		hasLoging:false,
		userInfo:{},
	},
	mutations:{
		login(state,provider){
			state.hasLoging=true;
			state.userInfo=provider;
		}
	},
	actions:{
		
	}
})
export default store