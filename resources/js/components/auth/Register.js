import React, { useState } from 'react';

const Register = () => {
  const { user, setUser } = useState({
    name: '',
    email: '',
    password: '',
    password2: ''
  });

  const onChange = e => setUser({ ...user, [e.target.name]: e.target.value });

  return (
    <div className="form-container">
      <h1>
        Account <span className="text-primaryt">Register</span>
      </h1>
      <form>
        <div className="form-group">
          <label htmlFor="name">Name</label>
          <input type="text" name="name" value={name} onChange={onChange} />
        </div>
        <div className="form-group">
          <label htmlFor="email">Email</label>
          <input type="email" name="email" value={email} onChange={onChange} />
        </div>
        <div className="form-group">
          <label htmlFor="password">Password</label>
          <input
            type="password"
            name="password"
            value={password}
            onChange={onChange}
          />
        </div>
        <div className="form-group">
          <label htmlFor="password2">Confirm Password</label>
          <input
            type="password"
            name="password2"
            value={password2}
            onChange={onChange}
          />
        </div>
        <input
          type="submit"
          value="Register"
          className="btn btn-primary btn-block"
        />
      </form>
    </div>
  );
};

export default Register;
