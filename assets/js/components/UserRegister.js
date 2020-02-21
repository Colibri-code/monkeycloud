import React, {Component} from 'react';
import $ from 'jquery';

class UserRegister extends Component {
    constructor(props) {
        super(props);
        this.state = {
            fullnameValue: '',
            emailValue: '',
            passwordValue: '',
            fullnameError: '',
            emailError: '',
            passwordError: '',
            successMessage: '',
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    handleChange(e) {
        if(e.target.name === 'fullName') {
            this.setState({
                fullnameValue: e.target.value
            });
        }

        if(e.target.name === 'email') {
            this.setState({
                emailValue: e.target.value,
            });
        }

        if(e.target.name === 'password') {
            this.setState({
                passwordValue: e.target.value,
            });
        }
    }

    handleSubmit(e) {
        e.preventDefault();

        $.ajax({
            url: 'http://127.0.0.1:8000/api/user',
            type: 'POST',
            data: {
                fullName: this.state.fullnameValue,
                email: this.state.emailValue,
                password: this.state.passwordValue
            },
            dataType: 'json',
            success: function(response) {
                this.setState({
                    fullnameError: response.fullnameError ? response.fullnameError : null,
                    emailError: response.emailError ? response.emailError : null,
                    passwordError: response.passwordError ? response.passwordError : null,
                    successMessage: response.success_message ? response.success_message : null,
                });
            }.bind(this),
            error: function(xhr) {
                console.log(`An error occurred: ${xhr.status} ${xhr.statusText}`);
            }
        });
    }

    render() {
        return (
            <form onSubmit={this.handleSubmit}>
                <label htmlFor="fullName">Full Name: </label>
                <input type="text" name='fullName' value={this.state.fullnameValue} onChange={this.handleChange} id="fullName" placeholder="Full Name" />
                <small>{this.state.fullnameError}</small>

                <label htmlFor="email">Email: </label>
                <input type="email" name='email' value={this.state.emailValue} onChange={this.handleChange} id="email" placeholder="Email" />
                <small>{this.state.emailError}</small>

                <label htmlFor="password">Password: </label>
                <input type="password" name='password' value={this.state.passwordValue} onChange={this.handleChange} id="password" placeholder="Password" />
                <small>{this.state.passwordError}</small>

                <button type="submit">Sign up</button>
                <span className='text-success'>{this.state.successMessage}</span>
            </form>
        );
    }
}

export default UserRegister;