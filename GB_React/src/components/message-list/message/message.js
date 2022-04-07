import classNames from "classnames"
import { useDispatch } from "react-redux"
import { useParams } from "react-router-dom"
import { setMessageValue } from "../../../store/conversations"
import styles from "./message.module.css"

export function Message({ message }) {
  const { roomId } = useParams()
  const dispatch = useDispatch()

  return (
    <div
      onDoubleClick={() => dispatch(setMessageValue(message, roomId))}
      className={classNames(styles.message, {
        [styles.currentMessage]: message.author === "User",
      })}
    >
      <h3>{message.message}</h3>
      <p>{message.author}</p>
      <p>12.03</p>
    </div>
  )
}
