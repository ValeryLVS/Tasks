import React,{useContext} from 'react';
import {useDispatch} from 'react-redux'
import  {makeStyles} from '@material-ui/core/styles';
import Card from '@material-ui/core/Card';
import CardActions from '@material-ui/core/CardActions';
import CardContent from '@material-ui/core/CardContent';
import Typography from '@material-ui/core/Typography';
import IconButton from '@material-ui/core/IconButton';
import DeleteIcon from '@material-ui/icons/Delete';
import { Context } from '../Context'

const useStyles = makeStyles({
    root: {
      minWidth: 275,
    },
    bullet: {
      display: 'inline-block',
      margin: '0 2px',
      transform: 'scale(0.8)',
    },
    title: {
      fontSize: 14,
    },
    pos: {
      marginBottom: 12,
    },
  });

const Chat = ({item}) => {
    const classes = useStyles();
    const dispatch=useDispatch();

    const { handleToChatPage } = useContext(Context);
    const handleRemoveChat = (id) => {
        dispatch({type: 'REMOVE_CHAT', payload: id})
    }


    return (
        <Card 
        className={classes.root}
        onClick={()=>{handleToChatPage(item.id)}}
        >
        <CardContent>
          <Typography className={classes.title} color="textSecondary" gutterBottom>
          {item.author}
          </Typography>        
          <Typography variant="body2" component="p">
          {item.name}   
          </Typography>
        </CardContent>
        <CardActions>
        <IconButton 
        aria-label="delete" 
        className={classes.margin}
        onClick={()=>{handleRemoveChat(item.id)}}
        >
          <DeleteIcon fontSize="small" 
          />
        </IconButton>
        </CardActions>
      </Card>
    );
};

export default Chat;