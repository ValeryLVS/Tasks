import { Modal as ModalBase } from "@material-ui/core"
import React from "react"
import { useDispatch } from "react-redux"
import { createConversation } from "../../store/conversations"

import styles from "./add-contact-modal.module.css"

const contacts = Array.from({ length: 50 }, (_, i) => `room${i}`)

export function AddContactModal({ onClose, isOpen }) {
  const dispatch = useDispatch()

  return (
    <ModalBase open={isOpen} onClose={onClose}>
      <div className={styles.wrapper}>
        <h2 className={styles.title}>Добавить учасников</h2>
        <ul>
          {contacts.map((contact) => (
            <Contact
              key={contact}
              handleContactClick={() => dispatch(createConversation(contact))}
            >
              {contact}
            </Contact>
          ))}
        </ul>
      </div>
    </ModalBase>
  )
}

const Contact = ({ children, handleContactClick }) => {
  return <li onClick={handleContactClick}>{children}</li>
}
