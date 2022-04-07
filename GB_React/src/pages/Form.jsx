import React, { useState } from 'react';
import { useSelector, useDispatch } from 'react-redux'
import Input from '@material-ui/core/Input';
import { makeStyles } from '@material-ui/core/styles';
import Button from '@material-ui/core/Button';
import Icon from '@material-ui/core/Icon';
import Chat from './Chat'
import Typography from '@material-ui/core/Typography';

const useStyles = makeStyles((theme) => ({
    input: {
        marginTop: theme.spacing(1),
    },
    button: {
        margin: theme.spacing(1),
    },
    title: {
        textAlign: 'center',
    }
}));

const Form = () => {
    const classes = useStyles();
    const dispatch = useDispatch();
    const chats = useSelector(state => state.chatsReducer.chats)
    const [nameInput, setName] = useState('')
    const [authorInput, setAuthor] = useState('')

    const chatsAddHandler = () => {
        let newChat = {
            id: Date.now(),
            name: nameInput,
            author: authorInput,
        }
        dispatch({ type: "ADD_CHAT", payload: newChat })
        setName('')
        setAuthor('')
    }
    return (
        <div>
            <form>
                <Input
                    сlasses={classes.input}
                    placeholder='Введите название чата'
                    fullWidth
                    onChange={(e) => { setName(e.target.value) }}
                    value={nameInput}
                >
                </Input>
                <Input
                    placeholder='Введите автора'
                    fullWidth
                    onChange={(e) => {setAuthor(e.target.value) }}
                    value={authorInput}
                >
                </Input>
                <Button
                    variant="contained"
                    color="primary"
                    className={classes.button}
                    endIcon={<Icon>send</Icon>}
                    onClick={chatsAddHandler}
                >
                    Добавить чат
                </Button>
            </form>
            {chats.length > 0
                ?
                chats.map(item => {
                    return (
                        <Chat
                            key={item.id}
                            item={item}
                        />
                    )
                })
                : <Typography variant="h2" gutterBottom
                    className={classes.title}
                >
                    Чатов больше или всё еще нет...
                </Typography>
            }
        </div>

    );
};

export default Form;