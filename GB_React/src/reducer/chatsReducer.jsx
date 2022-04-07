const ADD_CHAT = 'ADD_CHAT'
const SET_CURRENT_PAGE = 'SET_CURRENT_PAGE'
const REMOVE_CHAT = 'REMOVE_CHAT'
const SET_AUTH='SET_AUTH'


const chatsState = {
    chats: [],
    isLoaded: false,
    isAuth: false,
    currentPage: 1,
    perPage: 3
}


export default function chatsReducer(state = chatsState, action) {
    switch (action.type) {

        case ADD_CHAT: return {
            ...state,
            chats: [...state.chats, action.payload],
            isLoaded: true
        }

        case REMOVE_CHAT: return {
            ...state,
            chats: state.chats.filter(item => item.id !== action.payload),
            isLoaded: true
        }
        case SET_AUTH: return {
            ...state,
            isAuth: action.payload
        }
        case SET_CURRENT_PAGE: return {
            ...state,
            currentPage: action.payload
        }

        
        default: return state
    }
}