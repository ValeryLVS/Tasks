import React, { useState, useEffect } from 'react'
import { makeStyles } from '@material-ui/core/styles'
import Paper from '@material-ui/core/Paper'
import Typography from '@material-ui/core/Typography'
import Container from '@material-ui/core/Container'
import TextField from '@material-ui/core/TextField'
import { Input } from '@material-ui/core'
import Button from '@material-ui/core/Button'
import Icon from '@material-ui/core/Icon'
import Box from '@material-ui/core/Box'
import Grid from '@material-ui/core/Grid'
import Card from '@material-ui/core/Card'
import CardContent from '@material-ui/core/Card'
import IconButton from '@material-ui/core/IconButton'
import DeleteIcon from '@material-ui/icons/Delete'
import List from '@material-ui/core/List'
import ListItem from '@material-ui/core/ListItem'
import ListItemText from '@material-ui/core/ListItemText'
import ListSubheader from '@material-ui/core/ListSubheader';
const App = () => {

    const useStyles = makeStyles((theme) => ({
        root: {
            display: 'flex',
            flexWrap: 'wrap',
            backgroundColor: '#648dae',
            minHeight: '768px',
        },
        header: {
            textAlign: 'center'
        },
        form: {
            margin: theme.spacing(1),
        },
        button: {
            margin: theme.spacing(1),
            backgroundColor: '#000',
            '&:hover': {
                color: 'black',
                backgroundColor: '#f57c00',
            }
        },
        box: {
            display: 'flex',
            justifyContent: 'space-between',
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
        rootCard: {
            minWidth: 275,
            margin: theme.spacing(1),
        },
        rootList: {
            height: '100%',
            maxWidth: 360,
        },
        main : {
            display: 'flex',
        }
    }));
    const classes = useStyles();
    const [data, setData] = useState([])
    const [text, setText] = useState('')
    const [author, setAuthor] = useState('')
    const [loaded, setLoaded] = useState(false)

    const handleAddMessage = () => {
        let newArr = {
            id: Date.now(),
            text: text,
            author: author
        }
        setData([...data, newArr])
        setText('')
        setAuthor('')
        setLoaded(true)
    }
    const handleDelete = (id) => {
        setData(data.filter(item => {
            return item.id !== id
        }))
    }
    return (
        <Paper className={classes.root}>
            <Container maxWidth="md" className={classes.container}>
                <Typography variant="h2" gutterBottom className={classes.header}>
                    React+Material UI test APP
                </Typography>
                <form
                    className={classes.form}
                    noValidate
                    autoComplete="off"
                >
                    <TextField
                        label='Введите своё сообщение'
                        onChange={(e) => { setText(e.target.value) }}
                        fullWidth
                        value={text}
                        autoFocus
                    />
                    <Box className={classes.box}>
                        <Input
                            placeholder='Введите своё имя'
                            onChange={(e) => { setAuthor(e.target.value) }}
                            value={author}
                        />
                        <Button
                            variant="contained"
                            color="primary"
                            className={classes.button}
                            endIcon={<Icon>send</Icon>}
                            onClick={handleAddMessage}
                        >
                            Добавить в список сообщений
                        </Button>
                    </Box>
                </form>
                <Box className={classes.main}>
                <List
                    component="nav"
                    aria-labelledby="nested-list-subheader"
                    subheader={
                        <ListSubheader component="div" id="nested-list-subheader">
                            Массив чатов
                        </ListSubheader>
                    }
                    className={classes.rootList}
                    
                >
                    <ListItem button>
                        <ListItemText primary="Название чата" />
                    </ListItem>
                    <ListItem button>
                        <ListItemText primary="Уникальный индетификатор" />
                    </ListItem>
                </List>
                <Grid container spacing={3}>
                    {data.map(item => {
                        return (
                            <Grid item md={6} key={item.id}>
                                <Card className={classes.rootCard} >
                                    <CardContent>
                                        <Typography className={classes.title} color="textSecondary" gutterBottom>
                                            Автор:
                                        </Typography>
                                        <Typography variant="h5" component="h2">
                                            {item.author}
                                        </Typography>
                                        <Typography variant="body2" component="p">
                                            {item.text}
                                        </Typography>
                                    </CardContent>
                                    <IconButton
                                        aria-label="delete"
                                        onClick={() => { handleDelete(item.id) }}
                                    >
                                        <DeleteIcon fontSize="small" />
                                    </IconButton>
                                </Card>
                            </Grid>
                        )
                    })}
                </Grid>
                </Box>
            </Container>
        </Paper>


    );
};

export default App;
