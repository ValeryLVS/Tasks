import { db } from "./firebase"

export const getConversationsApi = () => db.ref("conversations").get()

export const handleChangeMessageApi = (roomId, messageValue) =>
  db
    .ref("conversations")
    .child(roomId)
    .update({ title: roomId, value: messageValue })
