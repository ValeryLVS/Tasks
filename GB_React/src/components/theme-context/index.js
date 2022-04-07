import { ThemeProvider } from "@material-ui/core"
import { useCallback, createContext, useState } from "react"

export const ThemeContext = createContext()

export const DefaultThemeProvider = ({
  children,
  themes,
  initialTheme = "light",
}) => {
  const [theme, setTheme] = useState({
    theme: themes[initialTheme],
    name: initialTheme,
  })

  const changeTheme = useCallback(
    (name) => {
      if (themes[name]) {
        setTheme({ name, theme: themes[name] })
      }
    },
    [themes],
  )

  return (
    <ThemeContext.Provider value={{ theme, changeTheme }}>
      <ThemeProvider theme={theme.theme}>{children}</ThemeProvider>
    </ThemeContext.Provider>
  )
}
