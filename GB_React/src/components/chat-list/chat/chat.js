import {
  ListItem,
  ListItemIcon,
  ListItemText,
  makeStyles,
} from "@material-ui/core"
import { AccountCircle, HighlightOff } from "@material-ui/icons"
import classnames from "classnames"
import { memo } from "react"
import { useDispatch, useSelector } from "react-redux"
import { Link } from "react-router-dom"
import { removeConversationById } from "../../../store/conversations"
import styles from "./chat.module.css"

const useStyles = makeStyles(() => {
  return {
    item: {
      "&.Mui-selected": {
        backgroundColor: "#2b5278",
      },
      "&.Mui-selected:hover": {
        backgroundColor: "#2b5278",
      },
    },
  }
})

function ChatView({ title, selected, handleListItemClick }) {
  const s = useStyles()

  const messages = useSelector((state) => {
    return state.messages.messages[title] || []
  })

  const dispatch = useDispatch()

  const lastMessage = messages[messages.length - 1]

  return (
    <Link to={`/chat/${title}`}>
      <ListItem
        className={classnames(s.item, styles.item)}
        button={true}
        selected={selected}
        onClick={handleListItemClick}
      >
        <ListItemIcon>
          <AccountCircle fontSize="large" className={styles.icon} />
        </ListItemIcon>
        <div className={styles.description}>
          <ListItemText className={styles.text} primary={title} />
          {lastMessage && (
            <ListItemText
              className={styles.text}
              primary={`${lastMessage.author}: ${lastMessage.message}`}
            />
          )}
          <ListItemText className={styles.text} primary="12.30" />
        </div>
        <HighlightOff
          className={styles.removeIcon}
          onClick={() => dispatch(removeConversationById(title))}
        />
      </ListItem>
    </Link>
  )
}

export const Chat = memo(ChatView)
