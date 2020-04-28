import React, { useReducer } from 'react';
import AuthContext from './authContext';
import authReducer from './authReducer';
import {
  REGISTER_SUCCESS,
  REGISTER_FAIL,
  USER_LOADED,
  AUTH_ERROR,
  LOGIN_SUCCESS,
  LOGIN_FAIL,
  LOGOUT,
  CLEAR_ERRORS
} from '../types';

const AuthState = props => {
  const initialState = {
    token: localStorage.getItem('token'),
    isAuthenticated: null,
    loading: true,
    user: null,
    error: null
  };

  const [state, dispatch] = useReducer(authReducer, initialState);

  // Load User
  const loadUser = () => console.log('Load user');

  // Register User
  const register = async formData => {
    const config = { headers: { 'Content-Type': 'application/json' } };
    try {
      const res = await axios.post(
        'http://current-dev.test/api/v1/users',
        formData,
        config
      );
      dispatch({ type: REGISTER_SUCCESS, payload: res.data });
    } catch (err) {
      let error;
      if (err.response.data.msg) {
        error = err.response.data.msg;
      } else {
        error =
          err.response.data.errors[Object.keys(err.response.data.errors)[0]][0];
      }
      dispatch({ type: REGISTER_FAIL, payload: error });
    }
  };
  // Login User
  const login = () => console.log('Login');
  // Logout User
  const logout = () => console.log('Logout');

  // Clear Errors
  const clearErrors = () => console.log('Clear Errors');

  return (
    <AuthContext.Provider
      value={{
        token: state.token,
        isAuthenticated: state.isAuthenticated,
        loading: state.loading,
        user: state.user,
        error: state.error,
        register,
        loadUser,
        login,
        logout,
        clearErrors
      }}
    >
      {props.children}
    </AuthContext.Provider>
  );
};

export default AuthState;
