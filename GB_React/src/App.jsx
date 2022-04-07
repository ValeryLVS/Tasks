import React from 'react';
import { BrowserRouter as Router, Route, Switch, useHistory } from 'react-router-dom';
import NavBar from './components/NavBar';
import Paper from '@material-ui/core/Paper';
import Container from '@material-ui/core/Container';
import { makeStyles } from '@material-ui/core/styles';
import Form from './pages/Form';
import Profile from './pages/Profile'
import Main from './pages/Main';
import ChatPage from './pages/ChatPage'
import { Context } from './Context'

const useStyles = makeStyles((theme) => ({
  root: {
    backgroundColor: '#a6d4fa',
    minHeight: '100vh',
    margin: 0,
    padding: 0,
    boxSizing: 'border-box;'
  },
}));

const App = () => {

  const history=useHistory();
  
  const handleToChatPage = (id) => {
    history.push(`/chats/${id}`)
  }
  const classes = useStyles();
  return (
        <Switch>
        <Context.Provider value={{ handleToChatPage }}>
          <Paper className={classes.root}>
            <Container maxWidth='lg'>
              <NavBar />
              <Route exact path='/'>
                <Main />
              </Route>
              <Route path='/profile'>
                <Profile />
              </Route>
              <Route
              exact
                path='/chats'>
                <Form
                />
              </Route>
              <Route 
              exact
              path='/chats/:id'>
                <ChatPage />
              </Route>
            </Container>
          </Paper>
          </Context.Provider>
        </Switch>
  );
};

export default App;
