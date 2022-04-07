import { nanoid } from "nanoid"
import { REMOVE_CONVERSATION } from "../types"
import { SEND_MESSAGE, EDIT_MESSAGE, GET_MESSAGES } from "./types"

const initialState = {
  messages: {},
}

export const messagesReducer = (state = initialState, action = {}) => {
  switch (action.type) {
    case SEND_MESSAGE:
      return {
        ...state,
        messages: {
          ...state.messages,
          [action.payload.roomId]: [
            ...(state.messages[action.payload.roomId] || []),
            { ...action.payload.message, id: nanoid() },
          ],
        },
      }
    case REMOVE_CONVERSATION:
      return {
        ...state,
        messages: Object.entries(state.messages).reduce((acc, [key, value]) => {
          if (key === action.payload) {
            return acc
          }

          acc[key] = value

          return acc
        }, {}),
      }
    case EDIT_MESSAGE:
      return {
        ...state,
        messages: {
          ...state.messages,
          [action.payload.roomId]: state.messages[action.payload.roomId].map(
            (message) =>
              message.id === action.payload.updateMessageId
                ? { ...message, message: action.payload.messageValue }
                : message,
          ),
        },
      }
    case GET_MESSAGES:
      return {
        ...state,
        messages: action.payload,
      }
    default:
      return state
  }
}
