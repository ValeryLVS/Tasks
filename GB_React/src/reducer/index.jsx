import { combineReducers } from "redux";
import {createStore} from "redux";
import chatsReducer from './chatsReducer';



const rootReducer = combineReducers({
    chatsReducer
})

const store = createStore(rootReducer);

export default store;