import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
  state: {
    user: {
      data: {},
      token: sessionStorage.getItem("TOKEN"),
    },
    person: {
      loading: false,
      patients: [],
      quotes: []
    },
    currentPerson: {
      data: {},
      loading: false,
    },
  },
  getters: {},
  actions: {

    login({commit}, user) {
      return axiosClient.post('/login', user)
        .then(({data}) => {
          commit('setUser', data.user);
          commit('setToken', data.token)
          return data;
        })
    },
    logout({commit}) {
      return axiosClient.post('/logout')
        .then(() => {
          commit('logout')
          return;
        })
    },
    getUser({commit}) {
      return axiosClient.get('/user')
      .then(res => {
        commit('setUser', res.data.user)
      })
    },
    getPersons({ commit }, {url = null} = {}) {
      commit('setPersonsLoading', true)
      url = url || "/person";
      return axiosClient.get(url).then((res) => {
        commit('setPersonsLoading', false);
        commit("setPatients", res.data.filter((item)=>item.type_person=='1'));
        commit("setQuotes", res.data.filter((item)=>item.type_person !='1'));
        return res;
      });
    },
    getPerson({ commit }, id) {
      commit("setCurrentPersonLoading", true);
      return axiosClient
        .get(`/person/${id}`)
        .then((res) => {
          commit("setCurrentPerson", res.data);
          commit("setCurrentPersonLoading", false);
          return res;
        })
        .catch((err) => {
          commit("setCurrentPersonLoading", false);
          throw err;
        });
    },
    savePerson({ commit }, person) {

      delete person.image_url;

      let response;
      if (person.id) {
        response = axiosClient
          .put(`/person/${person.id}`, person)
          .then((res) => {
            commit('setCurrentPerson', res.data)
            return res;
          });
      } else {
        response = axiosClient.post("/person", person).then((res) => {
          commit('setCurrentPerson', res.data);
          return res;
        });
      }

      return response;
    },
    deletePatient({ dispatch }, id) {
      return axiosClient.delete(`/person/${id}`).then((res) => {
        dispatch('getPersons')
        return res;
      });
    },
  },
  mutations: {
    logout: (state) => {
      state.user.token = null;
      state.user.data = {};
      sessionStorage.removeItem("TOKEN");
    },
    setUser: (state, user) => {
      state.user.data = user;
    },
    setToken: (state, token) => {
      state.user.token = token;
      sessionStorage.setItem('TOKEN', token);
    },
    dashboardLoading: (state, loading) => {
      state.dashboard.loading = loading;
    },
    setPatients: (state, data) => {
      state.person.patients = data;
    },
    setQuotes: (state, data) => {
      state.person.quotes = data;
    },
    setPersonsLoading: (state, loading) => {
      state.person.loading = loading;
    },
    setCurrentPersonLoading: (state, loading) => {
      state.currentPerson.loading = loading;
    },
    setCurrentPerson: (state, person) => {
      state.currentPerson.data = person.data;
    },
  },
  modules: {},
});

export default store;
