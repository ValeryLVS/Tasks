import React, { useState } from 'react';
import { useSelector, useDispatch } from 'react-redux';
import Checkbox from '@material-ui/core/Checkbox';
import Typography from '@material-ui/core/Typography';
import Box from '@material-ui/core/Box';



const Profile = () => {

    const dispatch = useDispatch()
    const [auth, setAuth] = useState(false)
    const isAuthUser = useSelector(state => state.chatsReducer.isAuth)


    const handleChange = () => {
        setAuth(!auth)
        dispatch({ type: "SET_AUTH", payload: auth })
    }
    return (
        <Box>
            <Typography variant="h2" gutterBottom
            >
                Вы авторизованы?
            </Typography>
            <Checkbox
                onChange={handleChange}
                color="primary"
                inputProps={{ 'aria-label': 'secondary checkbox' }}
            />
        </Box>

    );
};

export default Profile;