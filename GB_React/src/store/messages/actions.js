import { SEND_MESSAGE, EDIT_MESSAGE } from "./types"

export const sendMessage = (message, roomId) => ({
  type: SEND_MESSAGE,
  payload: { message, roomId },
  meta: { delay: 500 },
})

export const editMessage = (messageValue, roomId, updateMessageId) => ({
  type: EDIT_MESSAGE,
  payload: { messageValue, roomId, updateMessageId },
})
