export const thunk = (store) => (next) => (action) => {
  if (typeof action === "function") {
    action(store.dispatch, store.getState)
    return
  }

  return next(action)
}
