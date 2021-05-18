import React, { Component } from 'react'
import Table from './components/Table'

class App extends Component {
  constructor() {
    super()
    this.state = {
      users: [],
      modal: false,
      isLoading: false
    }
  }

  render() {
    return (
        <div className="App">
            <Table />
        </div>
    )
  }
}

export default App;