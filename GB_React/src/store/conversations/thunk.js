import debounce from "lodash.debounce"
import { handleChangeMessageValue } from "./actions"
import { GET_CONVERSATIONS } from "./types"

// getConversationsApi,
// handleChangeMessageApi,

export const getConversationsFB =
  () =>
  (dispatch, _, { getConversationsApi }) => {
    // @TODO сделать проверку на ошибку START/SUCCESS/ERROR статусы
    getConversationsApi().then((snapshot) => {
      const conversations = []

      snapshot.forEach((snap) => {
        conversations.push(snap.val())
      })

      dispatch({ type: GET_CONVERSATIONS, payload: conversations })
    })
  }

const cb = debounce(async (handleChangeMessage) => {
  // @TODO сделать проверку на ошибку START/SUCCESS/ERROR статусы
  await handleChangeMessage()
}, 500)

export const handleChangeMessageValueFB =
  (messageValue, roomId) =>
  async (dispatch, _, { handleChangeMessageApi }) => {
    await cb(() => handleChangeMessageApi(roomId, messageValue))

    dispatch(handleChangeMessageValue(messageValue, roomId))
  }
