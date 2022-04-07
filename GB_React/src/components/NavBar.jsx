import React from 'react';
import {Link} from 'react-router-dom'
import { makeStyles } from '@material-ui/core/styles';
import AppBar from '@material-ui/core/AppBar';
import Toolbar from '@material-ui/core/Toolbar';
import Typography from '@material-ui/core/Typography';
import Button from '@material-ui/core/Button';

const useStyles = makeStyles((theme) => ({
    root: {
      flexGrow: 1,
    },
    menuButton: {
      marginRight: theme.spacing(2),
    },
    title: {
      flexGrow: 1,
    },
    link: {
        textDecoration: 'none',
        color: '#fff',
    }
  }));

const NavBar = () => {
    const classes = useStyles();
    return (
        <AppBar position="static">
        <Toolbar>
          <Typography variant="h6" className={classes.title}>
            <Link 
            to='/'
            className={classes.link}>
              React Test App
              </Link>
          </Typography>
          <Button  >
              <Link 
              to='/profile'
              className={classes.link}
              >Profile
              </Link>
              </Button>
          <Button>
          <Link 
          to='/chats'
          className={classes.link}
          >Chats</Link>
              </Button>
        </Toolbar>
      </AppBar>
    );
};

export default NavBar;