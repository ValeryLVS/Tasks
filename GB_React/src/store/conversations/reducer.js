import { REMOVE_CONVERSATION, UPDATED_MESSAGES } from "../types"
import {
  HANDLE_CHANGE_MESSAGE_VALUE,
  CLEAR_MESSAGE_VALUE,
  SET_MESSAGE_VALUE,
  CREATE_CONVERSATION,
  GET_CONVERSATIONS,
} from "./types"

const initialState = {
  updateMessageId: false,
  conversations: [],
}

const updateConversations = (state, roomId, value) =>
  state.conversations.map((conversation) => {
    return conversation.title === roomId
      ? { ...conversation, value }
      : conversation
  })

export const conversationsReducer = (state = initialState, action) => {
  switch (action.type) {
    case HANDLE_CHANGE_MESSAGE_VALUE:
      return {
        ...state,
        conversations: updateConversations(
          state,
          action.payload.roomId,
          action.payload.value,
        ),
      }
    case CLEAR_MESSAGE_VALUE:
      return {
        ...state,
        conversations: updateConversations(state, action.payload, ""),
      }
    case REMOVE_CONVERSATION:
      return {
        ...state,
        conversations: state.conversations.filter(
          (conversation) => conversation.title !== action.payload,
        ),
      }
    case SET_MESSAGE_VALUE:
      return {
        ...state,
        updateMessageId: action.payload.message.id,
        conversations: state.conversations.map((conversation) =>
          conversation.title === action.payload.roomId
            ? { ...conversation, value: action.payload.message.message }
            : conversation,
        ),
      }
    case UPDATED_MESSAGES:
      return {
        ...state,
        updateMessageId: null,
      }
    case CREATE_CONVERSATION:
      return {
        ...state,
        conversations: [
          ...state.conversations,
          { title: action.payload, value: "" },
        ],
      }
    case GET_CONVERSATIONS:
      return {
        ...state,
        conversations: action.payload,
      }
    default:
      return state
  }
}
