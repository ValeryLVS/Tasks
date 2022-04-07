import { clearMessageValue } from "../conversations"
import { UPDATED_MESSAGES } from "../types"
import { sendMessage, editMessage } from "./actions"
import { GET_MESSAGES } from "./types"

export const sendMessageWithThunk =
  (message, roomId) =>
  async (dispatch, _, { sendMessageApi }) => {
    // запросы на сервер
    // все сайд еффекты

    // @TODO сделать проверку на ошибку START/SUCCESS/ERROR статусы
    try {
      await sendMessageApi(roomId, message)

      dispatch(sendMessage(message, roomId))
      dispatch(clearMessageValue(roomId))
    } catch (e) {
      console.log("error", e)
    }

    // if (message.author === "User") {
    //   setTimeout(
    //     () =>
    //       dispatch(
    //         sendMessage(
    //           { author: "Bot", message: "Hello from bot thunk" },
    //           roomId,
    //         ),
    //       ),
    //     1500,
    //   )
    // }
  }

export const editMessageThunk =
  (messageValue, roomId, updateMessageId) => (dispatch) => {
    dispatch(editMessage(messageValue, roomId, updateMessageId))
    dispatch({ type: UPDATED_MESSAGES })
    dispatch(clearMessageValue(roomId))
  }

export const getMessagesFB =
  () =>
  (dispatch, _, { getMessagesApi }) => {
    getMessagesApi().then((snapshot) => {
      const messages = {}

      snapshot.forEach((snap) => {
        messages[snap.key] = Object.values(snap.val())
      })

      dispatch({ type: GET_MESSAGES, payload: messages })
    })
  }
