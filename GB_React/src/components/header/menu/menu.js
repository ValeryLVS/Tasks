import { useContext } from "react"
import { Link } from "react-router-dom"
import { ThemeContext } from "../../theme-context"
import styles from "./menu.module.css"

const menu = [
  { to: "/", name: "Главная" },
  { to: "/chat", name: "Чат" },
  { to: "/profile", name: "Профиль" },
  { to: "/gists", name: "Gist" },
  { to: "/login", name: "Логин" },
  { to: "/sign-up", name: "Регистрация" },
]

export function Menu() {
  const { theme } = useContext(ThemeContext)

  return (
    <ul className={styles.menu}>
      {menu.map((item) => (
        <li key={item.name}>
          <Link style={{ color: theme.theme.color }} to={item.to}>
            {item.name}
          </Link>
        </li>
      ))}
    </ul>
  )
}
