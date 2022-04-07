import { createTheme } from "@material-ui/core"
import React, { useEffect, useState } from "react"
import ReactDOM from "react-dom"
import { Provider } from "react-redux"
import { BrowserRouter, Switch, Route } from "react-router-dom"
import { PersistGate } from "redux-persist/integration/react"
import { firebaseApp, db } from "./api/firebase"
import { Header, PrivateRoute, PublicRoute } from "./components"
import { DefaultThemeProvider } from "./components/theme-context"
import { Chat, Profile, Gist, Login, SignUp } from "./pages"
import { store, persistore } from "./store"
import "./global.css"

const themes = {
  dark: createTheme({
    color: "#000",
  }),
  light: createTheme({
    color: "#fff",
  }),
}

const addConversation = () => {
  db.ref("conversations").child("room2").set({ title: "room2", value: "" })
}

const createMessage = (roomId) => {
  db.ref("messages")
    .child("room2")
    .push({ id: 1, author: "User", message: "some text 2" })
}

const App = () => {
  const [session, setSession] = useState(null)

  useEffect(() => {
    firebaseApp.auth().onAuthStateChanged((user) => {
      if (user) {
        setSession(user)
      } else {
        setSession(null)
      }
    })
  }, [])

  return (
    <Provider store={store}>
      <PersistGate loading={null} persistor={persistore}>
        <BrowserRouter>
          <DefaultThemeProvider themes={themes} initialTheme="light">
            <button onClick={addConversation}>addConversation</button>
            <button onClick={createMessage}>createMessage</button>
            <Header session={session} />
            <Switch>
              <PrivateRoute isAut={session} path="/chat" component={Chat} />
              <PrivateRoute
                isAut={session}
                path="/profile"
                component={Profile}
              />
              <PrivateRoute isAut={session} path="/gists" component={Gist} />
              <PublicRoute isAut={session} path="/login" component={Login} />
              <PublicRoute isAut={session} path="/sign-up" component={SignUp} />
              <Route path="*" component={() => <h1>404 page</h1>} />
            </Switch>
          </DefaultThemeProvider>
        </BrowserRouter>
      </PersistGate>
    </Provider>
  )
}

ReactDOM.render(<App />, document.getElementById("root"))
