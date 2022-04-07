import { Grid, Switch } from "@material-ui/core"
import { useContext } from "react"
import { firebaseApp } from "../../api/firebase"
import { ThemeContext } from "../theme-context"
import styles from "./header.module.css"
import { Menu } from "./menu"

const signOut = () => {
  firebaseApp.auth().signOut()
}

export function Header({ session }) {
  const { theme, changeTheme } = useContext(ThemeContext)

  const isLightTheme = theme.name === "light"

  return (
    <div className={styles.header}>
      <Menu />

      <Grid style={{ color: theme.theme.color }} item={true}>
        dark
      </Grid>
      <Grid item={true}>
        <Switch
          name="checkedC"
          checked={isLightTheme}
          onChange={() => changeTheme(isLightTheme ? "dark" : "light")}
        />
      </Grid>
      <Grid style={{ color: theme.theme.color }} item={true}>
        light
      </Grid>
      <hr />
      {session?.email && (
        <Grid
          style={{ color: theme.theme.color, cursor: "pointer" }}
          item={true}
          onClick={signOut}
        >
          Выход ({session.email})
        </Grid>
      )}
    </div>
  )
}
