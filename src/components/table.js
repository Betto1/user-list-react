import React, { Component } from "react";
import Modal from "./modal";

class Table extends Component{
    constructor(props) {
        super(props)
        this.state = {
            isLoading: false,
            modal: false,
            users: [],
            user: [],
            useraddress: [],
            usercompany: []
        }
    }

    componentDidMount(){
        this.setState({ isLoading: true })
        fetch(`https://jsonplaceholder.typicode.com/users`)
            .then(response => response.json())
            .then(response => {
                this.setState({
                    users: response,
                    isLoading: false
                })
            })
    }

    handleChange(e) {
        const target = e.target;
        const name = target.name;
        const value = target.value;
    
        this.setState({
          [name]: value
        });
      }
    
      handleSubmit(e) {
        this.setState({ name: this.state.modalInputName });
        this.modalClose();
      }

    modalOpen(e, user) {
        e.preventDefault();
        this.setState({ modal: true, user, usercompany: user.company, useraddress: user.address });
    }

    modalClose() {
        this.setState({
          modalInputName: "",
          modal: false
        });
      }

    render() {

        return (
            <div class="p-10 bg-surface-secondary">

                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-center">
                                User-List
                            </h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {
                                    this.state.users.map(
                                        user => 
                                        <tr>
                                            <td data-label="ID">
                                                <a class="text-heading font-semibold" href="#" onClick={e => this.modalOpen(e, user)}>{user.id}</a>
                                            </td>
                                            <td data-label="Name">
                                                <a href="#" onClick={e => this.modalOpen(e, user)}>{user.name}</a>
                                            </td>
                                            <td data-label="Username">
                                                <a href="#" onClick={e => this.modalOpen(e, user)}>{user.username}</a>
                                            </td>
                                            <td data-label="Email">
                                                <a href={'mailto:' + user.email}>{user.email}</a>
                                            </td>
                                            <td data-label="Phone">
                                                <a href={'tel:' + user.phone}>{user.phone}</a>
                                            </td>
                                        </tr>
                                        )
                                    }
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <Modal show={this.state.modal} handleClose={e => this.modalClose(e)}>
                    <p>Name: {this.state.user.name}</p>
                    <p>Username: {this.state.user.username}</p>
                    <p>Email: {this.state.user.email}</p>
                    <p>Phone: {this.state.user.phone}</p>
                    <p>Company: {this.state.usercompany.name}</p>
                    <p>City: {this.state.useraddress.city}</p>
                    <p>Street: {this.state.useraddress.street}</p>
                    <p>Zipcode: {this.state.useraddress.zipcode}</p>
                </Modal>
                
            </div>
        );
    }
}
export default Table;