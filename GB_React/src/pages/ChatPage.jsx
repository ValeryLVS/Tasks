import React from 'react';
import {useDispatch, useSelector} from 'react-redux'

import { useRouteMatch } from 'react-router';


const ChatPage = () => {
    const match = useRouteMatch();
    let { id } = match.params;
    
    const chat = useSelector(state => state.chatsReducer.chats).filter(item=>item.id == id)


    return (
        <div>
            {chat.map(item => {
                return (
                    <h1
                    key={item.id}
                    >hello {item.name} </h1>
                )
            })}
        </div>
    );
};

export default ChatPage;