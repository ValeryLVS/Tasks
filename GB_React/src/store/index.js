import { createStore, combineReducers, applyMiddleware, compose } from "redux"
import { persistStore, persistReducer } from "redux-persist"
import storage from "redux-persist/lib/storage"
import thunk from "redux-thunk"
import {
  getConversationsApi,
  handleChangeMessageApi,
} from "../api/conversations"
import { getGistsApi, searchGistsByUserNameApi } from "../api/gists"
import { getMessagesApi, sendMessageApi } from "../api/messages"
import { conversationsReducer } from "./conversations"
import { gistsReducer } from "./gists"
import { messagesReducer } from "./messages"
import { logger, botSendMessage, timeoutScheduler, report } from "./middlewares"
import { profileReducer } from "./profile"

const persistConfig = {
  key: "root",
  storage,
  blacklist: ["conversations", "messages"],
  whitelist: ["profile"],
}

export const reducer = combineReducers({
  profile: profileReducer,
  conversations: conversationsReducer,
  messages: messagesReducer,
  gists: gistsReducer,
})

const persistreducer = persistReducer(persistConfig, reducer)

export const store = createStore(
  persistreducer,
  compose(
    applyMiddleware(
      report,
      thunk.withExtraArgument({
        getGistsApi,
        searchGistsByUserNameApi,
        getMessagesApi,
        sendMessageApi,
        getConversationsApi,
        handleChangeMessageApi,
      }),
      logger,
      botSendMessage,
      timeoutScheduler,
    ),
    window.__REDUX_DEVTOOLS_EXTENSION__
      ? window.__REDUX_DEVTOOLS_EXTENSION__()
      : (args) => args,
  ),
)

export const persistore = persistStore(store)
