import React, { useReducer } from 'react';
import ContactContext from './contactContext';
import contactReducer from './contactReducer';
import {
  GET_CONTACTS,
  ADD_CONTACT,
  DELETE_CONTACT,
  CONTACT_ERROR,
  SET_CURRENT,
  CLEAR_CURRENT,
  UPDATE_CONTACT,
  FILTER_CONTACTS,
  CLEAR_CONTACTS,
  CLEAR_FILTER
} from '../types';

const ContactState = props => {
  const initialState = {
    contacts: null,
    current: null,
    filtered: null,
    error: null
  };

  const [state, dispatch] = useReducer(contactReducer, initialState);

  // Get contacts
  const getContacts = async () => {
    try {
      const res = await axios.get('http://current-dev.test/api/v1/contacts');
      dispatch({ type: GET_CONTACTS, payload: res.data.data });
    } catch (err) {
      let error;
      if (err.response.data.msg) {
        error = err.response.data.msg;
      } else {
        error =
          err.response.data.errors[Object.keys(err.response.data.errors)[0]][0];
      }
      dispatch({ type: CONTACT_ERROR, payload: error });
    }
  };

  // Add contact
  const addContact = async contact => {
    const config = { headers: { 'Content-Type': 'application/json' } };
    try {
      const res = await axios.post(
        'http://current-dev.test/api/v1/contacts',
        contact,
        config
      );
      dispatch({ type: ADD_CONTACT, payload: res.data.data });
    } catch (err) {
      let error;
      if (err.response.data.msg) {
        error = err.response.data.msg;
      } else {
        error =
          err.response.data.errors[Object.keys(err.response.data.errors)[0]][0];
      }
      dispatch({ type: CONTACT_ERROR, payload: error });
    }
  };

  // Update contact
  const updateContact = async contact => {
    const config = { headers: { 'Content-Type': 'application/json' } };
    try {
      const res = await axios.put(
        `http://current-dev.test/api/v1/contacts/${contact.id}`,
        contact,
        config
      );
      dispatch({ type: UPDATE_CONTACT, payload: res.data.data });
    } catch (err) {
      let error;
      if (err.response.data.msg) {
        error = err.response.data.msg;
      } else {
        error =
          err.response.data.errors[Object.keys(err.response.data.errors)[0]][0];
      }
      dispatch({ type: CONTACT_ERROR, payload: error });
    }
  };

  // Delete contact
  const deleteContact = async id => {
    try {
      const res = await axios.delete(
        `http://current-dev.test/api/v1/contacts/${id}`
      );
      dispatch({ type: DELETE_CONTACT, payload: id });
    } catch (err) {
      let error;
      if (err.response.data.msg) {
        error = err.response.data.msg;
      } else {
        error =
          err.response.data.errors[Object.keys(err.response.data.errors)[0]][0];
      }
      dispatch({ type: CONTACT_ERROR, payload: error });
    }
  };

  // Clear contacts
  const clearContacts = () => {
    dispatch({ type: CLEAR_CONTACTS });
  };

  // Set current contact
  const setCurrent = contact => {
    dispatch({ type: SET_CURRENT, payload: contact });
  };

  // Clear current contact
  const clearCurrent = () => {
    dispatch({ type: CLEAR_CURRENT });
  };

  // Filter contacts
  const filterContacts = text => {
    dispatch({ type: FILTER_CONTACTS, payload: text });
  };

  // Clear filter
  const clearFilter = () => {
    dispatch({ type: CLEAR_FILTER });
  };

  return (
    <ContactContext.Provider
      value={{
        contacts: state.contacts,
        current: state.current,
        filtered: state.filtered,
        error: state.error,
        getContacts,
        addContact,
        updateContact,
        deleteContact,
        clearContacts,
        setCurrent,
        clearCurrent,
        filterContacts,
        clearFilter
      }}
    >
      {props.children}
    </ContactContext.Provider>
  );
};

export default ContactState;
