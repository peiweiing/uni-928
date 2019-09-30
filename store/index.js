import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
	state:{
		hasLogin:false,
		userInfo:{},
	},
	mutations:{
		login(state,provider){
			state.hasLogin=true;
			state.userInfo=provider;
		}
	},
	actions:{
		
	}
})
export default store