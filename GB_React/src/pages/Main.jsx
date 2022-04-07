import React from 'react';
import Typography from '@material-ui/core/Typography';
import { makeStyles } from '@material-ui/core/styles';
import Box from '@material-ui/core/Box';


const useStyles = makeStyles({
    main: {
        display: 'flex',
        flexDirection: 'column',
        maxWidth: 500,
        height: '100vh',
    },
});

const Main = () => {
    const classes = useStyles();
    return (
        <Box className={classes.main}>
            <Typography variant="h2" gutterBottom>
                Тестовое React приложение.
            </Typography>
            <Typography variant="subtitle1" gutterBottom
                сlassName={classes.main}
            >
                Приветствую тебя. Если вы попали на эту страницу, то вы либо интересуетесь моим прогрессом в области разработки, либо проверяете мой код. И в том, и в другом случае я рад тебя здесь видеть.
            </Typography>
        </Box>

    );
};

export default Main;